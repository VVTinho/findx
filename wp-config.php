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
define('DB_NAME', 'findx_se');

/** MySQL database username */
define('DB_USER', 'findx_se');

/** MySQL database password */
define('DB_PASSWORD', 'LGCnycpJ');

/** MySQL hostname */
define('DB_HOST', 'findx.se.mysql');

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
define('AUTH_KEY',         'Fd;rc[1Z^STAfy+:dLf/WYDoU/TqfhA(m7c,t5d+h4Wy#U5_^o-/rgF+5ST!7omS');
define('SECURE_AUTH_KEY',  'm|U)@@<CeI>lyyx$3d<[O4C731(SZM+TCC4{Q[)Qq^d@j$sR6$zw$x_ y*2XSW@^');
define('LOGGED_IN_KEY',    '`hNntNFyXn2JC5:W$s#y3^X^7shGd|V?$+~P1|/N5sA16ffAHEpFrF`++Q+QMEBx');
define('NONCE_KEY',        'NYq#NX3?HbR1;KziS#hKK-M_#`}P~|I-I1^`lQZQ*mlOshfxDN.QNEpN^f8ehbp3');
define('AUTH_SALT',        '7 Z Qo.r%U3`EZ4+-Q|5zeOV@xIat/@N#8$?CV+D?>a+NblY2$}q/;(E6 XPs|&=');
define('SECURE_AUTH_SALT', 'ib@B?mHVoFD{MwkP_K([ffH!7|zg<cV_g)Nlfd1Z|p):4rQ4Zsnnm)|eU~V9)o[a');
define('LOGGED_IN_SALT',   ',{wAA9EUZxAs%]^(su+8(hnDy^OGygy}=V:[=_}T$Y7D23w1BP+&&r#<rG(/Ihx ');
define('NONCE_SALT',       '<||LN}ez_b#Nf<}2o wR{{|+O_|U#p1m~lM:vk}nUDHrB52ds/=L5k|@u*]sZaee');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
