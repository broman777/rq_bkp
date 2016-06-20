<?php

/* REWRITE RULES */

function custom_rewrite_rule() {
    // account
    add_rewrite_rule('^account/([^/]*)/?','index.php?page_id=156&section=$matches[1]','top');
    // gallery
    add_rewrite_rule('^gallery/([^/]*)/?','index.php?post_type=gallery&type=$matches[1]','top');
    // cart
    add_rewrite_rule('^cart/([^/]*)/?','index.php?page_id=155&section=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);