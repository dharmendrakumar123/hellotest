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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'task' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Trw{n)IpakP8uxB/!A3Zg_VSLLhTvg#]R z5Z#,6/o+?O|J1b>Jgs2l?!ETE7eOi' );
define( 'SECURE_AUTH_KEY',  '2lP7ALW9Mz|;VZ0+h4jM20qfi0 z7(Ya`=bAGjzfTOin% {<Ug])5$zAY8<Nx91l' );
define( 'LOGGED_IN_KEY',    'wh,!7tX~zIKQHIn;]/s-ex^E;J7<fT/Tfk[)&|fzwBO`w8~K@%`sx=9pUuVj^NGn' );
define( 'NONCE_KEY',        '` X^f@U-L_0BPV;h&5WX(VI}8=,butI)0re5M6xGg^PFIj(K}T~k6fZM;T.<r*S0' );
define( 'AUTH_SALT',        '-[1_$rY!-p0U[}OYmc`Z-AK4/dC%DZN<B7G+U*lqc=O]_p$--tcFN0K<:UdyIGv#' );
define( 'SECURE_AUTH_SALT', '#=` k5!/k}{~,T iXS[u]q]%LM ;^B<id;!~NF)CLj)#.Bo&M2OhRt@wdH{GKnpP' );
define( 'LOGGED_IN_SALT',   'R:(_I1L;nK+iOeJlFpyp[}0I?vDt7Kd(TACtyx0}#0W!d{8@4n FM{KXq60^:0U)' );
define( 'NONCE_SALT',       'taKi^/pb]oRYCA5)#;&7)8PZG:K unNG9s|kMqpT!B_uTrfmt4wHWG^TF^U,oZQE' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
