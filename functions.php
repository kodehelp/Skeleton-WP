<?php
/*
This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

// LOAD skeleton CORE (if you remove this, the theme will break)
require_once( 'library/skeleton.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once( 'library/admin.php' );

/*********************
LAUNCH skeleton
Let's get everything up and running.
*********************/

function skeleton_ahoy() {

  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'skeletontheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  require_once( 'library/custom-post-type.php' );

  //Clean up default wordpress menu classes
  require_once locate_template('nav.php');  // Clean Wp-menu

  // launching operation cleanup
  add_action( 'init', 'skeleton_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'skeleton_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'skeleton_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'skeleton_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'skeleton_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'skeleton_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  skeleton_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'skeleton_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'skeleton_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'skeleton_excerpt_more' );

} /* end skeleton ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'skeleton_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 640;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'skeleton-thumb-600', 600, 150, true );
add_image_size( 'skeleton-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'skeleton-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'skeleton-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'skeleton_custom_image_sizes' );

function skeleton_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'skeleton-thumb-600' => __('600px by 150px'),
        'skeleton-thumb-300' => __('300px by 100px'),
    ) );
}

/*
The function above adds the ability to use the dropdown menu to select
the new images sizes you have just created from within the media manager
when you add media to your content blocks. If you add more image sizes,
duplicate one of the lines in the array and name it according to your
new image size.
*/

/************* THEME CUSTOMIZE *********************/

/*
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722

  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162

  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function skeleton_theme_customizer($wp_customize) {
  // $wp_customize calls go here.
  //
  // Uncomment the below lines to remove the default customize sections

  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  // $wp_customize->remove_section('background_image');
  // $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');

  // Uncomment the below lines to remove the default controls
  // $wp_customize->remove_control('blogdescription');

  // Uncomment the following to change the default section titles
  // $wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  // $wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'skeleton_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function skeleton_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'skeletontheme' ),
		'description' => __( 'The first (primary) sidebar.', 'skeletontheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

    register_sidebar(array(
        'id' => 'footer1',
        'name' => 'Footer 1',
        'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'id' => 'footer2',
        'name' => 'Footer 2',
        'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'id' => 'footer3',
        'name' => 'Footer 3',
        'before_widget' => '<div id="%1$s" class="widget col-sm-4 %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widgettitle">',
        'after_title' => '</h4>',
    ));
	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:


	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'skeletontheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'skeletontheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!


/************* COMMENT LAYOUT *********************/

// Comment Layout
function skeleton_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
    <article  class="cf">
      <div class="comment-meta pull-left">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
        */
        echo get_avatar($comment,$size='50');
        ?>
        <p class="text-center comment-author"><?php comment_author_link(); ?></p>


      </div> <!-- comment-meta -->
      <div class="comment-content media-body">
        <p class="comment-date text-right text-muted pull-right">
          <?php echo human_time_diff( get_comment_time('U'), current_time('timestamp') ) . ' ago'; ?> &nbsp;
          <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>" title="Comment Permalink"><i class="icon-link"></i></a>
        </p>
        <?php if ($comment->comment_approved == '0') : ?>
            <em><?php _e( 'Your comment is awaiting moderation.', 'skeletontheme' ) ?></em>
        <?php endif; ?>

          <?php comment_text() ?>

          <div class="reply pull-right">
  					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply"></i>&nbsp; Reply' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
  				</div>
      </div>

    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

function skeleton_footer_links() {
    // Display the WordPress menu if available
    wp_nav_menu(
        array(
            'menu' => 'Footer Links', /* menu name */
            'theme_location' => 'footer_links', /* where in the theme it's assigned */
            'container_class' => 'footer-links clearfix', /* container class */
            'fallback_cb' => 'wp_bootstrap_footer_links_fallback' /* menu fallback */
        )
    );
}

// Add Class to Gravatar
add_filter('get_avatar', 'skeleton_avatar_class');
function skeleton_avatar_class($class) {
	$class = str_replace("class='avatar", "class='avatar img-circle media-object", $class);
	return $class;
}

// Add Class to Comment Reply Link
add_filter('comment_reply_link', 'skeleton_reply_link_class');
function skeleton_reply_link_class($class){
	$class = str_replace("class='comment-reply-link", "class='comment-reply-link btn btn-primary btn-xs", $class);
	return $class;
}

/*
This is a modification of a function found in the
twentythirteen theme where we can declare some
external fonts. If you're using Google Fonts, you
can replace these fonts, change it in your scss files
and be up and running in seconds.
*/
function skeleton_fonts() {
  wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Montserrat:400,700');
}

add_action('wp_enqueue_scripts', 'skeleton_fonts');

// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form'
	) );

  /**
   * Utility functions
   */
  function add_filters($tags, $function) {
    foreach($tags as $tag) {
      add_filter($tag, $function);
    }
  }

  function is_element_empty($element) {
    $element = trim($element);
    return empty($element) ? false : true;
  }

/* DON'T DELETE THIS CLOSING TAG */ ?>
