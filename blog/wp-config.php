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
define( 'DB_NAME', 'db_findusbr_blog' );

/** MySQL database username */
define( 'DB_USER', 'hacodesys' );

/** MySQL database password */
define( 'DB_PASSWORD', 'P3ns@F@rt3' );

/** MySQL hostname */
define( 'DB_HOST', '3.235.176.216:3306' );

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
define( 'AUTH_KEY',         '|!j?<t!~S_YF}BOY}lkXn<?.X@*iXtJ0s3yD-w fM5uK_=_2z,.n->fgr+7QyZ?r' );
define( 'SECURE_AUTH_KEY',  'aBgo)$Y-Cnm)*/S;fk]LnA%GvG]sQw%^P~M<-I#$ PoAuH1SWxrnd0;]:-GFv=.9' );
define( 'LOGGED_IN_KEY',    ':}P07se<4|?9mhWuG5;HRI=jQx<nD,_H+l8Wr>kE2Z*Kvsv3iK@B9j7V@S3t$$z1' );
define( 'NONCE_KEY',        '_$/x$//<c ,  nM>SF94u>>o1rZL}$A2hkRI-Ed[bNYd(Hug0M8YREW ,Vjwh#Oa' );
define( 'AUTH_SALT',        'R4MR5Vn[gi]++A)u$|mmA8gzlHrk1YyGZ~9e{jhTtzIJ[:/XM=`]bRm`sKgKOR+7' );
define( 'SECURE_AUTH_SALT', 'Mgtm7>,_U{$,D&3vMXMYZ3yu^2/u*rE}>ok4/+Xz|4O30rG)J]>;cx~_Kh9:<~:3' );
define( 'LOGGED_IN_SALT',   'ixBg[7=!Q~b0hDZPYk;cr*>cuom<^kuG)P[<gtKAeSuf7_X(G@{<R}D$:1M1-`6*' );
define( 'NONCE_SALT',       ':T(Mr5M.O#V>+`iOtV/5I](o?/|]g_zoRyJn*=6s~`YG/b9.]u3u6#zi*>PZqBy2' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
define('FS_METHOD','direct');
