# SCSS Architecture

Volatyl's styles are organized into a deliberate hierarchy. Understanding the structure makes it straightforward to find things, extend the theme, and avoid common pitfalls like specificity conflicts.

---

## Table of Contents

- [Build Output](#build-output)
- [File Structure](#file-structure)
- [Import Order](#import-order)
- [Mixin Reference](#mixin-reference)
- [Extension Patterns](#extension-patterns)

---

## Build Output

Grunt compiles two separate stylesheets:

| File | Source | Scope |
|---|---|---|
| `style.css` | `assets/css/src/styles.scss` | Front end |
| `editor-style.css` | `assets/css/src/editor-style.scss` | Block editor only |

WordPress automatically scopes all selectors in `editor-style.css` to `.editor-styles-wrapper`, so front-end structural selectors (navigation, sidebars, etc.) don't bleed into the editor. The editor stylesheet imports only what it needs: normalize, configuration mixins, helper classes, editor-specific classes, and markup formatting.

Both stylesheets share `_configuration.scss`, which means the core mixins (`dark-bg-context`, `colored-bg-context`, button and form mixins) stay in sync automatically.

---

## File Structure

```
assets/css/src/
│
├── styles.scss                 Entry point — front end
├── editor-style.scss           Entry point — block editor
│
├── _normalize.scss             CSS reset / normalize
├── _markup-formatting.scss     Prose content: blockquotes, code, tables,
│                               embeds, media, WordPress generated classes
├── _structure.scss             Page wrapper, .inner container, layout modes
├── _header.scss                Site header, logo, tagline
├── _navigation.scss            Primary nav, dropdowns, mobile overlay
├── _search.scss                Header search toggle and full-screen search overlay
├── _widget-areas.scss          Sidebar and widget styling
├── _comments.scss              Comment threads and reply form
├── _forms.scss                 All form elements and button base styles
├── _footer.scss                Footer Lead, Fat Footer, Social Nav, Site Footer
├── _singulars.scss             Single post/page layout and featured images
│
├── systems/
│   ├── _configuration.scss     ★ Breakpoints, typography mixins, spacing mixins,
│   │                             context mixins (colored-bg-context, dark-bg-context,
│   │                             action-buttons, utility-buttons, form-inputs)
│   ├── _theme-colors.scss      Applies CSS variables to all front-end elements
│   ├── _editor-classes.scss    Generates has-*-color / has-*-background-color classes
│   ├── _helper-classes.scss    v-margin-*, v-padding-*, v-text-align-*, v-subdued-title
│   ├── _cards.scss             Post/page card component
│   ├── _content-header.scss    Page/archive/post header component
│   ├── _grid.scss              Blog and content grid system
│   └── _shared.scss            Shared patterns used across multiple components
│
└── templates/
    ├── _blog.scss              Blog index template
    ├── _front-page.scss        Front page template
    ├── _canvas-full-width.scss Canvas — Full Width template
    └── _group-block-spacing.scss  Group block vertical spacing system
```

---

## Import Order

The order in `styles.scss` is intentional:

1. **Normalize** — resets first, before anything else
2. **Systems/_configuration** — mixins only, no output; must come before anything that uses them
3. **Systems/_theme-colors** — applies the base color context across all elements
4. **Systems/_editor-classes** — generates palette utility classes
5. **Systems/_grid, _cards, _content-header, _shared** — reusable components
6. **Page-level partials** — markup formatting, structure, header, nav, etc.
7. **Templates** — template-specific overrides
8. **Systems/_helper-classes** — utility classes last, so they can override anything above

Helper classes come last deliberately — they are the override layer. If you want a margin or alignment class to win, it needs to come after everything else.

---

## Mixin Reference

All mixins live in `systems/_configuration.scss` and are available to both stylesheets.

---

### `colored-bg-context()`

Apply inside base-level palette background contexts (~55% OKLCH lightness).

**What it does:**
- Sets `color: var(--white)` on the container
- Sets `var(--white)` on: h1–h6, links, blockquote, address, cite, q, .v-subdued-title, figcaption, table captions, block labels
- Skips elements with `.has-text-color` (user's explicit color choice is preserved)

**What it does NOT do:** buttons, forms, tables

```scss
.my-colored-section {
    @include colored-bg-context();
}
```

---

### `dark-bg-context()`

Apply inside dark and darker palette background contexts.

**What it does:**
- Sets `color: var(--on-dark)` on the container
- Headings and links → `var(--white)`
- Subdued/secondary elements (h4, h6, blockquote, code, captions, etc.) → `var(--on-dark)`
- Calls `action-buttons( var(--white) )` — action buttons get a white border
- Calls `utility-buttons( var(--action), var(--action-dark) )` — utility buttons use action color
- Calls `form-inputs( var(--action), var(--accent-1) )` — input borders adapt
- Table borders → `var(--action-dark)`
- Skips elements with `.has-text-color`

```scss
.my-dark-section {
    @include dark-bg-context();
}

// With per-hue --on-dark override (used internally for accent contexts):
.my-accent-section {
    --on-dark: oklch(var(--on-dark-luminance) calc(var(--tint-chroma) * 0.5) var(--accent-1-hue));
    @include dark-bg-context();
}
```

---

### `action-buttons( $border: null )`

Styles the primary action button set. Called inside `dark-bg-context()` and at the top level of `_theme-colors.scss`.

**Targets:** `.button`, `.v-button`, `button`, `.wp-block-button__link`, `.wp-block-file__button`, `.comment-reply-link`, `.wp-calendar-table caption`, `#primary-menu .menu-item-button > a`

**Parameters:**
- `$border` *(optional)* — pass a color value to set an explicit border color. Used in dark context to set `var(--white)`.

```scss
@include action-buttons();                    // Default — no explicit border
@include action-buttons( var(--white) );      // Dark background variant
```

---

### `utility-buttons( $bg: var(--dark), $hover: var(--action) )`

Styles utility/functional buttons (search submit, input type buttons).

**Targets:** `[type="button"]`, `[type="submit"]`, `[type="reset"]`, `.wp-block-search button`, `#searchsubmit`

**Parameters:**
- `$bg` — fill color (default: `var(--dark)`)
- `$hover` — hover/focus/active fill color (default: `var(--action)`)

```scss
@include utility-buttons();                                  // Default
@include utility-buttons( var(--action), var(--action-dark) ); // Dark bg variant
```

---

### `form-inputs( $border: var(--dark), $focus-border: var(--action) )`

Sets border colors on all text inputs, textareas, and selects.

**Parameters:**
- `$border` — default border color
- `$focus-border` — border color on focus/active

```scss
@include form-inputs();                                          // Default
@include form-inputs( var(--action), var(--accent-1) );         // Dark bg variant
```

---

### Typography Mixins

```scss
@include headingFont;        // Cal Sans + system-ui fallback stack, weight 500
@include headingFontReduced; // Scaled-down heading sizes for constrained contexts
                             // (sidebars, fat footer, featured sections)
@include bodyFont;           // Red Hat Text + system-ui fallback stack
@include fontBase;           // font-size: 18px (base for all rem values)
@include lineHeightBase;     // line-height: 1.6
```

---

### Font Size Modifiers

```scss
@include fontTiny;      // .722rem
@include fontSmallest;  // .778rem
@include fontSmaller;   // .833rem
@include fontSmall;     // .889rem
@include fontBig;       // clamp(1rem, 1.35vw, 1.056rem)
@include fontBigger;    // clamp(1rem, 1.4vw, 1.111rem)
@include fontBiggest;   // clamp(1rem, 1.5vw, 1.222rem)
```

---

### Spacing Mixins

```scss
@include innerSpacing;       // The standard .inner container: max-width ~1200px,
                             // responsive padding, margin auto.
                             // Vertical padding is driven by --section-v-spacing.
@include innerSpacingLarge;  // v-large modifier — calc(--section-v-spacing * 1.4)
@include innerSpacingLarger; // v-xl modifier   — calc(--section-v-spacing * 2.3)
```

The vertical value is controlled by the `--section-v-spacing` CSS custom property, which is set by the **Section Spacing** Customizer control (Design section). Three body classes correspond to the three tiers:

| Tier | Body class | `--section-v-spacing` value |
|---|---|---|
| Compact | `spacing-compact` | `clamp(1.25rem, 3vw, 2.25rem)` |
| Default | *(none)* | `clamp(2rem, 4.5vw, 3.5rem)` |
| Spacious | `spacing-spacious` | `clamp(2.5rem, 7vw, 5rem)` |

Footer chrome (`.fat-footer`, `.footer-lead`) and the site header / site footer are not affected — they have their padding pinned independently.

---

### Editor Classes — `color-pair()` and `color-group()`

Used exclusively in `_editor-classes.scss` to generate the Gutenberg palette utility classes.

```scss
// Generates .has-{name}-color and .has-{name}-background-color
@mixin color-pair( $name, $on-color: null ) { ... }

// Generates all six variants: darker, dark, base, light, lighter, tint
@mixin color-group( $name ) { ... }
```

**Important:** do not generate `.has-text-color` — that class name is reserved by WordPress as a generic flag. See the Known Pitfalls section in [color-system.md](color-system.md).

---

## Extension Patterns

### Adding a New Background Context

If you introduce a new background class and want it to trigger automatic text adaptation, follow this pattern in `_theme-colors.scss` and `editor-style.scss`:

```scss
// For a mid-lightness colored background:
.my-custom-background {
    @include colored-bg-context();
}

// For a dark background:
.my-dark-custom-background {
    @include dark-bg-context();
}

// For a dark background with a specific hue for --on-dark:
.my-accent-dark-background {
    --on-dark: oklch(var(--on-dark-luminance) calc(var(--tint-chroma) * 0.5) var(--accent-1-hue));
    @include dark-bg-context();
}
```

### Using Color Variables in Custom CSS

All variables are available globally. Reference them directly:

```css
.my-component {
    background-color: var(--action-tint);
    border-color: var(--subdued-light);
    color: var(--text);
}

.my-component:hover {
    background-color: var(--action);
    color: var(--white);
}
```

Because the entire palette is CSS custom properties with no hardcoded values in the compiled CSS, any custom component using these variables automatically adapts to theme changes in the Customizer.

### Adding a Template Partial

Template-specific styles go in `templates/`. Import the new file at the end of the templates block in `styles.scss`, before `systems/_helper-classes`. Helper classes must remain last.

```scss
// In styles.scss
@import "templates/_my-template";

@import "systems/_helper-classes"; // Always last
```
