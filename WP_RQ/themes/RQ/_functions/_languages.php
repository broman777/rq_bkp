<?php

/* LANGUAGES */

// MO files
add_action('after_setup_theme', 'lang_theme_setup');
function lang_theme_setup(){
    load_theme_textdomain('RQ', get_template_directory() . '/languages');
}

/* END */