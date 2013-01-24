<?php
/*
Plugin Name: Front Page to Category
Plugin URI: http://wordpress.org/extend/plugins/hello-dolly/
Description: Make front page links go to the post's category page. Useful for increasing page views.
Author: Broadstreet
Version: 0.1.0
Author URI: http://broadstreetads.com
*/

function f2c_go_to_category($url)
{
    if(is_front_page())
    {
        $post_id = url_to_postid($url);
        $categories = wp_get_post_categories($post_id);

        if(count($categories))
        {
            $url = get_category_link($categories[0]);
        }
    }
    
    return $url;
}

add_filter('post_link', 'f2c_go_to_category');