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
define('DB_NAME', 'wp_cun19');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         ';T(pcJDW!<)q`znN_+:VlX7p[4J$D1pbY+]Zw4Q!.:G*0NRz^)&jQC9&LZ%vO=,U');
define('SECURE_AUTH_KEY',  'LxLb5Kgv)vB,sk);NgaSvtBu6bndH7%72H9AAQDpt.01,dfrj0Uz^9kkMs%8]GDR');
define('LOGGED_IN_KEY',    'XA]w=(t9nn~>QHr=+~bw^d!iLuj.|B^,[*`0e8G+epp7CSL702WbHj;W{0:}S{5t');
define('NONCE_KEY',        'ct}dW_nTzMJi:8Oege$hIL<RPUuFMtz@}z0/eV<4dX/8V<qP@iB:V[^#q1llIHmN');
define('AUTH_SALT',        'EhzNJ-&V=0iSx^z!P:2EoNML*jL&:)],Dhe5^>6|;It%OE*vP$?l#w@bd4T4ucdF');
define('SECURE_AUTH_SALT', '86xuJ7%dUPDE^rj-zfrK6}l{J`IfzLk?Jaiq%YW@*B]5 )C>QN2R!v=9XlmWP.uE');
define('LOGGED_IN_SALT',   'l>SV.9ia]56]+?.xz7/#-Ma<c-L=ulu}>vJ=:.1uK@|?z[cEcyv>e=Rov;m#G#w<');
define('NONCE_SALT',       'CCK{s.j$i`YXWTXa,(3DtB7wB(ZQ5Lj* Y>D3dV4#w[#<Zko1a|M3BhnV+9rSRfH');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

