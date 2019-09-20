<?php /* Template Name: Cost Of Living Page */ get_header(); ?>
  <div class="container">
    <div class="row">
      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('article--content col-md-12'); ?>>
          <div class="row">
            <h1 class="page-title col-12"><?php the_title(); ?></h1>

            <div class="cost--exchange col-3">
              <h6>Exchange rate</h6>
              <p>1 US Dollar = <?php the_field('exchange_rate'); ?> UA Hryvnia</p>
            </div>

            <div class="cost--exchange__after col-9"></div>

            <?php  $styles = '<style>'; ?>
            <?php if ( have_rows('categories') ) : ?>
              <?php while( have_rows('categories') ) : the_row(); ?>
              <?php $block_width = get_sub_field('block_wide'); if ($block_width === 'half') {$coll_class = 'col-6'; $sub_coll_class = 'col-4';} else {$coll_class = 'col-12'; $sub_coll_class = 'col-2';} ?>
                <div class="cost--category <?php echo $coll_class; ?>">
                  <div class="container">
                    <div class="row">
                      <h4 class="cost--title col-12" style="color: <?php $category_main_color = get_sub_field('category_main_color'); echo $category_main_color; ?>;"><?php the_sub_field('category_name'); ?>  </h4>
                      <?php if ( have_rows('category_items') ) : ?>
                        <?php while( have_rows('category_items') ) : the_row(); ?>
                          <div class="cost--item cost--item__<?php echo $i; ?> <?php echo $sub_coll_class; ?>">
                            <h5><?php the_sub_field('item_title'); ?></h5>
                            <p>Price: <span>$<?php the_sub_field('price'); ?></span></p>
                          </div>
                          <?php
                            $image = get_sub_field('item_image');
                            $styles .= 'div.cost--category div.cost--item__'. $i .':before {
                              border: 2px solid '. $category_main_color .'; background-image: url('. $image['url'].');}';
                            $additional_number = get_sub_field('additional_number'); if ($additional_number) {
                              $styles .= 'div.cost--category div.cost--item__'. $i .':after { content: "'. $additional_number . '"; display: block; }';
                            }
                          ?>
                          <!-- /.cost--item col-4 -->
                        <?php $i++; endwhile; ?>
                      <?php endif; ?>


                    </div>
                    <!-- /.row -->
                  </div>
                  <!-- /.container -->
                </div>
                <!-- /.cost--category col-12 -->
              <?php endwhile; ?>
            <?php endif; ?>
            <?php $styles .=  '</style>'; echo $styles; ?>

          </div><!-- /.row -->
          <!-- /.col-3 -->
        </article>
      <?php endwhile; endif; ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

<?php get_footer(); ?>
