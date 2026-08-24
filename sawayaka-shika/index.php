<?php
/**
 * デフォルトフォールバックテンプレート（WPテーマの必須ファイル）。
 * 本サイトはfront-page.php／archive-news.php／single-news.php／page-contact.phpで
 * 主要な画面を賄うため、このテンプレートは想定外のURLに対する最低限の受け皿。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="contact-hero">
  <div class="wrap">
    <?php if ( have_posts() ) : ?>
      <?php
      while ( have_posts() ) :
        the_post();
        ?>
        <h1><?php the_title(); ?></h1>
        <div class="page-content"><?php the_content(); ?></div>
        <?php
      endwhile;
      ?>
    <?php else : ?>
      <h1>ページが見つかりません</h1>
      <p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn">ホームへ戻る →</a></p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
