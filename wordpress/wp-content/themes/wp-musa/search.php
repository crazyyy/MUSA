<?php get_header(); ?>
  <div class="container">
    <div class="row">
      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
      <h1 class="page-title cat-title col-12"><?php echo sprintf( __( 'Search Results for: %s', 'wpeasy' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
      <?php get_template_part('loop'); ?>
      <?php get_template_part('templatepart-pagination'); ?>
    </div><!-- /.row -->
  </div><!-- /.container -->
<?php get_footer(); ?>
