<?php if ( get_field('image_or_video') ) {?>
  <?php $images = get_field('slider'); if( $images ): ?>
    <div class="article-slider" id="article-slider">
      <div class="article-slider--carousel owl-carousel owl-theme">
        <?php foreach( $images as $image ): ?>
          <div class="item">
            <div class="item--content">
              <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>"/>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <a href="#" class="article-slider--apply"><i class="ico ico-apply">apply</i><?php echo __('Apply now', 'wpeasy'); ?></a>
    </div>
    <!-- /.article-slider -->
  <?php endif; ?>
<?php } else {?>
  <?php if ( have_rows('photo_and_video_slider') ) : ?>
    <div class="article-slider" id="article-slider">
      <div class="article-slider--carousel owl-carousel owl-theme">
        <?php while( have_rows('photo_and_video_slider') ) : the_row(); ?>

          <?php if ( get_sub_field('image_or_video') ) {?>
            <?php if ( get_sub_field('image') ) : $image = get_sub_field('image'); ?>
              <div class="item">
                <div class="item--content">
                  <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>"/>
                </div>
              </div>
            <?php endif; ?>
          <?php } else {?>
            <?php if ( get_sub_field('video') ) : ?>
              <div class="item item--video">
                <div class="item--content">
                  <?php if ( get_sub_field('video_preview_image') ) { ?>
                    <img src="<?php $video_preview_image = get_sub_field('video_preview_image'); echo $video_preview_image['sizes']['medium']; ?>" alt="<?php echo $video_preview_image['alt']; ?>"/>
                  <?php } else { ?>
                    <img src="https://img.youtube.com/vi/<?php the_sub_field('video'); ?>/sddefault.jpg" alt=""/>
                  <?php } ?>
                  <span class="yt-descr">Watch the video</span>
                  <button class="yt-play" src="https://www.youtube.com/embed/<?php the_sub_field('video'); ?>" data-target="#videoModal" data-toggle="modal"><i class="ico ico-youtube__play">youtube play</i></button>
                </div>
              </div>
            <?php endif; ?>
          <?php } ?>

        <?php endwhile; ?>
      </div>
      <a href="#" class="article-slider--apply"><i class="ico ico-apply">apply</i><?php echo __('Apply now', 'wpeasy'); ?></a>
    </div>
    <!-- /.article-slider -->
  <?php endif; ?>
<?php } ?>
