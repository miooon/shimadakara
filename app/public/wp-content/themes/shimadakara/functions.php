<?php
/**
 * shimadakara functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shimadakara
 */

if ( ! function_exists( 'shimadakara_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shimadakara_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on shimadakara, use a find and replace
		 * to change 'shimadakara' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shimadakara', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails'); /* size x2*/
		add_image_size('thumb_event',600,440,true);
		add_image_size('thumb_artist',190,210,true);
		add_image_size('thumb_artist_dtls',300,390,true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'shimadakara' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'shimadakara_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'shimadakara_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shimadakara_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'shimadakara_content_width', 640 );
}
add_action( 'after_setup_theme', 'shimadakara_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shimadakara_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shimadakara' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shimadakara' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shimadakara_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shimadakara_scripts() {
	wp_enqueue_style( 'shimadakara-style', get_stylesheet_uri() );

	wp_enqueue_script( 'shimadakara-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'shimadakara-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shimadakara_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function change_post_menu_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'アーティスト';
  $submenu['edit.php'][5][0] = 'アーティスト一覧';
  $submenu['edit.php'][10][0] = '新しいアーティスト';
  $submenu['edit.php'][16][0] = 'タグ';
}

function change_post_object_label() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'アーティスト';
  $labels->singular_name = 'アーティスト';
  $labels->add_new = _x('追加', 'アーティスト');
  $labels->add_new_item = 'アーティストの新規追加';
  $labels->edit_item = 'アーティストの編集';
  $labels->new_item = '新規アーティスト';
  $labels->view_item = 'アーティストを表示';
  $labels->search_items = 'アーティストを検索';
  $labels->not_found = '記事が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );
