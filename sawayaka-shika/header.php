<?php
/**
 * Header template.
 * コーディング規約はSANBOU PARTNERS（sanbou-partners-lp）に合わせている：
 * #header + .wrap、#site-Title、#header-Navi（ul.menu）、#hamburger（開閉は.openクラス、main.jsが担当）。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$sawayaka_home_href = is_front_page() ? '#top' : esc_url( home_url( '/' ) );
$sawayaka_contact_url = sawayaka_contact_url();

/**
 * メニューが未設定のときのフォールバック（静的プロトタイプと同じ項目）。
 */
function sawayaka_primary_menu_fallback() {
	$items = array(
		'top'     => 'ホーム',
		'medical' => '診療案内',
		'concept' => '当院について',
		'staff'   => '院長・スタッフ',
		'news'    => 'お知らせ',
		'access'  => 'アクセス',
	);
	echo '<ul class="menu">';
	foreach ( $items as $anchor => $label ) {
		if ( 'top' === $anchor ) {
			$href    = is_front_page() ? '#top' : esc_url( home_url( '/' ) );
			$current = is_front_page() ? ' aria-current="page"' : '';
		} elseif ( 'news' === $anchor ) {
			$href    = is_front_page() ? '#news' : esc_url( get_post_type_archive_link( 'news' ) );
			$current = is_post_type_archive( 'news' ) ? ' aria-current="page"' : '';
		} else {
			$href    = sawayaka_nav_href( $anchor );
			$current = '';
		}
		printf( '<li><a href="%s"%s>%s</a></li>', esc_url( $href ), $current, esc_html( $label ) );
	}
	echo '</ul>';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="icon" type="image/svg+xml" href="<?php echo esc_url( SAWAYAKA_THEME_URI . '/assets/images/favicon.svg' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="header"<?php echo is_front_page() ? '' : ' class="sub-header"'; ?> role="banner">
  <div class="wrap">
    <h1 id="site-Title">
      <a href="<?php echo esc_url( $sawayaka_home_href ); ?>" class="site-Title-Link" aria-label="<?php bloginfo( 'name' ); ?> ホーム">
        <img class="site-Title-Logo" src="<?php echo esc_url( SAWAYAKA_THEME_URI . '/assets/images/logo2.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
      </a>
    </h1>

    <nav id="header-Navi" aria-label="メインナビゲーション">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'primary',
          'container'      => false,
          'items_wrap'     => '<ul class="menu">%3$s</ul>',
          'fallback_cb'    => 'sawayaka_primary_menu_fallback',
        )
      );
      ?>
    </nav>

    <a href="<?php echo esc_url( $sawayaka_contact_url ); ?>" class="btn">
      <span class="cta-icon" aria-hidden="true">☎</span>
      <span><small>ご予約・お問い合わせ</small>予約はこちら</span>
    </a>

    <button id="hamburger" type="button" aria-label="メニューを開く" aria-expanded="false" aria-controls="header-Navi">
      <span></span>
      <span></span>
      <span></span>
    </button>
  </div>
</header>

<main id="main">
