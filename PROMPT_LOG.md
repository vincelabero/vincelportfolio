# AI Prompt Log

**Student:** Marc Vincel A. Abero
**Course:** Bachelor of Science in Information Technology — 4th Year
**School:** Data Center College of Bangued - Abra
**Activity:** IPA BSIT 4 — Midterm Activity: Building and Hosting a Laravel Portfolio
**Development agent:** OpenCode with Big Pickle

This file records every prompt and clarification used to build the portfolio, in the order they were used. Each entry includes the prompt and a short report of what the agent produced.

---

## 1. Initial Laravel and Authentication Setup

### Task: Install Laravel and authentication scaffolding

* **Prompt used:** `make laravel auth here in this folder`
* **Result/Output:** The agent installed Laravel 12 (the newest stable release compatible with the available PHP 8.2 runtime), installed Laravel Breeze with the Blade + Tailwind stack, configured SQLite, generated the application key, ran migrations, built the front-end assets, and verified that all 25 authentication tests passed.

> **Note:** This authentication layer was later removed. The midterm activity explicitly requires **no database, migrations, or models**, so the project was converted into a static Blade portfolio.

---

## 2. Reading and Analyzing the Activity PDF

### Task: Read the midterm instructions and plan the implementation

* **Prompt used:** `c:\Users\vince\Downloads\IPA-MIDTERM-act-1-3.pdf read and analyze this pdf well then do it inside this folder`
* **Result/Output:** The agent extracted and analyzed the PDF. The activity requires:
  * a Laravel portfolio built with Blade,
  * no database, migrations, or models,
  * sections for basic information, educational background, projects, and GitHub links,
  * a public GitHub repository,
  * descriptive commit messages,
  * a `PROMPT_LOG.md` file,
  * and a Word file containing the AI prompt documentation and agent report.

The agent then asked three clarifying questions before writing code.

---

## 3. Requirement Clarification

### Task: Confirm scope and collect real portfolio content

* **Prompt used:** User responses to the clarification questions:

  * Existing authentication: `Remove auth + DB usage (Recommended)`
  * Portfolio content: provided full name, course and year, school, email, contact number, education history, project preference, and GitHub account.
  * Git workflow: `Don't touch Git`

* **Result/Output:** The agent recorded the following content:

  * **Name:** Marc Vincel A. Abero
  * **Course/Year:** Bachelor of Science in Information Technology — 4th Year
  * **School:** Data Center College of Bangued - Abra
  * **Email:** vincelabero491@gmail.com
  * **Contact:** 09959818303
  * **Elementary:** Divine Word College of Bangued — 2016
  * **Secondary:** Divine Word College of Bangued — 2020
  * **College:** Data Center College of Bangued — Up to Present
  * **Projects:** Keep the project list empty for now and provide a dashboard.
  * **GitHub:** `vincelabero` — `https://github.com/vincelabero/vincelportfolio`

The agent did not run any Git commands, in accordance with the user's instruction.

---

## 4. Removing Authentication and Database Usage

### Task: Convert the project to a database-free static portfolio

* **Prompt used:** Clarification response: `Remove auth + DB usage (Recommended)` — based on the PDF requirement: *"Database: None. Do not use migrations or models."*
* **Result/Output:** The agent:
  * removed the `laravel/breeze` package,
  * deleted the authentication controllers, requests, routes, views, and tests,
  * deleted the `User` model, migrations, factories, seeders, and SQLite database,
  * removed database session, cache, and queue settings,
  * switched sessions and cache to flat files and the queue to `sync`,
  * removed database steps from the Composer setup scripts,
  * and confirmed that the remaining pages do not depend on a database.

---

## 5. Centralizing Portfolio Content

### Task: Create a single source of truth for all portfolio data

* **Prompt used:** PDF requirement: *"Your web application must include the following distinct sections..."*
* **Result/Output:** The agent created `config/portfolio.php` containing the student's basic information, GitHub links, education history, project array, dashboard statistics, and readiness values. The array includes a documented example for adding future projects.

---

## 6. Main Layout, Navigation, and Footer

### Task: Build the responsive Blade layout and shared components

* **Prompt used:** PDF requirement: *"Views: Use Laravel Blade templating (.blade.php)."*
* **Result/Output:** The agent created:
  * `resources/views/layouts/portfolio.blade.php` — main layout with metadata, fonts, Vite assets, skip link, and content slots.
  * `resources/views/components/portfolio/nav.blade.php` — sticky navigation with desktop and mobile menus powered by Alpine.js.
  * `resources/views/components/portfolio/footer.blade.php` — site footer with GitHub, email, and dashboard links.
  * `resources/views/components/portfolio/icon.blade.php` — reusable inline SVG icon component.
  * `resources/views/components/portfolio/section-heading.blade.php` — reusable section heading.
  * `resources/views/components/portfolio/project-card.blade.php` — reusable project card.

---

## 7. Basic Information Section

### Task: Build the hero section with name, photo, contact details, and bio

* **Prompt used:** PDF requirement: *"Basic Information: Name, profile picture, contact details, and a short bio."*
* **Result/Output:** The agent built a hero section with:
  * the student's name and 4th-year BSIT status,
  * a short bio,
  * a profile image placeholder at `public/images/profile.svg`,
  * clickable email, phone, location, and course cards,
  * calls to action for projects and GitHub,
  * and a statistics strip for year level, education records, projects, and GitHub.

---

## 8. Educational Background Section

### Task: Build the education history section

* **Prompt used:** PDF requirement: *"Educational Background: Schools attended, years, and degrees or certifications."*
* **Result/Output:** The agent built a responsive three-card education section showing:
  * Elementary — Divine Word College of Bangued — 2016 — Completed,
  * Secondary — Divine Word College of Bangued — 2020 — Completed,
  * College — Data Center College of Bangued - Abra — Up to Present — In progress.

Each card includes an icon, level badge, school name, year, description, and completion status.

---

## 9. Projects Section

### Task: Build the project grid and prepare it for future work

* **Prompt used:** PDF requirement: *"Projects: A grid or list of your work, including descriptions."* and the clarification response: *"Project - stay empty i will send later but put a dashboard."*
* **Result/Output:** The agent built:
  * a responsive project grid component that supports a title, description, tags, repository link, live demo link, and year,
  * a designed empty state for the current project list,
  * and instructions in the configuration file and README explaining how to add projects later.

---

## 10. Static Dashboard

### Task: Create a dashboard overview

* **Prompt used:** Clarification response: *"Project - stay empty i will send later but put a dashboard."*
* **Result/Output:** The agent created a static `/dashboard` page with:
  * portfolio statistics,
  * an empty project panel with a next-step note,
  * a profile snapshot,
  * quick links to the portfolio, GitHub profile, and repository,
  * an education overview,
  * a portfolio readiness score and progress bars,
  * and a "How this page works" section explaining the static, database-free design.

No login is required because authentication and database usage were removed.

---

## 11. GitHub Links and Contact Section

### Task: Add clickable GitHub repository links and a contact call to action

* **Prompt used:** PDF requirement: *"GitHub Repository Links: Clickable icons or links directing to your source code."*
* **Result/Output:** The agent added:
  * a GitHub profile link,
  * a portfolio repository link,
  * GitHub icons in the navigation, hero, projects empty state, footer, dashboard, and contact section,
  * and a contact section with email, phone, and GitHub buttons.

All external links use `target="_blank"` and `rel="noopener noreferrer"`.

---

## 12. Testing and Verification

### Task: Verify both pages and the removal of authentication

* **Prompt used:** Agent follow-through after the PDF instruction: *"Create a static online portfolio using Laravel..."*
* **Result/Output:** The agent:
  * added `tests/Feature/PortfolioTest.php`,
  * verified that `/` and `/dashboard` return HTTP 200 and contain the expected content,
  * verified that `/login` is no longer registered,
  * ran `php artisan test`,
  * ran `npm run build`,
  * and confirmed that no database is required.

---

## 13. README Documentation

### Task: Create the project README

* **Prompt used:** PDF requirement: *"Readme: Include a basic README.md file describing your project (including project description). Use the agent to generate the description."*
* **Result/Output:** The agent created `README.md` with:
  * the project description,
  * a list of required sections,
  * the technology stack,
  * setup and run instructions,
  * the project structure,
  * instructions for editing content, changing the profile picture, and adding projects,
  * an activity compliance table,
  * and standard Git workflow instructions (documented but not executed).

---

## 14. Prompt Log and Word Report

### Task: Document all prompts and generate the Word report

* **Prompt used:** PDF requirement: *"All prompts should be included in the documentation in the arrangement on how they were used, start to finish together with the report of the agent (put them all in a WORD file)."*
* **Result/Output:** The agent created this `PROMPT_LOG.md` file and generated `IPA_MIDTERM_REPORT.docx`, which contains the project overview, prompt log, agent report, and a placeholder section for the Git commit history.

---

## 15. Fixing Invisible Portfolio Sections

### Task: Fix missing content in the About, Education, and Projects sections

* **Prompt used:** `there's no contents in about, education, projects`
* **Result/Output:** The agent diagnosed the issue: the reveal animation CSS set `[data-reveal]` elements to `opacity: 0`, but Tailwind removed the `.is-visible` rule during the production build because that class only appeared in JavaScript. As a result, the content stayed invisible. The agent:
  * moved the reveal styles outside Tailwind's `@layer utilities` so they are never purged,
  * added a `.js` class on the document root so content remains visible when JavaScript is unavailable,
  * added a timed fallback that reveals all sections if the Vite bundle fails to run,
  * rebuilt the production assets with `npm run build`,
  * and verified in a headless browser that all 18 reveal elements on the home page and all 12 on the dashboard become visible.

`php artisan test` still passes with 5 tests and 14 assertions.

---

## 16. Certifications and Seminars Section

### Task: Add a certifications and seminars dashboard before the Projects section

* **Prompt used:** `put certifications & seminar dashboard before projects with these pictures and their titles and their date c:\Users\vince\Downloads\64d61f49-8a58-4f3b-9ce6-b7b094ba155a.jpg c:\Users\vince\Downloads\013ee149-365b-4818-962e-9295e5c53c14.jpg c:\Users\vince\Downloads\287b554c-df46-41fc-977a-e9442dc6c71d.jpg`
* **Result/Output:** The agent read the three certificate screenshots with Windows OCR, cropped each screenshot to the certificate area, and saved the images under `public/images/certifications/`. It then added a **Certifications & Seminars** section to the public portfolio and a matching panel to the dashboard, both placed before the Projects section. The section shows the certificate image, title, issuer, type, date, format, and a short description.

The recorded credentials are:

* **Understanding Startups: Getting Your Idea Ready for the Philippine Startup Challenge XI** — DICT — Workshop — September 7, 2026 — via Zoom.
* **Startup Now Cordillera: Exploring Programs, Funding, and Opportunities for Aspiring Startups** — DOST Cordillera Administrative Region — Forum — September 2, 2026 — via Zoom.
* **Online Safety Through Netiquette** — DICT Region II — Webinar — July 23, 2026 — via Google Meet.

Other changes:

* Added the `certifications` array to `config/portfolio.php`.
* Created the reusable `certification-card.blade.php` component and a `badge-check` icon.
* Added a **Certifications** link to the desktop and mobile navigation, and moved the navigation breakpoint from `md` to `lg` so the extra link fits.
* Updated the dashboard statistics (Certifications = 3) and the readiness checklist.
* Updated `README.md` and the feature tests.
* Rebuilt the assets with `npm run build` and verified that all three certificate images return HTTP 200.

`php artisan test` passes with 5 tests and 22 assertions. A headless browser check confirms that all 23 reveal elements on the home page become visible, and that the Certifications section appears before Projects on both `/` and `/dashboard`.

---

## 17. Skills and Tools Section

### Task: Add a skills section before Certifications

* **Prompt used:** `put skills before certifications, decides whatever you put there`
* **Result/Output:** The agent chose the skill content and added a **Skills & Tools** section between Education and Certifications on the public portfolio. The section groups twelve skills into three cards, each with an icon, description, and proficiency bar:

  * **Web Development** — HTML5 & CSS3 (90%), Tailwind CSS (88%), JavaScript (78%), Laravel Blade (84%).
  * **Backend & Databases** — PHP (82%), Laravel (80%), MySQL (76%), Java (70%).
  * **Tools & Workflow** — Git & GitHub (82%), VS Code (90%), Figma (72%), UI/UX fundamentals (75%).

  The agent also added:
  * a compact Skills & Tools panel above the Certifications panel on `/dashboard`,
  * a **Skills** link to the desktop and mobile navigation,
  * `server` and `wrench` icons for the new skill groups,
  * a **Skills & tools** entry in the readiness checklist,
  * updated tests, README documentation, and this prompt log,
  * and a small navigation adjustment so the extra link fits at the `lg` breakpoint.

`php artisan test` passes with 5 tests and 28 assertions. A headless browser check confirms that all 28 reveal elements on the home page become visible, and that Skills appears before Certifications and Projects.

---

# Final Agent Report

## Summary

The project was converted from a Laravel Breeze authentication demo into a static Laravel Blade portfolio that follows the midterm activity constraints.

The final application:

* uses Laravel 12 with Blade and Tailwind CSS,
* has no database connection, migrations, or models,
* renders all content from `config/portfolio.php`,
* includes basic information, educational background, skills and tools, certifications and seminars, projects, and GitHub links,
* includes a bonus static dashboard,
* is responsive and accessible,
* and is covered by feature tests.

## Verification

* `php artisan test` — all tests pass.
* `npm run build` — production assets build successfully.
* `/` — returns HTTP 200 and displays the portfolio.
* `/dashboard` — returns HTTP 200 and displays the dashboard.
* `/login` — returns HTTP 404 because authentication was intentionally removed.

## Git note

The user instructed the agent not to perform Git operations. No `git init`, commit, remote, or push commands were run. The recommended commit workflow and descriptive commit message examples are documented in `README.md` and in `IPA_MIDTERM_REPORT.docx`.

## Submission files

* `PROMPT_LOG.md` — this file.
* `IPA_MIDTERM_REPORT.docx` — Word version of the prompt log and agent report.
* `README.md` — project description and setup guide.
* Public repository: <https://github.com/vincelabero/vincelportfolio>
