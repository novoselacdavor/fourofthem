<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'fourofthem' );

/** Database username */
define( 'DB_USER', 'homestead' );

/** Database password */
define( 'DB_PASSWORD', 'secret' );

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
define( 'AUTH_KEY',         'L7V$F*.PNEO-CP#-z,EH34t:WfWE>0>ncx-y/~F{xdM7!x/rQlP&(+aG_=|.rR-<' );
define( 'SECURE_AUTH_KEY',  ';N-G>>ZGYCMw^[g]._g#Udlhr$k)6p+f<m#he`4hpcq))ZZn(SN=V3ii16<C9R>q' );
define( 'LOGGED_IN_KEY',    'QiZG^Wy&%x9oi_^drQeb9(R]|1@wX8t-~+=!A^Tvj`.3j1/JD10P3SuSVrfUu#$N' );
define( 'NONCE_KEY',        'aDwY$g[`n5YUQkK#5dO P5V*#u[51iqJxfqJAw{v%XObrAEz%R`lOa9~#2D r;.)' );
define( 'AUTH_SALT',        'R8XcpF&${oI2G3zD$]-]1inHWC[./#:_04h8@_K-v!NIK}Z*bE$$.ZVywIb!IR>,' );
define( 'SECURE_AUTH_SALT', 'mLN&Y9d8z;`F,bLwQ1Sql{EQmM:O=L08ASMa0Rd}|xAv{-(lldgikt)*3U:0:r#d' );
define( 'LOGGED_IN_SALT',   'uyb-IB.m^K3sbS!+U9W~E[+=zSEc2hLE5TK(2hGa=71zYj7g23)Yf&Y@-d#}1,gZ' );
define( 'NONCE_SALT',       '>MiXg[Tm%,S2),[4:2Al[-_Ne;^U_L.?i8olC_Jt_<Gb>>hUN{V82KzbMDR)bGYY' );

/**
 * Disable all automatic updates.
 */
define( 'AUTOMATIC_UPDATER_DISABLED', true );

/**
 * Disable WordPress from editing our files.
 */
define( 'DISALLOW_FILE_EDIT', true ); // File editor.
define( 'DISALLOW_FILE_MODS', true ); // File modifications.

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
