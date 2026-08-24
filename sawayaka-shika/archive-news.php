<?php
/**
 * お知らせ・コラム 一覧テンプレート（news投稿タイプのアーカイブ）。
 * 静的プロトタイプ news.html を移植し、記事本文をループでそのまま表示する。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="news-hero">
  <div class="wrap">
    <p class="label">NEWS &amp; COLUMN</p>
    <h1>お知らせ・コラム</h1>
    <p class="lead">医院からのお知らせと、お口の健康に役立つ情報をお届けします。</p>
  </div>
</section>

<section class="article-list">
  <div class="wrap">
    <?php if ( have_posts() ) : ?>
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
            <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_content(); ?>
          </div>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <p>現在お知らせはありません。</p>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>
