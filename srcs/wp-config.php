<?php

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'admin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'fluffy' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('AUTH_KEY',         '|WKo279FcL.j_ G$DOn;TXsH/wP=[$[1i^+~`|;!w|!KIa1$R5`D,0<V5prPa;m4');
define('SECURE_AUTH_KEY',  'ojU%olj}N`2<DgV_F?P=Xrc[z|j*TH@Ll+.Xh>=V|FM*K`@C^RWSPv{V./k){s ]');
define('LOGGED_IN_KEY',    't[8x45+V0D>_jO4=#g*u{o|?Hy_$A(u?@-`0G5R6-n$i;Q=u!8+:0tT/5:Q=8<Vg');
define('NONCE_KEY',        'z}yPHE]g=uo1Ex0rPS3S~kQ1A#.yBHi5W h^P)i}>;_[P`Zx,B%d5}.{q>ZPMmLu');
define('AUTH_SALT',        'ME) ~|J?G!X)uI+k@yT(*mUZBWsQiNPS]*^x-<cp+DYA=J:N]7O+t_rU(^)@+kqv');
define('SECURE_AUTH_SALT', 'Zjl&O}$uz|f(sRSe%ZT*@SkCg.`Sm/e0Z/CEW<|vRwOl}qbR!nzA-D>X%eKGcV2E');
define('LOGGED_IN_SALT',   'GBp!7=U*T~#-%Ly?FnT$qgYEzGnX1w3!Bo_ ]$o]EDj{wh,fe1NJK9VkI_n ;hTD');
define('NONCE_SALT',       'fdTm,$h?vjzLS(yMKj!rZ]0aZ*f(Q(/t|cS|;o)%{GqCK4IxG-+fyL_Yan~ns4XF');

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
