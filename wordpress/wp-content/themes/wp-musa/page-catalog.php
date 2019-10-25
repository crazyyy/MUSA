<?php /* Template Name: Catalog */ get_header(); ?>
<main class="scroll-box__wrap">

  <section class="section-article">
    <div class="site-width border-box">
      <div class="container-fluid">

        <article class="article--content col-md-12">
          <div class="row">
            <h1 class="page-title col-12"><?php the_title(); ?></h1>
            <div class="col-12">
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Impedit itaque tempora accusantium enim velit
              doloribus, quae facere quasi reprehenderit veritatis autem maxime! Ut id ex maiores provident excepturi
              perferendis esse!

              <?php
              $area = $_GET['area'];
              $level = $_GET['level'];
              $region = $_GET['region'];
              $types = $_GET['types'];
              $language = $_GET['language'];

              echo  $area;
              echo $level;
              echo      $region;
              echo      $types;
              echo      $language;

              $products =  array(
                'post_type' => 'university',
                'posts_per_page' => 15,
                'orderby' => 'title',
                'order'   => 'ASC',
                'tax_query' => array(
                  'relation' => 'OR',
                  array(
                    'taxonomy' => 'area',
                    'field' => 'term_id',
                    'terms' => $area
                  ),
                  array(
                    'taxonomy' => 'level',
                    'field' => 'term_id',
                    'terms' => $level
                  ),
                  array(
                    'taxonomy' => 'types',
                    'field' => 'term_id',
                    'terms' => $types
                  ),
                  array(
                    'taxonomy' => 'language',
                    'field' => 'term_id',
                    'terms' => $language
                  )
                )
              )
              ?>

              <?php
              $temp = $wp_query;
              $wp_query = null;
              query_posts($products);
              while (have_posts()) : the_post(); ?>



              <div id="post-<?php the_ID(); ?>" <?php post_class('looper col-12'); ?>>
                <div class="row">

                  <a rel="nofollow" class="feature-img looper--img col-3" href="<?php the_permalink(); ?>"
                    title="<?php the_title(); ?>">
                    <?php if (has_post_thumbnail()) { ?>
                    <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>"
                      alt="<?php the_title(); ?>" />
                    <?php } else { ?>
                    <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>"
                      alt="<?php the_title(); ?>" />
                    <?php } ?>
                  </a><!-- /post thumbnail -->

                  <div class="looper--content col-9">
                    <h2 class="inner-title">
                      <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    </h2><!-- /post title -->
                    <?php wpeExcerpt('wpeExcerpt40'); ?>
                    <span class="date"><?php the_time('j F Y'); ?> <span><?php the_time('G:i'); ?></span></span>
                  </div>
                  <!-- /.looper-content col-9 -->

                </div>
              </div><!-- /looper -->



              <?php endwhile; ?>
              <?php $wp_query = null;
              $wp_query = $temp; ?>


            </div>

          </div><!-- /.row -->
          <!-- /.col-3 position--bottom-right -->
        </article>




      </div>
    </div>
  </section>


</main>
<?php get_footer(); ?>