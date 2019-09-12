<?php get_header(); ?>
  <div class="container">
    <div class="row">

      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('article--content col-md-12'); ?>>
          <h1 class="page-title"><?php the_title(); ?></h1>

          <?php $images = get_field('slider'); if( $images ): ?>
            <div class="article-slider" id="article-slider">
              <div class="article-slider--carousel owl-carousel owl-theme">
                <?php foreach( $images as $image ): ?>
                  <div class="item">
                    <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                  </div>
                <?php endforeach; ?>
              </div>
              <a href="#" class="article-slider--apply"><i class="ico ico-apply">apply</i><?php echo __('Apply now', 'wpeasy'); ?></a>
            </div>
            <!-- /.article-slider -->
          <?php endif; ?>

          <?php the_content(); ?>

          <table class="university-programs">
            <tr>
              <th><i class="ico ico-programs"></i>Programs</th>
              <th><i class="ico ico-cost"></i>Cost of education</th>
            </tr>
            <tr>
              <td>Berdiansk University of management and business</td>
              <td><span>4 000$</span> per year</td>
            </tr>
            <tr>
              <td>Cherkasy educational-scientific institute of the Banking University</td>
              <td><span>3 500$</span> per year</td>
            </tr>
            <tr>
              <td>Borys Grinchenko Kyiv University</td>
              <td><span>2 000$</span> per year</td>
            </tr>
            <tr>
              <td>Diplomatic Academy of Ukraine, the Ministry of Foreign Affairs of Ukraine</td>
              <td><span>6 300$</span> per year</td>
            </tr>
            <tr>
              <td>Institute of Environmental Economics and Law</td>
              <td><span>8 100$</span> per year</td>
            </tr>

          </table>
          <!-- /.university-programs -->

          <?php edit_post_link(); ?>
        </article>

      <?php endwhile; endif; ?>

    </div><!-- /.row -->
  </div><!-- /.container -->

  <?php get_template_part('templatepart-howtoproceed'); ?>

<?php get_footer(); ?>