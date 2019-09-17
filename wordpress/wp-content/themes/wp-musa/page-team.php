<?php /* Template Name: Team Page */ get_header(); ?>
  <div class="container">
    <div class="row">

      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('article--content col-md-12'); ?>>
          <h1 class="page-title"><?php the_title(); ?></h1>
          <?php the_content(); ?>
        </article>
        <?php if ( have_rows('team_members') ) : ?>

          <?php while( have_rows('team_members') ) : the_row(); ?>

            <div class="col-4 ourteam--item">
              <?php if ( get_sub_field('image') ) : $image = get_sub_field('image'); ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php the_sub_field('name'); ?> <?php echo $image['alt']; ?>" title="<?php the_sub_field('name'); ?>"/>
              <?php endif; ?>
              <div class="ourteam--head">
                <?php if ( get_sub_field('name') ) : ?>
                  <h3 class="ourteam--name"><?php the_sub_field('name'); ?></h3>
                <?php endif; ?>
                <?php if ( get_sub_field('post') ) : ?>
                  <?php $field = get_sub_field_object('post'); $memberposts = $field['value']; if( $memberposts ): ?>
                    <ul class="ourteam--post">
                      <?php foreach( $memberposts as $memberpost ): ?>
                        <li class="ourteam--color__<?php echo $memberpost; ?>"><?php echo $field['choices'][ $memberpost ]; ?></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                <?php endif; ?>
                <?php if ( get_sub_field('department') ) : ?>
                  <p class="ourteam--depart"><?php the_sub_field('department'); ?></p>
                <?php endif; ?>
              </div>
              <!-- /.ourteam--head -->
              <?php if ( get_sub_field('description') ) : ?>
                <div class="ourteam--description">
                  <p><?php the_sub_field('description'); ?></p>
                </div>
              <?php endif; ?>
              <?php if ( get_sub_field('phone') ) : ?>
                <a href="tel:+<?php the_sub_field('phone'); ?>" class="ourteam--phone"><?php the_sub_field('phone'); ?></a>
              <?php endif; ?>
              <?php if ( get_sub_field('adress') ) : ?>
                <p class="ourteam--adress"><?php the_sub_field('adress'); ?></p>
              <?php endif; ?>
              <?php if ( get_sub_field('email') ) : ?>
                <a href="mailto:<?php the_sub_field('email'); ?>" class="ourteam--email"><?php the_sub_field('email'); ?></a>
              <?php endif; ?>
              <div class="ourteam--bottom">
                <?php if ( get_sub_field('facebook_profile') ) : ?>
                  <a href="<?php the_sub_field('facebook_profile'); ?>" class="ourteam--fb"><i class="ico ico-ourteam__fb">Facebook</i></a>
                <?php endif; ?>
                <?php if ( get_sub_field('instagram_profile') ) : ?>
                  <a href="<?php the_sub_field('instagram_profile'); ?>" class="ourteam--inst"><i class="ico ico-ourteam__inst">Instagram</i></a>
                <?php endif; ?>
                <?php if ( get_sub_field('languages') ) : ?>
                  <i class="ico ico-ourteam__lang"></i><?php the_sub_field('languages'); ?>
                <?php endif; ?>
              </div>
              <!-- /.ourteam--bottom -->
            </div>
            <!-- /.col-4 ourteam--item -->

          <?php endwhile; ?>
        <?php endif; ?>

      <?php endwhile; endif; ?>

    </div><!-- /.row -->
  </div><!-- /.container -->

<?php get_footer(); ?>
