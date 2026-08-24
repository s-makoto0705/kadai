<?php
/**
 * Sawayaka Shika Clinic theme functions.
 * コーディング規約はSANBOU PARTNERS（veracraft/projects/sanbou-partners-lp）に合わせている。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SAWAYAKA_THEME_DIR', get_template_directory() );
define( 'SAWAYAKA_THEME_URI', get_template_directory_uri() );
define( 'SAWAYAKA_THEME_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * テーマサポート・メニュー
 */
function sawayaka_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	register_nav_menus(
		array(
			'primary' => 'ヘッダーナビゲーション',
			'footer'  => 'フッターナビゲーション',
		)
	);
}
add_action( 'after_setup_theme', 'sawayaka_setup' );

/**
 * CSS/JS読み込み
 */
function sawayaka_enqueue_assets() {
	wp_enqueue_style(
		'sawayaka-google-fonts',
		'https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@400;500&family=Noto+Sans+JP:wght@400;500;600;700&display=swap',
		array(),
		null
	);

	wp_enqueue_style( 'sawayaka-style', get_stylesheet_uri(), array( 'sawayaka-google-fonts' ), SAWAYAKA_THEME_VERSION );

	wp_enqueue_script( 'sawayaka-main', SAWAYAKA_THEME_URI . '/assets/main.js', array(), SAWAYAKA_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'sawayaka_enqueue_assets' );

function sawayaka_font_preconnect() {
	echo '<link rel="preconnect" href="https://fonts.googleapis.com" />' . "\n";
	echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />' . "\n";
}
add_action( 'wp_head', 'sawayaka_font_preconnect', 1 );

/**
 * お知らせ・コラム（カスタム投稿タイプ）
 * 静的サイトのnews.htmlをWP管理画面から更新できるようにするための投稿タイプ。
 */
function sawayaka_register_news_cpt() {
	register_post_type(
		'news',
		array(
			'label'        => 'お知らせ・コラム',
			'labels'       => array(
				'name'          => 'お知らせ・コラム',
				'singular_name' => 'お知らせ',
				'add_new_item'  => '新規お知らせを追加',
				'edit_item'     => 'お知らせを編集',
			),
			'public'       => true,
			'has_archive'  => 'news',
			'rewrite'      => array( 'slug' => 'news' ),
			'menu_icon'    => 'dashicons-megaphone',
			'supports'     => array( 'title', 'editor', 'thumbnail' ),
			'show_in_rest' => true,
		)
	);

	register_taxonomy(
		'news_category',
		'news',
		array(
			'label'        => 'お知らせカテゴリ',
			'public'       => true,
			'hierarchical' => true,
			'rewrite'      => array( 'slug' => 'news-category' ),
			'show_in_rest' => true,
		)
	);
}
add_action( 'init', 'sawayaka_register_news_cpt' );

/**
 * 「お知らせ」「豆知識」の2つを初回有効化時にあらかじめ作っておく。
 * hierarchical => true のタクソノミーはチェックボックスUIになるため、
 * 管理画面側で表記ゆれ（例：「お知らせ」と「おしらせ」）が起きないようにする。
 */
function sawayaka_register_default_news_categories() {
	foreach ( array( 'お知らせ', '豆知識' ) as $term ) {
		if ( ! term_exists( $term, 'news_category' ) ) {
			wp_insert_term( $term, 'news_category' );
		}
	}
}
add_action( 'init', 'sawayaka_register_default_news_categories', 20 );

/**
 * トップページのナビゲーション用URL。
 * フロントページではセクションアンカー（#medical等）、サブページではホームURL付きアンカーにする。
 * static/index.html・contact.html・news.html のリンクの出し分けと同じ考え方。
 */
function sawayaka_nav_href( $anchor ) {
	if ( is_front_page() ) {
		return '#' . $anchor;
	}
	return esc_url( home_url( '/#' . $anchor ) );
}

/**
 * お問い合わせページのURL（page-contact.phpテンプレートを割り当てた固定ページ）。
 */
function sawayaka_contact_url() {
	$page = get_page_by_path( 'contact' );
	if ( $page ) {
		return get_permalink( $page );
	}
	return home_url( '/contact/' );
}

/**
 * Contact Form 7のフォームを出力する。
 * タイトルの完全一致に頼らず、サイト内に作成済みの最初のフォームを自動的に使う
 * （このサイトではフォームは1つしか作らない前提のため、タイトルの表記ゆれで
 * 「コンタクトフォームが見つかりません」エラーになることを避ける）。
 */
function sawayaka_render_contact_form() {
	if ( ! class_exists( 'WPCF7_ContactForm' ) ) {
		echo '<p class="note" role="alert">お問い合わせフォームのプラグイン（Contact Form 7）が有効化されていません。</p>';
		return;
	}

	$forms = WPCF7_ContactForm::find( array( 'posts_per_page' => 1 ) );

	if ( empty( $forms ) ) {
		echo '<p class="note" role="alert">お問い合わせフォームがまだ作成されていません。管理画面の「お問い合わせ」からフォームを1件作成してください。</p>';
		return;
	}

	echo do_shortcode( $forms[0]->shortcode() );
}
