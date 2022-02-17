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
define( 'DB_NAME', 'platzi_gifts' );

/** Database username */
define( 'DB_USER', 'gsilva' );

/** Database password */
define( 'DB_PASSWORD', 'swapps' );

/** Database hostname */
define( 'DB_HOST', '' );

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
define( 'AUTH_KEY',         '0vaFFPwqW(y5s,FBR=b/eXc:rkRzZ-xQ^E!QK.c>15qD)WN3J9!|X4M0qjVCIg0a' );
define( 'SECURE_AUTH_KEY',  'p@l$Fxs$<=,OL_vK.Ej7,%?.JN%nCyCX(RzS><_=dE| iWXnvgVG?Q0U`=;xIY!<' );
define( 'LOGGED_IN_KEY',    '7T}w4m5Yzf~!iFNn[%e4I!p<KIkP2pXlgG[3PhI`*96o/5r=U3St(Va$$AvTf/cO' );
define( 'NONCE_KEY',        'VU7Y7_.yiP|utV1kbxHiua+LgrMMXQ^hWmZzhy~T7ZDc$6ky{SZ.9gGE:Uoty.%:' );
define( 'AUTH_SALT',        'l{EA#Ze#[Syj#f)b aN3TpD%cB-e4TS#`lN6~<-.3RE=J[H`lqRxh{J4-u&w=kJb' );
define( 'SECURE_AUTH_SALT', '8S([Ks^16c5:K&k%`T=*!Gp4Ge^Lq*U|!S`EhgK%E4{an3YxF>uN:*}we$NV?r3/' );
define( 'LOGGED_IN_SALT',   'DZX)xJarGDzx6z*O@-gY^5Uy&2Oo[Ae4ME).TYzGkm>)OQ-8_x6<}.B5E]41%2,i' );
define( 'NONCE_SALT',       'XHA~e;B+Mz&cGpxFd]j6M^:QPZx!l8sI5YHo]|vP_lfZO-`yMLrXEwbunzl:9y`C' );

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
