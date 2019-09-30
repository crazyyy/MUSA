
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('looper col-12'); ?>>
    <div class="row">

      <a rel="nofollow" class="feature-img looper--img col-3" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
        <?php if ( has_post_thumbnail()) { ?>
          <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
        <?php } else { ?>
          <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
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
<?php endwhile; endif; ?>
