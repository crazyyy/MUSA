<?php /* Template Name: Services Page */ get_header(); ?>
  <div class="container">
    <div class="row">
      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <h1 class="page-title col-12"><?php the_title(); ?></h1>

        <?php $posts = get_field('select_services'); if( $posts ): ?>
          <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
          <?php setup_postdata($post); ?>
            <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class('service--item col-4'); ?>>
              <?php if ( get_field('image') ) : $image = get_field('image'); ?>
                <div class="service--image">
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>
                </div>
              <?php endif; ?>
              <h3 class="service-title"><?php the_title(); ?></h3>
              <p><?php if ( has_excerpt() ) { the_excerpt(); } ?></p>
              <?php if ( get_field('type') ) : ?>
                <?php $field = get_field_object('type'); $types = $field['value']; if( $types ): ?>
                  <?php foreach( $types as $type ): ?>
                    <span  class="service--type service--type__<?php echo $type; ?>"><?php echo $field['choices'][ $type ]; ?></span>
                  <?php endforeach; ?>
                <?php endif; ?>
              <?php endif; ?>
              <span class="service--price"><?php echo __('Price: ', 'wpeasy'); ?><span><?php the_field('costs'); ?>$</span></span>
              <?php if ( get_field('pay_options') ) : ?>
                <?php $field = get_field_object('pay_options'); $pay_options = $field['value']; if( $pay_options ): ?>
                  <ul class="service--payopt">
                    <?php foreach( $pay_options as $pay_option ): ?>
                      <li><?php echo $field['choices'][ $pay_option ]; ?></li>
                    <?php endforeach; ?>
                  </ul>
                <?php endif; ?>
              <?php endif; ?>
            </a>
            <!-- /.service--item col-4 -->
          <?php endforeach; ?>
          <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
        <?php endif; ?>

        <div class="services--submit col-12">
          <button class="btn-blue btn-services"><i class="ico ico-services">services</i><?php echo __('Enter info a contract', 'wpeasy'); ?></button>
        </div>

      </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container-fluid container-color--bluelight container--services">
      <div class="row">
        <div class="container">
          <div class="row">
            <h2 class="services--title col-12"><?php echo __('How to take services', 'wpeasy'); ?></h2>

            <div class="howtoservices-item howtoservices-item--read col-2">
              <p><a href="">Read</a> the public offer</p>
            </div>
            <div class="howtoservices-item howtoservices-item--download col-2">
              <p><a href="">Download</a> offer</p>
            </div>
            <div class="howtoservices-item howtoservices-item--print col-2">
              <p><a href="">Print</a> offer</p>
            </div>
            <div class="howtoservices-item howtoservices-item--put col-2">
              <p><a href="">Put</a> the <i class="ico ico-verified">verified</i> <i class="ico ico-close">close</i> front of services you want</p>
            </div>
            <div class="howtoservices-item howtoservices-item--signature col-2">
              <p><a href="">Signature</a> your offer</p>
            </div>
            <div class="howtoservices-item howtoservices-item--legalize col-2">
              <p><a href="">Legalize</a> offer</p>
            </div>

            <p class="howtoservices-question col-12">Still have questions? <a href="">Contact us</a></p>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->

      <?php endwhile; endif; ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->

<?php get_footer(); ?>
