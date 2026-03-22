# Agent Instructions - Lumina Sedona Theme

## Authority Level
This repository is fully version-controlled.
Agents are granted **maximum autonomy**.

You may:
- Create, modify, overwrite, or delete files
- Install npm dependencies
- Modify build tooling (Vite, PostCSS, Tailwind)
- Refactor aggressively
- Introduce libraries if justified
- Regenerate compiled assets

Do NOT:
- Run NPM commands
- Create commits
- Push to remote
- Modify WordPress core

Git history is the safety net.

---

# Primary Goal
Produce production-grade WordPress theme code optimized for:

- Clarity
- Maintainability
- Performance
- Accessibility
- Long-term scalability
- Clean architecture

This is real client-facing code.

---

# Architecture Overview (Authoritative)

## Build Pipeline (Current)

Vite (JS) + Sass CLI (SCSS) + PostCSS (Tailwind + Autoprefixer) -> `dist`

### Dev

- `npm run dev` starts Vite from `src/` on port `5175`
- `npm run dev:tw` watches Tailwind: `src/tailwind.css` -> `src/public/tailwind.css`
- `npm run dev:all` runs both via `concurrently`

### Build

- `vite build` outputs JS to `dist/assets/main.js`
- `sass src/style.scss dist/assets/main.css --source-map --style=compressed`
- `postcss src/tailwind.css -o dist/tailwind.css`

### Source

/src
main.js
style.scss
tailwind.css
/styles
/public

### Output (Generated)

/dist
/assets
main.css
main.js
tailwind.css

- `dist` is build output.
- Never manually edit files inside `dist`.
- This directory should be git-ignored.

---

# WordPress Integration Rules

- `style.css` contains ONLY the WordPress theme header comment.
- All styling lives in `/src/styles` and `src/style.scss` (entry).
- WordPress must enqueue:
  - `dist/tailwind.css`
  - `dist/assets/main.css`
  - `dist/assets/main.js`
  - Prefer named callback functions for WordPress hooks and filters (avoid anonymous closures unless strictly required).

Dev mode:
- Toggle with `CUSTOM_WP_VITE_DEV` in `wp-config.php`.
- Vite serves `main.js` and `tailwind.css` from `http://localhost:5175`.

Never enqueue individual modules.

---

# Tailwind + SCSS Rules

- `@tailwind base;`
- `@tailwind components;`
- `@tailwind utilities;`

must appear at the top of `src/tailwind.css`.

## Layer Discipline

Use:
@layer base
@layer components
@layer utilities

Never rely on implicit cascade ordering.

Within the same layer, import order controls override priority.

---

# SCSS Structure Rules

- `abstracts/` -> variables, mixins, fonts
- `base/` -> body, typography, global elements
- `layout/` -> header, footer, structural sections
- `components/` -> reusable UI components
- `utilities/` -> helper classes only
- `pages/` -> page-specific styles

Never create global styles in `src/style.scss` unless truly one-off.

---

# JavaScript Rules (2026 Best Practice)

- Use ES modules
- Use `const` by default
- Prefer `let` only when reassignment is required
- No `var`
- No global variables
- IIFEs exist in `src/main.js` (legacy); avoid new ones unless required
- `DOMContentLoaded` wrappers are in `src/main.js` (legacy); avoid new ones unless required

All current behavior lives in:

`src/main.js`

If modules are introduced, prefer `src/scripts/modules` with `main.js` orchestrating imports.

Do not store vendor `.min.js` files in the repo.

---

# Formatting Standards (Mandatory)

## Indentation
- 2 spaces
- No tabs

## Quotes
JavaScript:
- Use single quotes `'` for strings
- Use double quotes `"` only inside HTML attributes or when required

SCSS:
- Use double quotes for font-family names
- Use single quotes for URLs unless double quotes are required

JSON:
- Double quotes only (spec requirement)

## Semicolons
- Required in JavaScript
- Required in SCSS

## Trailing Commas
- Allowed in multi-line JS objects and arrays
- Not required

---

# CSS Philosophy

- Prefer Tailwind utilities
- Use SCSS only for:
  - Design tokens
  - Complex reusable components
  - Vendor overrides
- Avoid `!important`
- Avoid redefining Tailwind utilities

---

# Accessibility Rules

- Respect `prefers-reduced-motion`
- Never remove focus styles
- Ensure interactive elements are keyboard accessible

---

# Performance Rules

- No unnecessary JS
- No DOM queries inside loops
- Debounce scroll/resize events
- Avoid layout thrashing
- Avoid inline style mutations unless required

---

# Git Rules

Agents must NOT:
- Commit
- Push
- Rebase
- Merge

All changes remain in working tree for human review.

---

# Risk Profile

This repository is safe to modify freely.

Optimize boldly.
Refactor aggressively.
Favor long-term architecture over short-term hacks.
