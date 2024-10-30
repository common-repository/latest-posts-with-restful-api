<?php

/**
 * Plugin Name: Latest Posts with Restful API
 * Plugin URI:  https://wordpress.org/plugins/latest-posts-with-restful-api
 * Description: Generate N latest posts in RestFul API, JSON format with news image URL | url to get latest posts = (site_URL)/api/latestposts/(Number of POSTs - like 30) | to get 1 post = (site_URL)/api/getpost/(post ID) | to show 'mobile_app_more' category use (site_URL)/api/moretab/1
 * Version: 1.0.6
 * Requires at least: 5.0
 * Requires PHP: 7.2
 * Author: Hadi Akbarijedi
 * Author URI: https://webstart.ir
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * Text Domain: Latest-Posts-with-Restful-API
 *
 */

/*
 * define these headers to accept CROS origin in browsers ;)
 * */
function lpra_add_custom_headers() {
    add_filter( 'rest_pre_serve_request', function( $value ) {
        header( 'Access-Control-Allow-Headers: Authorization, X-WP-Nonce,Content-Type, X-Requested-With');
        header( 'Access-Control-Allow-Origin: *' );
        header( 'Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE' );
        //header( 'Access-Control-Allow-Credentials: true' );
        return $value;
    } );
}
add_action( 'rest_api_init', 'lpra_add_custom_headers', 15 );

/*
 * include functionality :)
 * */
require 'inc/rewrite-api.php';
