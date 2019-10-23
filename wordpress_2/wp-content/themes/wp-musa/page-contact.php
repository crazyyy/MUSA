<?php /* Template Name: Contact Us Page */ get_header(); ?>
  <div class="container">
    <div class="row">
      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
    </div><!-- /.row -->
  </div><!-- /.container -->

  <div class="container container--contact__top">
    <div class="row">
      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('article--content col-md-12'); ?>>
          <div class="row">
            <h1 class="page-title col-12"><?php the_title(); ?></h1>
            <div class="col-xl-9 col-lg-9 col-md-7">
              <?php the_content(); ?>
            </div>
            <!-- /.col-9 -->
            <div class="col-xl-3 col-lg-3 col-md-5 position--bottom-right">
              <a href="" class="btn btn-blue btn-feedback"><i class="ico ico-feedback">Feedback</i><?php echo __('Feedback', 'wpeasy'); ?></a>
            </div>
            </div><!-- /.row -->
          <!-- /.col-3 position--bottom-right -->
        </article>
      </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container-fluid container-color--bluelight container--contact__middle">
      <div class="row">
        <div class="container">
          <div class="row">

            <div class="contactus--subcont col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <div class="row">

                <h4 class="contactus--title col-12">General office</h4>

                <?php if ( get_field('main_office_adress') ) : ?>
                  <div class="contactus--item contactus--adress col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h6 class="contactus--heading">Adress</h6>
                    <?php the_field('main_office_adress'); ?>
                  </div>
                <?php endif; ?>

                <?php if ( have_rows('main_office_phones') ) : ?>
                  <div class="contactus--item contactus--phones col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h6 class="contactus--heading">Phones</h6>
                    <ul>
                      <?php while( have_rows('main_office_phones') ) : the_row(); ?>
                        <li><a href="tel:<?php the_sub_field('phone_number'); ?>"><?php the_sub_field('phone_number'); ?></a>  <span><?php the_sub_field('language'); ?></span></li>
                      <?php endwhile; ?>
                    </ul>
                  </div>
                <?php endif; ?>

                <?php if ( have_rows('main_office_emails') ) : ?>
                  <div class="contactus--item contactus--emails col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h6 class="contactus--heading">E-mail adress</h6>
                    <?php while( have_rows('main_office_emails') ) : the_row(); ?>
                      <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
                    <?php endwhile; ?>
                  </div>
                <?php endif; ?>

                <?php if ( get_field('main_office_working_time') ) : ?>
                  <div class="contactus--item contactus--worktime col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <h6 class="contactus--heading">Working time</h6>
                    <?php the_field('main_office_working_time'); ?>
                  </div>
                <?php endif; ?>

              </div>
              <!-- /.row -->
            </div>
            <!-- /.contactus--subcont col-xl-6 col-lg-6 col-md-12 -->

            <div class="contactus--map col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
              <?php $location = get_field('main_office_map'); if( !empty($location) ): ?>
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
              <?php endif; ?>
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    <div class="container container--contact__bottom">
      <div class="row">

        <h5 class="contactus--subtitle col-12">Offices</h5>

        <?php if ( have_rows('offices') ) : ?>
          <?php while( have_rows('offices') ) : the_row(); ?>

            <div class="contactus--representative contactus--office col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12">
              <h6 class="representative--placed representative--placed__<?php the_sub_field('country'); ?>">
                <?php if ( get_sub_field('photo') ) : $photo = get_sub_field('photo'); ?>
                  <span class="representative--img"><img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>"/></span>
                <?php endif; ?>

                <?php the_sub_field('country'); if ( get_sub_field('city') ) : echo ', '; the_sub_field('city'); endif; ?>
              </h6>
              <?php if ( get_sub_field('name') ) : ?>
                <p class="representative--named"><?php the_sub_field('name'); ?></p>
              <?php endif; ?>
              <?php if ( get_sub_field('phone') ) : ?>
                <div class="representative--phone">
                  <a href="tel:<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a>
                  <?php if ( get_sub_field('languages') ) : ?>
                    <span><?php the_sub_field('languages'); ?></span>
                  <?php endif; ?>
                </div>
                <!-- /.representative--phone -->
              <?php endif; ?>
              <?php if ( get_sub_field('adress') ) : ?>
                <p class="representative--adress"><?php the_sub_field('adress'); ?></p>
              <?php endif; ?>
            </div>
            <!-- /.contactus--representative contactus--office col-3 -->

          <?php endwhile; ?>
        <?php endif; ?>


        <h5 class="contactus--subtitle col-12">Agents</h5>

        <?php if ( have_rows('agents') ) : ?>
          <?php while( have_rows('agents') ) : the_row(); ?>

            <div class="contactus--representative contactus--agents col-xl-3 col-lg-4 col-md-6 col-sm-6 col-xs-12">
              <h6 class="representative--placed representative--placed__<?php the_sub_field('country'); ?>">
                <?php if ( get_sub_field('photo') ) : $photo = get_sub_field('photo'); ?>
                  <span class="representative--img"><img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>"/></span>
                <?php endif;  ?>
                <span class="representative--placed__top">
                  <?php the_sub_field('country'); if ( get_sub_field('city') ) : echo ', '; the_sub_field('city'); endif; ?>
                  <?php if ( get_sub_field('name') ) : ?>
                    <span class="representative--placed__bottom"><?php the_sub_field('name'); ?></span>
                  <?php endif; ?>
                </span>
              </h6>

              <?php if ( get_sub_field('phone') ) : ?>
                <div class="representative--phone">
                  <a href="tel:<?php the_sub_field('phone'); ?>"><?php the_sub_field('phone'); ?></a>
                </div>
                <!-- /.representative--phone -->
              <?php endif; ?>

              <?php if ( get_sub_field('email') ) : ?>
                <div class="representative--email">
                  <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a>
                </div>
                <!-- /.representative--email -->
              <?php endif; ?>

              <?php if ( get_sub_field('languages') ) : ?>
                <div class="representative--languages">
                  <?php the_sub_field('languages'); ?>
                </div>
                <!-- /.representative--languages -->
              <?php endif; ?>

            </div>
            <!-- /.contactus--representative contactus--office col-3 -->

          <?php endwhile; ?>
        <?php endif; ?>

      <?php endwhile; endif; ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

<?php get_footer(); ?>
