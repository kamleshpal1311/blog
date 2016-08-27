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
define('DB_NAME', 'glickin');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'just@123');

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
define('AUTH_KEY',         '3&v*B37VWl@Vd9WRF<Eaf`Z 5%uJ@@Xs%1xZZ?uWKATX5S|!$V^DoTdJuu&-RsKK');
define('SECURE_AUTH_KEY',  'IgY^pnB}LOb8T;0FO797(:R_eT6(!JU{BQI[2x;Rj&koVAvUw!U,W-vD+7+HYz0a');
define('LOGGED_IN_KEY',    'o{4``=JDfObp?|rm(IU>raa3T ) 5=;w`jJcL 0~AS5~SM=Pc+(|gq.QAngut}r>');
define('NONCE_KEY',        'Wfakj>q)|BP/W2=RV:iPj9h#o0{b`aq w}Co}{F]i9asz@-f)USa:~i<nT|3+,xd');
define('AUTH_SALT',        'pm!U//&Ao?0K;a;u%y;~!MEW%>0eM2Gk?B~(TEqkd)]H4h(8=v0{IltgfrSmoQLL');
define('SECURE_AUTH_SALT', '2x1A4rL3@]zE!j]bgkFmhCR+b6,.tv&:Nf$vsf$Fb.zHe>tzRmdNDH%N,-2tcKZg');
define('LOGGED_IN_SALT',   'jV<3qX9=j.B8<J_{PT=(RYA1&EA,>ihZA$O~[M>SuPuB6GNj]9@.HYJBrH-%R$,c');
define('NONCE_SALT',       'v&&v2ican)@^}ytYZ<Ji<)`|=]@EJby<GWGK)!`Cj_O?%Lt=j5pjAeZ79E.+?,.5');

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
