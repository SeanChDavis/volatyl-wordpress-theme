# Volatyl WordPress Theme — Claude Instructions

## Project Context
- Classic WordPress theme in active local development (not production)
- The only site running Volatyl is the developer's local WordPress install
- Refactors are welcome — don't hesitate to suggest or make sweeping changes

## Build Tool
- **Grunt** is the build tool (`gruntfile.js` + `package.json`)
- There is no `default` Grunt task — always run tasks explicitly
- After modifying SCSS: `grunt sass`
- After modifying JS: `grunt concat && grunt uglify`
- Both: `grunt sass && grunt concat && grunt uglify`
- SCSS source lives in `assets/css/src/`
- Compiled output: `style.css` and `editor-style.css` (both in theme root)
- `*.css.map` files are gitignored — never worry about or commit them

## Git Workflow
- All work goes directly to `main` — this is what WordPress serves locally
- Commit after each completed task
- The `.claude/` folder is gitignored — never commit it

## Code Style
- Prefer elegant, minimal solutions — avoid adding complexity
- Discuss architectural decisions before implementing them
- SCSS uses tabs for indentation
- CSS borders throughout the theme are `2px` — be consistent

## File Structure Highlights
- `includes/color-schemes.php` — OKLCH color variable output (PHP → inline CSS)
- `includes/customizer/` — Customizer settings, controls, selective refresh
- `assets/css/src/systems/` — color system, typography, helper classes
- `assets/js/src/` — source JS (navigation, customizer preview)
- `template-parts/` — reusable template fragments
- `memory/MEMORY.md` — architecture decisions and color system reference

## Output Escaping (WordPress)
- Always escape output: `esc_html()`, `esc_attr()`, `esc_url()`, `wp_kses_post()`
- URL sanitization in Customizer settings: `esc_url_raw`
- Use `wp_date()` instead of `date()`

## What to Avoid
- Do not use `wp_reset_query()` after `wp_get_recent_posts()` — it's wrong; use `wp_reset_postdata()` or nothing
- Do not use CSS nesting (native) — browser compatibility concern; use standard SCSS nesting instead
- Do not add jQuery as a dependency unless absolutely necessary
- Do not use `add_action` where `add_filter` is semantically correct (e.g. `found_posts`)
