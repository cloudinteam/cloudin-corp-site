<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'cloudin-corp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Jayasri@23' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'w)|.F$ICvR 4usyD Ut]0|eUK3,^a=[jJ`0U(DY9v>0.B$oW8~;-} jm_vFC~:$d' );
define( 'SECURE_AUTH_KEY',  'KyU-Mz&1=XlAH#~k!^HsR6lsd7YP<h)M=8DN86)!}J-CCV=5Y:bN[#^623)U?Aaw' );
define( 'LOGGED_IN_KEY',    '<NR[kx=]i0c+yQA(^YMj<-=] wKYJnc3`u]RE8vfNdATWI-b,n0ki5rw8#k^N@y:' );
define( 'NONCE_KEY',        '8F>OR}+*5n6vgBoP4 =?>b&]b,*UQ teUVv;cxUPaA*5@,)x9k6.ZYfecTMxZx.F' );
define( 'AUTH_SALT',        'nY9iiSrvL,rY][:Vyv_$>IhlIZ](3^[tq[ )qwZ//Drj@4h1{G6HJ{B9f^(#0PF*' );
define( 'SECURE_AUTH_SALT', 'vZHZi#ILa#XhNte/LgXbuOV*{9QGkoI^qkt@/XsS:U`W3eV6S]QQoo~U?khWV|hF' );
define( 'LOGGED_IN_SALT',   '/?K>~ABwn?}bXSlAm@R|?Kp15.>e~|S%2.v}BbutmPhOr9ReA_q1]6uN28vA*j. ' );
define( 'NONCE_SALT',       '_wDr%n#Bjf*HwouKC%dldiZKJiOG1?38mx[#k<9$N%V4e9X@[f]y,vesX9eYu~KL' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define( 'FS_METHOD', 'direct' );

