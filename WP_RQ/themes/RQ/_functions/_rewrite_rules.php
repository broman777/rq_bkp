<?php

/* REWRITE RULES */

// account
function custom_rewrite_rule() {
    add_rewrite_rule('^account/([^/]*)/?','index.php?page_id=156&section=$matches[1]','top');
}
add_action('init', 'custom_rewrite_rule', 10, 0);