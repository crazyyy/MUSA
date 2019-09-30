<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="//www.google-analytics.com/" rel="dns-prefetch">
  <link href="//fonts.googleapis.com" rel="dns-prefetch">
  <link href="//cdnjs.cloudflare.com" rel="dns-prefetch">

  <!-- icons -->
  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

  <?php wp_head(); ?>

  <!--[if lt IE 9]>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body <?php body_class(); ?>>
<!-- wrapper -->
<div class="wrapper">
  <header role="banner">
    <div class="container">
      <div class="row">

        <div class="header--logo col-xl-2 col-lg-2 col-md-2 col-sm-2">
          <?php if ( !is_front_page() && !is_home() ){ ?>
            <a href="<?php echo home_url(); ?>">
          <?php } ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
          <?php if ( !is_front_page() && !is_home() ){ ?>
            </a>
          <?php } ?>
        </div><!-- /header--logo -->

        <div class="header--phone col-xl-3 col-lg-3 col-md-3 col-sm-3">
          <a href="tel:+380980505037">+38 (098) <span>050-50-37</span></a>
        </div>
        <!-- /.header--phone -->

        <div class="header--social col-xl-2 col-lg-2 col-md-2 col-sm-2">
          <a href="#" class="header--social__whatsapp">whatsapp</a>
          <a href="#" class="header--social__viber">viber</a>
          <a href="#" class="header--social__skype">skype</a>
          <a href="#" class="header--social__messenger">messenger</a>
          <a href="#" class="header--social__facebook">facebook</a>
          <a href="#" class="header--social__instagram">instagram</a>
        </div>
        <!-- /.header--social col-xl-2 col-lg-2 col-md-2 col-sm-2 -->

        <div class="header--lang col-xl-2 col-lg-2 col-md-2 col-sm-2">
          <select name="" id="">
            <option value="eng">eng</option>
            <option value="ukr">ukr</option>
            <option value="rus">rus</option>
          </select>
        </div>
        <!-- /.header--lang col-xl-2 col-lg-2 col-md-2 col-sm-2 -->

        <div class="header--button col-xl-3 col-lg-3 col-md-3 col-sm-3">
          <button class="header--button__admission"><i class="ico ico-admission"></i>Admission with Monarch</button>
        </div>
        <!-- /.header--button col-xl-2 col-lg-2 col-md-2 col-sm-2 -->

      </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container-fluid header--dark">
      <div class="row">
        <div class="container">
          <div class="row">
            <nav class="header--nav" role="navigation">
              <?php wpeHeadNav(); ?>
            </nav><!-- /header--nav -->

            <div class="header--search col-xl-3 col-lg-3 col-md-3 col-sm-3">
              <?php get_template_part('searchform'); ?>
            </div>
            <!-- /.header--search -->

          </div><!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
    </div><!-- /.container -->
  </header><!-- /header -->

  <section role="main">
