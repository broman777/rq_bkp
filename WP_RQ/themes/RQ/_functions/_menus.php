<?php

/* MENU */

if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}
register_nav_menus( array(
    'main_menu' => 'Главное меню'
));

/* END */