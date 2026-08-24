<?php
/**
 * Footer template.
 * フロントページはナビゲーション付きフッター、サブページは1つのCTAボタンのみ。
 * （静的プロトタイプのindex.html／contact.html／news.htmlのフッター構成差をそのまま踏襲）
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function sawayaka_footer_menu_fallback() {
	$items = array(
		'medical' => '診療案内',
		'staff'   => '院長・スタッフ',
	);
	echo '<ul class="menu">';
	foreach ( $items as $anchor => $label ) {
		printf( '<li><a href="%s">%s</a></li>', esc_url( sawayaka_nav_href( $anchor ) ), esc_html( $label ) );
	}
	printf( '<li><a href="%s">お知らせ</a></li>', esc_url( get_post_type_archive_link( 'news' ) ) );
	printf( '<li><a href="%s">お問い合わせ</a></li>', esc_url( sawayaka_contact_url() ) );
	echo '</ul>';
}
?>
</main>

<footer id="footer" role="contentinfo">
  <div class="wrap footer-Container">
    <div id="footer-Logo">
      <img src="<?php echo esc_url( SAWAYAKA_THEME_URI . '/assets/images/logo2.svg' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
    </div>
    <p class="tagline">地域に寄り添う、やさしい歯医者さん</p>

    <?php if ( is_front_page() ) : ?>
      <nav id="footer-Navi">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'footer',
            'container'      => false,
            'items_wrap'     => '<ul class="menu">%3$s</ul>',
            'fallback_cb'    => 'sawayaka_footer_menu_fallback',
          )
        );
        ?>
      </nav>
    <?php elseif ( is_page( 'contact' ) ) : ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn">ホームへ戻る →</a>
    <?php else : ?>
      <a href="<?php echo esc_url( sawayaka_contact_url() ); ?>" class="btn">予約・お問い合わせ →</a>
    <?php endif; ?>

    <p class="copyright">&copy; <?php bloginfo( 'name' ); ?></p>
  </div>
</footer>

<a href="<?php echo esc_url( sawayaka_contact_url() ); ?>" class="btn" id="mobile-reservation">
  <span class="btn-icon" aria-hidden="true">◷</span>
  <span><small>WEBから24時間受付</small>予約・お問い合わせ</span>
</a>

<?php wp_footer(); ?>
</body>
</html>
