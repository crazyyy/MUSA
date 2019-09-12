<?php /* Template Name: Public Contract Page */ get_header(); ?>
  <div class="container">
    <div class="row">
      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('article--content col-md-12'); ?>>
          <h1 class="page-title"><?php the_title(); ?></h1>
          <?php the_content(); ?>
          <?php edit_post_link(); ?>
        </article>

      <?php endwhile; endif; ?>
    </div><!-- /.row -->
  </div><!-- /.container -->
<?php get_footer(); ?>
