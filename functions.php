<?php
/* Define Variables *******************************************************************************
*************************************************************************************************** */

//Google Tag Manager
global $google_tag_manager;

$google_tag_manager = '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-0000000" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';

//Cookie Concent | Opitions: cb-enabled
$cookie = filter_input(INPUT_COOKIE, 'cb-enabled', FILTER_DEFAULT);


/* Enqueue JS and CSS Files ***********************************************************************
*************************************************************************************************** */
function enqueue_styles_scripts() 
{
    //CSS
    wp_enqueue_style('normalize', get_stylesheet_directory_uri() . '/vendor/normalize/normalize.css', array(), '8.0.1', 'all');
    //Bootstrap Grid
	wp_enqueue_style('bootstrap-grid', get_stylesheet_directory_uri() . '/vendor/bootstrap-5.3.0-alpha1-dist/css/bootstrap-grid.css', array(), '5.3.0', 'all');
	//Bootstrap
	//wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/vendor/bootstrap-5.3.0-alpha1-dist/css/bootstrap.css', array(), '5.3.0', 'all');
    wp_enqueue_style('slick', get_stylesheet_directory_uri() . '/vendor/slick-1.8.1/slick/slick.css', array(), '1.8.1', 'all');
    wp_enqueue_style('featherlight', get_stylesheet_directory_uri() . '/vendor/featherlight/featherlight.css', array(), '1.7.14', 'all');
	wp_enqueue_style('child-theme', get_stylesheet_directory_uri() . '/css/style.css', array(), time(), 'all');
   
    //JS
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/vendor/bootstrap-5.3.0-alpha1-dist/js/bootstrap.js', '', '5.3.0', true);
    wp_enqueue_script('slick', get_stylesheet_directory_uri() . '/vendor/slick-1.8.1/slick/slick.js', '', '1.8.1', true);
    wp_enqueue_script('cookiebar', get_stylesheet_directory_uri() . '/vendor/jquery.cookiebar/jquery.cookiebar.js', '', '1.0.1', true);
    wp_enqueue_script('featherlight', get_stylesheet_directory_uri() . '/vendor/featherlight/featherlight.js', '', '1.7.14', true);
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/js/script.js', '', '1.0.1', true);
}
add_action('wp_enqueue_scripts', 'enqueue_styles_scripts', 99);


/* GTM ********************************************************************************************
*************************************************************************************************** */

if($cookie == "accepted")
{
	if(!function_exists('gtm_html'))
	{
		function gtm_html() 
		{
			ob_start();
			
			global $google_tag_manager;
			
			echo $google_tag_manager;
				
			ob_end_flush();
		}
	}
	add_action('wp_head', 'gtm_html', 80);
}


/* Siteground Auto Updates ************************************************************************
*************************************************************************************************** */

if(file_exists("/var/lib/sec/wp-settings.php")) 
{        
    define('WP_AUTO_UPDATE_CORE', true);
    define( 'AUTOMATIC_UPDATER_DISABLED', false );
    add_filter('auto_update_plugin', '__return_true');
    add_filter('auto_update_theme', '__return_false');
}
