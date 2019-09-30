<?php /* Template Name: Reviews Page */ get_header(); ?>
  <div class="container">
    <div class="row">
      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('article--content col-md-12'); ?>>
          <div class="row">
            <h1 class="page-title col-9">
              <?php the_title(); ?>
            </h1>
            <div class="col-3">
              <a href="" class="btn btn-blue btn-feedback"><i class="ico ico-feedback">Feedback</i><?php echo __('Feedback', 'wpeasy'); ?></a>
            </div>

            <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; $temp = $wp_query; $wp_query= null; query_posts('post_type=review'.'&showposts=10'.'&paged='.$paged); while (have_posts()) : the_post();?>

              <div class="review--item col-12">
                <div class="review-img">
                  <?php if ( has_post_thumbnail()) { ?>
                    <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                  <?php } else { ?>
                    <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                  <?php } ?>
                </div>
                <div class="review--body">
                  <h4 class="review--title"><?php the_title(); ?></h4>
                  <?php the_content(); ?>
                  <span class="review--date"><?php the_time('j F Y'); ?> <span><?php the_time('G:i'); ?></span></span>
                </div>
              </div>

            <?php endwhile; ?>
            <?php get_template_part('templatepart-pagination'); ?>
            <?php $wp_query = null; $wp_query = $temp;?>

            </div><!-- /.row -->
          <!-- /.col-3 position--bottom-right -->
        </article>

        </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container-fluid container-color--bluelight container--writereview">
      <div class="row">
        <div class="container">
          <div class="row">
            <h2 class="services--title col-12"><?php echo __('Write a review on cooperation', 'wpeasy'); ?></h2>

            <form action="" class="col-12">
              <?php echo do_shortcode('[contact-form-7 id="142" title="Write a review"]'); ?>
            </form>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->

      <?php endwhile; endif; ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->

<?php get_footer(); ?>
