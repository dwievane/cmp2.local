<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db_woohoochocolade');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '{7zIm17Fg]$<LuAt{YAW!+P>B8TKs{|r%er}{eMw`I]!+~.g:,= c2CB=v|QHYod');
define('SECURE_AUTH_KEY',  'GVQc;bio~&F5Q-|%3v{@Q)2ZEn+5nH(*Y&f~<&6u+ctRdGXEY.tqR}fF6]L~Hqlz');
define('LOGGED_IN_KEY',    'I!T+&ZzTOn<~ta0_oz0<*Y`rf%6h(#]Dc9QK#_4.`+77hc2_y:Vs!X9fg*YK?AaP');
define('NONCE_KEY',        'N&{oEP#i)Vtx>0mbAQ8=}u1WYZM!w;kt%-!c xgTsk{]]dTlP ^RSq*/zWVnA^_j');
define('AUTH_SALT',        '&SQ1^~JAI=*WpH0!QOknFc7I}Pq>>>f5(!8k?Xj=WDp7Nyys%4+xDZp8i06iI(4`');
define('SECURE_AUTH_SALT', '>)7IG9Z-/q~KmG+;sm*LZxp##HrL~ZATc?G w @ERr:sqL_-$j{mty<oB#;T>i7v');
define('LOGGED_IN_SALT',   'keJ>;Gzf*e6GJ09DZI-E9f`t!]d-Btahy@s~;6[[`b<&=#D,&!rsH{;(O_1gtGQl');
define('NONCE_SALT',       'S>W22zWP,XtPvONaftvEVX[Rz :!(8`}[prH8ElI0%5pfAN;=5oC.R5H_v4b{)e*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
