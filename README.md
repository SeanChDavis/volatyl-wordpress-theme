# Volatyl
### An Intelligently Designed WordPress Theme

Volatyl is a classic WordPress theme built around the idea that a small amount of information should do a lot of work. Choose a single color hue and a full palette is generated for you. Add widgets to footer areas and the layout adjusts itself. Enable a sidebar and the content column reflows. The goal is a theme that makes intelligent decisions so you don't have to make as many.

---

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [The Layout System](#the-layout-system)
- [Color System](#color-system)
- [Customizer Options](#customizer-options)
- [Page Templates](#page-templates)
- [The Block Editor](#the-block-editor)
- [Footer System](#footer-system)
- [Sidebars](#sidebars)
- [Per-Page Options](#per-page-options)
- [Helper Classes](#helper-classes)
- [Development](#development)

---

## Requirements

- WordPress 6.2 or higher
- PHP 7.4 or higher

---

## Installation

1. Download or clone this repository into your `wp-content/themes/` directory.
2. In the WordPress admin, go to **Appearance → Themes** and activate Volatyl.
3. Visit **Appearance → Customize** to configure colors, layout, footer areas, and more.

---

## The Layout System

Understanding Volatyl's layout system is the key to getting the most out of it — both when writing HTML directly and when using the block editor.

### Page Width vs. Full Width

The theme operates in one of two structural modes, set globally in the Customizer under **HTML Structure**:

- **Page Width** (default) — The outer page wrapper has a max-width and is centered in the viewport. Content and sections are contained within this boundary.
- **Full Width** — The outer wrapper spans the full viewport. Individual sections still contain their content, but backgrounds and borders extend edge to edge.

### Sections and `.inner`

Every visual section of a Volatyl page follows the same two-layer pattern: an outer element that carries the background and full-width treatment, and an `.inner` container that constrains the content to a readable max-width with responsive padding.

```html
<!-- A page section -->
<section class="v-dark-background">

  <!-- .inner constrains content width and provides consistent spacing -->
  <div class="inner">
    <h2>Section Title</h2>
    <p>Section content goes here.</p>
  </div>

</section>
```

The `.inner` class applies:
- A max-width of approximately 1200px
- Responsive horizontal padding (fluid from mobile through desktop)
- Responsive vertical padding using `clamp()` values
- `margin: auto` to center within its parent

**This pattern is important.** The outer element (the section) is where you apply background colors, full-bleed behavior, and visual context. The `.inner` is where readable content lives.

### The Block Editor and This Pattern

Volatyl's Group block support is designed around this same idea. When you add a **Group block** in the editor, it functions as the outer section layer. You can then add content inside it that naturally respects the `.inner` spacing.

For custom landing pages, the **Canvas templates** (see [Page Templates](#page-templates)) remove the default page wrapper entirely, letting you stack Group blocks as independent sections — each one a full page section with its own background, spacing, and content.

```html
<!-- What a Group block effectively produces in a Canvas page -->
<div class="wp-block-group v-dark-background">
  <div class="wp-block-group__inner-container inner">
    <!-- Your blocks here -->
  </div>
</div>
```

The `v-*` utility classes (dark background, spacing, alignment) work on Group blocks exactly as they do in PHP templates.

---

## Color System

Volatyl uses a mathematically-generated color palette built on the [OKLCH color space](https://developer.mozilla.org/en-US/docs/Web/CSS/color_value/oklch). Instead of managing individual color values, you control two inputs and the theme handles the rest.

### Two Controls, One Palette

- **Primary Hue** (0–360°) — The base hue that anchors the entire palette. Every color in the theme derives from this value.
- **Global Hue Saturation** (0–100%) — How vivid the palette is. At 0, backgrounds and text are essentially grayscale. As the value increases, colors gain more chroma. Action and accent colors (buttons, links, interactive elements) are intentionally kept vivid regardless of this setting.

### Color Scheme Types

The scheme type determines how the action and accent colors relate to the primary hue.

| Scheme | Description |
|---|---|
| **Monochromatic** | Action and accent colors share the primary hue |
| **Complementary** | Accent colors use the hue opposite on the color wheel (±180°) |
| **Analogous** | Accent colors sit adjacent to the primary hue (±30°) |
| **Triadic** | Accent colors are evenly spaced at ±120° |
| **Split-Complementary** | A softer complement — accent colors at ±150° |
| **Tetradic** | Four-point harmony at ±90° and ±180° |

Color scheme changes preview live in the Customizer without a page refresh.

### CSS Variables

The full palette is available as CSS custom properties. Some notable ones:

| Variable | Usage |
|---|---|
| `--action` | Buttons, links, interactive elements |
| `--action-dark` | Hover/active states |
| `--accent` | Secondary interactive color |
| `--extra-accent` | Tertiary interactive color |
| `--primary-tint` | Very light background tint |
| `--subdued-dark` | Muted text, secondary headings |
| `--subdued-light` | Borders, dividers |
| `--dark` | Dark surface background |
| `--on-dark` | Text rendered over dark backgrounds |
| `--translucent-light` | Subtle light overlay (rgba white) |
| `--translucent-dark` | Subtle dark overlay (rgba black) |

These variables are available in both the front end and the block editor, so color choices made in the Customizer are reflected immediately across the whole site.

---

## Customizer Options

### HTML Structure
- **Full-width Structure** — Toggle between page-width and full-width layout mode.

### Color Scheme
- **Primary Hue** — Hue slider (0–360°).
- **Global Hue Saturation** — Saturation slider (0–100%).
- **Color Scheme Type** — Choose from six color relationship schemes.
- **Light Logo** — Upload an alternate logo for use when the header has a dark background.

### Section Backgrounds
Controls which sections of the site use a dark background by default. These can be overridden per-page using the [Page Layout meta box](#per-page-options).

- Dark header on archive pages
- Dark header on search results
- Dark header on 404 page
- Dark background on the Footer Lead area
- Dark background on the Fat Footer, Social Navigation, and Site Footer

### Content Configuration
- **Enable Comments on Standard Pages** — By default, comments are off for pages. Enable this to allow comments on any page where discussion is open.

### Template: Front Page
Configures the static front page template. Requires **Settings → Reading → Your homepage displays → A static page** to be set.

**Hero Section**
- Center hero content
- Title (defaults to site tagline; supports basic HTML: `<a>`, `<span>`, `<em>`, `<strong>`)
- Description
- Primary CTA button (text + URL)
- Secondary CTA link (text + URL)

**Page Content Area**
- Display page editor content below the hero
- Allow full-width content (removes the `.inner` wrapper; Group blocks can create full page sections)

**Blog Posts Grid**
- Grid layout: 2 or 3 columns, 1–3 rows (controls how many recent posts display)

**Featured Page**
- Select any page to feature in its own section. Displays the page title, excerpt (if set), and full page content side by side.

### Template: Blog
Configures the blog index page.

**Header Area**
- Blog title and description
- Optional search form in the header

**Blog Posts Grid**
- Grid layout: use the WordPress Reading settings default, or choose an explicit column/row combination.

**Blog Grid Call-to-Action**
- Enable a CTA widget that appears inside the blog posts grid
- Toggle dark/light background
- Title, description, button text, button URL

### Footer Areas
See [Footer System](#footer-system) for full details.

**Footer Lead**
- Enable/disable the area
- Title, description, CTA button (text + URL)

**Fat Footer**
- Enable/disable the area
- Enable alternate layout (gives the leftmost widget area more horizontal space when 3–4 areas are in use)

---

## Page Templates

Beyond the default page and post templates, Volatyl includes two canvas templates designed for custom layout work.

### Canvas — Page Width
A stripped-down page template that removes the default content wrapper. Content is still constrained to the standard max-width, but there is no sidebar and no default section wrapper. Useful for landing pages where you want clean, uncluttered content without building from scratch.

### Canvas — Full Width
The same as Canvas — Page Width, except the content has no horizontal constraints. Content extends to the full width of the page. Combined with Group blocks, this template is the starting point for fully custom page layouts.

**Showing a page header on canvas templates:**
Canvas templates hide the page header by default since they're intended for custom designs. To show a header on a canvas page, enable **Show Page Header** in the [Page Layout meta box](#per-page-options).

---

## The Block Editor

Volatyl treats the block editor as a first-class authoring environment. Theme fonts, heading styles, spacing, colors, and typographic details carry into the editor so what you see while writing reflects what visitors see on the front end.

### Color Palette
The full theme color palette (24 swatches) is available in the editor's color picker. All colors reference CSS custom properties, so they update automatically when you change the color scheme in the Customizer — no manual updates needed.

### Group Blocks as Page Sections
The most powerful editorial pattern in Volatyl is using Group blocks as page sections, particularly on **Canvas** templates. Each Group block becomes an independent section with its own background, spacing, and content.

Apply `v-*` utility classes to Group blocks (via the **Additional CSS class** field in the block settings) to control their appearance:

```
v-dark-background     → Dark themed section
v-gray-background     → Light gray section
v-no-spacing          → Remove all padding and margin
v-padding-y-4         → Add vertical padding (scale: 0–6)
v-text-align-center   → Center-align content
```

This mirrors exactly how PHP templates build sections — the same classes, the same CSS rules.

---

## Footer System

The footer is divided into four independent areas that stack vertically. Each area is optional and appears only if it has content.

### Footer Lead
A prominent call-to-action section that sits at the top of the footer. Configure the title, description, and a single CTA button in the Customizer. The Footer Lead is visually separated from the Fat Footer below it with a subtle border when both areas share the same background color.

Enable/disable under **Customizer → Footer Areas → Footer Lead Area**.

### Fat Footer
A widgetized area that supports 1–4 widget columns. The number of active widget areas determines the grid layout automatically — add content to two areas and you get a two-column layout; add four and you get four columns.

The **Alternate Layout** option gives the leftmost widget area significantly more horizontal space than the others, useful when one area contains longer content (like a description or text block) alongside narrower link lists.

Widget areas:
- Fat Footer Area One
- Fat Footer Area Two
- Fat Footer Area Three
- Fat Footer Area Four

Enable/disable under **Customizer → Footer Areas → Fat Footer Area**.

### Social Navigation
A dedicated widget area for social media links. Renders between the Fat Footer and the Site Footer when active.

Widget area: **Social Media Footer Area**

### Site Footer
A persistent footer bar with the site name, copyright year, and site description. Always visible. Background color follows the global footer color setting.

---

## Sidebars

Volatyl registers three sidebar widget areas. Layout adjusts automatically based on whether the sidebar for a given context has any active widgets.

| Sidebar | Used On |
|---|---|
| **Single Post Sidebar** | Individual blog posts |
| **Single Page Sidebar** | Individual pages (default template) |
| **Default Sidebar** | Archives, search results, blog index, and other templates |

When a sidebar has no active widgets, the main content area expands to full width. No configuration required — the layout responds to whether the sidebar has content.

Sidebars do not appear on Canvas template pages.

---

## Per-Page Options

Every post and page has a **Page Layout** meta box in the editor that provides per-item overrides.

| Option | Effect |
|---|---|
| **Show Page Header** | Displays the content header on Canvas templates (hidden by default on canvas pages) |
| **Enable Dark Header** | Applies a dark background to this page's header, regardless of the global Customizer setting |
| **Minimal Footer** | Hides the Footer Lead and Fat Footer on this page only. The Site Footer always remains. |

---

## Helper Classes

These classes can be applied to any HTML element or block to modify its appearance or behavior.

### Background Colors
```
v-dark-background    → Dark surface; text, links, and inputs adapt automatically
v-gray-background    → Light gray surface
```

### Spacing
Margin and padding classes follow the pattern `v-{property}-{direction}-{scale}`.

- **Property**: `margin` or `padding`
- **Direction**: `top`, `right`, `bottom`, `left`, `x` (horizontal), `y` (vertical), or omit for all sides
- **Scale**: 0–6 (0, 0.5rem, 1rem, 1.5rem, 2rem, 2.5rem, 3rem)

```
v-margin-bottom-4      → 2rem bottom margin
v-padding-y-3          → 1.5rem top and bottom padding
v-margin-0             → Remove all margins
v-no-spacing           → Remove all margin and padding
```

### Text & Typography
```
v-text-align-center    → Center-align text
v-text-align-right     → Right-align text
v-subdued-title        → Small, uppercase, heading font — for labels and eyebrows
```

### Heading Classes
Apply heading styles to any element without changing its HTML tag:
```
.h1  .h2  .h3  .h4  .h5  .h6
```

---

## Development

Volatyl uses [Grunt](https://gruntjs.com/) as its build tool.

### Prerequisites
```bash
npm install
```

### Build Commands

The recommended workflow is to run `grunt watch` while editing. It monitors SCSS and JS source files and runs the appropriate compile/bundle tasks automatically on save.

```bash
grunt watch
```

If you need to run tasks manually:

```bash
grunt sass                        # Compile SCSS → style.css + editor-style.css
grunt concat && grunt uglify      # Bundle and minify JS
```

Note: there is no default Grunt task — always specify the task explicitly.

### Colors and the Build

The OKLCH color system is output dynamically by PHP at runtime — it is not part of the compiled CSS. Changes to color logic in `includes/color-schemes.php` take effect immediately without a build step. The SCSS files reference CSS custom properties (`var(--action)`, etc.) which are defined by the PHP output.
