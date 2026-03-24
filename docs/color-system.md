# Color System

Volatyl's color system is built entirely on the [OKLCH color space](https://developer.mozilla.org/en-US/docs/Web/CSS/color_value/oklch). A single primary hue drives the entire palette, and two independent chroma controls shape how vividly that hue expresses itself in different contexts.

---

## Table of Contents

- [Why OKLCH](#why-oklch)
- [The Two Chroma Controls](#the-two-chroma-controls)
- [Palette Structure](#palette-structure)
- [Color Scheme Types](#color-scheme-types)
- [CSS Variable Reference](#css-variable-reference)
- [Background Context System](#background-context-system)
- [The `--v-on-dark` System](#the---v-on-dark-system)
- [PHP, SCSS, and JS Pipeline](#php-scss-and-js-pipeline)
- [Known Pitfalls](#known-pitfalls)

---

## Why OKLCH

OKLCH provides perceptual uniformity — two colors at the same lightness value look equally light to the human eye, regardless of their hue. This makes it possible to generate a harmonious multi-color palette mathematically without manually correcting for hue-specific brightness differences (the problem with HSL, where a yellow at 50% looks far brighter than a blue at 50%).

The three OKLCH channels map cleanly to theme concepts:
- **L (lightness)** — controls whether something reads as a background, a text color, a surface, or a highlight
- **C (chroma)** — controlled by the user via the Customizer sliders
- **H (hue)** — set by the user's Primary Hue choice, with derived offsets for multi-hue schemes

---

## The Two Chroma Controls

The palette uses two completely separate chroma ranges, each serving a different purpose.

### Palette Chroma (`--v-palette-chroma`)

**Customizer control:** Palette Vibrancy (0–100)
**Formula:** `palette_vibrancy × 0.0025` → range: `0–0.25`
**Drives:** buttons, links, headings, and all base/light/dark/tint palette slots

This is the "how colorful is my brand" control. At 0 the entire palette is essentially grayscale. At 100 the palette is fully vivid.

### Tint Chroma (`--v-tint-chroma`)

**Customizer control:** Background Tint (0–100)
**Formula:** `background_tint × 0.001` → range: `0–0.10`
**Drives:** dark backgrounds (`--v-dark`, `--v-darker`), body text (`--v-text`), subdued colors, and `--v-on-dark`

This controls how much the primary hue tints the neutral elements of the site. It is intentionally capped at a much lower range than palette chroma — dark section backgrounds need to stay dark and readable even at high values. At 0, backgrounds and text are purely neutral. At 100, they carry a noticeable but still restrained tint of the primary hue.

### Why Separate Controls

The separation solves a common problem: if a single saturation slider controlled everything, turning it up to make buttons vivid would also turn dark backgrounds garish, and turning it down to keep backgrounds neutral would drain all the life from the brand colors. The split lets you max out Palette Vibrancy for a strong brand presence while keeping Background Tint low for clean, readable dark sections.

---

## Palette Structure

Each color family has six variants, covering the full range from deepest dark to near-white:

| Variant | Lightness | Typical Use |
|---|---|---|
| `-darker` | ~18% | Deepest surfaces, rarely used directly |
| `-dark` | ~30% | Dark sections, nav backgrounds, hover states |
| base | ~55% | Buttons, links, primary interactive elements |
| `-light` | ~80% | Decorative accents, illustrations |
| `-lighter` | ~93% | Soft highlights, very light surfaces |
| `-tint` | ~97.5% | Barely-there washes, alternate row backgrounds |

Each variant uses the same hue and chroma formula — only lightness changes. This ensures the entire range shifts cohesively when the hue or vibrancy slider moves.

### Color Families

| Family | Slug | Role |
|---|---|---|
| Action | `action` | Primary brand color — buttons, links, interactive elements. Always the primary hue. |
| Accent 1 | `accent-1` | Secondary color. Matches action in monochromatic; derives from scheme in multi-hue. |
| Accent 2 | `accent-2` | Tertiary color. Same scheme derivation as accent-1. |
| Accent 3 | `accent-3` | Quaternary color. Only meaningfully distinct in the tetradic scheme. |

### Neutral Variables

| Variable | Lightness | Chroma | Notes |
|---|---|---|---|
| `--v-dark` | 15% | `--v-tint-chroma` | Primary dark surface background |
| `--v-darker` | 12% | `--v-tint-chroma` | Deeper dark surface |
| `--v-text` | 20% | `--v-tint-chroma` | Body text |
| `--v-subdued-dark` | 44% | `--v-tint-chroma × 0.4` | Muted text, secondary headings |
| `--v-subdued-light` | 91% | `--v-tint-chroma × 0.15` | Borders, dividers |

Subdued colors use a fraction of `--v-tint-chroma` rather than the full value — they should remain restrained even when Background Tint is high.

---

## Color Scheme Types

The active scheme is stored as the `volatyl_color_scheme_type` theme mod. PHP outputs only the active scheme's variable overrides as a single `:root {}` block — there is no CSS for inactive schemes.

In every scheme, **action always equals the primary hue**. The scheme only affects accent families.

| Scheme | Accent-1 Hue | Accent-2 Hue |
|---|---|---|
| Monochromatic | `--v-primary-hue` | `--v-primary-hue` |
| Complementary | `primary − 180` | `primary − 180` |
| Analogous | `primary − 30` | `primary + 30` |
| Triadic | `primary − 120` | `primary + 120` |
| Split-Complementary | `primary − 150` | `primary + 150` |
| Tetradic | `primary + 90` | `primary + 180` |

In the tetradic scheme, accent-3 uses `primary − 90` (the fourth point of the square).

### Hue Reference Variables

The computed hue offsets are stored as CSS variables on `:root` so they can be referenced anywhere without repeating the math:

```css
--v-complementary-accent-hue
--v-analogous-accent-hue-1 / --v-analogous-accent-hue-2
--v-triadic-accent-hue-1 / --v-triadic-accent-hue-2
--v-split-complementary-accent-hue-1 / --v-split-complementary-accent-hue-2
--v-tetradic-accent-hue-1 / --v-tetradic-accent-hue-2 / --v-tetradic-accent-hue-3
```

Additionally, `--v-accent-1-hue`, `--v-accent-2-hue`, and `--v-accent-3-hue` abstract over the scheme — they always resolve to the hue the respective family is currently using, regardless of which scheme is active. These are used by the [per-hue `--v-on-dark` system](#the---v-on-dark-system).

---

## CSS Variable Reference

### Color Families (×4: action, accent-1, accent-2, accent-3)

```css
--v-action-darker      /* ~18% lightness */
--v-action-dark        /* ~30% lightness */
--v-action             /* ~55% lightness */
--v-action-light       /* ~80% lightness */
--v-action-lighter     /* ~93% lightness */
--v-action-tint        /* ~97.5% lightness */
```

### Neutral Backgrounds and Text

```css
--v-dark               /* Primary dark surface, ~15% */
--v-darker             /* Deeper dark surface, ~12% */
--v-text               /* Body text, ~20% */
--v-subdued-dark       /* Muted text / secondary headings, ~44% */
--v-subdued-light      /* Borders and dividers, ~91% */
```

### Utility

```css
--v-on-dark            /* Near-white text for dark backgrounds */
--v-on-dark-luminance  /* 100% — controls the lightness of --v-on-dark */
--v-white              /* #fff */
--v-translucent-light  /* rgba(255,255,255,.05) — subtle light overlay */
--v-translucent-dark   /* rgba(0,0,0,.05) — subtle dark overlay */
--v-recessed-bg        /* color-mix(currentColor 8%, transparent) — adaptive tinted surface */
--v-error              /* oklch(45% 0.2 25) — error and validation states */
```

### Radius

```css
--v-radius             /* Surface corner radius (cards, inputs, containers) */
--v-radius-button      /* Button corner radius */
```

### Chroma and Hue (internal, but available)

```css
--v-primary-hue        /* The user's chosen hue (0–360) */
--v-palette-chroma     /* 0–0.25, drives brand colors */
--v-tint-chroma        /* 0–0.10, drives backgrounds and text */
--v-accent-1-hue       /* Current hue for accent-1 family */
--v-accent-2-hue       /* Current hue for accent-2 family */
--v-accent-3-hue       /* Current hue for accent-3 family */
```

---

## Background Context System

When a background color is applied to an element, the theme automatically adjusts the text, headings, links, and other content inside it. This works identically in the block editor and on the front end.

There are three tiers:

### Tier 1 — Base Palette Level (~55% lightness)

**Affected classes:**
```
has-action-background-color
has-accent-1-background-color
has-accent-2-background-color
has-accent-3-background-color
```

**What changes:** body text, headings (h1–h6), links, and subdued/secondary elements → `var(--v-white)`

**What doesn't change:** buttons, forms, tables

These backgrounds are vivid mid-lightness colors. They need light text but don't typically host forms or complex interactive content, so a lighter touch is appropriate.

**Mixin:** `colored-bg-context()` in `_configuration.scss`

### Tier 2 — Dark and Darker Palette Levels

**Affected classes:**

*Neutral group* (uses default `--v-on-dark`):
```
.v-dark-background
has-dark-background-color
has-darker-background-color
has-text-background-color
has-subdued-dark-background-color
has-action-dark-background-color
has-action-darker-background-color
```

*Accent groups* (each overrides `--v-on-dark` to use the accent's own hue):
```
has-accent-1-dark-background-color
has-accent-1-darker-background-color
has-accent-2-dark-background-color
has-accent-2-darker-background-color
has-accent-3-dark-background-color
has-accent-3-darker-background-color
```

**What changes:** body text → `--v-on-dark`; headings/links → white; subdued elements → `--v-on-dark`; action buttons, utility buttons, form inputs, and table borders all adjusted for dark backgrounds

**Mixin:** `dark-bg-context()` in `_configuration.scss`

### Tier 3 — Light, Lighter, and Tint Levels

No context mixin is applied. Body text color is readable on these surfaces without adjustment.

### Explicit Color Overrides

All element selectors inside `colored-bg-context()` and `dark-bg-context()` use `:not(.has-text-color)`. WordPress adds `has-text-color` to any element where the user explicitly sets a text color in the editor, so this guard ensures user choices are never overridden by the context mixin.

---

## The `--v-on-dark` System

`--v-on-dark` is the text color for dark backgrounds. It is defined as:

```css
--v-on-dark: oklch(var(--v-on-dark-luminance) calc(var(--v-tint-chroma) * 0.5) var(--v-primary-hue));
```

At `--v-on-dark-luminance: 100%` and low tint-chroma, this is essentially white — but with a barely perceptible tint toward the primary hue. The intent is to feel slightly warmer and more integrated than flat `#fff`, while remaining effectively white at all vibrancy settings.

### Per-Hue Overrides

The default `--v-on-dark` is tinted toward the primary hue. This is correct for dark backgrounds that use the action or neutral color families (which are all primary-hue-derived). But for accent-family dark backgrounds — which may be at a completely different hue in multi-color schemes — the tint would point in the wrong direction.

Each accent dark context block overrides `--v-on-dark` to use its own hue variable before calling `dark-bg-context()`:

```scss
.has-accent-1-dark-background-color,
.has-accent-1-darker-background-color {
    --v-on-dark: oklch(var(--v-on-dark-luminance) calc(var(--v-tint-chroma) * 0.5) var(--v-accent-1-hue));
    @include dark-bg-context();
}
```

Since `--v-accent-1-hue` always resolves to the correct hue for the active scheme, this works automatically across all scheme types without needing scheme-specific CSS rules.

---

## PHP, SCSS, and JS Pipeline

The color system spans three different layers that each serve a distinct role.

### PHP — `includes/color-schemes.php`

Outputs two `<style>` blocks into `<head>` at runtime:

1. **Base variables** (`volatyl_root_color_scheme_base()`) — `--v-palette-chroma`, `--v-tint-chroma`, `--v-radius`, `--v-radius-button`, `--v-on-dark`, `--v-on-dark-luminance`, `--v-accent-N-hue`, neutral slots, and all scheme hue reference variables. Always output.

2. **Scheme overrides** (`volatyl_get_scheme_overrides()`) — The active scheme's color family overrides. Only output for non-monochromatic schemes; monochromatic is the default and needs no override block.

Because these are inline styles in the document `<head>`, they are available to all CSS that follows — including `style.css` and the dynamically injected editor styles.

### SCSS — `_theme-colors.scss` and `_editor-classes.scss`

The compiled CSS only references `var(--*)` — it contains no color values. This means:

- A single build artifact (`style.css`) works for all color schemes and all Customizer settings
- The entire palette can change without a build step
- The editor (`editor-style.css`) and front end stay in sync automatically

`_editor-classes.scss` generates all the `has-*-color` and `has-*-background-color` classes from the palette using the `color-pair()` and `color-group()` SCSS mixins.

### JS — `assets/js/customizer.js`

Runs inside the Customizer's preview iframe. When a Customizer control changes, this script updates CSS custom properties directly on `document.documentElement` without a page reload:

- `volatyl_primary_hue` → updates `--v-primary-hue`
- `volatyl_palette_vibrancy` → updates `--v-palette-chroma`
- `volatyl_background_tint` → updates `--v-tint-chroma`
- `volatyl_border_radius` → updates `--v-radius`
- `volatyl_button_radius` → updates `--v-radius-button` (same non-linear conversion as PHP: 0–50 → 0–20px linear, 51–100 → 9999px pill)
- Color scheme type → updates the full set of `--v-accent-N-*` variables for the selected scheme

---

## Known Pitfalls

### `has-text-color` Collision

WordPress adds `has-text-color` as a generic flag class to any element where the user explicitly sets a text color in the editor. The theme's Gutenberg palette includes a color slot named `text` (the body text color, `--v-text`).

If you generate a CSS rule for `.has-text-color { color: var(--v-text) }`, it will appear after all accent color classes in the stylesheet and override any explicit color choice the user makes — because both rules have equal specificity `(0,1,0)` and source order decides the winner.

**Rule:** never emit a `.has-text-color` CSS rule. In `_editor-classes.scss`, the `text` slot is handled with a background-only rule:

```scss
// Background only — .has-text-color is WordPress's generic flag class
// and must not carry a color value.
.has-text-background-color { background-color: var(--v-text); }
```
