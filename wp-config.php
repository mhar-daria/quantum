<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache



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
define('DB_NAME', 'ss_dbname_5lfg7ch3ce');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY', '}R_+Q|Yy/oGRUSctCIscE{/$|K!hRPsEwS*]$gH*<=t=gLJld]|f-PG_<}qhFENZL{AweK)Ob)!WmEfh)y}Us^ggeWej>Lam-IbkEoSNYE)BGcOx?&CdtoYMxrlxl*Uf');
define('SECURE_AUTH_KEY', 'Q(VkWn&(/]$qEzHnzV?Zmx+?CwvSqUx>nEGg%SxMRcNCJ(k*dHQiP)Gq!J&n-v*+B)flsrey{C/<rr@<mppva]_X/VfNm=FsB&*cVp+=xhYWt!uHWDd+zRjUdv-)%(OV');
define('LOGGED_IN_KEY', '%{fE$cG[bvBvGe$g(E@NhnMO(Fv|+ff%UkG@m[QW)]ZB-f%iQ{uDc)C@oy_[]_$DU^/cWXNek_@m/nEm(b_Y$rjLqu+HOPAr+x_f[]vp{s$%XrxaG)j/+VfD<jSf}Ye=');
define('NONCE_KEY', 'MtUocQW&T=HlLvbbILq&?x[XCCY>vx<a>[lK?}zjMUEfMQqdVHEQVjG=XLu_qx?hq]tYbX&j&EeMyWd&CQ>(c>Q}GuW]bA_^bRx[iE<+>c&GH-TFH(YPAnSO)Q&Eod%y');
define('AUTH_SALT', ']*HPqTfGUa(^^z};hPFs<jeX>+IFxZAfy-j^?WvCqvvTWx)EyfyFKNP<MWD{y?VA?+T&ZNUcLO;tRs>XQ$U_GESEw+=SLGzFa^VKCOYTTIRg-*(?MsmFkxX)/Ri/rwta');
define('SECURE_AUTH_SALT', '+V=XCHoBcJX=A@vWXSY}URm<)[wr!qXvy@)GQG!kD[DM](yw<tEGTyPH>zvxV&COd&aNwjUPMlw$UlQLLTa;XfUiPek|/+pRlvx))efTdWy%XOYiqhAOAT/L<?{qoDms');
define('LOGGED_IN_SALT', 'K=?yu%+wp*f=jeWYQc}]gzKIFlXz{P+d;K/L|I{QF(l@wBjw!gHY*sVGqEPC!VGYv{rCTq!)ql-heT;kX?fkooKX_]mylCL|F=uTti;Do}qm=jNhUGI/}W=&bqRQQBgb');
define('NONCE_SALT', '{V)RydXqtT[!]-+&mL{%fD]VkB[}n{<rjSj+H;AqD!AW)SA;%ajHu?gn=P|)Y$MzEheGEO>^iF@MMKvDsbLp/<LavrE&_cxaYDAdALQe>)JPsVLzG&kk_|<N/(|yR+Hj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_anbb_';

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
define('WP_DEBUG', true);
define('WP_MEMORY_LIMIT', '512M');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
