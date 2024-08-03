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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'ss-r}?K7K:^VR/r?k=r5?8nPxnvZH2)!GE13IilXrTL.u(L1J#RG3- k~>6s4UL-' );
define( 'SECURE_AUTH_KEY',   'LEWsh1N@g4!WRteRG9;W%`()/X+X3s3yhE{x&8qxj*Mm<kBt-J(?@$Hm*TMwOIJy' );
define( 'LOGGED_IN_KEY',     'oDhJhzx{-U5($T3;q:v-3{zibw#-^o OsVJqNtZ)@,IQu-R22/~]NDKjik2dokVp' );
define( 'NONCE_KEY',         '}3wI)4UIn@S% YM=+k>XaHwu~i[gG(}5iCDuY>?*#^0eVG aP}x*e{?SI<fL XTL' );
define( 'AUTH_SALT',         'il?IpGSv8?2($jr>#K`?~V_g,7B?b wZ8GB !=ykn.]Dzv4w9P=WzvHu0DHTc0Oi' );
define( 'SECURE_AUTH_SALT',  'XiD/JW$njUpt|P#^^[XO9Qa(l{s8H!]DfU@,oZaqeA%oj2H]XrfM&~*g<*r_ALsz' );
define( 'LOGGED_IN_SALT',    'g-t97IUX;mqz%*w@_V#3xrnZ4B+If}wY}Q7$?OS^|}Kwh$$*h0HWAWdC)-ms<O7$' );
define( 'NONCE_SALT',        '8-6p4+$y(>I$H=IL-RV(2NYo|fO>/];qM`ivd2bKp]ONXbV|-$l_&L5oLi=ez61x' );
define( 'WP_CACHE_KEY_SALT', 'n|%P|:)XL|!N43~Og`3|kBJ-u=hl$m{H.U%r2pys1A%jMN0f,ciEL+%|e2Xc)xnj' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
