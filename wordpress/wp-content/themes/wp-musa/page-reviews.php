<?php /* Template Name: Reviews Page */ get_header(); ?>
  <div class="container">
    <div class="row">
      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('article--content col-md-12'); ?>>
          <div class="row">
            <h1 class="page-title col-12"><?php the_title(); ?></h1>
            <div class="col-9">
              <?php the_content(); ?>
            </div>
            <!-- /.col-9 -->
            <div class="col-3 position--bottom-right">
              <a href="" class="btn btn-blue btn-feedback"><i class="ico ico-feedback">Feedback</i><?php echo __('Feedback', 'wpeasy'); ?></a>
            </div>
            </div><!-- /.row -->
          <!-- /.col-3 position--bottom-right -->
        </article>



      <?php endwhile; endif; ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

<?php get_footer(); ?>
