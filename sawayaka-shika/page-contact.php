<?php
/**
 * お問い合わせページテンプレート。
 * WPのテンプレート階層により、スラッグが「contact」の固定ページに自動適用される。
 * 静的プロトタイプ contact.html の本文をそのまま移植し、フォーム部分のみ
 * Contact Form 7に差し替えている（フォーム自体の項目・文面はWP管理画面側で作成する。
 * 具体的なCF7テンプレートは veracraft/projects/sawayaka-shika-wp/README.md 参照）。
 * フォームの呼び出しは functions.php の sawayaka_render_contact_form() が担当する
 * （タイトルの完全一致に頼らず、作成済みの最初のフォームを自動的に使う）。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="contact-hero">
  <div class="wrap">
    <p class="label">CONTACT</p>
    <h1>ご予約・お問い合わせ</h1>
    <p class="lead">診療のご相談やご予約について、下記フォームよりお送りください。</p>
  </div>
</section>

<section class="contact-main">
  <div class="wrap">
    <div class="contact-layout">

      <div class="contact-intro">
        <h2>お問い合わせの前に</h2>
        <p>内容を確認後、当院からご連絡いたします。</p>
        <ul>
          <li>お急ぎの症状については、お電話でお問い合わせください。</li>
          <li>診療内容によっては、ご来院後の確認が必要です。</li>
          <li>個人情報の取扱方針は、送信いただいた内容の連絡以外の目的には使用しません。</li>
        </ul>
      </div>

      <div class="contact-form-area">
        <?php sawayaka_render_contact_form(); ?>
      </div>

    </div>
  </div>
</section>

<?php get_footer(); ?>
