<?php
/**
 * Front page template.
 * 静的プロトタイプ index.html の本文をそのまま移植。
 * お知らせセクションのみ「news」投稿タイプの最新3件をループ表示する。
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$img = SAWAYAKA_THEME_URI . '/assets/images/';
?>

<section class="hero" id="top" aria-labelledby="hero-title">
  <div class="hero-photo" role="img" aria-label="明るく清潔な歯科診療室"></div>
  <div class="hero-wash" aria-hidden="true"></div>
  <div class="paper-texture" aria-hidden="true"></div>

  <img class="decor decor-leaf" src="<?php echo esc_url( $img . 'asset-04_leaf-sprig-a.png' ); ?>" alt="" />
  <img class="decor decor-sparkle" src="<?php echo esc_url( $img . 'asset-03_sparkle-cluster.png' ); ?>" alt="" />
  <img class="decor decor-brush" src="<?php echo esc_url( $img . 'asset-02_toothbrush.png' ); ?>" alt="" />

  <div class="hero-inner">
    <div class="hero-copy">
      <p class="hero-kicker">地域の皆様が安心して通える、</p>
      <h1 class="hero-title" id="hero-title">
        <span>家族みんなの</span>
        <strong>歯科医院</strong>
      </h1>
      <p class="hero-description">
        小さなお子さまからご年配の方まで、<br />
        やさしい診療とわかりやすい説明で、<br />
        ご家族のお口の健康を支えます。
      </p>

      <a href="<?php echo esc_url( sawayaka_contact_url() ); ?>" class="btn" id="reservation">
        <span class="btn-icon" aria-hidden="true">◷</span>
        <span class="btn-text">ご予約・お問い合わせはこちら</span>
        <span class="btn-arrow" aria-hidden="true">→</span>
      </a>
    </div>

    <div class="hero-badge" aria-label="安心してご相談ください">
      <img src="<?php echo esc_url( $img . 'asset-01_tooth-smile.png' ); ?>" alt="" />
      <span>歯医者が苦手な方も<br />ご相談ください</span>
    </div>
  </div>

  <svg class="hero-wave" viewBox="0 0 1440 96" preserveAspectRatio="none" aria-hidden="true">
    <path d="M0,41 C210,96 334,4 558,50 C754,91 899,25 1087,47 C1241,65 1352,26 1440,18 L1440,96 L0,96 Z" fill="#fffdf9" />
    <path d="M0,52 C210,107 334,15 558,61 C754,102 899,36 1087,58 C1241,76 1352,37 1440,29" fill="none" stroke="#90d8f5" stroke-width="2" />
  </svg>
</section>

<section class="trust" aria-labelledby="trust-title">
  <div class="section-ornament" aria-hidden="true">
    <span></span><span></span><span></span>
  </div>
  <p class="section-title">FOR YOUR SMILE</p>
  <h2 class="section-heading" id="trust-title">さわやか歯科が大切にしていること</h2>
  <p class="section-lead">
    患者さんの不安をやわらげ、笑顔で通えることを大切に。<br />
    治療だけでなく、家族みんなの健康な歯を守るお手伝いをします。
  </p>

  <div class="trust-list" aria-label="次セクションのプレビュー">
    <article class="trust-card">
      <span class="trust-number">01</span>
      <img src="<?php echo esc_url( $img . 'asset-01_tooth-smile.png' ); ?>" alt="" />
      <h3>痛みの少ない<br />やさしい治療</h3>
    </article>
    <article class="trust-card">
      <span class="trust-number">02</span>
      <img src="<?php echo esc_url( $img . 'asset-02_toothbrush.png' ); ?>" alt="" />
      <h3>わかりやすく<br />丁寧な説明</h3>
    </article>
    <article class="trust-card">
      <span class="trust-number">03</span>
      <img src="<?php echo esc_url( $img . 'asset-04_leaf-sprig-a.png' ); ?>" alt="" />
      <h3>予防を通じて<br />健康な歯を守る</h3>
    </article>
  </div>
</section>

<section class="concept" id="concept">
  <div class="wrap concept-layout">
    <div class="organic-photo">
      <img src="<?php echo esc_url( $img . 'img8.jpg' ); ?>" alt="明るく落ち着いた待合スペース" />
    </div>
    <div class="section-copy">
      <p class="section-title">OUR CONCEPT</p>
      <h2 class="section-heading">安心して、笑顔で通える<br />地域の歯科医院を目指して</h2>
      <p class="section-lead">当院は、小さなお子さまからご年配の方まで、どなたでも安心して通える歯科クリニックを目指しています。</p>
      <p class="section-lead">単に「治療をする」のではなく、患者さんの不安をやわらげ、笑顔で通えることを大切に。やさしい診療と清潔で快適な環境で、家族みんなの健康な歯を守れるようサポートします。</p>
      <a href="#message" class="btn">院長からのごあいさつ <span aria-hidden="true">→</span></a>
    </div>
  </div>
</section>

<section class="medical" id="medical">
  <div class="wrap">
    <p class="section-title">MEDICAL SERVICES</p>
    <h2 class="section-heading">診療案内</h2>
    <p class="section-lead">お口のお悩みや年齢に合わせて、丁寧に診療します。</p>

    <div class="medical-list">
      <article class="medical-card">
        <img src="<?php echo esc_url( $img . 'asset-01_tooth-smile.png' ); ?>" alt="" />
        <span class="medical-number">01</span>
        <h3>一般歯科</h3>
        <p>むし歯や歯周病の治療を行い、できるだけ歯を残す治療を大切にしています。</p>
        <ul>
          <li>むし歯・詰め物・かぶせ物</li>
          <li>歯周病・歯石除去</li>
          <li>根管治療</li>
        </ul>
      </article>
      <article class="medical-card">
        <img src="<?php echo esc_url( $img . 'asset-02_toothbrush.png' ); ?>" alt="" />
        <span class="medical-number">02</span>
        <h3>小児歯科</h3>
        <p>初めての歯医者さんでも安心できるよう、やさしく丁寧に対応します。</p>
        <ul>
          <li>乳歯のむし歯治療</li>
          <li>シーラント</li>
          <li>フッ素塗布・歯磨き指導</li>
        </ul>
      </article>
      <article class="medical-card">
        <img src="<?php echo esc_url( $img . 'asset-03_sparkle-cluster.png' ); ?>" alt="" />
        <span class="medical-number">03</span>
        <h3>口腔外科</h3>
        <p>親知らずや顎関節症など、外科的な治療にも患者さんに合わせて対応します。</p>
        <ul>
          <li>親知らずの抜歯</li>
          <li>顎関節症</li>
          <li>口内炎・粘膜疾患</li>
        </ul>
      </article>
      <article class="medical-card">
        <img src="<?php echo esc_url( $img . 'asset-04_leaf-sprig-a.png' ); ?>" alt="" />
        <span class="medical-number">04</span>
        <h3>予防歯科</h3>
        <p>痛くなってからではなく、定期的な検診とケアで健康なお口を守ります。</p>
        <ul>
          <li>定期検診・PMTC</li>
          <li>フッ素塗布</li>
          <li>歯周病の予防と早期発見</li>
        </ul>
      </article>
    </div>
  </div>
</section>

<section class="environment">
  <div class="wrap environment-layout">
    <div class="section-copy">
      <p class="section-title">COMFORT &amp; SAFETY</p>
      <h2 class="section-heading">清潔で快適な<br />診療環境</h2>
      <p class="section-lead">患者さんに安心して治療を受けていただけるよう、衛生管理を徹底しています。明るく清潔感のある院内で、リラックスしてお過ごしください。</p>
      <div class="mini-features">
        <span>徹底した衛生管理</span><span>明るい院内</span><span>バリアフリー</span><span>キッズスペース</span>
      </div>
    </div>
    <div class="photo-collage">
      <img class="photo-collage-main" src="<?php echo esc_url( $img . 'img5.jpg' ); ?>" alt="清潔な診療室" />
      <img class="photo-collage-sub" src="<?php echo esc_url( $img . 'img9.jpg' ); ?>" alt="明るい院内スペース" />
    </div>
  </div>
</section>

<section class="message" id="message">
  <div class="wrap message-layout">
    <div class="doctor-photo"><img src="<?php echo esc_url( $img . 'doctor2_matsumoto.jpg' ); ?>" alt="院長 松本貴子" /></div>
    <div class="section-copy">
      <p class="section-title">MESSAGE</p>
      <h2 class="section-heading">地域のみなさまにとって、<br />「ここなら安心」と思える場所へ</h2>
      <p class="section-lead">みなさま、こんにちは。「さわやか歯科クリニック」院長の松本 貴子です。</p>
      <p class="section-lead">歯医者に苦手意識を持つ方にも、やさしく丁寧な治療を提供し、リラックスできる環境を整えています。痛みを抑えた治療とわかりやすい説明を心がけ、不安なく通えるよう努めています。</p>
      <p class="doctor-sign">さわやか歯科クリニック　院長<br /><strong>松本 貴子</strong></p>
    </div>
  </div>
</section>

<section class="staff" id="staff">
  <div class="wrap">
    <p class="section-title">OUR TEAM</p>
    <h2 class="section-heading">スタッフ紹介</h2>
    <p class="section-lead">お口のお悩みを、どうぞ気軽にお聞かせください。</p>

    <div class="staff-list">
      <article class="staff-card">
        <img src="<?php echo esc_url( $img . 'doctor2_matsumoto.jpg' ); ?>" alt="松本貴子" />
        <small>院長</small>
        <h3>松本 貴子</h3>
        <p>痛みの少ない治療とわかりやすい説明を心がけています。</p>
      </article>
      <article class="staff-card">
        <img src="<?php echo esc_url( $img . 'doctor1_tanaka.jpg' ); ?>" alt="田中健吾" />
        <small>歯科医師</small>
        <h3>田中 健吾</h3>
        <p>最適な治療とアドバイスで、長く健康な歯を支えます。</p>
      </article>
      <article class="staff-card">
        <img src="<?php echo esc_url( $img . 'staff1suzuki.jpg' ); ?>" alt="鈴木由佳" />
        <small>歯科衛生士</small>
        <h3>鈴木 由佳</h3>
        <p>クリーニングや毎日のセルフケアをお手伝いします。</p>
      </article>
    </div>
  </div>
</section>

<section class="news" id="news">
  <div class="wrap">
    <div class="news-heading-row">
      <div>
        <p class="section-title">NEWS &amp; COLUMN</p>
        <h2 class="section-heading">お知らせ・コラム</h2>
      </div>
      <a href="<?php echo esc_url( get_post_type_archive_link( 'news' ) ); ?>" class="btn">一覧を見る <span aria-hidden="true">→</span></a>
    </div>

    <div class="news-list">
      <?php
      $sawayaka_news = new WP_Query(
        array(
          'post_type'      => 'news',
          'posts_per_page' => 3,
          'no_found_rows'  => true,
        )
      );
      if ( $sawayaka_news->have_posts() ) :
        while ( $sawayaka_news->have_posts() ) :
          $sawayaka_news->the_post();
          $terms = get_the_terms( get_the_ID(), 'news_category' );
          $label = ( $terms && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'お知らせ';
          ?>
          <a class="news-card" href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'medium' ); ?>
            <?php endif; ?>
            <span class="category"><?php echo esc_html( $label ); ?></span>
            <h3 class="title"><?php the_title(); ?></h3>
          </a>
          <?php
        endwhile;
        wp_reset_postdata();
      else :
        ?>
        <p>現在お知らせはありません。</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<section class="access" id="access">
  <div class="wrap access-layout">
    <div class="access-card">
      <p class="section-title">ACCESS</p>
      <h2 class="section-heading">アクセス</h2>
      <p class="address">〒105-0001<br />東京都港区虎ノ門1丁目3-1</p>
      <p>東京メトロ 虎ノ門駅より直結・徒歩1分</p>
      <p class="note">駐車場はありません。近隣のコインパーキングをご利用ください。</p>
      <div class="map-placeholder" aria-label="地図掲載予定位置"><span>MAP</span><strong>虎ノ門駅 直結</strong></div>
    </div>
    <div class="schedule-card">
      <p class="section-title">OPENING HOURS</p>
      <h2 class="section-heading">診療時間</h2>
      <table>
        <thead>
          <tr><th>診療時間</th><th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th><th>日</th></tr>
        </thead>
        <tbody>
          <tr><th>9:30–13:00</th><td>●</td><td>●</td><td>―</td><td>●</td><td>●</td><td>●</td><td>―</td></tr>
          <tr><th>14:00–18:30</th><td>●</td><td>●</td><td>―</td><td>●</td><td>●</td><td>―</td><td>―</td></tr>
        </tbody>
      </table>
      <p>休診日：水曜日・日曜日<br />土曜日は午前のみ診療します。</p>
      <a href="<?php echo esc_url( sawayaka_contact_url() ); ?>" class="btn">予約・お問い合わせ <span aria-hidden="true">→</span></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
