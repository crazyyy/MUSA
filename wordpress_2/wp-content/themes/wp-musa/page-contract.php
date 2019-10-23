<?php /* Template Name: Public Contract Page */ get_header(); ?>
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
      </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container-fluid container-pagecontract container-color--bluelight">
      <div class="row">
        <div class="container">
          <div class="row">
            <?php if ( have_rows('public_offer_pdf') ) : ?>

              <div class="pagecontract-tabs col-8 offset-1">
                <?php $ia = 0; while( have_rows('public_offer_pdf') ) : the_row(); ?>
                  <?php if ( get_sub_field('file') ) : $file = get_sub_field('file'); ?>
                    <button class="btn btn-transparent pagecontract--tablinks <?php if ( $ia === 0 ) { echo 'pagecontract--tablinks__active'; } ?>" data-id="tabcontent_<?php echo $ia; ?>" data-link="<?php echo $file['url']; ?>" data-title="<?php echo $file['title']; ?>"><?php the_sub_field('language'); ?></button>
                  <?php $ia++; endif; ?>
                <?php endwhile; ?>
              </div>
              <!-- /.pagecontract-tabs col-8 offset-1 -->

              <div class="pagecontract-download col-2">
                <?php $ib = 0; while( have_rows('public_offer_pdf') ) : the_row(); ?>
                  <?php if ( $ib === 0 ) : ?>
                    <?php if ( get_sub_field('file') ) : $file = get_sub_field('file'); ?>
                      <a class="btn-download btn btn-red" href="<?php echo $file['url']; ?>" title="<?php echo $file['title']; ?>"><i class="ico ico-download">Download offer</i><?php echo __('Download offer', 'wpeasy'); ?></a>
                    <?php $ib++; endif; ?>
                  <?php endif; ?>
                <?php endwhile; ?>
              </div>
              <!-- /.pagecontract-download -->

              <?php $ic = 0; while( have_rows('public_offer_pdf') ) : the_row(); ?>
                <?php if ( get_sub_field('file') ) : $file = get_sub_field('file'); ?>
                  <div class="pagecontract-tabcontent <?php if ( $ic === 0 ) { echo 'pagecontract-tabcontent__active'; } ?> col-8 offset-1" id="tabcontent_<?php echo $ic; ?>">
                    <?php $shortcode = '[pdf-embedder url="'. $file['url'] .'" toolbar="top" toolbarfixed="on"]'; echo do_shortcode($shortcode);  ?>
                  </div>
                  <!-- /#tabcontent.pagecontract-tabcontent -->
                <?php $ic++; endif; ?>
              <?php endwhile; ?>

            <?php endif; ?>
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->

        <?php get_template_part('templatepart-howtolegalized'); ?>

      <?php endwhile; endif; ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->

<?php get_footer(); ?>
