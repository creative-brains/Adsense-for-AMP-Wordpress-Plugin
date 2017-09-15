<?php

/*
Plugin Name: Adsense for AMP
Plugin URI: https://adsenseforamp.com
Description: Setup Google Adsense on AMP pages
Version: 1.2.0
Author: Adsense for AMP
*/


// Exit if someone tries to access plugin file directly.
defined( 'ABSPATH' ) or die ( 'No script kiddies please!' );

define("ADSENSE_FOR_AMP_PLUGIN_PATH", plugin_dir_path( __FILE__ ));

define("ADSENSE_FOR_AMP_PLUGIN_URL", plugins_url('',__FILE__));

include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'includes/left-menu.php');

include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'includes/register-settings.php');

function afa_admin_custom_style_scripts() {
    wp_register_style('afa_admin_custom_style_scripts', plugins_url('css/afa-style.css',__FILE__ ));
    wp_enqueue_style('afa_admin_custom_style_scripts');
    wp_register_script('afa_admin_custom_style_scripts', plugins_url('js/afa-script.js',__FILE__ ));
    wp_enqueue_script('afa_admin_custom_style_scripts');
}

add_action( 'admin_init','afa_admin_custom_style_scripts', 15);

function adsense_for_amp_options_page() { 
	?>
	<?php include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'templates/settings-header.php'); ?>
	<div>
		<div class="afa-main-options">
			<?php

				$adsense_settings_page_active = isset($_GET['adsense-settings']) ? true : false;
				$google_analytics_settings_page_active = isset($_GET['google-analytics-settings']) ? true : false;
				$recent_posts_settings_page_active = isset($_GET['recent-posts-settings']) ? true : false;
				$facebook_page_like_button_settings_page_active = isset($_GET['facebook-page-like-button-settings']) ? true : false;
				$social_share_settings_page_active = isset($_GET['social-share-settings']) ? true : false;

				if ($adsense_settings_page_active == false 
					&& $google_analytics_settings_page_active == false
					&& $recent_posts_settings_page_active == false
					&& $facebook_page_like_button_settings_page_active == false
					&& $social_share_settings_page_active == false) {
					$adsense_settings_page_active = true;
				}

			?>
			<table class="wp-list-table widefat">
				<thead>
					<tr>
						<th class="adsense-for-amp-menu<?php echo $adsense_settings_page_active ? ' afa-menu-active' : ''; ?>" id="adsense-settings-link">Adsense for AMP</th>
						<th class="adsense-for-amp-menu<?php echo $google_analytics_settings_page_active ? ' afa-menu-active' : ''; ?>" id="google-analytics-settings-link">Google Analytics</th>
						<th class="adsense-for-amp-menu<?php echo $recent_posts_settings_page_active ? ' afa-menu-active' : ''; ?>" id="recent-posts-settings-link">Recent Posts</th>
						<th class="adsense-for-amp-menu<?php echo $facebook_page_like_button_settings_page_active ? ' afa-menu-active' : ''; ?>" id="facebook-page-like-button-settings-link">Facebook Page<br/>Like Button</th>
						<th class="adsense-for-amp-menu<?php echo $social_share_settings_page_active ? ' afa-menu-active' : ''; ?>" id="social-share-settings-link">Social Share</th>
					</tr>	
				</thead>
			</table>
			
			<div class="adsense-for-amp-table <?php echo $adsense_settings_page_active ? 'afa-show' : 'afa-hide'; ?>" id="adsense-settings">
				<?php include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'templates/settings-adsense.php'); ?>
			</div>

			<div class="adsense-for-amp-table <?php echo $google_analytics_settings_page_active ? 'afa-show' : 'afa-hide'; ?>" id="google-analytics-settings">
				<?php include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'templates/settings-google-analytics.php'); ?>
			</div>

			<div class="adsense-for-amp-table <?php echo $recent_posts_settings_page_active ? 'afa-show' : 'afa-hide'; ?>" id="recent-posts-settings">
				<?php include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'templates/settings-recent-posts.php'); ?>
			</div>

			<div class="adsense-for-amp-table <?php echo $facebook_page_like_button_settings_page_active ? 'afa-show' : 'afa-hide'; ?>" id="facebook-page-like-button-settings">
				<?php include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'templates/settings-facebook-page-like-button.php'); ?>
			</div>

			<div class="adsense-for-amp-table <?php echo $social_share_settings_page_active ? 'afa-show' : 'afa-hide'; ?>" id="social-share-settings">
				<?php include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'templates/settings-social-share.php'); ?>
			</div>
		</div>

		<div class="afa-right-sidebar">
			<?php include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'templates/pro-features.php'); ?>
        	<br>
			<?php include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'templates/view-demo.php'); ?>
        	<br>
        	<?php include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'templates/get-in-touch.php'); ?>
        </div>	
	</div>

	<?php
}

/*******************************************************************************************/
function adsense_for_amp_load_amp_script( $data ) {

    if (!isset($data['amp_component_scripts']) ) {
   		$data['amp_component_scripts'] = array();
  	}

  	$data['amp_component_scripts']['amp-ad'] = 'https://cdn.ampproject.org/v0/amp-ad-0.1.js';
  	
    return $data;
}

add_filter( 'amp_post_template_data', 'adsense_for_amp_load_amp_script');
/*******************************************************************************************/


/*******************************************************************************************/
add_action( 'amp_post_template_css', 'adsense_for_amp_additional_css_styles', 15);

function adsense_for_amp_additional_css_styles($amp_template) {
	?>
	.afa-content-width {
		max-width: 841px;width: 100%;margin: auto;
	}
	.afa-center {
		text-align:center;
	}
	.afa-li {
		clear:both;list-style:none;
	}
	<?php
}
/*******************************************************************************************/

include( ADSENSE_FOR_AMP_PLUGIN_PATH . 'includes/adsense.php');

?>