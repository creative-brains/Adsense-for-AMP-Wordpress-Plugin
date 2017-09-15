jQuery(document).ready(function(){


	/************  Header tabs  ***************/

	jQuery(".adsense-for-amp-menu").click(function(){
		jQuery(".adsense-for-amp-menu").removeClass("afa-menu-active");
		jQuery(this).addClass("afa-menu-active");

		var menu_id = jQuery(this).attr('id');
		var table_id = menu_id.replace('-link','');

		jQuery(".adsense-for-amp-table").hide();
		jQuery("#" + table_id).show();

		var referrer = jQuery("#" + table_id + "-form input[name=_wp_http_referer]").val();
		if (referrer.indexOf('&') > 0) {
			referrer = referrer.substring(0, referrer.indexOf('&'));
		}
		jQuery("#" + table_id + "-form input[name=_wp_http_referer]").val(referrer + '&'+ table_id +'=1');
	});

	
	/************  Header tabs  ***************/


	/************     Adsense settings form    ***************/
	jQuery("#above-the-content-ad-type").change(function() {
		var above_the_content = jQuery("#above-the-content-ad-type").val();
		if (above_the_content == "google-adsense") {
			jQuery(".above-the-content-custom-banner").hide();
			jQuery(".above-the-content-google-adsense").show();
		} else {
			jQuery(".above-the-content-google-adsense").hide();
			jQuery(".above-the-content-custom-banner").show();
		}
	});


	jQuery("#within-the-content-ad-type").change(function() {
		var within_the_content = jQuery("#within-the-content-ad-type").val();
		if (within_the_content == "google-adsense") {
			jQuery(".within-the-content-custom-banner").hide();
			jQuery(".within-the-content-google-adsense").show();
		} else {
			jQuery(".within-the-content-google-adsense").hide();
			jQuery(".within-the-content-custom-banner").show();
		}
	});


	jQuery("#below-the-content-ad-type").change(function() {
		var below_the_content = jQuery("#below-the-content-ad-type").val();
		if (below_the_content == "google-adsense") {
			jQuery(".below-the-content-custom-banner").hide();
			jQuery(".below-the-content-google-adsense").show();
		} else {
			jQuery(".below-the-content-google-adsense").hide();
			jQuery(".below-the-content-custom-banner").show();
		}
	});
	/************     Adsense settings form    ***************/

});