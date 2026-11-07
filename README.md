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
- **Projects** — a responsive project grid with an empty state, ready for future work.
- **GitHub repository links** — clickable links to the GitHub profile and the portfolio repository.

A bonus static **dashboard** page (`/dashboard`) gives a quick overview of the portfolio content and readiness.

## Tech stack

- **Laravel 12** (latest stable release compatible with the installed PHP 8.2 runtime)
- **Blade** templating
- **Tailwind CSS 3**
- **Vite 7**
- **Alpine.js** for the mobile navigation
- **SQLite not required** — sessions and cache use flat files

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
  portfolio/dashboard.blade.php Static dashboard page
routes/web.php                Two static routes: / and /dashboard
tests/Feature/PortfolioTest.php Feature coverage for both pages
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
    'title' => 'Project name',
    'description' => 'What the project does and what you learned.',
    'tags' => ['Laravel', 'Blade', 'Tailwind CSS'],
    'repo' => 'https://github.com/vincelabero/your-repository',
    'demo' => null,
    'year' => '2026',
],
```

The public project grid and the dashboard update automatically.

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
| Projects | Responsive project grid with a designed empty state |
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

## Author

**Marc Vincel A. Abero**
BSIT 4 — Data Center College of Bangued - Abra
[vincelabero491@gmail.com](mailto:vincelabero491@gmail.com)
[github.com/vincelabero](https://github.com/vincelabero)
