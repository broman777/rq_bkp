<?php

/* CUSTOM */

/* LOGIN PAGE */
add_action( 'login_enqueue_scripts', 'custom_login_logo' );
function custom_login_logo() { ?>
	<style type="text/css">#login h1 a {width: 158px; height: 83px; background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/img/admin/logo.png'); background-size: 158px 83px;}</style>
<?php }
add_filter( 'login_headerurl', 'my_login_logo_url' );
function my_login_logo_url() {return '';}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );
function my_login_logo_url_title() {return 'RusseQuelle';}

/* WIDGETS */

// disabling widgets
add_action( 'admin_init', 'remove_dashboard_meta' );
function remove_dashboard_meta() {
	//remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' ); // на виду
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' ); // комментарии
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' ); // черновик
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal'); // активность
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    // woocommerce
    //remove_meta_box( 'woocommerce_dashboard_recent_reviews', 'dashboard', 'normal' );
}

// adding widgets
add_action('wp_dashboard_setup', 'customwidgets_add_dashboard_widgets' );
function dashboard_widget_function(){
	echo '<div style="text-align: center">';
	echo '<img src="'.get_stylesheet_directory_uri().'/img/admin/logo.png" style="width: 158px; height: 83px;">';
	echo '</div>';
}
function customwidgets_add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget', 'RusseQuelle', 'dashboard_widget_function');
}

// ACCOUNT PAGE REDIRECTS
function check_account_get($customer_id){
	if($customer_id):
		if(get_query_var('section') && get_query_var('section')!='edit'):
			wp_redirect( wc_get_page_permalink( 'myaccount' ) ); exit; // кидаем на главную профиля
		endif;
	else:
		if(get_query_var('section') && (get_query_var('section')!='forgot' && get_query_var('section')!='register')):
			wp_redirect( wc_get_page_permalink( 'myaccount' ) ); exit; // кидаем на главную профиля
		endif;
	endif;
}

/* END */