<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'homework_db');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '( @ 2~|RLRs6*603wb5#G@cfI>E|$#2|5z/pv_de)N}IU[c+#%6^-x)@p72s@ttC');
define('SECURE_AUTH_KEY',  '{JI[bBQj-(37QKA>B{b@5l^3t+`!PdH>Q4#X8%P6a2?)ZcFO]Z0Ph7b,8,*X-hS0');
define('LOGGED_IN_KEY',    '(g|:@hABKXEZgk1xId:2Hoc$0v[-22S-Oo-*zC0!6_ppiyGC>8:C+_$>b}icj}EG');
define('NONCE_KEY',        'n@!tI-_<*,jY$zh%_+^v+H:<Q>Xf|[{;EmWDORfx[/!62CE6N$AiNzifx+v]p!m:');
define('AUTH_SALT',        'N~U1QP!a4$G!R,t:?kl}bIi?|9cgyz;T=rZ+D0:s1Kk{nH] 2B&wln_g+(!Q^M?X');
define('SECURE_AUTH_SALT', '{eV},;h_ssx3~.J3Qv=~PQz4D*F%b[.enhe@GEWyM>syKg>P*NBEXO|:DLXvL|q(');
define('LOGGED_IN_SALT',   'Kd?GBtaLa?ZW8^w15NcF}Q5=`).pqy5@ylnU_1;3&v7ixu{Ic<|gbEq]~|7[y/Ap');
define('NONCE_SALT',       '5UB9r<}m$Gv-A+$M`},0!nxhJL11:n@-U}!N#H- 2&b&QGu^~7u;P$,9]# 36)|1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gh_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
