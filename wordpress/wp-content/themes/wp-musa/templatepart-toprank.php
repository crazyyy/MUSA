<?php query_posts("showposts=20&post_type=university"); ?>
  <?php if ( have_posts() ) : ?>

    <div class="container-fluid container-toprank">
      <div class="row">
        <div class="container">
          <div class="row">
            <h6 class="toprank-title col-12"><?php echo __('Top rank dotas', 'wpeasy'); ?></h6>
            <div class="toprank--carousel owl-carousel owl-theme col-12">
              <?php while ( have_posts() ) : the_post(); ?>
                <a id="post-<?php the_ID(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="toprank-item">
                  <?php if ( has_post_thumbnail()) { ?>
                    <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                  <?php } else { ?>
                    <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                  <?php } ?>
                  <h5 class="toprank--name"><?php the_title(); ?></h5>
                </a>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

  <?php endif; ?>
<?php wp_reset_query(); ?>
