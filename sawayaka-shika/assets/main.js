// さわやか歯科クリニック - 共通スクリプト
// SANBOU PARTNERS株式会社のプロトタイプ（main.js）のハンバーガーメニュー実装
// （#hamburger / #header-Navi / .open）と同じ書き方に合わせている。

document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.getElementById("hamburger");
  const headerNavi = document.getElementById("header-Navi");

  // ハンバーガーメニューの開閉（スマホ表示のみ。PC表示では#hamburger自体が
  // 非表示なのでここは何も起きない）
  if (hamburger && headerNavi) {
    hamburger.addEventListener("click", function () {
      const isOpen = headerNavi.classList.toggle("open");
      hamburger.setAttribute("aria-expanded", String(isOpen));
      hamburger.setAttribute("aria-label", isOpen ? "メニューを閉じる" : "メニューを開く");
    });

    headerNavi.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        headerNavi.classList.remove("open");
        hamburger.setAttribute("aria-expanded", "false");
        hamburger.setAttribute("aria-label", "メニューを開く");
      });
    });
  }
});
