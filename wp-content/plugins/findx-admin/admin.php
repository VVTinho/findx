<?php
	/*
		Plugin Name: FndX Admin
		Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
		Description: This plugin controlls the view of the Admin & Login panel.
		Version: 1.0
		Author: V.V.T | Örestad-Linux
		Author URI: http://www.vvt-mediadesign.se
	*/

	//---------------------------------------------------------------------------------------------------------------------

	// Remove administration page header logo (Wordpress-logo)
	function remove_admin_logo()
	{
		echo '<style>#wp-admin-bar-wp-logo{ display: none; }</style>';
	}
	add_action('admin_head', 'remove_admin_logo');

	//---------------------------------------------------------------------------------------------------------------------

	// Change administration panel footer (footer in the admin panel)
	function change_footer_admin()
	{
		echo 'For support, please email us <a href="mailto:support@findx-theme">mailto:support@findx-theme</a>';
	}
	add_filter('admin_footer_text', 'change_footer_admin');

	//---------------------------------------------------------------------------------------------------------------------

	// Login page logo (login page)
	function custom_login_logo()
	{
		echo '<style>h1 a, h1 a:hover, h1 a:focus{ font-size: 1.4em; font-weight: normal; text-align: center; text-indent: 0; line-height: 1.1em; text-decoration: none; color: #dadada; text-shadow: 0 -1px 1px #666, 0 1px 1px #fff; background-image: none !important; }</style>';
	}
	add_action('login_head', 'custom_login_logo');

	//---------------------------------------------------------------------------------------------------------------------

	// Remove admin bar (when visiting the site from the admin panel/view)
	add_filter('show_admin_bar', '__return_false');

	//---------------------------------------------------------------------------------------------------------------------

	// Change contact info page (located under Users in Admin panel)
	function new_contactmethods( $contactmethods )
	{
	$contactmethods['twitter'] = 'Twitter'; // Add Twitter
	$contactmethods['facebook'] = 'Facebook'; // Add Facebook
	/* unset($contactmethods['yim']); // Remove Yahoo IM
	unset($contactmethods['aim']); // Remove AIM
	unset($contactmethods['jabber']); // Remove Jabber */

	return $contactmethods;
	}

	add_filter('user_contactmethods','new_contactmethods',10,1);

	//---------------------------------------------------------------------------------------------------------------------

	// Place a text in the head of the Admin panel.
	// function welcome_text_in_the_admin_panel()
	// {
	// 	echo '<div style="text-align: center;"><h4><p>Wellcome to wordpress theme (vvt-blank-theme)</p></h4>
	// 	<a href="http://localhost:8888/wp-projekt/wp-content/uploads/2013/05/theme_instructions-tips.zip" target="_blank">Download theme instructions/tips</a></div>';
	// }

	// add_action( 'admin_head', 'welcome_text_in_the_admin_panel' );

	//---------------------------------------------------------------------------------------------------------------------

	// Place a Custom help text in the panel under PAGES.
	add_action('load-page-new.php','custom_help_page');
	add_action('load-page.php','custom_help_page');

	function custom_help_page()
	{
  		 add_filter('contextual_help','custom_page_help');
	}

	function custom_page_help($help)
	{
  		// echo $help; // Uncomment if you just want to append your custom Help text to the default Help text
  		echo "<h5>Help text | vvt-findx-theme</h5>";
  		echo "<p>You can use javascript code in all the pages if you put your javascript code inside [js][/js] tags. </br> Dont forget
  		to install FindX Plugin(Admin) by FindX</p>";
	}

	//---------------------------------------------------------------------------------------------------------------------

	function goodbye_howdy ( $wp_admin_bar )
	{
	    $avatar = get_avatar( get_current_user_id(), 16 );
	    if ( ! $wp_admin_bar->get_node( 'my-account' ) )
	        return;
	    $wp_admin_bar->add_node( array(
	        'id' => 'my-account',
	        'title' => sprintf( 'Logged in as, %s', wp_get_current_user()->display_name ) . $avatar,
	    ) );
	}
	add_action( 'admin_bar_menu', 'goodbye_howdy' );

	//---------------------------------------------------------------------------------------------------------------------

	// Editing the WordPress Dashboard Header
	function wp_admin_dashboard_header_colour()
	{
		echo '<style type="text/css">#wphead{background:#3b5998;
		background-image: -webkit-gradient(linear, 0% 100%, 0% 0%, from(#7684hg), to(#730fvk));
		}
		#wphead h1#site-heading a{color: #3b5998;}
		#wphead h1#site-heading a:hover{color: #fff;}
		#wphead #wphead-info #user_info{color: #3b5998;}
		#wphead #wphead-info #user_info a{color: #ggg;}
		#wphead #wphead-info #user_info a:hover{color: #fff;}
		</style>';
	}
	add_action('admin_head', 'wp_admin_dashboard_header_colour');
