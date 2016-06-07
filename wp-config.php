<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'petyash28_sweet');

/** Имя пользователя MySQL */
define('DB_USER', 'petyash28_sweet');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'petyash28_sweet');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Et/Ul?Ts2GFPb1y!qLu!aE6|d4nuvpy2W,Zd*td:=io!$&XNCQ(`NiteZ?4dh5n}');
define('SECURE_AUTH_KEY',  'M:k2neIs_gc&gS(7JyH>;nTLqsrUzpzv&LEY#3</PrH9NKPbD*K]_#d[wyF>?hbw');
define('LOGGED_IN_KEY',    'Y29wuc5tl5nVQnVBGIu)J7kf)kGxoAW.xWq%q.K,a*2Gb{}/Thmli=E1NQZ]Pd_U');
define('NONCE_KEY',        'JBhgNBW ?%zif`f}Da_J7jFi9TVkO5IWy6]Z.CoX{ 5iK[|UEx}=B,p7v4=vyEY&');
define('AUTH_SALT',        'x*vx|q2%<f*i&s=oQYZ[]I)Ak|7-oTV_E hOmukgTSPqsD?$Vy]</hb!DYY^Uczv');
define('SECURE_AUTH_SALT', 'wgJEW(opPa_G=C}NV}Q.$$Kb,~4w{Q[7WR!@~]N% ,B]N?tJ:OI/rR7Ugu5!HXdw');
define('LOGGED_IN_SALT',   'ktU#bOa1mX#OXfK*+XR!3K}lqBV0^ etpp+S6TW ;I@m-S4Ql;y~SD-tBaEKf;^!');
define('NONCE_SALT',       '2KwK}bU-JS<gkKg%12|DS_gt`IU2j0wmy5n;+f,Y[{4[?2,MXF{ltg(7[h.U$BSf');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'rq_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

// отключаем черновики
define('WP_POST_REVISIONS', false);
define('AUTOSAVE_INTERVAL', 3600);
define('EMPTY_TRASH_DAYS', 3600);

// отключаем обновления
//define('AUTOMATIC_UPDATER_DISABLED', true);
//define('DISALLOW_FILE_EDIT', true);
//define('DISALLOW_FILE_MODS', true);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
