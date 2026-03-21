/* global wp, jQuery */
/**
 * Customizer behavior
 */
(function ($) {

    /**
     * Binds a Customizer setting to toggle v-dark-background / v-gray-background on a selector.
     */
    function bindDarkToggle(setting, selector) {
        wp.customize(setting, function (value) {
            value.bind(function (to) {
                $(selector)
                    .toggleClass('v-dark-background', to)
                    .toggleClass('v-gray-background', !to);
            });
        });
    }

    /**
     * Site Identity
     */
    // Site title
    wp.customize('blogname', function (value) {
        value.bind(function (to) {
            $('.site-title a').text(to);
        });
    });
    // Site description (used in site footer)
    wp.customize('blogdescription', function (value) {
        value.bind(function (to) {
            $('.site-footer .blog-description').text(to);
        });
    });

    /**
     * HTML Structure
     */
    wp.customize('volatyl_full_width_structure', function (value) {
        value.bind(function (to) {
            $('body').toggleClass('full-width-structure', to);
        });
    });

    /**
     * Color Scheme
     */
    // Primary hue
    wp.customize('volatyl_primary_hue', function (value) {
        value.bind(function (to) {
            document.documentElement.style.setProperty('--primary-hue', to);
        });
    });
    // Palette vibrancy
    wp.customize('volatyl_palette_vibrancy', function (value) {
        value.bind(function (to) {
            document.documentElement.style.setProperty('--palette-chroma', to * 0.0025);
        });
    });
    // Background & text tint
    wp.customize('volatyl_background_tint', function (value) {
        value.bind(function (to) {
            document.documentElement.style.setProperty('--tint-chroma', to * 0.001);
        });
    });
    // Color scheme type — update CSS custom properties directly for live preview
    wp.customize('volatyl_color_scheme_type', function (value) {
        value.bind(function (to) {
            var root = document.documentElement;

            // Hue variable each slot should reference per scheme
            var schemeHues = {
                monochromatic: {action: '--primary-hue', accent: '--primary-hue', extraAccent: '--primary-hue'},
                complementary: {
                    action: '--complementary-accent-hue',
                    accent: '--complementary-accent-hue',
                    extraAccent: '--complementary-accent-hue'
                },
                analogous: {
                    action: '--analogous-accent-hue-1',
                    accent: '--analogous-accent-hue-2',
                    extraAccent: '--analogous-accent-hue-2'
                },
                triadic: {
                    action: '--triadic-accent-hue-1',
                    accent: '--triadic-accent-hue-2',
                    extraAccent: '--triadic-accent-hue-2'
                },
                split_complementary: {
                    action: '--split-complementary-accent-hue-1',
                    accent: '--split-complementary-accent-hue-2',
                    extraAccent: '--split-complementary-accent-hue-2'
                },
                tetradic: {
                    action: '--tetradic-accent-hue-1',
                    accent: '--tetradic-accent-hue-2',
                    extraAccent: '--tetradic-accent-hue-3'
                },
            };

            var hues = schemeHues[to] || schemeHues.monochromatic;

            function setColorGroup(prefix, hueVar) {
                root.style.setProperty('--' + prefix, 'oklch(55% var(--palette-chroma) var(' + hueVar + '))');
                root.style.setProperty('--' + prefix + '-light', 'oklch(75% var(--palette-chroma) var(' + hueVar + '))');
                root.style.setProperty('--' + prefix + '-dark', 'oklch(30% var(--palette-chroma) var(' + hueVar + '))');
                root.style.setProperty('--' + prefix + '-tint', 'oklch(97.5% calc(var(--palette-chroma) * 0.05) var(' + hueVar + '))');
            }

            setColorGroup('action', hues.action);
            setColorGroup('accent', hues.accent);
            setColorGroup('extra-accent', hues.extraAccent);
        });
    });

    /**
     * Front Page Template
     */
    // Front page hero dark (latest posts mode only — no page meta available)
    wp.customize('volatyl_front_page_hero_dark', function (value) {
        value.bind(function (to) {
            $('body.home.blog #masthead, body.home.blog .content-header')
                .toggleClass('v-dark-background', !!to)
                .toggleClass('v-gray-background', !to);
        });
    });
    // Front page hero centered
    wp.customize('volatyl_front_page_hero_centered', function (value) {
        value.bind(function (to) {
            $('.front-page .content-header, .home.blog .content-header').toggleClass('v-text-align-center', !!to);
        });
    });
    // Front page hero title
    wp.customize('volatyl_front_page_hero_title', function (value) {
        value.bind(function (to) {
            $('.front-page .content-header-title').text(to);
        });
    });
    // Front page hero description
    wp.customize('volatyl_front_page_hero_description', function (value) {
        value.bind(function (to) {
            $('.front-page .content-header-description').text(to);
        });
    });
    // Front page hero primary CTA button text
    wp.customize('volatyl_front_page_hero_primary_cta_button_text', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.front-page .content-header-primary-cta').show();
            } else {
                $('.front-page .content-header-primary-cta').hide();
            }
        });
    });
    // Front page hero primary CTA button URL
    wp.customize('volatyl_front_page_hero_primary_cta_button_url', function (value) {
        value.bind(function (to) {
            $('.front-page .content-header-primary-cta a').attr('href', to);
        });
    });
    // Front page hero secondary CTA button text
    wp.customize('volatyl_front_page_hero_secondary_cta_button_text', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.front-page .content-header-secondary-cta').show();
            } else {
                $('.front-page .content-header-secondary-cta').hide();
            }
        });
    });
    // Front page hero secondary CTA button URL
    wp.customize('volatyl_front_page_hero_secondary_cta_button_url', function (value) {
        value.bind(function (to) {
            $('.front-page .content-header-secondary-cta a').attr('href', to);
        });
    });

    /**
     * Blog Template
     */
    // Blog hero title
    wp.customize('volatyl_blog_title', function (value) {
        value.bind(function (to) {
            $('.blog .content-header-title').text(to);
        });
    });
    // Blog hero description
    wp.customize('volatyl_blog_description', function (value) {
        value.bind(function (to) {
            $('.blog .content-header-description').text(to);
        });
    });
    // Blog search form
    wp.customize('volatyl_blog_search_form', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.blog .content-header-search-form').show();
            } else {
                $('.blog .content-header-search-form').hide();
            }
        });
    });
    // Blog CTA color scheme
    bindDarkToggle('volatyl_blog_grid_cta_color_scheme', '.blog .blog-grid-cta');
    // Blog CTA title
    wp.customize('volatyl_blog_grid_cta_title', function (value) {
        value.bind(function (to) {
            $('.blog .blog-grid-cta .cta-title').text(to);
        });
    });
    // Blog CTA description
    wp.customize('volatyl_blog_grid_cta_description', function (value) {
        value.bind(function (to) {
            $('.blog .blog-grid-cta .cta-description').text(to);
        });
    });
    // Blog CTA button text
    wp.customize('volatyl_blog_grid_cta_button_text', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.blog .blog-grid-cta .cta-action').show();
            } else {
                $('.blog .blog-grid-cta .cta-action').hide();
            }
        });
    });
    // Blog CTA button URL
    wp.customize('volatyl_blog_grid_cta_button_url', function (value) {
        value.bind(function (to) {
            $('.blog .blog-grid-cta .cta-action a').attr('href', to);
        });
    });

    /**
     * Footer Areas
     */
    // Footer Lead color scheme
    bindDarkToggle('volatyl_footer_lead_color_scheme', '.footer-lead');
    // Footer Lead title
    wp.customize('volatyl_footer_lead_title', function (value) {
        value.bind(function (to) {
            $('.footer-lead .cta-title').text(to);
        });
    });
    // Footer Lead description
    wp.customize('volatyl_footer_lead_description', function (value) {
        value.bind(function (to) {
            $('.footer-lead .cta-description').text(to);
        });
    });
    // Footer Lead button text
    wp.customize('volatyl_footer_lead_cta_button_text', function (value) {
        value.bind(function (to) {
            if (to) {
                $('.footer-lead .cta-action').show();
            } else {
                $('.footer-lead .cta-action').hide();
            }
        });
    });
    // Footer Lead button URL
    wp.customize('volatyl_footer_lead_cta_button_url', function (value) {
        value.bind(function (to) {
            $('.footer-lead .cta-action a').attr('href', to);
        });
    });
    // Footer general color scheme
    bindDarkToggle('volatyl_footer_general_color_scheme', '.fat-footer, .social-navigation, .site-footer');
    // Fat Footer Alternate Layout
    wp.customize('volatyl_fat_footer_alternate_layout', function (value) {
        value.bind(function (to) {
            $('.fat-footer-areas').toggleClass('alternate-layout', to);
        });
    });

    /**
     * Color Palette Preview Panel
     * Floats at the bottom of the preview iframe showing all theme color swatches.
     * Swatches use CSS variables directly so they update live with no extra wiring.
     */
    ( function () {

        var panel    = null;
        var stylesEl = null;

        var groups = [
            {
                label: 'Primary',
                swatches: [
                    { v: '--primary-dark',  l: 'Dark'  },
                    { v: '--primary',       l: 'Base'  },
                    { v: '--primary-light', l: 'Light' },
                    { v: '--primary-tint',  l: 'Tint', tint: true },
                ],
            },
            {
                label: 'Action',
                swatches: [
                    { v: '--action-dark',  l: 'Dark'  },
                    { v: '--action',       l: 'Base'  },
                    { v: '--action-light', l: 'Light' },
                    { v: '--action-tint',  l: 'Tint', tint: true },
                ],
            },
            {
                label: 'Accent',
                swatches: [
                    { v: '--accent-dark',  l: 'Dark'  },
                    { v: '--accent',       l: 'Base'  },
                    { v: '--accent-light', l: 'Light' },
                    { v: '--accent-tint',  l: 'Tint', tint: true },
                ],
            },
            {
                label: 'Extra',
                swatches: [
                    { v: '--extra-accent-dark',  l: 'Dark'  },
                    { v: '--extra-accent',       l: 'Base'  },
                    { v: '--extra-accent-light', l: 'Light' },
                    { v: '--extra-accent-tint',  l: 'Tint', tint: true },
                ],
            },
            {
                label: 'Backgrounds',
                swatches: [
                    { v: '--darker',        l: 'Darker'    },
                    { v: '--dark',          l: 'Dark'      },
                    { v: '--subdued-dark',  l: 'Sub Dark'  },
                    { v: '--subdued-light', l: 'Sub Light', tint: true },
                ],
            },
            {
                label: 'Text / UI',
                swatches: [
                    { v: '--text',    l: 'Text'    },
                    { v: '--on-dark', l: 'On Dark', tint: true },
                    { v: '--white',   l: 'White',   tint: true },
                ],
            },
        ];

        function buildPanel() {
            var el  = document.createElement( 'div' );
            el.id   = 'volatyl-palette-panel';
            var html = '<div class="vpp-inner">';
            groups.forEach( function ( group, i ) {
                if ( i > 0 ) { html += '<div class="vpp-sep"></div>'; }
                html += '<div class="vpp-group">';
                html += '<div class="vpp-label">' + group.label + '</div>';
                html += '<div class="vpp-row">';
                group.swatches.forEach( function ( s ) {
                    var cls = 'vpp-swatch' + ( s.tint ? ' vpp-tint' : '' );
                    html += '<div class="' + cls + '" style="background:var(' + s.v + ')" title="' + s.v + '"></div>';
                } );
                html += '</div></div>';
            } );
            html += '</div>';
            el.innerHTML = html;
            return el;
        }

        function injectStyles() {
            if ( stylesEl ) { return; }
            stylesEl = document.createElement( 'style' );
            stylesEl.id = 'volatyl-palette-panel-styles';
            stylesEl.textContent = '\
                #volatyl-palette-panel {\
                    position: fixed;\
                    bottom: 16px;\
                    left: 50%;\
                    transform: translateX(-50%);\
                    background: rgba(12,12,14,0.93);\
                    backdrop-filter: blur(12px);\
                    -webkit-backdrop-filter: blur(12px);\
                    border-radius: 10px;\
                    border: 1px solid rgba(255,255,255,0.08);\
                    box-shadow: 0 8px 32px rgba(0,0,0,0.55);\
                    padding: 10px 14px;\
                    z-index: 99998;\
                    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;\
                    user-select: none;\
                    white-space: nowrap;\
                }\
                .vpp-inner { display: flex; align-items: flex-start; gap: 0; }\
                .vpp-sep { width: 1px; background: rgba(255,255,255,0.1); margin: 0 10px; align-self: stretch; }\
                .vpp-group { display: flex; flex-direction: column; gap: 5px; }\
                .vpp-label { font-size: 9px; font-weight: 600; text-transform: uppercase; letter-spacing: 0.06em; color: rgba(255,255,255,0.38); }\
                .vpp-row { display: flex; gap: 3px; }\
                .vpp-swatch { width: 22px; height: 22px; border-radius: 4px; border: 1px solid rgba(255,255,255,0.1); cursor: default; transition: transform 0.1s ease; }\
                .vpp-swatch:hover { transform: scale(1.25); z-index: 1; position: relative; }\
                .vpp-tint { border-color: rgba(0,0,0,0.15); box-shadow: inset 0 0 0 1px rgba(0,0,0,0.08); }\
            ';
            document.head.appendChild( stylesEl );
        }

        function show() {
            injectStyles();
            if ( ! panel ) {
                panel = buildPanel();
                document.body.appendChild( panel );
            }
            panel.style.display = '';
        }

        function hide() {
            if ( panel ) { panel.style.display = 'none'; }
        }

        wp.customize.bind( 'ready', function () {
            wp.customize.preview.bind( 'volatyl-palette-panel', function ( data ) {
                if ( data.visible ) { show(); } else { hide(); }
            } );
        } );

    } )();

}(jQuery));
