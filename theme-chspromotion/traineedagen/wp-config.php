<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', '176619-traineedagen');

/** MySQL database username */
define('DB_USER', '176619_ej50180');

/** MySQL database password */
define('DB_PASSWORD', 'CHSupx2008CHS');

/** MySQL hostname */
define('DB_HOST', 'traineedagen-176619.mysql.binero.se');

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
define('AUTH_KEY',         '>AuL32s3x,(rTyVyHdR3}q+KqY4@|3NVP,$`4-IZ`_+Wt_^( S}5.~G1v(064M],');
define('SECURE_AUTH_KEY',  '{U^S$Z-~[@AcDR.n`:2**F{No^gt4`zjzck-|]9.Gojw3$cy&#L#k#H5WBZPg2-s');
define('LOGGED_IN_KEY',    '}9 l7)S6|ML)XWv76-%+Sx-C|u:6Fj&zgJ+tH,4N =FC3,kM9a#%,R*6p+R|A(A+');
define('NONCE_KEY',        '8Dyq0^|-f8W*$V*9f|PkGw|#>o{H$C^FC%V6?xAJ{SSv<x~X;S#)%Yk$$5:%t6f$');
define('AUTH_SALT',        'UBZ-gpYOCVGy^j83XbXGUL(h:C_D{k>2<gJR Yb2fUi|K+7X%2.b`zI:OF|mAiEK');
define('SECURE_AUTH_SALT', '`)$3_M,$ut}uxnr<(6OA=B[Y;]xwIRa}2-8/+LHbrbHSR4f`>u-VnzIb>+zhDQr&');
define('LOGGED_IN_SALT',   'FHh<C!{x [9.|LD()71;XIpj8$-J Sh#u+]X|aqF(^?}krU8x|x<:i4*9F*eWFtn');
define('NONCE_SALT',       '|Nl}&m$mMei%]e-%h2p7/0iHOZxUK&zR2(7usI2m~dxuH`kWvKe3qA0>g7D8+NSk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
