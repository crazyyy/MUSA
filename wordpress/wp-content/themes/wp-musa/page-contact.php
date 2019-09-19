<?php /* Template Name: Contact Us Page */ get_header(); ?>
  <div class="container container--contact__top">
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

    <div class="container-fluid container-color--bluelight container--contact__middle">
      <div class="row">
        <div class="container">
          <div class="row">

            <div class="contactus--subcont col-6">
              <div class="row">

                <h4 class="contactus--title col-12">General office</h4>
                <div class="contactus--item contactus--adress col-6">
                  <h6 class="contactus--heading">Adress</h6>
                  <p>21050, Ukraine, Vinnitsa city, Magistratskaya street 64</p>
                </div>
                <div class="contactus--item contactus--phones col-6">
                  <h6 class="contactus--heading">Phones</h6>
                  <ul>
                    <li><a href="tel:+38 (098) 050-50-37">+38 (098) 050-50-37</a>  <span>ENG, UKR</span></li>
                    <li><a href="tel:+38 (098) 050-50-37">+38 (098) 050-50-37</a><span>ENG, UKR</span></li>
                    <li><a href="tel:+38 (098) 050-50-37">+38 (098) 050-50-37</a><span>ENG, UKR</span></li>
                  </ul>
                </div>

                <div class="contactus--item contactus--emails col-6">
                  <h6 class="contactus--heading">E-mail adress</h6>
                  <a href="mailto:office@musa.in.ua">office@musa.in.ua</a>
                </div>
                <div class="contactus--item contactus--worktime col-6">
                  <h6 class="contactus--heading">Working time</h6>
                  <p>Weekdays - from 09:00 to 19:00</p>
                  <p>Saturday - from 13:00 to 15:00</p>
                </div>

              </div>
              <!-- /.row -->
            </div>
            <!-- /.contactus--subcont col-6 -->

            <div class="contactus--map col-6">
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

            <div class="contactus--representative contactus--office col-3">
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



            <?php if ( get_sub_field('photo') ) : $image = get_sub_field('photo'); ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
          <?php endif; ?>

            <?php the_sub_field('country'); ?>
            <?php the_sub_field('city'); ?>
            <?php the_sub_field('name'); ?>
            <?php the_sub_field('phone'); ?>
            <?php the_sub_field('languages'); ?>
            <?php the_sub_field('email'); ?>


        <?php if ( have_rows('agents') ) : ?>
          <?php while( have_rows('agents') ) : the_row(); ?>

            <div class="contactus--representative contactus--agents col-3">
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
