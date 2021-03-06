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
define('DB_NAME', 'wp');

/** MySQL database username */
define('DB_USER', 'wp');

/** MySQL database password */
define('DB_PASSWORD', 'wp');

/** MySQL hostname */
define('DB_HOST', 'db');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8_general_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2l(g[wvj>mXw56MuTl~$2gIR+6jObF|a|l=>](9-f}UmNpF)wSUH*$!O0/%+1P?;');
define('SECURE_AUTH_KEY',  'Gpo!`v6/N}p_FNQr&=nFARQ<ve,u)fC)xNdc/3<iHP>]<@bNP+jf<|fD1cw#31#~');
define('LOGGED_IN_KEY',    '/L5U!J1_X>UlNGU^M]:/Z%MLCfZr UGcd{{zBS|TW5|T|^s7HRH+KZR=upGMvb!e');
define('NONCE_KEY',        'Y|%Df@+lJxOB0CB.#i(<ZAhSnue=-%+}NEi4 B-gYk&/w<2W~!BaEXZz(2dS)P6V');
define('AUTH_SALT',        '0horgyK*-f]+-O[p +<N)#:;)dOCHg^1}~|I:MH*3]qsbJlZQ||us8f{^Qb@{ Ou');
define('SECURE_AUTH_SALT', '*]S8JPUN=a$.)l<5Ho(n(Q2Q2vIcv<bK#v;nV3a(:=aK!h,W8~cx<A(lKfu<J*O~');
define('LOGGED_IN_SALT',   '68rOH+Mu?MW?d&-.*ww+|e>i!PrQ1ISr<-+gW>64`5=+0!DCXSM?Te`gqgybK,9-');
define('NONCE_SALT',       '`~9>R|*P`)+!Cv]bM3Y.*/u|BD w-5iv`P0R|eJe!7#gw8%o?aK+8Ai#GTN~V?e)');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')
  $_SERVER['HTTPS'] = 'on';

define('FS_METHOD','direct');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
