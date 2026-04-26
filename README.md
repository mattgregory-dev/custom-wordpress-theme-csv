# Custom WordPress Theme

A custom, performance-first WordPress theme supporting WooCommerce and LearnDash. Built to be clean, accessible, and easy to maintain.

## Overview
- Custom WordPress theme with purpose-built page templates and content flows.
- Deep WooCommerce and LearnDash integration with selective asset loading.
- Site-wide A/B testing system for offers and conversion experiments.
- Fast-loading UI with a minimal JavaScript footprint.
- Responsive navigation and interactive elements.

## Key Features

**WooCommerce and LearnDash integration.** Both plugins are supported as core features of the site. Their assets are selectively dequeued on pages that don't need them, keeping front-end resource counts low across the rest of the theme.

**Custom A/B testing system.** A lightweight site-wide system for testing offers, built on top of the Forminator form plugin. Variants are served 50/50 across surfaces (popup, footer banner, blog sidebar) and results are tracked per variant. Once a winner is selected, the experiment ends or is replaced with a new one.

Trade-off worth documenting: each rendered Forminator instance triggers an `admin-ajax` request. With multiple forms and multiple variants in play, this affects synthetic performance metrics (PageSpeed Insights, GTmetrix, etc.) but does not impact time-to-interactive or perceived user experience — the AJAX call resolves last and after the page is usable. If this becomes important at scale, mitigation paths include rendering variants server-side in PHP or lazy-loading the form instances. Not currently worth the engineering effort given site size and traffic.

**Custom WooCommerce account dashboard.** The default WooCommerce dashboard is replaced with a LearnDash course overview, surfacing course progress and enrollment information when a user logs in. Since courses are the central product on this site, this makes the account area immediately useful instead of a dead landing.

**Custom courses listing page.** Loop-based courses page designed to support future filtering as the catalog grows (duration, lesson count, topic, etc.).

**LearnDash template overrides.** Minor overrides for breadcrumbs, the course accordion, and quiz partials. The default LearnDash archive pages are not used; the custom courses page replaces them.

## Approach

This theme is built without a page builder (Elementor, Divi, etc.). That is a deliberate choice with trade-offs.

Building directly in PHP, Sass, and Tailwind gives full control over the markup and the asset pipeline. Designs can be more elaborate, layouts can be tuned per page, and the resource footprint stays small because nothing is loaded that isn't used. Custom page templates are used as one-offs — applied directly to specific pages — rather than as reusable templates in the traditional WordPress sense. This is the most direct way to apply bespoke design on a per-page basis. Gutenberg is reserved for basic content pages where editor flexibility matters more than design fidelity.

The trade-off: this approach assumes a developer maintains the site and can run the build environment. It suits projects with custom design requirements and the budget to support them. A page-builder approach is a better fit for projects optimized for non-developer editing or tighter budgets.

## Performance

The theme performs in the top percentiles across standard web performance metrics. The main contributors:

- Selective dequeuing of WooCommerce and LearnDash assets on pages that don't need them.
- Minimal front-end JavaScript footprint.
- Optimized build pipeline with Vite, PostCSS, and Tailwind's purge step.
- Static, hand-authored markup rather than page-builder output.

## Tech Stack
- WordPress (custom theme)
- Vite, Sass, Tailwind, PostCSS
- WooCommerce, LearnDash, Forminator

## Project Structure
```
.
├── src/                          # Source files (edit here)
├── dist/                         # Compiled output (do not edit)
│   ├── assets/
│   ├── tailwind.css
│   └── webfonts/
├── learndash/                    # LearnDash template overrides
│   └── ld30/
├── learndash-course-reviews/     # LearnDash review form override
├── woocommerce/                  # WooCommerce template overrides
│   ├── emails/
│   └── myaccount/
├── single-sfwd-*.php             # LearnDash single-template overrides
├── page-*.php                    # Custom page templates (one-offs)
├── functions.php
├── vite.config.js
└── tailwind.config.cjs
```

## Local Development
1. `npm install`
2. `npm run dev:all`
3. Set `CUSTOM_WP_VITE_DEV` to true in `wp-config.php` to load the dev server.

```
define('CUSTOM_WP_VITE_DEV', true);
```

## Production Build
1. `npm run build`
2. WordPress enqueues:
   - `dist/tailwind.css`
   - `dist/assets/main.css`
   - `dist/assets/main.js`

## Repository Conventions
- Sensitive values are stored as PHP constants and are not committed to the repository.
- An `AGENTS.md` file is included for AI-assisted development workflows (Codex, Claude Code, and similar tools).

## Support
For changes to layout, design, or behavior, work from `src/` and rebuild. For content edits, use the WordPress admin editor and menus.