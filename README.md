# Marc Vincel A. Abero — Portfolio

A static online portfolio built with **Laravel, Blade, and Tailwind CSS** for the **IPA BSIT 4 Midterm Activity**.

The site presents my basic information, educational background, skills and tools, certifications and seminars, project space, and GitHub links. It intentionally uses **no database, migrations, or Eloquent models** — all content lives in a single configuration file and is rendered with Blade.

## Project description

This project is a personal portfolio for **Marc Vincel A. Abero**, a fourth-year Bachelor of Science in Information Technology student at **Data Center College of Bangued - Abra**. The design uses a dark, modern interface with a responsive layout, reusable Blade components, subtle reveal animations, and a static dashboard that summarizes the portfolio content.

The project was developed with **OpenCode using the Big Pickle agent**, and every prompt used during development is documented in [`PROMPT_LOG.md`](PROMPT_LOG.md).

## Required sections

- **Basic information** — name, profile picture, contact details, and a short bio.
- **Educational background** — elementary, secondary, and college history with years and status.
- **Skills & Tools** — grouped technical skills with proficiency bars, shown before certifications.
- **Certifications & Seminars** — certificate cards with images, titles, issuers, and dates.
- **Projects** — a responsive project grid with a published system and screenshot gallery, ready for more work.
- **GitHub repository links** — clickable links to the GitHub profile and the portfolio repository.

A bonus static **dashboard** page (`/dashboard`) gives a quick overview of the portfolio content and readiness.

## Tech stack

- **Laravel 12** (latest stable release compatible with the installed PHP 8.2 runtime)
- **Blade** templating
- **Tailwind CSS 3**
- **Vite 7**
- **Alpine.js** for the mobile navigation
- **SQLite not required** — sessions and cache use flat files locally, and in-memory drivers on Vercel
- **Vercel container runtime (FrankenPHP)** for production

## Getting started

### Requirements

- PHP 8.2 or newer
- Composer
- Node.js 20 or newer
- npm

### Installation

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
```

### Run the application

```bash
php artisan serve
```

Open <http://localhost:8000>.

For front-end development with hot reload:

```bash
npm run dev
```

## Project structure

```text
app/                          Minimal Laravel application layer
config/portfolio.php          All portfolio content (single source of truth)
public/images/profile.svg     Editable profile placeholder
public/images/certifications/ Seminar and webinar certificate images
public/favicon.svg            Site icon
resources/css/app.css         Tailwind layers and custom design tokens
resources/js/app.js           Alpine.js and reveal animations
resources/views/
  layouts/portfolio.blade.php Main Blade layout
  components/portfolio/       Navbar, footer, icons, cards, section heading
  portfolio/home.blade.php    Public portfolio page
  portfolio/project.blade.php Project detail page with screenshot lightbox
  portfolio/dashboard.blade.php Static dashboard page
routes/web.php                Static pages: /, /dashboard, /projects/{slug}, /health
Dockerfile                    Vercel container image (FrankenPHP + Vite build)
Caddyfile                     Web server config for the container
vercel.json                   Vercel container service + rewrites
tests/Feature/PortfolioTest.php Feature coverage for all pages
PROMPT_LOG.md                 AI prompt documentation
```

## Editing the portfolio

### Content

Open `config/portfolio.php` to update:

- name, role, headline, and bio
- email, phone, and location
- GitHub username and repository links
- education history
- skills and tools (grouped skills with proficiency levels)
- certifications and seminars (title, issuer, date, image)
- dashboard statistics and readiness values

### Profile picture

Replace `public/images/profile.svg` with a photo, then update the `photo` value in `config/portfolio.php` if the filename changes. The current SVG is a styled placeholder using my initials.

### Adding projects

Add an entry to the `projects` array in `config/portfolio.php`:

```php
[
    'slug' => 'project-slug',
    'title' => 'Project name',
    'description' => 'What the project does and what you learned.',
    'tags' => ['Laravel', 'Blade', 'Tailwind CSS'],
    'repo' => 'https://github.com/vincelabero/your-repository',
    'demo' => null,
    'year' => '2026',
    'cover' => 'images/projects/project-slug/cover.png',
    'images' => [
        ['src' => 'images/projects/project-slug/cover.png', 'caption' => 'Project screen'],
    ],
],
```

The public project grid, the `/projects/{slug}` detail page, and the dashboard update automatically.

## Activity compliance

| Requirement | Implementation |
| --- | --- |
| Latest stable Laravel | Laravel 12 (newest release compatible with PHP 8.2) |
| No database | No database connection, migrations, or models |
| Blade views | Layout, components, and page templates under `resources/views` |
| Basic information | Hero section with name, photo, bio, email, phone, and location |
| Educational background | Three-card education section |
| Skills & tools | Three grouped skill cards with proficiency bars |
| Certifications & seminars | Three certificate cards with images, dates, and issuers |
| Projects | Responsive project grid with a published project and screenshot gallery |
| GitHub links | Profile and repository links throughout the site |
| Public repository | <https://github.com/vincelabero/vincelportfolio> |
| Prompt documentation | [`PROMPT_LOG.md`](PROMPT_LOG.md) and `IPA_MIDTERM_REPORT.docx` |

## Version control

If the repository has not been connected yet, the standard workflow is:

```bash
git init
git add .
git commit -m "Initial commit: Set up Laravel Blade layout and basic info page"
git remote add origin https://github.com/vincelabero/vincelportfolio.git
git push -u origin main
```

Use descriptive commit messages for each section or feature, such as:

- `Add educational background section to resume blade`
- `Style project cards and add GitHub repository links`
- `Build static portfolio dashboard with readiness summary`

## Deploying to Vercel (GitHub)

This repository is configured for **Vercel's container runtime** using FrankenPHP. The deployment files are already committed:

- `Dockerfile` — installs Composer dependencies, builds the Vite/Tailwind assets with Node, and runs Laravel on FrankenPHP
- `Caddyfile` — serves `public/` and routes PHP requests to `public/index.php`
- `vercel.json` — declares the container service and sends all traffic to it
- `.dockerignore` / `.vercelignore` — keep local dependencies and secrets out of the build

### 1. Import the repository

1. Open <https://vercel.com/new>.
2. Import **`vincelabero/vincelportfolio`**.
3. Leave the root directory and build settings at their defaults — Vercel reads `vercel.json` and builds the Docker image automatically.

### 2. Add the required environment variable

In **Project → Settings → Environment Variables**, add:

| Name | Value |
| --- | --- |
| `APP_KEY` | the output of `php artisan key:generate --show` |
| `APP_URL` | your production URL, e.g. `https://vincelportfolio.vercel.app` |

`APP_KEY` is required; without it Laravel cannot encrypt cookies and every page returns a 500 error. `APP_ENV`, `APP_DEBUG`, `LOG_CHANNEL`, `CACHE_STORE`, `SESSION_DRIVER`, and `QUEUE_CONNECTION` are already set safely in the `Dockerfile`.

### 3. Deploy

Click **Deploy**. After the first deployment, update `APP_URL` with the real Vercel domain (or custom domain) and redeploy.

Verify the deployment with:

- `/` — portfolio home
- `/health` — JSON health check
- `/up` — Laravel's built-in health endpoint

### Local container test (optional)

```bash
docker build -t vincelportfolio .
docker run --rm -p 8080:80 -e APP_KEY="base64:..." vincelportfolio
```

Then open <http://localhost:8080>.

> Vercel's container runtime is in beta (available on all plans as of November 2026). The filesystem is read-only and ephemeral, which is why sessions and cache use in-memory drivers; the portfolio has no database or file uploads, so no external storage is needed.

## Author

**Marc Vincel A. Abero**
BSIT 4 — Data Center College of Bangued - Abra
[vincelabero491@gmail.com](mailto:vincelabero491@gmail.com)
[github.com/vincelabero](https://github.com/vincelabero)
