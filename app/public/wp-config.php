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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '/Vf4dUXX6Su0b8EFbzKJCNpnm2v7DhChL/JQHEfkSY474Xlj6IVpsh1l+nsblHPKIPhQIMtLk9i6XM+FnIcGCA==');
define('SECURE_AUTH_KEY',  '8ODtUFQ7E1QNSYhPY+ao3B4tKO/7QleRwO2tcohhfw5FzuaMNFbmcJOSED/y1G+YuRntLZhFAEiHobNQ2KfodA==');
define('LOGGED_IN_KEY',    'VusDJ46Rx0PkqJfPoVOew6FFRkHvR1CLMZjVTrYXf41c+KKkojo5s82WTta02ejNG9tpGwQcO9EUwcD2xt4bHA==');
define('NONCE_KEY',        '6LjKttOc1RkyAowrE8Jjtb+fLwc5Vz9K2gOy5Ydc90mCl2CHkZy/XnEcKxc382G5SLiBbGx6uwCFaYnmJvACtQ==');
define('AUTH_SALT',        'i3lVG636fR1EFMHDedE30KpMrVh5OOPX2eMYEJsYxcf0ifXxIqcuZU1G+Z0CA0kD4JKzCbPBooijfLyzmiatyg==');
define('SECURE_AUTH_SALT', 'kDomRxWjv3nc9rLJ5/Qrxc1TOZyCJqeJJNtUU9OQ3M8kSNi5H0PqqO5GzhGJC7QCiAXt8eibX/JD+vWsXZBoNQ==');
define('LOGGED_IN_SALT',   '+agp//eb7X7R6Dqa8QfGrWapwcFQG62JI4KRf88fyPhN0MuOcwy2KrQdwXyBF73tRTX7SI4QpQyn7OB56rsSjg==');
define('NONCE_SALT',       'ZMXPfnZBDgLsIgBAEo6NAzO0YXR++wLJK+81AjCzn6X1N/hF9U7kQraHAiyYuYmyznib6WGMjaFfeM3XKwJnxQ==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
