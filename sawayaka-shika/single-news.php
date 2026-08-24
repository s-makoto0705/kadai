<?php
/**
 * お知らせ・コラム 個別記事テンプレート。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="news-hero">
  <div class="wrap">
    <p class="label">NEWS &amp; COLUMN</p>
    <h1><?php the_title(); ?></h1>
  </div>
</section>

<section class="article-list">
  <div class="wrap">
    <?php
    while ( have_posts() ) :
      the_post();
      $terms = get_the_terms( get_the_ID(), 'news_category' );
      $label = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'お知らせ';
      ?>
      <article class="article" id="article-<?php the_ID(); ?>">
        <?php if ( has_post_thumbnail() ) : ?>
          <div class="article-image"><?php the_post_thumbnail( 'medium' ); ?></div>
        <?php endif; ?>
        <div>
          <span class="category"><?php echo esc_html( $label ); ?></span>
          <p class="title" style="font-size: 0.85rem; color: var(--color-text-light);"><?php echo esc_html( get_the_date() ); ?></p>
          <?php the_content(); ?>
        </div>
      </article>
      <p><a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="btn">一覧へ戻る <span aria-hidden="true">→</span></a></p>
    <?php endwhile; ?>
  </div>
</section>

<?php get_footer(); ?>
