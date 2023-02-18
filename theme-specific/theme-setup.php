<?php
/**
 * Setup theme-specific fonts and colors
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0.22
 */

// If this theme is a free version of premium theme
if ( ! defined( 'KARGO_THEME_FREE' ) ) {
	define( 'KARGO_THEME_FREE', false );
}
if ( ! defined( 'KARGO_THEME_FREE_WP' ) ) {
	define( 'KARGO_THEME_FREE_WP', false );
}

// If this theme uses multiple skins
if ( ! defined( 'KARGO_ALLOW_SKINS' ) ) {
	define( 'KARGO_ALLOW_SKINS', false );
}
if ( ! defined( 'KARGO_DEFAULT_SKIN' ) ) {
	define( 'KARGO_DEFAULT_SKIN', 'default' );
}

// Theme storage
// Attention! Must be in the global namespace to compatibility with WP CLI
$GLOBALS['KARGO_STORAGE'] = array(

	// Theme required plugin's slugs
	'required_plugins'   => array_merge(

		// List of plugins for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			// Required plugins
			// DON'T COMMENT OR REMOVE NEXT LINES!
			'trx_addons'         => esc_html__( 'ThemeREX Addons', 'kargo' ),

            // Recommended (supported) plugins for both (lite and full) versions
            // If plugin not need - comment (or remove) it
            'trx_updater'        => esc_html__( 'ThemeREX Updater', 'kargo' ),
            'elementor'          => esc_html__( 'Elementor', 'kargo' ),
			'contact-form-7'     => esc_html__( 'Contact Form 7', 'kargo' ),
			'mailchimp-for-wp'   => esc_html__( 'MailChimp for WP', 'kargo' ),
			'wp-gdpr-compliance' => esc_html__( 'Cookie Information', 'kargo' ),
		),
		// List of plugins for the FREE version only
		//-----------------------------------------------------
		KARGO_THEME_FREE
			? array(
				// Recommended (supported) plugins for the FREE (lite) version
				'siteorigin-panels' => esc_html__( 'SiteOrigin Panels', 'kargo' ),
			)

		// List of plugins for the PREMIUM version only
		//-----------------------------------------------------
			: array(
				// Recommended (supported) plugins for the PRO (full) version
				'revslider'                  => esc_html__( 'Revolution Slider', 'kargo' ),
				'calculated-fields-form'     => esc_html__( 'Calculated Fields Form', 'kargo' ),
				
			)
	),

	// Theme-specific blog layouts
	'blog_styles'        => array_merge(
		// Layouts for both - FREE and PREMIUM versions
		//-----------------------------------------------------
		array(
			'excerpt' => array(
				'title'   => esc_html__( 'Standard', 'kargo' ),
				'archive' => 'index-excerpt',
				'item'    => 'content-excerpt',
				'styles'  => 'excerpt',
			),
			'classic' => array(
				'title'   => esc_html__( 'Classic', 'kargo' ),
				'archive' => 'index-classic',
				'item'    => 'content-classic',
				'columns' => array( 2, 3 ),
				'styles'  => 'classic',
			),
		),
		// Layouts for the FREE version only
		//-----------------------------------------------------
		KARGO_THEME_FREE
		? array()

		// Layouts for the PREMIUM version only
		//-----------------------------------------------------
		: array(
			'portfolio' => array(
				'title'   => esc_html__( 'Portfolio', 'kargo' ),
				'archive' => 'index-portfolio',
				'item'    => 'content-portfolio',
				'columns' => array( 2, 3, 4 ),
				'styles'  => 'portfolio',
			),
			'chess'     => array(
				'title'   => esc_html__( 'Chess', 'kargo' ),
				'archive' => 'index-chess',
				'item'    => 'content-chess',
				'columns' => array( 1, 2, 3 ),
				'styles'  => 'chess',
			),
		)
	),

	// Key validator: market[env|loc]-vendor[axiom|ancora|themerex]
	'theme_pro_key'      => 'env-axiom',

	// Generate Personal token from Envato to automatic upgrade theme
	'upgrade_token_url'  => kargo_get_protocol() . '://build.envato.com/create-token/?default=t&purchase:download=t&purchase:list=t',

	// Theme-specific URLs (will be escaped in place of the output)
	'theme_demo_url'     => kargo_get_protocol() . '://kargo.axiomthemes.com',
	'theme_doc_url'      => kargo_get_protocol() . '://kargo.axiomthemes.com/doc',
	
	'theme_rate_url'     => kargo_get_protocol() . '://themeforest.net/download',

	'theme_download_url' => kargo_get_protocol() . '://themeforest.net/item/kargo-logistics-transportation-wordpress-theme/23347535',         // Axiom

	'theme_custom_url'   => kargo_get_protocol() . '://themerex.net/offers/?utm_source=offers&utm_medium=click&utm_campaign=themedash',

	'theme_support_url'  => kargo_get_protocol() . '://themerex.net/support',                              // Axiom

	'theme_video_url'    => kargo_get_protocol() . '://www.youtube.com/channel/UCBjqhuwKj3MfE3B6Hg2oA8Q',  // Axiom

	'theme_privacy_url'  => kargo_get_protocol() . '://axiomthemes.com/privacy-policy/',                      // Axiom

	// Comma separated slugs of theme-specific categories (for get relevant news in the dashboard widget)
	// (i.e. 'children,kindergarten')
	'theme_categories'   => '',

	// Responsive resolutions
	// Parameters to create css media query: min, max
	'responsive'         => array(
		// By device
		'wide'       => array(
			'min' => 2160
		),
		'desktop'    => array(
			'min' => 1680,
			'max' => 2159,
		),
		'notebook'   => array(
			'min' => 1280,
			'max' => 1679,
		),
		'tablet'     => array(
			'min' => 768,
			'max' => 1279,
		),
		'not_mobile' => array( 'min' => 768 ),
		'mobile'     => array( 'max' => 767 ),
		// By size
		'xxl'        => array( 'max' => 1679 ),
		'xl'         => array( 'max' => 1439 ),
		'lg'         => array( 'max' => 1279 ),
		'md_over'    => array( 'min' => 1024 ),
		'md'         => array( 'max' => 1023 ),
		'sm'         => array( 'max' => 767 ),
		'sm_wp'      => array( 'max' => 600 ),
		'xs'         => array( 'max' => 479 ),
	),
);

// Theme init priorities:
// Action 'after_setup_theme'
// 1 - register filters to add/remove lists items in the Theme Options
// 2 - create Theme Options
// 3 - add/remove Theme Options elements
// 5 - load Theme Options. Attention! After this step you can use only basic options (not overriden)
// 9 - register other filters (for installer, etc.)
//10 - standard Theme init procedures (not ordered)
// Action 'wp_loaded'
// 1 - detect override mode. Attention! Only after this step you can use overriden options (separate values for the shop, courses, etc.)

if ( ! function_exists( 'kargo_customizer_theme_setup1' ) ) {
	add_action( 'after_setup_theme', 'kargo_customizer_theme_setup1', 1 );
	function kargo_customizer_theme_setup1() {

		// -----------------------------------------------------------------
		// -- ONLY FOR PROGRAMMERS, NOT FOR CUSTOMER
		// -- Internal theme settings
		// -----------------------------------------------------------------
		kargo_storage_set(
			'settings', array(

				'duplicate_options'      => 'child',            // none  - use separate options for the main and the child-theme
																// child - duplicate theme options from the main theme to the child-theme only
																// both  - sinchronize changes in the theme options between main and child themes

				'customize_refresh'      => 'auto',             // Refresh method for preview area in the Appearance - Customize:
																// auto - refresh preview area on change each field with Theme Options
																// manual - refresh only obn press button 'Refresh' at the top of Customize frame

				'max_load_fonts'         => 5,                  // Max fonts number to load from Google fonts or from uploaded fonts

				'comment_after_name'     => true,               // Place 'comment' field after the 'name' and 'email'

				'show_author_avatar'     => true,               // Display author's avatar in the post meta

				'icons_selector'         => 'internal',         // Icons selector in the shortcodes:
																// vc (default) - standard VC (very slow) or Elementor's icons selector (not support images and svg)
																// internal - internal popup with plugin's or theme's icons list (fast and support images and svg)

				'icons_type'             => 'icons',            // Type of icons (if 'icons_selector' is 'internal'):
																// icons  - use font icons to present icons
																// images - use images from theme's folder trx_addons/css/icons.png
																// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'socials_type'           => 'icons',            // Type of socials icons (if 'icons_selector' is 'internal'):
																// icons  - use font icons to present social networks
																// images - use images from theme's folder trx_addons/css/icons.png
																// svg    - use svg from theme's folder trx_addons/css/icons.svg

				'check_min_version'      => true,               // Check if exists a .min version of .css and .js and return path to it
																// instead the path to the original file
																// (if debug_mode is off and modification time of the original file < time of the .min file)

				'autoselect_menu'        => false,              // Show any menu if no menu selected in the location 'main_menu'
																// (for example, the theme is just activated)

				'disable_jquery_ui'      => false,              // Prevent loading custom jQuery UI libraries in the third-party plugins

				'use_mediaelements'      => true,               // Load script "Media Elements" to play video and audio

				'tgmpa_upload'           => false,              // Allow upload not pre-packaged plugins via TGMPA

				'allow_no_image'         => false,              // Allow use image placeholder if no image present in the blog, related posts, post navigation, etc.

				'separate_schemes'       => true,               // Save color schemes to the separate files __color_xxx.css (true) or append its to the __custom.css (false)

				'allow_fullscreen'       => false,              // Allow cases 'fullscreen' and 'fullwide' for the body style in the Theme Options
																// In the Page Options this styles are present always
																// (can be removed if filter 'kargo_filter_allow_fullscreen' return false)

				'attachments_navigation' => false,              // Add arrows on the single attachment page to navigate to the prev/next attachment
				
				'gutenberg_safe_mode'    => array(),            // 'vc', 'elementor' - Prevent simultaneous editing of posts for Gutenberg and other PageBuilders (VC, Elementor)

				'allow_gutenberg_blocks' => true,               // Allow our shortcodes and widgets as blocks in the Gutenberg (not ready yet - in the development now)

				'subtitle_above_title'   => true,               // Put subtitle above the title in the shortcodes

				'add_hide_on_xxx'        => 'replace',          // Add our breakpoints to the Responsive section of each element
																// 'add' - add our breakpoints after Elementor's
																// 'replace' - add our breakpoints instead Elementor's
																// 'none' - don't add our breakpoints (using only Elementor's)
			)
		);

		// -----------------------------------------------------------------
		// -- Theme fonts (Google and/or custom fonts)
		// -----------------------------------------------------------------

		// Fonts to load when theme start
		// It can be Google fonts or uploaded fonts, placed in the folder /css/font-face/font-name inside the theme folder
		// Attention! Font's folder must have name equal to the font's name, with spaces replaced on the dash '-'
		// For example: font name 'TeX Gyre Termes', folder 'TeX-Gyre-Termes'
		kargo_storage_set(
			'load_fonts', array(
				// Google font
				array(
					'name'   => 'Roboto',
					'family' => 'sans-serif',
					'styles' => '300,300italic,400,400italic,700,700italic',     // Parameter 'style' used only for the Google fonts
				),
				// Font-face packed with theme
				array(
					'name'   => 'Montserrat',
					'family' => 'sans-serif',
				),
				array(
					'name'   => 'SpartanMB',
					'family' => 'sans-serif',
				),
			)
		);

		// Characters subset for the Google fonts. Available values are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese
		kargo_storage_set( 'load_fonts_subset', 'latin,latin-ext' );

		// Settings of the main tags
		// Attention! Font name in the parameter 'font-family' will be enclosed in the quotes and no spaces after comma!

		kargo_storage_set(
			'theme_fonts', array(
				'p'       => array(
					'title'           => esc_html__( 'Main text', 'kargo' ),
					'description'     => esc_html__( 'Font settings of the main text of the site. Attention! For correct display of the site on mobile devices, use only units "rem", "em" or "ex"', 'kargo' ),
					'font-family'     => '"SpartanMB",sans-serif',
					'font-size'       => '1.143rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '2.286rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '0em',
					'margin-bottom'   => '1.2em',
				),
				'h1'      => array(
					'title'           => esc_html__( 'Heading 1', 'kargo' ),
					'font-family'     => '"SpartanMB",sans-serif',
					'font-size'       => '3.7143rem',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '5.143rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '2em',
					'margin-bottom'   => '1.15em',
				),
				'h2'      => array(
					'title'           => esc_html__( 'Heading 2', 'kargo' ),
					'font-family'     => '"SpartanMB",sans-serif',
					'font-size'       => '2.857rem',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '4.143rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.95em',
					'margin-bottom'   => '1.45em',
				),
				'h3'      => array(
					'title'           => esc_html__( 'Heading 3', 'kargo' ),
					'font-family'     => '"SpartanMB",sans-serif',
					'font-size'       => '2.142rem',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '3.214rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '2.75em',
					'margin-bottom'   => '1.8em',
				),
				'h4'      => array(
					'title'           => esc_html__( 'Heading 4', 'kargo' ),
					'font-family'     => '"SpartanMB",sans-serif',
					'font-size'       => '1.714rem',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '2.571rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.8em',
					'margin-bottom'   => '1em',
				),
				'h5'      => array(
					'title'           => esc_html__( 'Heading 5', 'kargo' ),
					'font-family'     => '"SpartanMB",sans-serif',
					'font-size'       => '1.428rem',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '2.357rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '2.25em',
					'margin-bottom'   => '1.2em',
				),
				'h6'      => array(
					'title'           => esc_html__( 'Heading 6', 'kargo' ),
					'font-family'     => '"SpartanMB",sans-serif',
					'font-size'       => '1.285rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '2.357rem',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
					'margin-top'      => '1.9em',
					'margin-bottom'   => '0.8em',
				),
				'logo'    => array(
					'title'           => esc_html__( 'Logo text', 'kargo' ),
					'description'     => esc_html__( 'Font settings of the text case of the logo', 'kargo' ),
					'font-family'     => '"Montserrat",sans-serif',
					'font-size'       => '1.8em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.25em',
					'text-decoration' => 'none',
					'text-transform'  => 'uppercase',
					'letter-spacing'  => '1px',
				),
				'button'  => array(
					'title'           => esc_html__( 'Buttons', 'kargo' ),
					'font-family'     => '"SpartanMB",sans-serif',
					'font-size'       => '18px',
					'font-weight'     => '800',
					'font-style'      => 'normal',
					'line-height'     => '22px',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0',
				),
				'input'   => array(
					'title'           => esc_html__( 'Input fields', 'kargo' ),
					'description'     => esc_html__( 'Font settings of the input fields, dropdowns and textareas', 'kargo' ),
					'font-family'     => 'inherit',
					'font-size'       => '1em',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em', // Attention! Firefox don't allow line-height less then 1.5em in the select
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'info'    => array(
					'title'           => esc_html__( 'Post meta', 'kargo' ),
					'description'     => esc_html__( 'Font settings of the post meta: date, counters, share, etc.', 'kargo' ),
					'font-family'     => 'inherit',
					'font-size'       => '0.9286em',  // Old value '13px' don't allow using 'font zoom' in the custom blog items
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
					'margin-top'      => '0.4em',
					'margin-bottom'   => '',
				),
				'menu'    => array(
					'title'           => esc_html__( 'Main menu', 'kargo' ),
					'description'     => esc_html__( 'Font settings of the main menu items', 'kargo' ),
					'font-family'     => '"SpartanMB",sans-serif',
					'font-size'       => '1.285rem',
					'font-weight'     => '400',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
				'submenu' => array(
					'title'           => esc_html__( 'Dropdown menu', 'kargo' ),
					'description'     => esc_html__( 'Font settings of the dropdown menu items', 'kargo' ),
					'font-family'     => '"SpartanMB",sans-serif',
					'font-size'       => '1.285rem',
					'font-weight'     => '300',
					'font-style'      => 'normal',
					'line-height'     => '1.5em',
					'text-decoration' => 'none',
					'text-transform'  => 'none',
					'letter-spacing'  => '0px',
				),
			)
		);

		// -----------------------------------------------------------------
		// -- Theme colors for customizer
		// -- Attention! Inner scheme must be last in the array below
		// -----------------------------------------------------------------
		kargo_storage_set(
			'scheme_color_groups', array(
				'main'    => array(
					'title'       => esc_html__( 'Main', 'kargo' ),
					'description' => esc_html__( 'Colors of the main content area', 'kargo' ),
				),
				'alter'   => array(
					'title'       => esc_html__( 'Alter', 'kargo' ),
					'description' => esc_html__( 'Colors of the alternative blocks (sidebars, etc.)', 'kargo' ),
				),
				'extra'   => array(
					'title'       => esc_html__( 'Extra', 'kargo' ),
					'description' => esc_html__( 'Colors of the extra blocks (dropdowns, price blocks, table headers, etc.)', 'kargo' ),
				),
				'inverse' => array(
					'title'       => esc_html__( 'Inverse', 'kargo' ),
					'description' => esc_html__( 'Colors of the inverse blocks - when link color used as background of the block (dropdowns, blockquotes, etc.)', 'kargo' ),
				),
				'input'   => array(
					'title'       => esc_html__( 'Input', 'kargo' ),
					'description' => esc_html__( 'Colors of the form fields (text field, textarea, select, etc.)', 'kargo' ),
				),
			)
		);
		kargo_storage_set(
			'scheme_color_names', array(
				'bg_color'    => array(
					'title'       => esc_html__( 'Background color', 'kargo' ),
					'description' => esc_html__( 'Background color of this block in the normal state', 'kargo' ),
				),
				'bg_hover'    => array(
					'title'       => esc_html__( 'Background hover', 'kargo' ),
					'description' => esc_html__( 'Background color of this block in the hovered state', 'kargo' ),
				),
				'bd_color'    => array(
					'title'       => esc_html__( 'Border color', 'kargo' ),
					'description' => esc_html__( 'Border color of this block in the normal state', 'kargo' ),
				),
				'bd_hover'    => array(
					'title'       => esc_html__( 'Border hover', 'kargo' ),
					'description' => esc_html__( 'Border color of this block in the hovered state', 'kargo' ),
				),
				'text'        => array(
					'title'       => esc_html__( 'Text', 'kargo' ),
					'description' => esc_html__( 'Color of the plain text inside this block', 'kargo' ),
				),
				'text_dark'   => array(
					'title'       => esc_html__( 'Text dark', 'kargo' ),
					'description' => esc_html__( 'Color of the dark text (bold, header, etc.) inside this block', 'kargo' ),
				),
				'text_light'  => array(
					'title'       => esc_html__( 'Text light', 'kargo' ),
					'description' => esc_html__( 'Color of the light text (post meta, etc.) inside this block', 'kargo' ),
				),
				'text_link'   => array(
					'title'       => esc_html__( 'Link', 'kargo' ),
					'description' => esc_html__( 'Color of the links inside this block', 'kargo' ),
				),
				'text_hover'  => array(
					'title'       => esc_html__( 'Link hover', 'kargo' ),
					'description' => esc_html__( 'Color of the hovered state of links inside this block', 'kargo' ),
				),
				'text_link2'  => array(
					'title'       => esc_html__( 'Link 2', 'kargo' ),
					'description' => esc_html__( 'Color of the accented texts (areas) inside this block', 'kargo' ),
				),
				'text_hover2' => array(
					'title'       => esc_html__( 'Link 2 hover', 'kargo' ),
					'description' => esc_html__( 'Color of the hovered state of accented texts (areas) inside this block', 'kargo' ),
				),
				'text_link3'  => array(
					'title'       => esc_html__( 'Link 3', 'kargo' ),
					'description' => esc_html__( 'Color of the other accented texts (buttons) inside this block', 'kargo' ),
				),
				'text_hover3' => array(
					'title'       => esc_html__( 'Link 3 hover', 'kargo' ),
					'description' => esc_html__( 'Color of the hovered state of other accented texts (buttons) inside this block', 'kargo' ),
				),
			)
		);
		kargo_storage_set(
			'schemes', array(

				// Color scheme: 'default'
				'default' => array(
					'title'    => esc_html__( 'Default', 'kargo' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => '#ffffff',
						'bd_color'         => '#eff2f4',

						// Text and links colors
						'text'             => sanitize_hex_color( '#6a6a6a' ),
						'text_light'       => sanitize_hex_color( '#a5aaad' ),
						'text_dark'        => sanitize_hex_color( '#161616' ),
						'text_link'        => sanitize_hex_color( '#ff371e' ),
						'text_hover'       => sanitize_hex_color( '#161616' ),
						'text_link2'       => sanitize_hex_color( '#00aff5' ),
						'text_hover2'      => sanitize_hex_color( '#161616' ),
						'text_link3'       => sanitize_hex_color( '#ff730c' ),
						'text_hover3'      => sanitize_hex_color( '#161616' ),

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => sanitize_hex_color( '#eff2f4' ),
						'alter_bg_hover'   => sanitize_hex_color( '#d8dcdf' ),
						'alter_bd_color'   => sanitize_hex_color( '#ffffff' ),
						'alter_bd_hover'   => sanitize_hex_color( '#eeeeee' ),
						'alter_text'       => sanitize_hex_color( '#6a6a6a' ),
						'alter_light'      => sanitize_hex_color( '#a5aaad' ),
						'alter_dark'       => sanitize_hex_color( '#161616' ),
						'alter_link'       => sanitize_hex_color( '#00aff5' ),
						'alter_hover'      => sanitize_hex_color( '#1f1f1f' ),
						'alter_link2'      => sanitize_hex_color( '#1d299b' ),
						'alter_hover2'     => sanitize_hex_color( '#e8ebee' ),
						'alter_link3'      => sanitize_hex_color( '#ff730c' ),
						'alter_hover3'     => sanitize_hex_color( '#979bca' ),

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => sanitize_hex_color( '#161616' ),
						'extra_bg_hover'   => sanitize_hex_color( '#ffffff' ),
						'extra_bd_color'   => sanitize_hex_color( '#292929' ),
						'extra_bd_hover'   => sanitize_hex_color( '#ffffff' ),
						'extra_text'       => sanitize_hex_color( '#717171' ),
						'extra_light'      => sanitize_hex_color( '#606060' ),
						'extra_dark'       => sanitize_hex_color( '#ffffff' ),
						'extra_link'       => sanitize_hex_color( '#00aff5' ),
						'extra_hover'      => sanitize_hex_color( '#6a6a6a' ),
						'extra_link2'      => sanitize_hex_color( '#00aff5' ),
						'extra_hover2'     => sanitize_hex_color( '#ff371e' ),
						'extra_link3'      => sanitize_hex_color( '#ff730c' ),
						'extra_hover3'     => sanitize_hex_color( '#1d299b' ),

						// Input fields (form's fields and textarea)
						'input_bg_color'   => sanitize_hex_color( '#ffffff' ),
						'input_bg_hover'   => sanitize_hex_color( '#ffffff' ),
						'input_bd_color'   => sanitize_hex_color( '#d8dcdf' ),
						'input_bd_hover'   => sanitize_hex_color( '#eff2f4' ),
						'input_text'       => sanitize_hex_color( '#838383' ),
						'input_light'      => sanitize_hex_color( '#a5aaad' ),
						'input_dark'       => sanitize_hex_color( '#1f1f1f' ),

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => sanitize_hex_color( '#3640a6' ),
						'inverse_bd_hover' => sanitize_hex_color( '#ffffff' ),
						'inverse_text'     => sanitize_hex_color( '#ffffff' ),
						'inverse_light'    => sanitize_hex_color( '#ffffff' ),
						'inverse_dark'     => sanitize_hex_color( '#ff6340' ),
						'inverse_link'     => sanitize_hex_color( '#ffffff' ),
						'inverse_hover'    => sanitize_hex_color( '#1d299b' ),
					),
				),

				// Color scheme: 'dark'
				'dark'    => array(
					'title'    => esc_html__( 'Dark', 'kargo' ),
					'internal' => true,
					'colors'   => array(

						// Whole block border and background
						'bg_color'         => sanitize_hex_color( '#1d299b' ),
						'bd_color'         => sanitize_hex_color( '#3640a6' ),

						// Text and links colors
						'text'             => sanitize_hex_color( '#979bca' ),
						'text_light'       => sanitize_hex_color( '#8184ac' ),
						'text_dark'        => sanitize_hex_color( '#ffffff' ),
						'text_link'        => sanitize_hex_color( '#00aff5' ),
						'text_hover'       => sanitize_hex_color( '#ffffff' ),
						'text_link2'       => sanitize_hex_color( '#00aff5' ),
						'text_hover2'      => sanitize_hex_color( '#161616' ),
						'text_link3'       => sanitize_hex_color( '#ffffff' ),
						'text_hover3'      => sanitize_hex_color( '#ffffff' ),

						// Alternative blocks (sidebar, tabs, alternative blocks, etc.)
						'alter_bg_color'   => sanitize_hex_color( '#161616' ),
						'alter_bg_hover'   => sanitize_hex_color( '#161615' ),
						'alter_bd_color'   => sanitize_hex_color( '#464646' ),
						'alter_bd_hover'   => sanitize_hex_color( '#444444' ),
						'alter_text'       => sanitize_hex_color( '#8a8a8a' ),
						'alter_light'      => sanitize_hex_color( '#6a6a6a' ),
						'alter_dark'       => sanitize_hex_color( '#ffffff' ),
						'alter_link'       => sanitize_hex_color( '#00aff5' ),
						'alter_hover'      => sanitize_hex_color( '#ffffff' ),
						'alter_link2'      => sanitize_hex_color( '#161616' ),
						'alter_hover2'     => sanitize_hex_color( '#e8ebee' ),
						'alter_link3'      => sanitize_hex_color( '#00aff5' ),
						'alter_hover3'     => sanitize_hex_color( '#6a6a6a' ),

						// Extra blocks (submenu, tabs, color blocks, etc.)
						'extra_bg_color'   => sanitize_hex_color( '#eff2f4' ),
						'extra_bg_hover'   => sanitize_hex_color( '#f3f5f7' ),
						'extra_bd_color'   => sanitize_hex_color( '#e5e5e5' ),
						'extra_bd_hover'   => sanitize_hex_color( '#ffffff' ),
						'extra_text'       => sanitize_hex_color( '#6a6a6a' ),
						'extra_light'      => sanitize_hex_color( '#838383' ),
						'extra_dark'       => sanitize_hex_color( '#474743' ),
						'extra_link'       => sanitize_hex_color( '#ff371e' ),
						'extra_hover'      => sanitize_hex_color( '#ffffff' ),
						'extra_link2'      => sanitize_hex_color( '#00aff5' ),
						'extra_hover2'     => sanitize_hex_color( '#ff371e' ),
						'extra_link3'      => sanitize_hex_color( '#ff730c' ),
						'extra_hover3'     => sanitize_hex_color( '#1d299b' ),

						// Input fields (form's fields and textarea)
						'input_bg_color'   => sanitize_hex_color( '#161616' ),
						'input_bg_hover'   => sanitize_hex_color( '#ffffff' ),
						'input_bd_color'   => sanitize_hex_color( '#313131' ),
						'input_bd_hover'   => sanitize_hex_color( '#3e3d41' ),
						'input_text'       => sanitize_hex_color( '#a5aaad' ),
						'input_light'      => sanitize_hex_color( '#ffffff' ),
						'input_dark'       => sanitize_hex_color( '#ffffff' ),

						// Inverse blocks (text and links on the 'text_link' background)
						'inverse_bd_color' => sanitize_hex_color( '#eff2f4' ),
						'inverse_bd_hover' => sanitize_hex_color( '#ffffff' ),
						'inverse_text'     => sanitize_hex_color( '#ffffff' ),
						'inverse_light'    => sanitize_hex_color( '#ffffff' ),
						'inverse_dark'     => sanitize_hex_color( '#ff371e' ),
						'inverse_link'     => sanitize_hex_color( '#ffffff' ),
						'inverse_hover'    => sanitize_hex_color( '#1d299b' ),
					),
				),

			)
		);

		kargo_storage_set( 'schemes_original', kargo_storage_get( 'schemes' ) );

		// Simple scheme editor: lists the colors to edit in the "Simple" mode.
		// For each color you can set the array of 'slave' colors and brightness factors that are used to generate new values,
		// when 'main' color is changed
		// Leave 'slave' arrays empty if your scheme does not have a color dependency
		kargo_storage_set(
			'schemes_simple', array(
				'text_link'        => array(
					'alter_hover'      => 1,
					'extra_link'       => 1,
					'inverse_bd_color' => 0.85,
					'inverse_bd_hover' => 0.7,
				),
				'text_hover'       => array(
					'alter_link'  => 1,
					'extra_hover' => 1,
				),
				'text_link2'       => array(
					'alter_hover2' => 1,
					'extra_link2'  => 1,
				),
				'text_hover2'      => array(
					'alter_link2'  => 1,
					'extra_hover2' => 1,
				),
				'text_link3'       => array(
					'alter_hover3' => 1,
					'extra_link3'  => 1,
				),
				'text_hover3'      => array(
					'alter_link3'  => 1,
					'extra_hover3' => 1,
				),
				'alter_link'       => array(),
				'alter_hover'      => array(),
				'alter_link2'      => array(),
				'alter_hover2'     => array(),
				'alter_link3'      => array(),
				'alter_hover3'     => array(),
				'extra_link'       => array(),
				'extra_hover'      => array(),
				'extra_link2'      => array(),
				'extra_hover2'     => array(),
				'extra_link3'      => array(),
				'extra_hover3'     => array(),
				'inverse_bd_color' => array(),
				'inverse_bd_hover' => array(),
			)
		);

		// Additional colors for each scheme
		// Parameters:	'color' - name of the color from the scheme that should be used as source for the transformation
		//				'alpha' - to make color transparent (0.0 - 1.0)
		//				'hue', 'saturation', 'brightness' - inc/dec value for each color's component
		kargo_storage_set(
			'scheme_colors_add', array(
				'bg_color_0'        => array(
					'color' => 'bg_color',
					'alpha' => 0,
				),
				'bg_color_02'       => array(
					'color' => 'bg_color',
					'alpha' => 0.2,
				),
				'bg_color_07'       => array(
					'color' => 'bg_color',
					'alpha' => 0.7,
				),
				'bg_color_08'       => array(
					'color' => 'bg_color',
					'alpha' => 0.8,
				),
				'bg_color_09'       => array(
					'color' => 'bg_color',
					'alpha' => 0.9,
				),
				'alter_bg_color_07' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.7,
				),
				'alter_bg_color_04' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.4,
				),
				'alter_bg_color_02' => array(
					'color' => 'alter_bg_color',
					'alpha' => 0.2,
				),
				'alter_bd_color_02' => array(
					'color' => 'alter_bd_color',
					'alpha' => 0.2,
				),
				'alter_link_02'     => array(
					'color' => 'alter_link',
					'alpha' => 0.2,
				),
				'alter_link_07'     => array(
					'color' => 'alter_link',
					'alpha' => 0.7,
				),
				'extra_bg_color_07' => array(
					'color' => 'extra_bg_color',
					'alpha' => 0.7,
				),
				'extra_link_02'     => array(
					'color' => 'extra_link',
					'alpha' => 0.2,
				),
				'extra_link_07'     => array(
					'color' => 'extra_link',
					'alpha' => 0.7,
				),
				'text_dark_07'      => array(
					'color' => 'text_dark',
					'alpha' => 0.7,
				),
				'text_link_02'      => array(
					'color' => 'text_link',
					'alpha' => 0.2,
				),
				'text_link_07'      => array(
					'color' => 'text_link',
					'alpha' => 0.7,
				),
				'text_hover2_07'      => array(
					'color' => 'text_hover2',
					'alpha' => 0.7,
				),
				'text_link_blend'   => array(
					'color'      => 'text_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'alter_link_blend'  => array(
					'color'      => 'alter_link',
					'hue'        => 2,
					'saturation' => -5,
					'brightness' => 5,
				),
				'inverse_link_02'     => array(
					'color' => 'inverse_link',
					'alpha' => 0.2,
				),
			)
		);

		// Parameters to set order of schemes in the css
		kargo_storage_set(
			'schemes_sorted', array(
				'color_scheme',
				'header_scheme',
				'sidebar_scheme',
				'footer_scheme',
			)
		);

		// -----------------------------------------------------------------
		// -- Theme specific thumb sizes
		// -----------------------------------------------------------------
		kargo_storage_set(
			'theme_thumbs', apply_filters(
				'kargo_filter_add_thumb_sizes', array(
					// Width of the image is equal to the content area width (without sidebar)
					// Height is fixed
					'kargo-thumb-huge'        => array(
						'size'  => array( 1170, 658, true ),
						'title' => esc_html__( 'Huge image', 'kargo' ),
						'subst' => 'trx_addons-thumb-huge',
					),
					// Width of the image is equal to the content area width (with sidebar)
					// Height is fixed
					'kargo-thumb-big'         => array(
						'size'  => array( 800, 452, true ),
						'title' => esc_html__( 'Large image', 'kargo' ),
						'subst' => 'trx_addons-thumb-big',
					),

					// Width of the image is equal to the 1/3 of the content area width (without sidebar)
					// Height is fixed
					'kargo-thumb-med'         => array(
						'size'  => array( 370, 208, true ),
						'title' => esc_html__( 'Medium image', 'kargo' ),
						'subst' => 'trx_addons-thumb-medium',
					),

					// Small square image (for avatars in comments, etc.)
					'kargo-thumb-tiny'        => array(
						'size'  => array( 300, 180, true ),
						'title' => esc_html__( 'Small square avatar', 'kargo' ),
						'subst' => 'trx_addons-thumb-tiny',
					),
					'kargo-thumb-testimonial'        => array(
						'size'  => array( 300, 300, true ),
						'title' => esc_html__( 'Small square avatar', 'kargo' ),
						'subst' => 'trx_addons-thumb-testimonial',
					),

					// Width of the image is equal to the content area width (with sidebar)
					// Height is proportional (only downscale, not crop)
					'kargo-thumb-masonry-big' => array(
						'size'  => array( 760, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry Large (scaled)', 'kargo' ),
						'subst' => 'trx_addons-thumb-masonry-big',
					),

					// Width of the image is equal to the 1/3 of the full content area width (without sidebar)
					// Height is proportional (only downscale, not crop)
					'kargo-thumb-masonry'     => array(
						'size'  => array( 370, 0, false ),     // Only downscale, not crop
						'title' => esc_html__( 'Masonry (scaled)', 'kargo' ),
						'subst' => 'trx_addons-thumb-masonry',
					),
				)
			)
		);
	}
}




//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'kargo_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'kargo_importer_set_options', 9 );
	function kargo_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Save or not installer's messages to the log-file
			$options['debug'] = false;

			if ( kargo_storage_isset( 'required_plugins', 'sitepress-multilingual-cms' ) && kargo_exists_wpml() ) {
				$wpml_slug =  '-wpml';
			} else {
				$wpml_slug = '';
			}


			// Allow import/export functionality
			$options['allow_import'] = true;
			$options['allow_export'] = false;
			// Prepare demo data
			$options['demo_url'] = esc_url( kargo_get_protocol() . '://demofiles.axiomthemes.com/kargo' . $wpml_slug );
			// Required plugins
			$options['required_plugins'] = array_keys( (array)kargo_storage_get( 'required_plugins' ) );
			// Set number of thumbnails (usually 3 - 5) to regenerate at once when its imported (if demo data was zipped without cropped images)
			// Set 0 to prevent regenerate thumbnails (if demo data archive is already contain cropped images)
			$options['regenerate_thumbnails'] = 0;
			// Default demo
			$options['files']['default']['title']       = esc_html__( 'Kargo Demo', 'kargo' );
			$options['files']['default']['domain_dev']  = esc_url( kargo_get_protocol() . '://kargo.axiomthemes.com' );       // Developers domain
			$options['files']['default']['domain_demo'] = (kargo_storage_isset( 'required_plugins', 'sitepress-multilingual-cms' ) && kargo_exists_wpml())
				? esc_url( kargo_get_protocol() . '://kargo.themerex.net' )
				: esc_url( kargo_get_protocol() . '://kargo.themerex.net' );       // //kargo.axiomthemes.com Demo-site domain
			// If theme need more demo - just copy 'default' and change required parameter
		}
		return $options;
	}
}


//------------------------------------------------------------------------
// OCDI support
//------------------------------------------------------------------------

// Set theme specific OCDI options
if ( ! function_exists( 'kargo_ocdi_set_options' ) ) {
	add_filter( 'trx_addons_filter_ocdi_options', 'kargo_ocdi_set_options', 9 );
	function kargo_ocdi_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			// Prepare demo data
			$options['demo_url'] = esc_url( kargo_get_protocol() . '://demofiles.axiomthemes.com/kargo/' );
			// Required plugins
			$options['required_plugins'] = array_keys( kargo_storage_get( 'required_plugins' ) );
			// Demo-site domain
			$options['files']['ocdi']['title']       = esc_html__( 'Kargo OCDI Demo', 'kargo' );
			$options['files']['ocdi']['domain_demo'] = esc_url( 'http://kargo.dv.themerex.net' );
			// If theme need more demo - just copy 'default' and change required parameter
		}
		return $options;
	}
}


// -----------------------------------------------------------------
// -- Theme options for customizer
// -----------------------------------------------------------------
if ( ! function_exists( 'kargo_create_theme_options' ) ) {

	function kargo_create_theme_options() {

		// Message about options override.
		// Attention! Not need esc_html() here, because this message put in wp_kses_data() below
		$msg_override = __( 'Attention! Some of these options can be overridden in the following sections (Blog, Plugins settings, etc.) or in the settings of individual pages. If you changed such parameter and nothing happened on the page, this option may be overridden in the corresponding section or in the Page Options of this page. These options are marked with an asterisk (*) in the title.', 'kargo' );

		// Color schemes number: if < 2 - hide fields with selectors
		$hide_schemes = count( kargo_storage_get( 'schemes' ) ) < 2;

		kargo_storage_set(
			'options', array(

				// 'Logo & Site Identity'
				'title_tagline'                 => array(
					'title'    => esc_html__( 'Logo & Site Identity', 'kargo' ),
					'desc'     => '',
					'priority' => 10,
					'type'     => 'section',
				),
				'logo_info'                     => array(
					'title'    => esc_html__( 'Logo Settings', 'kargo' ),
					'desc'     => '',
					'priority' => 20,
					'qsetup'   => esc_html__( 'General', 'kargo' ),
					'type'     => 'info',
				),
				'logo_text'                     => array(
					'title'    => esc_html__( 'Use Site Name as Logo', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Use the site title and tagline as a text logo if no image is selected', 'kargo' ) ),
					'class'    => 'kargo_column-1_2 kargo_new_row',
					'priority' => 30,
					'std'      => 1,
					'qsetup'   => esc_html__( 'General', 'kargo' ),
					'type'     => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_retina_enabled'           => array(
					'title'    => esc_html__( 'Allow retina display logo', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Show fields to select logo images for Retina display', 'kargo' ) ),
					'class'    => 'kargo_column-1_2',
					'priority' => 40,
					'refresh'  => false,
					'std'      => 0,
					'type'     => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'logo_zoom'                     => array(
					'title'   => esc_html__( 'Logo zoom', 'kargo' ),
					'desc'    => wp_kses(
									__( 'Zoom the logo (set 1 to leave original size).', 'kargo' )
									. ' <br>'
									. __( 'Attention! For this parameter to affect images, their max-height should be specified in "em" instead of "px" when creating a header.', 'kargo' )
									. ' <br>'
									. __( 'In this case maximum size of logo depends on the actual size of the picture.', 'kargo' ),
									'kargo_kses_content' ),
					'std'     => 1,
					'min'     => 0.2,
					'max'     => 2,
					'step'    => 0.1,
					'refresh' => false,
					'type'    => KARGO_THEME_FREE ? 'hidden' : 'slider',
				),
				// Parameter 'logo' was replaced with standard WordPress 'custom_logo'
				'logo_retina'                   => array(
					'title'      => esc_html__( 'Logo for Retina', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'kargo' ) ),
					'class'      => 'kargo_column-1_2',
					'priority'   => 70,
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile_header'            => array(
					'title' => esc_html__( 'Logo for the mobile header', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile header (if enabled in the section "Header - Header mobile"', 'kargo' ) ),
					'class' => 'kargo_column-1_2 kargo_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_header_retina'     => array(
					'title'      => esc_html__( 'Logo for the mobile header on Retina', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'kargo' ) ),
					'class'      => 'kargo_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'image',
				),
				'logo_mobile'                   => array(
					'title' => esc_html__( 'Logo for the mobile menu', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Select or upload site logo to display it in the mobile menu', 'kargo' ) ),
					'class' => 'kargo_column-1_2 kargo_new_row',
					'std'   => '',
					'type'  => 'image',
				),
				'logo_mobile_retina'            => array(
					'title'      => esc_html__( 'Logo mobile on Retina', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo used on Retina displays (if empty - use default logo from the field above)', 'kargo' ) ),
					'class'      => 'kargo_column-1_2',
					'dependency' => array(
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'image',
				),

				// 'General settings'
				'general'                       => array(
					'title'    => esc_html__( 'General Settings', 'kargo' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 20,
					'type'     => 'section',
				),

				'general_layout_info'           => array(
					'title'  => esc_html__( 'Layout', 'kargo' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'kargo' ),
					'type'   => 'info',
				),
				'body_style'                    => array(
					'title'    => esc_html__( 'Body style', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select width of the body content', 'kargo' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'qsetup'   => esc_html__( 'General', 'kargo' ),
					'refresh'  => false,
					'std'      => 'wide',
					'options'  => kargo_get_list_body_styles( false ),
					'type'     => 'select',
				),
				'page_width'                    => array(
					'title'      => esc_html__( 'Page width', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Total width of the site content and sidebar (in pixels). If empty - use default width', 'kargo' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed', 'wide' ),
					),
					'std'        => 1230,
					'min'        => 1000,
					'max'        => 1400,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'page',         // SASS variable's name to preview changes 'on fly'
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'slider',
				),
				'boxed_bg_image'                => array(
					'title'      => esc_html__( 'Boxed bg image', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'kargo' ) ),
					'dependency' => array(
						'body_style' => array( 'boxed' ),
					),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'std'        => '',
					'qsetup'     => esc_html__( 'General', 'kargo' ),
					'type'       => 'image',
				),
				'remove_margins'                => array(
					'title'    => esc_html__( 'Remove margins', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Remove margins above and below the content area', 'kargo' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'refresh'  => false,
					'std'      => 0,
					'type'     => 'checkbox',
				),

				'general_sidebar_info'          => array(
					'title' => esc_html__( 'Sidebar', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position'              => array(
					'title'    => esc_html__( 'Sidebar position', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar', 'kargo' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_single'
						'section' => esc_html__( 'Widgets', 'kargo' ),
					),
					'std'      => 'right',
					'qsetup'   => esc_html__( 'General', 'kargo' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_position_mobile'       => array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices - above or below the content', 'kargo' ) ),
					'override' => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_position_mobile_single'
						'section' => esc_html__( 'Widgets', 'kargo' ),
					),
					'dependency' => array(
						'sidebar_position' => array( '^hide' ),
					),
					'std'      => 'below',
					'qsetup'   => esc_html__( 'General', 'kargo' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets'               => array(
					'title'      => esc_html__( 'Sidebar widgets', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page',		// Override parameters for single posts moved to the 'sidebar_widgets_single'
						'section' => esc_html__( 'Widgets', 'kargo' ),
					),
					'dependency' => array(
						'sidebar_position' => array( 'left', 'right' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'kargo' ),
					'type'       => 'select',
				),
				'sidebar_width'                 => array(
					'title'      => esc_html__( 'Sidebar width', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Width of the sidebar (in pixels). If empty - use default width', 'kargo' ) ),
					'std'        => 390,
					'min'        => 150,
					'max'        => 500,
					'step'       => 10,
					'refresh'    => false,
					'customizer' => 'sidebar',      // SASS variable's name to preview changes 'on fly'
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'slider',
				),
				'sidebar_gap'                   => array(
					'title'      => esc_html__( 'Sidebar gap', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Gap between content and sidebar (in pixels). If empty - use default gap', 'kargo' ) ),
					'std'        => 40,
					'min'        => 0,
					'max'        => 100,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'gap',          // SASS variable's name to preview changes 'on fly'
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'slider',
				),
				'expand_content'                => array(
					'title'   => esc_html__( 'Expand content', 'kargo' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'kargo' ) ),
					'refresh' => false,
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kargo' ),
					),
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'general_effects_info'          => array(
					'title' => esc_html__( 'Design & Effects', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'border_radius'                 => array(
					'title'      => esc_html__( 'Border radius', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Specify the border radius of the form fields and buttons in pixels', 'kargo' ) ),
					'std'        => 0,
					'min'        => 0,
					'max'        => 20,
					'step'       => 1,
					'refresh'    => false,
					'customizer' => 'rad',      // SASS name to preview changes 'on fly'
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'slider',
				),

				'general_misc_info'             => array(
					'title' => esc_html__( 'Miscellaneous', 'kargo' ),
					'desc'  => '',
					'type'  => KARGO_THEME_FREE ? 'hidden' : 'info',
				),
				'seo_snippets'                  => array(
					'title' => esc_html__( 'SEO snippets', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Add structured data markup to the single posts and pages', 'kargo' ) ),
					'std'   => 0,
					'type'  => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				// 'Header'
				'header'                        => array(
					'title'    => esc_html__( 'Header', 'kargo' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 30,
					'type'     => 'section',
				),

				'header_style_info'             => array(
					'title' => esc_html__( 'Header style', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type'                   => array(
					'title'    => esc_html__( 'Header style', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'kargo' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kargo' ),
					),
					'std'      => 'default',
					'options'  => kargo_get_list_header_footer_types(),
					'type'     => KARGO_THEME_FREE || ! kargo_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'kargo' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'kargo' ), 'kargo_kses_content' ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kargo' ),
					),
					'dependency' => array(
						'header_type' => array( 'custom' ),
					),
					'std'        => KARGO_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position'               => array(
					'title'    => esc_html__( 'Header position', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'kargo' ) ),
					'override' => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kargo' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'type'     => KARGO_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_wide'                   => array(
					'title'      => esc_html__( 'Header fullwidth', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page,post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kargo' ),
					),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'menu_info'                     => array(
					'title' => esc_html__( 'Main menu', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Select main menu style, position and other parameters', 'kargo' ) ),
					'type'  => KARGO_THEME_FREE ? 'hidden' : 'info',
				),
				'menu_style'                    => array(
					'title'    => esc_html__( 'Menu position', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select position of the main menu', 'kargo' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kargo' ),
					),
					'std'      => 'top',
					'options'  => array(
						'top'   => esc_html__( 'Top', 'kargo' ),
					),
					'type'     => KARGO_THEME_FREE || ! kargo_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'menu_side_stretch'             => array(
					'title'      => esc_html__( 'Stretch sidemenu', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Stretch sidemenu to window height (if menu items number >= 5)', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kargo' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 0,
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_side_icons'               => array(
					'title'      => esc_html__( 'Iconed sidemenu', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Get icons from anchors and display it in the sidemenu or mark sidemenu items with simple dots', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Header', 'kargo' ),
					),
					'dependency' => array(
						'menu_style' => array( 'left', 'right' ),
					),
					'std'        => 1,
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'menu_mobile_fullscreen'        => array(
					'title' => esc_html__( 'Mobile menu fullscreen', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Display mobile and side menus on full screen (if checked) or slide narrow menu from the left or from the right side (if not checked)', 'kargo' ) ),
					'std'   => 1,
					'type'  => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'header_mobile_info'            => array(
					'title'      => esc_html__( 'Mobile header', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Configure the mobile version of the header', 'kargo' ) ),
					'priority'   => 500,
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'info',
				),
				'header_mobile_enabled'         => array(
					'title'      => esc_html__( 'Enable the mobile header', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Use the mobile version of the header (if checked) or relayout the current header on mobile devices', 'kargo' ) ),
					'dependency' => array(
						'header_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_additional_info' => array(
					'title'      => esc_html__( 'Additional info', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Additional info to show at the top of the mobile header', 'kargo' ) ),
					'std'        => '',
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'refresh'    => false,
					'teeny'      => false,
					'rows'       => 20,
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'text_editor',
				),
				'header_mobile_hide_info'       => array(
					'title'      => esc_html__( 'Hide additional info', 'kargo' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_logo'       => array(
					'title'      => esc_html__( 'Hide logo', 'kargo' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_login'      => array(
					'title'      => esc_html__( 'Hide login/logout', 'kargo' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_search'     => array(
					'title'      => esc_html__( 'Hide search', 'kargo' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_mobile_hide_cart'       => array(
					'title'      => esc_html__( 'Hide cart', 'kargo' ),
					'std'        => 0,
					'dependency' => array(
						'header_type'           => array( 'default' ),
						'header_mobile_enabled' => array( 1 ),
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				// 'Footer'
				'footer'                        => array(
					'title'    => esc_html__( 'Footer', 'kargo' ),
					'desc'     => wp_kses_data( $msg_override ),
					'priority' => 50,
					'type'     => 'section',
				),
				'footer_type'                   => array(
					'title'    => esc_html__( 'Footer style', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'kargo' ) ),
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'kargo' ),
					),
					'std'      => 'default',
					'options'  => kargo_get_list_header_footer_types(),
					'type'     => KARGO_THEME_FREE || ! kargo_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'footer_style'                  => array(
					'title'      => esc_html__( 'Select custom layout', 'kargo' ),
					'desc'       => wp_kses( __( 'Select custom footer from Layouts Builder', 'kargo' ), 'kargo_kses_content' ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'kargo' ),
					),
					'dependency' => array(
						'footer_type' => array( 'custom' ),
					),
					'std'        => KARGO_THEME_FREE ? 'footer-custom-elementor-footer-default' : 'footer-custom-footer-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_widgets'                => array(
					'title'      => esc_html__( 'Footer widgets', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select set of widgets to show in the footer', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'kargo' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 'footer_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'footer_columns'                => array(
					'title'      => esc_html__( 'Footer columns', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'kargo' ),
					),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'footer_widgets' => array( '^hide' ),
					),
					'std'        => 0,
					'options'    => kargo_get_list_range( 0, 6 ),
					'type'       => 'select',
				),
				'footer_wide'                   => array(
					'title'      => esc_html__( 'Footer fullwidth', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the footer to the entire window width?', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Footer', 'kargo' ),
					),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_in_footer'                => array(
					'title'      => esc_html__( 'Show logo', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Show logo in the footer', 'kargo' ) ),
					'refresh'    => false,
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'logo_footer'                   => array(
					'title'      => esc_html__( 'Logo for footer', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select or upload site logo to display it in the footer', 'kargo' ) ),
					'dependency' => array(
						'footer_type'    => array( 'default' ),
						'logo_in_footer' => array( 1 ),
					),
					'std'        => '',
					'type'       => 'image',
				),
				'logo_footer_retina'            => array(
					'title'      => esc_html__( 'Logo for footer (Retina)', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select or upload logo for the footer area used on Retina displays (if empty - use default logo from the field above)', 'kargo' ) ),
					'dependency' => array(
						'footer_type'         => array( 'default' ),
						'logo_in_footer'      => array( 1 ),
						'logo_retina_enabled' => array( 1 ),
					),
					'std'        => '',
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'image',
				),
				'socials_in_footer'             => array(
					'title'      => esc_html__( 'Show social icons', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Show social icons in the footer (under logo or footer widgets)', 'kargo' ) ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'std'        => 0,
					'type'       => ! kargo_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'copyright'                     => array(
					'title'      => esc_html__( 'Copyright', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Copyright text in the footer. Use {Y} to insert current year and press "Enter" to create a new line', 'kargo' ) ),
					'translate'  => true,
					'std'        => esc_html__( 'Copyright &copy; {Y} by AxiomThemes. All rights reserved.', 'kargo' ),
					'dependency' => array(
						'footer_type' => array( 'default' ),
					),
					'refresh'    => false,
					'type'       => 'textarea',
				),

				// 'Blog'
				'blog'                          => array(
					'title'    => esc_html__( 'Blog', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Options of the the blog archive', 'kargo' ) ),
					'priority' => 70,
					'type'     => 'panel',
				),

				// Blog - Posts page
				'blog_general'                  => array(
					'title' => esc_html__( 'Posts page', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Style and components of the blog archive', 'kargo' ) ),
					'type'  => 'section',
				),
				'blog_general_info'             => array(
					'title'  => esc_html__( 'Posts page settings', 'kargo' ),
					'desc'   => '',
					'qsetup' => esc_html__( 'General', 'kargo' ),
					'type'   => 'info',
				),
				'blog_style'                    => array(
					'title'      => esc_html__( 'Blog style', 'kargo' ),
					'desc'       => '',
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'excerpt',
					'qsetup'     => esc_html__( 'General', 'kargo' ),
					'options'    => array(),
					'type'       => 'select',
				),
				'first_post_large'              => array(
					'title'      => esc_html__( 'First post large', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Make your first post stand out by making it bigger', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style' => array( 'classic', 'masonry' ),
					),
					'std'        => 0,
					'type'       => 'checkbox',
				),
				'blog_content'                  => array(
					'title'      => esc_html__( 'Posts content', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Display either post excerpts or the full post content', 'kargo' ) ),
					'std'        => 'excerpt',
					'dependency' => array(
						'blog_style' => array( 'excerpt' ),
					),
					'options'    => array(
						'excerpt'  => esc_html__( 'Excerpt', 'kargo' ),
						'fullpost' => esc_html__( 'Full post', 'kargo' ),
					),
					'type'       => 'switch',
				),
				'excerpt_length'                => array(
					'title'      => esc_html__( 'Excerpt length', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Length (in words) to generate excerpt from the post content. Attention! If the post excerpt is explicitly specified - it appears unchanged', 'kargo' ) ),
					'dependency' => array(
						'blog_style'   => array( 'excerpt' ),
						'blog_content' => array( 'excerpt' ),
					),
					'std'        => 60,
					'type'       => 'text',
				),
				'blog_columns'                  => array(
					'title'   => esc_html__( 'Blog columns', 'kargo' ),
					'desc'    => wp_kses_data( __( 'How many columns should be used in the blog archive (from 2 to 4)?', 'kargo' ) ),
					'std'     => 2,
					'options' => kargo_get_list_range( 2, 4 ),
					'type'    => 'hidden',      // This options is available and must be overriden only for some modes (for example, 'shop')
				),
				'post_type'                     => array(
					'title'      => esc_html__( 'Post type', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select post type to show in the blog archive', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'linked'     => 'parent_cat',
					'refresh'    => false,
					'hidden'     => true,
					'std'        => 'post',
					'options'    => array(),
					'type'       => 'select',
				),
				'parent_cat'                    => array(
					'title'      => esc_html__( 'Category to show', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select category to show in the blog archive', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'refresh'    => false,
					'hidden'     => true,
					'std'        => '0',
					'options'    => array(),
					'type'       => 'select',
				),
				'posts_per_page'                => array(
					'title'      => esc_html__( 'Posts per page', 'kargo' ),
					'desc'       => wp_kses_data( __( 'How many posts will be displayed on this page', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'hidden'     => true,
					'std'        => '',
					'type'       => 'text',
				),
				'blog_pagination'               => array(
					'title'      => esc_html__( 'Pagination style', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Show Older/Newest posts or Page numbers below the posts list', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'std'        => 'pages',
					'qsetup'     => esc_html__( 'General', 'kargo' ),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'options'    => array(
						'pages'    => esc_html__( 'Page numbers', 'kargo' ),
						'links'    => esc_html__( 'Older/Newest', 'kargo' ),
						'more'     => esc_html__( 'Load more', 'kargo' ),
						'infinite' => esc_html__( 'Infinite scroll', 'kargo' ),
					),
					'type'       => 'select',
				),
				'blog_animation'                => array(
					'title'      => esc_html__( 'Animation for the posts', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select animation to show posts in the blog. Attention! Do not use any animation on pages with the "wheel to the anchor" behaviour (like a "Chess 2 columns")!', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'std'        => 'none',
					'options'    => array(),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'select',
				),
				'show_filters'                  => array(
					'title'      => esc_html__( 'Show filters', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Show categories as tabs to filter posts', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
						'blog_style'     => array( 'portfolio', 'gallery' ),
					),
					'hidden'     => true,
					'std'        => 0,
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_header_info'              => array(
					'title' => esc_html__( 'Header', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_blog'              => array(
					'title'    => esc_html__( 'Header style', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'kargo' ) ),
					'std'      => 'inherit',
					'options'  => kargo_get_list_header_footer_types( true ),
					'type'     => KARGO_THEME_FREE || ! kargo_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_blog'             => array(
					'title'      => esc_html__( 'Select custom layout', 'kargo' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'kargo' ), 'kargo_kses_content' ),
					'dependency' => array(
						'header_type_blog' => array( 'custom' ),
					),
					'std'        => KARGO_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_blog'          => array(
					'title'    => esc_html__( 'Header position', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'kargo' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => KARGO_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_blog'        => array(
					'title'    => esc_html__( 'Header fullheight', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'kargo' ) ),
					'std'      => 0,
					'type'     => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_wide_blog'              => array(
					'title'      => esc_html__( 'Header fullwidth', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'kargo' ) ),
					'dependency' => array(
						'header_type_blog' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_sidebar_info'             => array(
					'title' => esc_html__( 'Sidebar', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_blog'         => array(
					'title'   => esc_html__( 'Sidebar position', 'kargo' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar', 'kargo' ) ),
					'std'     => 'inherit',
					'options' => array(),
					'qsetup'     => esc_html__( 'General', 'kargo' ),
					'type'    => 'switch',
				),
				'sidebar_position_mobile_blog'  => array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on mobile devices - above or below the content', 'kargo' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'      => 'inherit',
					'qsetup'   => esc_html__( 'General', 'kargo' ),
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_blog'          => array(
					'title'      => esc_html__( 'Sidebar widgets', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar', 'kargo' ) ),
					'dependency' => array(
						'sidebar_position_blog' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'qsetup'     => esc_html__( 'General', 'kargo' ),
					'type'       => 'select',
				),
				'expand_content_blog'           => array(
					'title'   => esc_html__( 'Expand content', 'kargo' ),
					'desc'    => wp_kses_data( __( 'Expand the content width if the sidebar is hidden', 'kargo' ) ),
					'refresh' => false,
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'blog_advanced_info'            => array(
					'title' => esc_html__( 'Advanced settings', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'no_image'                      => array(
					'title' => esc_html__( 'Image placeholder', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Select or upload an image used as placeholder for posts without a featured image', 'kargo' ) ),
					'std'   => '',
					'type'  => 'image',
				),
				'time_diff_before'              => array(
					'title' => esc_html__( 'Easy Readable Date Format', 'kargo' ),
					'desc'  => wp_kses_data( __( "For how many days to show the easy-readable date format (e.g. '3 days ago') instead of the standard publication date", 'kargo' ) ),
					'std'   => 5,
					'type'  => 'text',
				),
				'sticky_style'                  => array(
					'title'   => esc_html__( 'Sticky posts style', 'kargo' ),
					'desc'    => wp_kses_data( __( 'Select style of the sticky posts output', 'kargo' ) ),
					'std'     => 'inherit',
					'options' => array(
						'inherit' => esc_html__( 'Decorated posts', 'kargo' ),
					),
					'type'    => KARGO_THEME_FREE ? 'hidden' : 'select',
				),
				'meta_parts'                    => array(
					'title'      => esc_html__( 'Post meta', 'kargo' ),
					'desc'       => wp_kses_data( __( "If your blog page is created using the 'Blog archive' page template, set up the 'Post Meta' settings in the 'Theme Options' section of that page. Post counters and Share Links are available only if plugin ThemeREX Addons is active", 'kargo' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|counters=0|author=0|share=0|edit=0',
					'options'    => kargo_get_list_meta_parts(),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checklist',
				),
				'counters'                      => array(
					'title'      => esc_html__( 'Post counters', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Show only selected counters. Attention! Likes and Views are available only if ThemeREX Addons is active', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'compare' => 'or',
						'#page_template' => array( 'blog.php' ),
						'.editor-page-attributes__template select' => array( 'blog.php' ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'views=0|likes=0|comments=0',
					'options'    => kargo_get_list_counters(),
					'type'       => KARGO_THEME_FREE || ! kargo_exists_trx_addons() ? 'hidden' : 'checklist',
				),

				// Blog - Single posts
				'blog_single'                   => array(
					'title' => esc_html__( 'Single posts', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Settings of the single post', 'kargo' ) ),
					'type'  => 'section',
				),

				'blog_single_header_info'       => array(
					'title' => esc_html__( 'Header', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'header_type_post'              => array(
					'title'    => esc_html__( 'Header style', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'kargo' ) ),
					'std'      => 'inherit',
					'options'  => kargo_get_list_header_footer_types( true ),
					'type'     => KARGO_THEME_FREE || ! kargo_exists_trx_addons() ? 'hidden' : 'switch',
				),
				'header_style_post'             => array(
					'title'      => esc_html__( 'Select custom layout', 'kargo' ),
					'desc'       => wp_kses( __( 'Select custom header from Layouts Builder', 'kargo' ), 'kargo_kses_content' ),
					'dependency' => array(
						'header_type_post' => array( 'custom' ),
					),
					'std'        => KARGO_THEME_FREE ? 'header-custom-elementor-header-default' : 'header-custom-header-default',
					'options'    => array(),
					'type'       => 'select',
				),
				'header_position_post'          => array(
					'title'    => esc_html__( 'Header position', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select position to display the site header', 'kargo' ) ),
					'std'      => 'inherit',
					'options'  => array(),
					'type'     => KARGO_THEME_FREE ? 'hidden' : 'switch',
				),
				'header_fullheight_post'        => array(
					'title'    => esc_html__( 'Header fullheight', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Enlarge header area to fill whole screen. Used only if header have a background image', 'kargo' ) ),
					'std'      => 0,
					'type'     => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'header_wide_post'              => array(
					'title'      => esc_html__( 'Header fullwidth', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Do you want to stretch the header widgets area to the entire window width?', 'kargo' ) ),
					'dependency' => array(
						'header_type_post' => array( 'default' ),
					),
					'std'        => 1,
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),

				'blog_single_sidebar_info'      => array(
					'title' => esc_html__( 'Sidebar', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'sidebar_position_single'       => array(
					'title'   => esc_html__( 'Sidebar position', 'kargo' ),
					'desc'    => wp_kses_data( __( 'Select position to show sidebar on the single posts', 'kargo' ) ),
					'std'     => 'right',
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kargo' ),
					),
					'options' => array(),
					'type'    => 'switch',
				),
				'sidebar_position_mobile_single'=> array(
					'title'    => esc_html__( 'Sidebar position on mobile', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select position to show sidebar on the single posts on mobile devices - above or below the content', 'kargo' ) ),
					'override' => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kargo' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'      => 'below',
					'options'  => array(),
					'type'     => 'switch',
				),
				'sidebar_widgets_single'        => array(
					'title'      => esc_html__( 'Sidebar widgets', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select default widgets to show in the sidebar on the single posts', 'kargo' ) ),
					'override'   => array(
						'mode'    => 'post,product,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Widgets', 'kargo' ),
					),
					'dependency' => array(
						'sidebar_position_single' => array( '^hide' ),
					),
					'std'        => 'sidebar_widgets',
					'options'    => array(),
					'type'       => 'select',
				),
				'expand_content_post'           => array(
					'title'   => esc_html__( 'Expand content', 'kargo' ),
					'desc'    => wp_kses_data( __( 'Expand the content width on the single posts if the sidebar is hidden', 'kargo' ) ),
					'refresh' => false,
					'std'     => 1,
					'type'    => 'checkbox',
				),

				'blog_single_title_info'      => array(
					'title' => esc_html__( 'Featured image and title', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'hide_featured_on_single'       => array(
					'title'    => esc_html__( 'Hide featured image on the single post', 'kargo' ),
					'desc'     => wp_kses_data( __( "Hide featured image on the single post's pages", 'kargo' ) ),
					'override' => array(
						'mode'    => 'page,post',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'std'      => 0,
					'type'     => 'checkbox',
				),
				'post_thumbnail_type'      => array(
					'title'      => esc_html__( 'Type of post thumbnail', 'kargo' ),
					'desc'       => wp_kses_data( __( "Select type of post thumbnail on the single post's pages", 'kargo' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 ),
					),
					'std'        => 'default',
					'options'    => array(
						'boxed'       => esc_html__( 'Boxed', 'kargo' ),
						'default'     => esc_html__( 'Default', 'kargo' ),
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_position'          => array(
					'title'      => esc_html__( 'Post header position', 'kargo' ),
					'desc'       => wp_kses_data( __( "Select post header position on the single post's pages", 'kargo' ) ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'hide_featured_on_single' => array( 'is_empty', 0 ),
					),
					'std'        => 'under',
					'options'    => array(
						'above'      => esc_html__( 'Above the post thumbnail', 'kargo' ),
						'under'      => esc_html__( 'Under the post thumbnail', 'kargo' ),
						'on_thumb'   => esc_html__( 'On the post thumbnail', 'kargo' ),
						'default'    => esc_html__( 'Default', 'kargo' ),
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'select',
				),
				'post_header_align'             => array(
					'title'      => esc_html__( 'Align of the post header', 'kargo' ),
					'override'   => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'dependency' => array(
						'post_header_position' => array( 'on_thumb' ),
					),
					'std'        => 'mc',
					'options'    => array(
						'ts' => esc_html__('Top Stick Out', 'kargo'),
						'tl' => esc_html__('Top Left', 'kargo'),
						'tc' => esc_html__('Top Center', 'kargo'),
						'tr' => esc_html__('Top Right', 'kargo'),
						'ml' => esc_html__('Middle Left', 'kargo'),
						'mc' => esc_html__('Middle Center', 'kargo'),
						'mr' => esc_html__('Middle Right', 'kargo'),
						'bl' => esc_html__('Bottom Left', 'kargo'),
						'bc' => esc_html__('Bottom Center', 'kargo'),
						'br' => esc_html__('Bottom Right', 'kargo'),
						'bs' => esc_html__('Bottom Stick Out', 'kargo'),
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'select',
				),
				'post_subtitle'                 => array(
					'title' => esc_html__( 'Post subtitle', 'kargo' ),
					'desc'  => wp_kses_data( __( "Specify post subtitle to display it under the post title.", 'kargo' ) ),
					'override' => array(
						'mode'    => 'post',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'std'   => '',
					'hidden' => true,
					'type'  => 'text',
				),
				'show_post_meta'                => array(
					'title' => esc_html__( 'Show post meta', 'kargo' ),
					'desc'  => wp_kses_data( __( "Display block with post's meta: date, categories, counters, etc.", 'kargo' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),
				'meta_parts_post'               => array(
					'title'      => esc_html__( 'Post meta', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Meta parts for single posts. Post counters and Share Links are available only if plugin ThemeREX Addons is active', 'kargo' ) )
								. '<br>'
								. wp_kses_data( __( '<b>Tip:</b> Drag items to change their order.', 'kargo' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'categories=1|date=1|counters=0|author=0|share=0|edit=0',
					'options'    => kargo_get_list_meta_parts(),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checklist',
				),
				'counters_post'                 => array(
					'title'      => esc_html__( 'Post counters', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Show only selected counters. Attention! Likes and Views are available only if plugin ThemeREX Addons is active', 'kargo' ) ),
					'dependency' => array(
						'show_post_meta' => array( 1 ),
					),
					'dir'        => 'vertical',
					'sortable'   => true,
					'std'        => 'views=0|likes=0|comments=0',
					'options'    => kargo_get_list_counters(),
					'type'       => KARGO_THEME_FREE || ! kargo_exists_trx_addons() ? 'hidden' : 'checklist',
				),
				'show_tags_links'              => array(
					'title' => esc_html__( 'Show tags links', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Display tags links on the single post', 'kargo' ) ),
					'std'   => 1,
					'type'  => ! kargo_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_share_links'              => array(
					'title' => esc_html__( 'Show share links', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Display share links on the single post', 'kargo' ) ),
					'std'   => 1,
					'type'  => ! kargo_exists_trx_addons() ? 'hidden' : 'checkbox',
				),
				'show_author_info'              => array(
					'title' => esc_html__( 'Show author info', 'kargo' ),
					'desc'  => wp_kses_data( __( "Display block with information about post's author", 'kargo' ) ),
					'std'   => 1,
					'type'  => 'checkbox',
				),

				'blog_single_related_info'      => array(
					'title' => esc_html__( 'Related posts', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_related_posts'            => array(
					'title'    => esc_html__( 'Show related posts', 'kargo' ),
					'desc'     => wp_kses_data( __( "Show section 'Related posts' on the single post's pages", 'kargo' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Content', 'kargo' ),
					),
					'std'      => 1,
					'type'     => 'checkbox',
				),
				'related_posts'                 => array(
					'title'      => esc_html__( 'Related posts', 'kargo' ),
					'desc'       => wp_kses_data( __( 'How many related posts should be displayed in the single post? If 0 - no related posts are shown.', 'kargo' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => kargo_get_list_range( 1, 9 ),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'select',
				),
				'related_columns'               => array(
					'title'      => esc_html__( 'Related columns', 'kargo' ),
					'desc'       => wp_kses_data( __( 'How many columns should be used to output related posts in the single page (from 2 to 4)?', 'kargo' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => kargo_get_list_range( 1, 4 ),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_style'                 => array(
					'title'      => esc_html__( 'Related posts style', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Default style', 'kargo' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 2,
					'options'    => kargo_get_list_styles( 2 ),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider'                => array(
					'title'      => esc_html__( 'Use slider layout', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Use slider layout in case related posts count is more than columns count', 'kargo' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 0,
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'checkbox',
				),
				'related_slider_controls'       => array(
					'title'      => esc_html__( 'Slider controls', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Show arrows in the slider', 'kargo' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'none',
					'options'    => array(
						'none'    => esc_html__('None', 'kargo'),
						'side'    => esc_html__('Side', 'kargo'),
						'outside' => esc_html__('Outside', 'kargo'),
						'top'     => esc_html__('Top', 'kargo'),
						'bottom'  => esc_html__('Bottom', 'kargo')
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'select',
				),
				'related_slider_pagination'       => array(
					'title'      => esc_html__( 'Slider pagination', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Show bullets after the slider', 'kargo' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 'bottom',
					'options'    => array(
						'none'    => esc_html__('None', 'kargo'),
						'bottom'  => esc_html__('Bottom', 'kargo')
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'switch',
				),
				'related_slider_space'          => array(
					'title'      => esc_html__( 'Space', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Space between slides', 'kargo' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
						'related_slider' => array( 1 ),
					),
					'std'        => 30,
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'text',
				),
				'related_position'              => array(
					'title'      => esc_html__( 'Related posts position', 'kargo' ),
					'desc'       => wp_kses_data( __( 'Select position to display the related posts', 'kargo' ) ),
					'dependency' => array(
						'show_related_posts' => array( 1 ),
					),
					'std'        => 'below_content',
					'options'    => array (
						'below_content' => esc_html__( 'After content', 'kargo' ),
						'below_page'    => esc_html__( 'After content & sidebar', 'kargo' ),
					),
					'type'       => KARGO_THEME_FREE ? 'hidden' : 'switch',
				),
				'posts_navigation_info'      => array(
					'title' => esc_html__( 'Posts navigation', 'kargo' ),
					'desc'  => '',
					'type'  => 'info',
				),
				'show_posts_navigation'		=> array(
					'title'    => esc_html__( 'Show posts navigation', 'kargo' ),
					'desc'     => wp_kses_data( __( "Show posts navigation on the single post's pages", 'kargo' ) ),
					'std'      => 1,
					'type'     => 'checkbox',
				),
				'blog_end'                      => array(
					'type' => 'panel_end',
				),

				// 'Colors'
				'panel_colors'                  => array(
					'title'    => esc_html__( 'Colors', 'kargo' ),
					'desc'     => '',
					'priority' => 300,
					'type'     => 'section',
				),

				'color_schemes_info'            => array(
					'title'  => esc_html__( 'Color schemes', 'kargo' ),
					'desc'   => wp_kses_data( __( 'Color schemes for various parts of the site. "Inherit" means that this block is used the Site color scheme (the first parameter)', 'kargo' ) ),
					'hidden' => $hide_schemes,
					'type'   => 'info',
				),
				'color_scheme'                  => array(
					'title'    => esc_html__( 'Site Color Scheme', 'kargo' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'kargo' ),
					),
					'std'      => 'default',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'header_scheme'                 => array(
					'title'    => esc_html__( 'Header Color Scheme', 'kargo' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'kargo' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'sidebar_scheme'                => array(
					'title'    => esc_html__( 'Sidebar Color Scheme', 'kargo' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'kargo' ),
					),
					'std'      => 'inherit',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),
				'footer_scheme'                 => array(
					'title'    => esc_html__( 'Footer Color Scheme', 'kargo' ),
					'desc'     => '',
					'override' => array(
						'mode'    => 'page,cpt_team,cpt_services,cpt_dishes,cpt_competitions,cpt_rounds,cpt_matches,cpt_cars,cpt_properties,cpt_courses,cpt_portfolio',
						'section' => esc_html__( 'Colors', 'kargo' ),
					),
					'std'      => 'dark',
					'options'  => array(),
					'refresh'  => false,
					'type'     => $hide_schemes ? 'hidden' : 'switch',
				),

				'color_scheme_editor_info'      => array(
					'title' => esc_html__( 'Color scheme editor', 'kargo' ),
					'desc'  => wp_kses_data( __( 'Select color scheme to modify. Attention! Only those sections in the site will be changed which this scheme was assigned to', 'kargo' ) ),
					'type'  => 'info',
				),
				'scheme_storage'                => array(
					'title'       => esc_html__( 'Color scheme editor', 'kargo' ),
					'desc'        => '',
					'std'         => '$kargo_get_scheme_storage',
					'refresh'     => false,
					'colorpicker' => 'tiny',
					'type'        => 'scheme_editor',
				),

				// Internal options.
				// Attention! Don't change any options in the section below!
				// Use huge priority to call render this elements after all options!
				'reset_options'                 => array(
					'title'    => '',
					'desc'     => '',
					'std'      => '0',
					'priority' => 10000,
					'type'     => 'hidden',
				),

				'last_option'                   => array(     // Need to manually call action to include Tiny MCE scripts
					'title' => '',
					'desc'  => '',
					'std'   => 1,
					'type'  => 'hidden',
				),

			)
		);

		// Prepare panel 'Fonts'
		// -------------------------------------------------------------
		$fonts = array(

			// 'Fonts'
			'fonts'             => array(
				'title'    => esc_html__( 'Typography', 'kargo' ),
				'desc'     => '',
				'priority' => 200,
				'type'     => 'panel',
			),

			// Fonts - Load_fonts
			'load_fonts'        => array(
				'title' => esc_html__( 'Load fonts', 'kargo' ),
				'desc'  => wp_kses_data( __( 'Specify fonts to load when theme start. You can use them in the base theme elements: headers, text, menu, links, input fields, etc.', 'kargo' ) )
						. '<br>'
						. wp_kses_data( __( 'Attention! Press "Refresh" button to reload preview area after the all fonts are changed', 'kargo' ) ),
				'type'  => 'section',
			),
			'load_fonts_subset' => array(
				'title'   => esc_html__( 'Google fonts subsets', 'kargo' ),
				'desc'    => wp_kses_data( __( 'Specify comma separated list of the subsets which will be load from Google fonts', 'kargo' ) )
						. '<br>'
						. wp_kses_data( __( 'Available subsets are: latin,latin-ext,cyrillic,cyrillic-ext,greek,greek-ext,vietnamese', 'kargo' ) ),
				'class'   => 'kargo_column-1_3 kargo_new_row',
				'refresh' => false,
				'std'     => '$kargo_get_load_fonts_subset',
				'type'    => 'text',
			),
		);

		for ( $i = 1; $i <= kargo_get_theme_setting( 'max_load_fonts' ); $i++ ) {
			if ( kargo_get_value_gp( 'page' ) != 'theme_options' ) {
				$fonts[ "load_fonts-{$i}-info" ] = array(
					// Translators: Add font's number - 'Font 1', 'Font 2', etc
					'title' => sprintf( esc_html__( 'Font %s', 'kargo' ), $i ),
					'desc'  => '',
					'type'  => 'info',
				);
			}
			$fonts[ "load_fonts-{$i}-name" ]   = array(
				'title'   => esc_html__( 'Font name', 'kargo' ),
				'desc'    => '',
				'class'   => 'kargo_column-1_3 kargo_new_row',
				'refresh' => false,
				'std'     => '$kargo_get_load_fonts_option',
				'type'    => 'text',
			);
			$fonts[ "load_fonts-{$i}-family" ] = array(
				'title'   => esc_html__( 'Font family', 'kargo' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Select font family to use it if font above is not available', 'kargo' ) )
							: '',
				'class'   => 'kargo_column-1_3',
				'refresh' => false,
				'std'     => '$kargo_get_load_fonts_option',
				'options' => array(
					'inherit'    => esc_html__( 'Inherit', 'kargo' ),
					'serif'      => esc_html__( 'serif', 'kargo' ),
					'sans-serif' => esc_html__( 'sans-serif', 'kargo' ),
					'monospace'  => esc_html__( 'monospace', 'kargo' ),
					'cursive'    => esc_html__( 'cursive', 'kargo' ),
					'fantasy'    => esc_html__( 'fantasy', 'kargo' ),
				),
				'type'    => 'select',
			);
			$fonts[ "load_fonts-{$i}-styles" ] = array(
				'title'   => esc_html__( 'Font styles', 'kargo' ),
				'desc'    => 1 == $i
							? wp_kses_data( __( 'Font styles used only for the Google fonts. This is a comma separated list of the font weight and styles. For example: 400,400italic,700', 'kargo' ) )
								. '<br>'
								. wp_kses_data( __( 'Attention! Each weight and style increase download size! Specify only used weights and styles.', 'kargo' ) )
							: '',
				'class'   => 'kargo_column-1_3',
				'refresh' => false,
				'std'     => '$kargo_get_load_fonts_option',
				'type'    => 'text',
			);
		}
		$fonts['load_fonts_end'] = array(
			'type' => 'section_end',
		);

		// Fonts - H1..6, P, Info, Menu, etc.
		$theme_fonts = kargo_get_theme_fonts();
		foreach ( $theme_fonts as $tag => $v ) {
			$fonts[ "{$tag}_section" ] = array(
				'title' => ! empty( $v['title'] )
								? $v['title']
								// Translators: Add tag's name to make title 'H1 settings', 'P settings', etc.
								: sprintf( esc_html__( '%s settings', 'kargo' ), $tag ),
				'desc'  => ! empty( $v['description'] )
								? $v['description']
								// Translators: Add tag's name to make description
								: wp_kses( sprintf( esc_html__( 'Font settings of the "%s" tag.', 'kargo' ), $tag ), 'kargo_kses_content' ),
				'type'  => 'section',
			);

			foreach ( $v as $css_prop => $css_value ) {
				if ( in_array( $css_prop, array( 'title', 'description' ) ) ) {
					continue;
				}
				$options    = '';
				$type       = 'text';
				$load_order = 1;
				$title      = ucfirst( str_replace( '-', ' ', $css_prop ) );
				if ( 'font-family' == $css_prop ) {
					$type       = 'select';
					$options    = array();
					$load_order = 2;        // Load this option's value after all options are loaded (use option 'load_fonts' to build fonts list)
				} elseif ( 'font-weight' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'kargo' ),
						'100'     => esc_html__( '100 (Light)', 'kargo' ),
						'200'     => esc_html__( '200 (Light)', 'kargo' ),
						'300'     => esc_html__( '300 (Thin)', 'kargo' ),
						'400'     => esc_html__( '400 (Normal)', 'kargo' ),
						'500'     => esc_html__( '500 (Semibold)', 'kargo' ),
						'600'     => esc_html__( '600 (Semibold)', 'kargo' ),
						'700'     => esc_html__( '700 (Bold)', 'kargo' ),
						'800'     => esc_html__( '800 (Black)', 'kargo' ),
						'900'     => esc_html__( '900 (Black)', 'kargo' ),
					);
				} elseif ( 'font-style' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit' => esc_html__( 'Inherit', 'kargo' ),
						'normal'  => esc_html__( 'Normal', 'kargo' ),
						'italic'  => esc_html__( 'Italic', 'kargo' ),
					);
				} elseif ( 'text-decoration' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'      => esc_html__( 'Inherit', 'kargo' ),
						'none'         => esc_html__( 'None', 'kargo' ),
						'underline'    => esc_html__( 'Underline', 'kargo' ),
						'overline'     => esc_html__( 'Overline', 'kargo' ),
						'line-through' => esc_html__( 'Line-through', 'kargo' ),
					);
				} elseif ( 'text-transform' == $css_prop ) {
					$type    = 'select';
					$options = array(
						'inherit'    => esc_html__( 'Inherit', 'kargo' ),
						'none'       => esc_html__( 'None', 'kargo' ),
						'uppercase'  => esc_html__( 'Uppercase', 'kargo' ),
						'lowercase'  => esc_html__( 'Lowercase', 'kargo' ),
						'capitalize' => esc_html__( 'Capitalize', 'kargo' ),
					);
				}
				$fonts[ "{$tag}_{$css_prop}" ] = array(
					'title'      => $title,
					'desc'       => '',
					'class'      => 'kargo_column-1_5',
					'refresh'    => false,
					'load_order' => $load_order,
					'std'        => '$kargo_get_theme_fonts_option',
					'options'    => $options,
					'type'       => $type,
				);
			}

			$fonts[ "{$tag}_section_end" ] = array(
				'type' => 'section_end',
			);
		}

		$fonts['fonts_end'] = array(
			'type' => 'panel_end',
		);

		// Add fonts parameters to Theme Options
		kargo_storage_set_array_before( 'options', 'panel_colors', $fonts );

		// Add Header Video if WP version < 4.7
		// -----------------------------------------------------
		if ( ! function_exists( 'get_header_video_url' ) ) {
			kargo_storage_set_array_after(
				'options', 'header_image_override', 'header_video', array(
					'title'    => esc_html__( 'Header video', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select video to use it as background for the header', 'kargo' ) ),
					'override' => array(
						'mode'    => 'page',
						'section' => esc_html__( 'Header', 'kargo' ),
					),
					'std'      => '',
					'type'     => 'video',
				)
			);
		}

		// Add option 'logo' if WP version < 4.5
		// or 'custom_logo' if current page is not 'Customize'
		// ------------------------------------------------------
		if ( ! function_exists( 'the_custom_logo' ) || ! kargo_check_current_url( 'customize.php' ) ) {
			kargo_storage_set_array_before(
				'options', 'logo_retina', function_exists( 'the_custom_logo' ) ? 'custom_logo' : 'logo', array(
					'title'    => esc_html__( 'Logo', 'kargo' ),
					'desc'     => wp_kses_data( __( 'Select or upload the site logo', 'kargo' ) ),
					'class'    => 'kargo_column-1_2 kargo_new_row',
					'priority' => 60,
					'std'      => '',
					'qsetup'   => esc_html__( 'General', 'kargo' ),
					'type'     => 'image',
				)
			);
		}

	}
}


// Returns a list of options that can be overridden for CPT
if ( ! function_exists( 'kargo_options_get_list_cpt_options' ) ) {
	function kargo_options_get_list_cpt_options( $cpt, $title = '' ) {
		if ( empty( $title ) ) {
			$title = ucfirst( $cpt );
		}
		return array(
			"content_info_{$cpt}"           => array(
				'title' => esc_html__( 'Content', 'kargo' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"body_style_{$cpt}"             => array(
				'title'    => esc_html__( 'Body style', 'kargo' ),
				'desc'     => wp_kses_data( __( 'Select width of the body content', 'kargo' ) ),
				'std'      => 'inherit',
				'options'  => kargo_get_list_body_styles( true ),
				'type'     => 'select',
			),
			"boxed_bg_image_{$cpt}"         => array(
				'title'      => esc_html__( 'Boxed bg image', 'kargo' ),
				'desc'       => wp_kses_data( __( 'Select or upload image, used as background in the boxed body', 'kargo' ) ),
				'dependency' => array(
					"body_style_{$cpt}" => array( 'boxed' ),
				),
				'std'        => 'inherit',
				'type'       => 'image',
			),
			"header_info_{$cpt}"            => array(
				'title' => esc_html__( 'Header', 'kargo' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"header_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Header style', 'kargo' ),
				'desc'    => wp_kses_data( __( 'Choose whether to use the default header or header Layouts (available only if the ThemeREX Addons is activated)', 'kargo' ) ),
				'std'     => 'inherit',
				'options' => kargo_get_list_header_footer_types( true ),
				'type'    => KARGO_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'kargo' ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( esc_html__( 'Select custom layout to display the site header on the %s pages', 'kargo' ), $title ) ),
				'dependency' => array(
					"header_type_{$cpt}" => array( 'custom' ),
				),
				'std'        => 'inherit',
				'options'    => array(),
				'type'       => KARGO_THEME_FREE ? 'hidden' : 'select',
			),
			"header_position_{$cpt}"        => array(
				'title'   => esc_html__( 'Header position', 'kargo' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( esc_html__( 'Select position to display the site header on the %s pages', 'kargo' ), $title ) ),
				'std'     => 'inherit',
				'options' => array(),
				'type'    => KARGO_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_image_override_{$cpt}"  => array(
				'title'   => esc_html__( 'Header image override', 'kargo' ),
				'desc'    => wp_kses_data( esc_html__( "Allow override the header image with the post's featured image", 'kargo' ) ),
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'kargo' ),
					1         => esc_html__( 'Yes', 'kargo' ),
					0         => esc_html__( 'No', 'kargo' ),
				),
				'type'    => KARGO_THEME_FREE ? 'hidden' : 'switch',
			),
			"header_widgets_{$cpt}"         => array(
				'title'   => esc_html__( 'Header widgets', 'kargo' ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( esc_html__( 'Select set of widgets to show in the header on the %s pages', 'kargo' ), $title ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => 'select',
			),

			"sidebar_info_{$cpt}"           => array(
				'title' => esc_html__( 'Sidebar', 'kargo' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"sidebar_position_{$cpt}"       => array(
				'title'   => sprintf( esc_html__( 'Sidebar position on the %s list', 'kargo' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( esc_html__( 'Select position to show sidebar on the %s list', 'kargo' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_mobile_{$cpt}"=> array(
				'title'   => sprintf( esc_html__( 'Sidebar position on the %s list on mobile', 'kargo' ), $title ),
				'desc'     => wp_kses_data( esc_html__( 'Select position to show sidebar on mobile devices - above or below the content', 'kargo' ) ),
				'std'      => 'below',
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_{$cpt}"        => array(
				'title'      => sprintf( esc_html__( 'Sidebar widgets on the %s list', 'kargo' ), $title ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( esc_html__( 'Select sidebar to show on the %s list', 'kargo' ), $title ) ),
				'dependency' => array(
					"sidebar_position_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"sidebar_position_single_{$cpt}"       => array(
				'title'   => sprintf( esc_html__( 'Sidebar position on the single post', 'kargo' ), $title ),
				// Translators: Add CPT name to the description
				'desc'    => wp_kses_data( sprintf( esc_html__( 'Select position to show sidebar on the single posts of the %s', 'kargo' ), $title ) ),
				'std'     => 'left',
				'options' => array(),
				'type'    => 'switch',
			),
			"sidebar_position_mobile_single_{$cpt}"=> array(
				'title'    => esc_html__( 'Sidebar position on the single post on mobile', 'kargo' ),
				'desc'     => wp_kses_data( esc_html__( 'Select position to show sidebar on mobile devices - above or below the content', 'kargo' ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'      => 'below',
				'options'  => array(),
				'type'     => 'switch',
			),
			"sidebar_widgets_single_{$cpt}"        => array(
				'title'      => sprintf( esc_html__( 'Sidebar widgets on the single post', 'kargo' ), $title ),
				// Translators: Add CPT name to the description
				'desc'       => wp_kses_data( sprintf( esc_html__( 'Select widgets to show in the sidebar on the single posts of the %s', 'kargo' ), $title ) ),
				'dependency' => array(
					"sidebar_position_single_{$cpt}" => array( '^hide' ),
				),
				'std'        => 'hide',
				'options'    => array(),
				'type'       => 'select',
			),
			"expand_content_{$cpt}"         => array(
				'title'   => esc_html__( 'Expand content', 'kargo' ),
				'desc'    => wp_kses_data( esc_html__( 'Expand the content width if the sidebar is hidden', 'kargo' ) ),
				'refresh' => false,
				'std'     => 'inherit',
				'options' => array(
					'inherit' => esc_html__( 'Inherit', 'kargo' ),
					1         => esc_html__( 'Expand', 'kargo' ),
					0         => esc_html__( 'No', 'kargo' ),
				),
				'type'    => 'switch',
			),

			"footer_info_{$cpt}"            => array(
				'title' => esc_html__( 'Footer', 'kargo' ),
				'desc'  => '',
				'type'  => 'info',
			),
			"footer_type_{$cpt}"            => array(
				'title'   => esc_html__( 'Footer style', 'kargo' ),
				'desc'    => wp_kses_data( esc_html__( 'Choose whether to use the default footer or footer Layouts (available only if the ThemeREX Addons is activated)', 'kargo' ) ),
				'std'     => 'inherit',
				'options' => kargo_get_list_header_footer_types( true ),
				'type'    => KARGO_THEME_FREE ? 'hidden' : 'switch',
			),
			"footer_style_{$cpt}"           => array(
				'title'      => esc_html__( 'Select custom layout', 'kargo' ),
				'desc'       => wp_kses_data( esc_html__( 'Select custom layout to display the site footer', 'kargo' ) ),
				'std'        => 'inherit',
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'custom' ),
				),
				'options'    => array(),
				'type'       => KARGO_THEME_FREE ? 'hidden' : 'select',
			),
			"footer_widgets_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer widgets', 'kargo' ),
				'desc'       => wp_kses_data( esc_html__( 'Select set of widgets to show in the footer', 'kargo' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 'footer_widgets',
				'options'    => array(),
				'type'       => 'select',
			),
			"footer_columns_{$cpt}"         => array(
				'title'      => esc_html__( 'Footer columns', 'kargo' ),
				'desc'       => wp_kses_data( esc_html__( 'Select number columns to show widgets in the footer. If 0 - autodetect by the widgets count', 'kargo' ) ),
				'dependency' => array(
					"footer_type_{$cpt}"    => array( 'default' ),
					"footer_widgets_{$cpt}" => array( '^hide' ),
				),
				'std'        => 0,
				'options'    => kargo_get_list_range( 0, 6 ),
				'type'       => 'select',
			),
			"footer_wide_{$cpt}"            => array(
				'title'      => esc_html__( 'Footer fullwidth', 'kargo' ),
				'desc'       => wp_kses_data( esc_html__( 'Do you want to stretch the footer to the entire window width?', 'kargo' ) ),
				'dependency' => array(
					"footer_type_{$cpt}" => array( 'default' ),
				),
				'std'        => 0,
				'type'       => 'checkbox',
			),

			"widgets_info_{$cpt}"           => array(
				'title' => esc_html__( 'Additional panels', 'kargo' ),
				'desc'  => '',
				'type'  => KARGO_THEME_FREE ? 'hidden' : 'info',
			),
			"widgets_above_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the top of the page', 'kargo' ),
				'desc'    => wp_kses_data( esc_html__( 'Select widgets to show at the top of the page (above content and sidebar)', 'kargo' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => KARGO_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_above_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets above the content', 'kargo' ),
				'desc'    => wp_kses_data( esc_html__( 'Select widgets to show at the beginning of the content area', 'kargo' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => KARGO_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_content_{$cpt}"  => array(
				'title'   => esc_html__( 'Widgets below the content', 'kargo' ),
				'desc'    => wp_kses_data( esc_html__( 'Select widgets to show at the ending of the content area', 'kargo' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => KARGO_THEME_FREE ? 'hidden' : 'select',
			),
			"widgets_below_page_{$cpt}"     => array(
				'title'   => esc_html__( 'Widgets at the bottom of the page', 'kargo' ),
				'desc'    => wp_kses_data( esc_html__( 'Select widgets to show at the bottom of the page (below content and sidebar)', 'kargo' ) ),
				'std'     => 'hide',
				'options' => array(),
				'type'    => KARGO_THEME_FREE ? 'hidden' : 'select',
			),
		);
	}
}


// Return lists with choises when its need in the admin mode
if ( ! function_exists( 'kargo_options_get_list_choises' ) ) {
	add_filter( 'kargo_filter_options_get_list_choises', 'kargo_options_get_list_choises', 10, 2 );
	function kargo_options_get_list_choises( $list, $id ) {
		if ( is_array( $list ) && count( $list ) == 0 ) {
			if ( strpos( $id, 'header_style' ) === 0 ) {
				$list = kargo_get_list_header_styles( strpos( $id, 'header_style_' ) === 0 );
			} elseif ( strpos( $id, 'header_position' ) === 0 ) {
				$list = kargo_get_list_header_positions( strpos( $id, 'header_position_' ) === 0 );
			} elseif ( strpos( $id, 'header_widgets' ) === 0 ) {
				$list = kargo_get_list_sidebars( strpos( $id, 'header_widgets_' ) === 0, true );
			} elseif ( strpos( $id, '_scheme' ) > 0 ) {
				$list = kargo_get_list_schemes( 'color_scheme' != $id );
			} elseif ( strpos( $id, 'sidebar_widgets' ) === 0 ) {
				$list = kargo_get_list_sidebars( 'sidebar_widgets_single' != $id && ( strpos( $id, 'sidebar_widgets_' ) === 0 || strpos( $id, 'sidebar_widgets_single_' ) === 0 ), true );
			} elseif ( strpos( $id, 'sidebar_position_mobile' ) === 0 ) {
				$list = kargo_get_list_sidebars_positions_mobile( strpos( $id, 'sidebar_position_mobile_' ) === 0 );
			} elseif ( strpos( $id, 'sidebar_position' ) === 0 ) {
				$list = kargo_get_list_sidebars_positions( strpos( $id, 'sidebar_position_' ) === 0 );
			} elseif ( strpos( $id, 'widgets_above_page' ) === 0 ) {
				$list = kargo_get_list_sidebars( strpos( $id, 'widgets_above_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_above_content' ) === 0 ) {
				$list = kargo_get_list_sidebars( strpos( $id, 'widgets_above_content_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_page' ) === 0 ) {
				$list = kargo_get_list_sidebars( strpos( $id, 'widgets_below_page_' ) === 0, true );
			} elseif ( strpos( $id, 'widgets_below_content' ) === 0 ) {
				$list = kargo_get_list_sidebars( strpos( $id, 'widgets_below_content_' ) === 0, true );
			} elseif ( strpos( $id, 'footer_style' ) === 0 ) {
				$list = kargo_get_list_footer_styles( strpos( $id, 'footer_style_' ) === 0 );
			} elseif ( strpos( $id, 'footer_widgets' ) === 0 ) {
				$list = kargo_get_list_sidebars( strpos( $id, 'footer_widgets_' ) === 0, true );
			} elseif ( strpos( $id, 'blog_style' ) === 0 ) {
				$list = kargo_get_list_blog_styles( strpos( $id, 'blog_style_' ) === 0 );
			} elseif ( strpos( $id, 'post_type' ) === 0 ) {
				$list = kargo_get_list_posts_types();
			} elseif ( strpos( $id, 'parent_cat' ) === 0 ) {
				$list = kargo_array_merge( array( 0 => esc_html__( '- Select category -', 'kargo' ) ), kargo_get_list_categories() );
			} elseif ( strpos( $id, 'blog_animation' ) === 0 ) {
				$list = kargo_get_list_animations_in();
			} elseif ( 'color_scheme_editor' == $id ) {
				$list = kargo_get_list_schemes();
			} elseif ( strpos( $id, '_font-family' ) > 0 ) {
				$list = kargo_get_list_load_fonts( true );
			}
		}
		return $list;
	}
}
