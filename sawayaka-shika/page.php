<?php
/**
 * 汎用固定ページテンプレート（page-contact.php等、スラッグ専用テンプレートが無いページ用）。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="contact-hero">
  <div class="wrap">
    <?php
    while ( have_posts() ) :
      the_post();
      ?>
      <h1><?php the_title(); ?></h1>
      <div class="page-content"><?php the_content(); ?></div>
      <?php
    endwhile;
    ?>
  </div>
</section>

<?php get_footer(); ?>
