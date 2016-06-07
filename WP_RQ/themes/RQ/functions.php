<?php

/***********************/

/* CLEARING */
get_template_part('_functions/_clear');

/* LOAD SCRIPTS AND STYLES */
get_template_part('_functions/_scripts_and_styles');

/* CREATE POST TYPES */
get_template_part('_functions/_posttypes');

/***********************/

/* LANGUAGES */
get_template_part('_functions/_languages');

/* IMAGES */
get_template_part('_functions/_images');

/* MENU */
get_template_part('_functions/_menus');

/* COLUMNS IN ADMIN */
get_template_part('_functions/_admin-columns');

/* OTHER */
get_template_part('_functions/_custom');

/***********************/

/* ACF */
get_template_part('_functions/_plugins/_acf');

/* WOOCOMMERCE */
get_template_part('_functions/_plugins/_woocommerce');

/* QTRANSLATE */
get_template_part('_functions/_plugins/_qtranslate');

/***********************/

/* AJAX */
get_template_part('_functions/_ajax');

/* REWRITE RULES */
get_template_part('_functions/_rewrite_rules');

/* FILTERING */
get_template_part('_functions/_filters');

/* SEO */
get_template_part('_functions/_seo');

/***********************/