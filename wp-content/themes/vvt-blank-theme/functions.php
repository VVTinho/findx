<?php

	function register_my_menu()
	{
	  register_nav_menu('header-menu',__( 'Header Menu' ));
	}
	add_action( 'init', 'register_my_menu' );


	function register_my_menus()
	{
	  register_nav_menus(
	    array(
	      'header-menu' => __( 'Header Menu' ),
	      'extra-menu' => __( 'Extra Menu' )
	    )
	  );
	}
	add_action( 'init', 'register_my_menus' );

	//-------------------------------------------------------------------------------

	// Get the page number
	function get_page_number()
	{
	    if ( get_query_var('paged') )
	    {
	        print ' | ' . __( 'Page ' , 'hbd-theme') . get_query_var('paged');
	    }
	}


	// Custom callback to list pings
	function custom_pings($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
		?>
		<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
		    <div class="comment-author">
		    	<?php
		    		printf(__('By %1$s on %2$s at %3$s', 'hbd-theme'),
		            get_comment_author_link(),
		            get_comment_date(),
		            get_comment_time() );
		            edit_comment_link(__('Edit', 'hbd-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>');
				?>
			</div>
		<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'hbd-theme')
		?>
			<div class="comment-content">
			    <?php comment_text() ?>
			</div>
		<?php
	}


	// For category lists on category archives: Returns other categories except the current one (redundant)
	function cats_meow($glue)
	{
	    $current_cat = single_cat_title( '', false );
	    $separator = "\n";
	    $cats = explode( $separator, get_the_category_list($separator) );

	    foreach ( $cats as $i => $str )
	    {
	        if ( strstr( $str, ">$current_cat<" ) )
	        {
	            unset($cats[$i]);
	            break;
	        }
	    }
	    if ( empty($cats) )
	        return false;

	    return trim(join( $glue, $cats ));
	}

	//-------------------------------------------------------------------------------

	// Register widgets areas
	function theme_widgets_init()
	{
	    // Area 1
	    register_sidebar( array (
	    'name' => 'Primary Widget Area',
	    'id' => 'primary_widget_area',
	    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );

	    // Area 2
	    register_sidebar( array (
	    'name' => 'Secondary Widget Area',
	    'id' => 'secondary_widget_area',
	    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
	    'after_widget' => "</li>",
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	  ) );
	}
	add_action( 'init', 'theme_widgets_init' );

	//-------------------------------------------------------------------------------

	$preset_widgets = array (
	    'primary_widget_area'  => array( 'search', 'pages', 'categories', 'archives' ),
	    'secondary_widget_area'  => array( 'links', 'meta' )
	);
	if ( isset( $_GET['activated'] ) )
	{
	    update_option( 'sidebars_widgets', $preset_widgets );
	}


	// Check for static widgets in widget-ready areas
	function is_sidebar_active( $index )
	{
	  global $wp_registered_sidebars;

	  $widgetcolums = wp_get_sidebars_widgets();

	  if ($widgetcolums[$index]) return true;

	    return false;
	}

	//-------------------------------------------------------------------------------

	function theme_header_end()
	{
    	echo '<div class="custom-text">Custom Text</div>';
	};
	add_action('themify_header_end', 'theme_header_end');


	function add_banner_header_end()
	{
    	echo '<div class="header-banner"><img src="http://example.com/url/to/image.jpg" alt="header banner" /></div>';
	}
	add_action('themify_header_end', 'add_banner_header_end');

	//-------------------------------------------------------------------------------
	/* Register scripts & styles */

	function findx_login_stylesheet()
	{
		wp_enqueue_style('findx-login', get_template_directory_uri().'/style/admin-bar.min.css');
	}
	add_action( 'login_enqueue_scripts', 'findx_login_stylesheet' );


	function findx_enqueue_scripts()
	{
	    wp_enqueue_script('jquery');
		wp_enqueue_script('sitescript_typer', get_bloginfo('template_directory').'/js/textTyper.js', array('jquery'), null, true);
		wp_enqueue_script('sitescript_typer_min', get_bloginfo('template_directory').'/js/textTyper-min.js', array('jquery'), null, true);
		wp_enqueue_script('page-check', get_bloginfo('template_directory').'/js/page-check.js', array('jquery'), null, true);
    }
    add_action('wp_enqueue_scripts', 'findx_enqueue_scripts');

    function findx_enqueue_styles()
    {
    	wp_enqueue_style( 'socialnetwork', get_template_directory_uri(). '/style/socialnetwork.css');
    }
	add_action('wp_enqueue_scripts', 'findx_enqueue_styles');


?>
