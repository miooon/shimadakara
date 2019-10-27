<?php
/**
 * The header for our theme second page
 *
 * @package shimadakara
 */

?>
<!doctype html>
<html lang="ja" prefix="og: http://ogp.me/ns#">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0">

<title><?php wp_title(''); ?></title>

<!-- Meta -->
<meta name="description" content="うるまシマダカラ芸術祭は、イチハナリアートプロジェクトの後継イベント。現代アート、デザイン、食、工芸など30組の作家が沖縄の原風景が残るうるま市の５つの島を舞台に島人とともにつくりあげる芸術祭。" />
<meta name="keywords" content="沖縄,うるま市,シマダカラ芸術祭,芸術祭,イチハナリアート,現代アート、デザイン,食,工芸,離島,平安座島（へんざ）,浜比嘉島（はまひが）,宮城島（みやぎ）,伊計島（いけい）,津堅島（つけん）" />

<!-- OpenGraphProtocol -->
<meta property="og:site_name" content="うるまシマダカラ芸術祭のwebサイト" />
<meta property="og:locale" content="ja_JP" />
<meta property="og:title" content="うるまシマダカラ芸術祭" />
<meta property="og:description" content="うるまシマダカラ芸術祭は、イチハナリアートプロジェクトの後継イベント。現代アート、デザイン、食、工芸など30組の作家が沖縄の原風景が残るうるま市の５つの島を舞台に島人とともにつくりあげる芸術祭。" />
<meta property="og:image" content="https://uruma.shimadakara.jp/img/ogp.jpg" />

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url( home_url( '/' ) ); ?>img/icon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url( home_url( '/' ) ); ?>img/icon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url( home_url( '/' ) ); ?>img/icon/favicon-16x16.png">
<link rel="manifest" href="<?php echo esc_url( home_url( '/' ) ); ?>img/icon/site.webmanifest">
<link rel="mask-icon" href="<?php echo esc_url( home_url( '/' ) ); ?>img/icon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Event",
  "name": "うるまシマダカラ芸術祭",
  "startDate": "2019-11-01T10:00-17:00",
  "location": {
    "@type": "Place",
    "name": "旧浜比嘉小学校",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "勝連浜19",
      "addressLocality": "うるま市",
      "addressRegion": "沖縄県",
      "addressCountry": "日本"
    }
  }
  "description": "うるまシマダカラ芸術祭は、イチハナリアートプロジェクトの後継イベント。現代アート、デザイン、食、工芸など30組の作家が沖縄の原風景が残るうるま市の５つの島を舞台に島人とともにつくりあげる芸術祭。",
  "endDate": "2019-11-10T10:00-17:00"
}
</script>

<!-- Css -->
<link rel="stylesheet" media="screen,tv,handheld,print" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
<link rel="stylesheet" href="<?php echo esc_url( home_url( '/' ) ); ?>css/sublimeSlideshow.css">
<link rel="stylesheet" href="<?php echo esc_url( home_url( '/' ) ); ?>css/remodal.css">
<link rel="stylesheet" href="<?php echo esc_url( home_url( '/' ) ); ?>css/remodal-default-theme.css">


<!-- Script -->
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<?php wp_head(); ?>
</head>

<body class="sec">
<div id="wrapper">
<div id="logo"><a href="/"><img src="<?php get_template_directory_uri(); ?>/img/logo_color.svg" alt="シマダカラ芸術祭"></a></div>

