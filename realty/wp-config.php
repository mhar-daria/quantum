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
define('DB_NAME', 'ss_dbname_c4e1h2g33c');

/** MySQL database username */
define('DB_USER', 'lB39zzerXtT841k');

/** MySQL database password */
define('DB_PASSWORD', 'mrmybHTvJqPL5vzX');

/** MySQL hostname */
define('DB_HOST', 'qr3dubai.ipowermysql.com');

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
define('AUTH_KEY', 'cUytbY}MCh!ssgsvYJi-hs;&V!Y!eu$eX?WAkv%hJIhlfa<%R_>hf?XHNbWJcFPJT!QOx{CVMb-SyW)|jx+WL+TEqtzcso<X&ui>YxuO(GfbO*zU?)sWEpTw|V?s$[y|');
define('SECURE_AUTH_KEY', '!$Joo>q$Bdk*xQ+-JK<PzLgDVB|^F!!FISt-zHi/^R^sxU/IJ(l|tDP}sETzrC;!xSik<MePb<RQqO!leq{+&?URWjo*KYVI>V!+Z!nQfI^O?Ul)bI/)[nD!q|=N<tii');
define('LOGGED_IN_KEY', 'p!hZXoT]sJdiUFT;_@H%;G(KDffXrxzGjehZSeCZtOmScu;w-k/e*W{$XcPMdRu](!j-)(%?dvb=DpCl^AuHGC=;*eLgK<RCaI-mig>O>-rS<YuqXbjIuo|ukAy!msM}');
define('NONCE_KEY', 'FBor}m]{nuHh-<XOqw@P;vCf^sI&<k]SR)Hg)s-w&Np(K]b]>a(X]IvdCHtE*a/+^Jry[UZ?Ud(oVbpLo;WmKj-)<[F*$S>?FpjC*/Ou-D^)I(;adDPV+fiOfx;oHSDC');
define('AUTH_SALT', '>wOYVBsQzK^hdC)s{ZgORTjVP-c/Ff;w+UhO*yQP)UyRpzuNuf%=hqIr@?[lDhHb@QkJz$bDZbAodaOcduI_H@CQ|qhXC}yIaX$%dCj^U[xs(xF$^wu[V=mRsrU<nK*<');
define('SECURE_AUTH_SALT', 'ZeCLZ*oPFu>%aOAjnwyR[&E@qUMLk/xM<nq&+DQ!OQzlL;}z}nGUQFh;IiE}i)Y$%r(L$!vH[Lb{by_NLJ|uaxpkE)@&){(jSWsp/[kn/Hd/?NC&-Xm;fCNaEw$]QyEQ');
define('LOGGED_IN_SALT', '@eq^X/Ix|l+ypTv>csb]{R>SPcy)pFuJvm&uFjCPb<%um-D^uK+(uxh;Bq@[Ry&dQf/U<&kt>P?)Dv+jCfoe^AEXn-rBkpXETlts/k{}Gb[{^scZGfO)@P?Nkcg&-=;q');
define('NONCE_SALT', 'hbC$/UY(@fLM&zE?Qv-GZMLFdZlf=d__Ou+pw&hT=TZt;laD{WAMh)qDUIb[MF_/fVMj^QAf)xwCwEP$}|yBYtQ{^mf;bwq|I{K/yK%Le;ZQdtFdbDBnW@dEz$N;X>zR');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_iiap_';

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
