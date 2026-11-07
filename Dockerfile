# syntax=docker/dockerfile:1

# ---------------------------------------------------------------------------
# Laravel on Vercel (container runtime / FrankenPHP)
# Docs: https://vercel.com/kb/guide/laravel-php-with-docker
# ---------------------------------------------------------------------------

FROM dunglas/frankenphp:1-php8.4-bookworm AS base

RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && install-php-extensions intl zip

WORKDIR /app

# ---------------------------------------------------------------------------
# PHP dependencies + application code
# ---------------------------------------------------------------------------
FROM base AS dependencies

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./
RUN composer install \
        --no-dev \
        --no-interaction \
        --no-progress \
        --no-scripts \
        --optimize-autoloader \
        --prefer-dist

COPY . .

RUN mkdir -p \
        storage/framework/cache \
        storage/framework/sessions \
        storage/framework/views \
        storage/logs \
        bootstrap/cache \
    && composer dump-autoload --no-dev --classmap-authoritative

# ---------------------------------------------------------------------------
# Front-end assets (Vite + Tailwind)
# ---------------------------------------------------------------------------
FROM node:22-bookworm-slim AS assets

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci --no-audit --no-fund

COPY vite.config.js tailwind.config.js postcss.config.js ./
COPY resources ./resources
COPY public ./public

RUN npm run build

# ---------------------------------------------------------------------------
# Runtime image
# ---------------------------------------------------------------------------
FROM base AS runtime

COPY --from=dependencies --chown=www-data:www-data /app /app
COPY --from=assets --chown=www-data:www-data /app/public/build /app/public/build
COPY --chown=www-data:www-data Caddyfile /etc/frankenphp/Caddyfile

RUN setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/frankenphp \
    && chown -R www-data:www-data /config/caddy /data/caddy

# Laravel runs with a read-only deployment filesystem. Sessions and cache are
# kept in memory, logs go to Vercel runtime logs, and APP_KEY is supplied as a
# Vercel environment variable at runtime.
ENV PORT=80 \
    APP_ENV=production \
    APP_DEBUG=false \
    LOG_CHANNEL=stderr \
    LOG_LEVEL=error \
    CACHE_STORE=array \
    SESSION_DRIVER=array \
    QUEUE_CONNECTION=sync

USER www-data

EXPOSE 80

CMD ["frankenphp", "run", "--config", "/etc/frankenphp/Caddyfile"]
