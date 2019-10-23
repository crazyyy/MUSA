<?php get_header(); ?>
  <div class="container">
    <div class="row">

      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('article--content col-md-12'); ?>>
          <h1 class="page-title"><?php the_title(); ?></h1>

          <?php get_template_part('templatepart-articleslider'); ?>

          <?php the_content(); ?>

          <table class="university-programs">
            <tr>
              <th><i class="ico ico-programs"></i><?php echo __('Programs', 'wpeasy'); ?></th>
              <th><i class="ico ico-cost"></i><?php echo __('Cost of education', 'wpeasy'); ?></th>
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
