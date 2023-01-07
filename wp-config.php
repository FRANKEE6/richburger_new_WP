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
define( 'DB_NAME', 'richburger_new_wp' );

/** Database username */
define( 'DB_USER', 'FRANKEE' );

/** Database password */
define( 'DB_PASSWORD', '8EE2pknk' );

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
define( 'AUTH_KEY',         ':~~mg*fgom^ug~9NH2KbU{?`J$i7ZU+(tug|GQdz@}f(x|_k[afFI$LX-@%=5|*-' );
define( 'SECURE_AUTH_KEY',  'i;=B]E>IuFcRSDbvmc-JioG)8Pr>[c;f,+I>ZtCd.CD8R/xLC3.FV#gD^&B|hOQX' );
define( 'LOGGED_IN_KEY',    '5K7C/Rx:K5LWB>{#&qB%Q~[cnzs%Mi+*o:pyQkvu$*%lI1uUQ~/y4cm}x^70MQsG' );
define( 'NONCE_KEY',        'NL{qdOghcO<DjMNj32/fS)r}l.o`pm*nmp64(-+R>u>38)^wcXYtybiVRjnlFZN9' );
define( 'AUTH_SALT',        'uz++a-;2|UewH%NB6n$mzlro*]M#;|#(q5?[Je!^Pd9{*Bwoi<XZ$/8Dp&?j3;7`' );
define( 'SECURE_AUTH_SALT', 'nLw,g,*wt. $-@1Z[ 6gRu_Z`!=66Dw_27>7_yqFHxv._40`IwNY|} ~B{Rg.PQE' );
define( 'LOGGED_IN_SALT',   'dvAox&v!$7j|+yPJ_[-#~?yf>7t-uzg8Bh;i4irjn3^,?XE5FMJ(<@|gKN~,fpVF' );
define( 'NONCE_SALT',       'ybXMq}se#APWSKBI?JT%acym&[~ou89V5bV2|!cxA6wD&H394wjK>sOH[RP#zKSB' );

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
