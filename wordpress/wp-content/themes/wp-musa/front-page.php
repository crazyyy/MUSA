<?php /* Template Name: Home Page */ get_header(); ?>
<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <div class="container-fluid container-color--bluelight container--homeslider">
    <div class="home-slider">
      <div class="home-slider--container"></div>
      <!-- /.home-slider--container -->
      <div class="container home-slider--searchform">
        <!-- // add vue seach https://premium.wpmudev.org/blog/creating-a-hybrid-single-page-app-wordpress-with-vuejs/
        https://www.sitepoint.com/building-a-wordpress-plugin-with-vue/ -->
        <div class="row">
          <div class="searchform--tabs col-12">
            <button class="searchform--tab searchform--tab__active" data-id="#programs"><i></i>Programs</button>
            <button class="searchform--tab" data-id="#universities"><i></i>Universities</button>
          </div>
          <div id="programs" class="searchform--content searchform--content__active  col-12">
            <h4><span>What do you want to study?</span></h4>
            <form action="">
              <select name="areas" id="areas">
                <option value="0" disabled selected style="display: none;">All areas of study</option>
                <?php $terms = get_terms(['taxonomy' => 'area', 'hide_empty' => true,]); foreach ( $terms as $term) { ?>
                  <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php } ?>
              </select>
              <select name="levels" id="levels">
                <option value="0" disabled selected style="display: none;">All levels of study</option>
                <?php $terms = get_terms(['taxonomy' => 'level', 'hide_empty' => true,]); foreach ( $terms as $term) { ?>
                  <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php } ?>
              </select>
              <select name="languages" id="languages">
                <option value="0" disabled selected style="display: none;">All languages of study</option>
                <?php $terms = get_terms(['taxonomy' => 'language', 'hide_empty' => true,]); foreach ( $terms as $term) { ?>
                  <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php } ?>
              </select>
              <button class="btn btn-blue"><i class="ico ico-search--18"></i>Search</button>
            </form>
            <p><strong>Popular:</strong> <a href="#">Health/Medicine</a>, <a href="#">Mechanical engineering</a>, <a href="#">IT</a>, <a href="#">Law</a></p>
          </div>
          <div id="universities" class="searchform--content col-12">
            <h4><span>Where do you want to study?</span></h4>
            <form action="">
              <select name="types" id="types">
                <option value="0" disabled selected style="display: none;">All types</option>
                <?php $terms = get_terms(['taxonomy' => 'types', 'hide_empty' => true,]); foreach ( $terms as $term) { ?>
                  <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php } ?>
              </select>
              <select name="regions" id="regions">
                <option value="0" disabled selected style="display: none;">All regions</option>
                <?php $terms = get_terms(['taxonomy' => 'region', 'hide_empty' => true,]); foreach ( $terms as $term) { ?>
                  <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php } ?>
              </select>
              <select name="languages" id="languages">
                <option value="0" disabled selected style="display: none;">All languages of study</option>
                <?php $terms = get_terms(['taxonomy' => 'language', 'hide_empty' => true,]); foreach ( $terms as $term) { ?>
                  <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                <?php } ?>
              </select>
              <button class="btn btn-blue"><i class="ico ico-search--18"></i>Search</button>
            </form>
            <p><strong>Popular:</strong> <a href="#">Health/Medicine</a>, <a href="#">Mechanical engineering</a>, <a href="#">IT</a>, <a href="#">Law</a></p>
          </div>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.home-slider--searchform -->
    </div>
    <!-- /.home-slider -->

    <div class="container container--stats">
      <div class="row">
        <h4 class="home--blocktitle col-12">Our statistics</h4>
        <div class="home--stats col-2 offset-2">
          <span>Costomers</span>
          <?php the_field('costomers');?>
        </div>
        <div class="home--stats col-4">
          <span>Invited</span>
          <?php the_field('invited');?>
        </div>
        <div class="home--stats col-2">
          <span>Accepted</span>
          <?php the_field('accepted');?>
        </div>
        <?php
          $costomers = get_field('costomers'); $invited = get_field('invited'); $accepted = get_field('accepted');
          $difference_fail = $costomers - $accepted;
          $difference_percent_fail = number_format($difference_fail / $costomers * 100, 2);
          // $difference_percent_good = number_format($accepted / $costomers * 100);
          $difference_percent_good = 100 - $difference_percent_fail;
        ?>
        <div class="home--rate home--rate__failure col-4 offset-1">
          <h5>failure rate:
            <span><?php echo $difference_percent_fail; ?>%</span>
          </h5>
          <div class="rate--container">
          <hr class="rate" style="width: <?php echo $difference_percent_fail; ?>%;">
          </div>
        </div>
        <div class="home--rate home--rate__succes col-4 offset-2">
          <h5>Success rate:
            <span><?php echo $difference_percent_good; ?>%</span>
          </h5>
          <div class="rate--container">
            <hr class="rate" style="width: <?php echo $difference_percent_good; ?>%;">
          </div>
        </div>

      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.container-fluid -->

  <div class="container container--werits">
    <div class="row">
      <h4 class="home--blocktitle col-12">Our werits</h4>
      <?php query_posts("showposts=1&post_type=review"); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="werits werits--rerviews col-4">
          <h4><i class="ico ico-wer-reviews"></i>Reviews</h4>
          <div class="werits--image">
            <?php if ( has_post_thumbnail()) { ?>
              <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            <?php } else { ?>
              <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            <?php } ?>
          </div>
          <!-- /.werits--image -->
          <div class="werits--content">
            <h5><?php the_title(); ?></h5>
            <?php wpeExcerpt('wpeExcerpt10'); ?>
            <span class="werits-date"><?php the_time('j F Y'); ?> <span><?php the_time('G:i'); ?></span></span>
            <a href="<?php the_permalink(); ?>" class="werits--more btn btn-blue">Read more</a>
          </div>
          <!-- /.werits--content -->
        </div>
        <!-- /.werits col-4 -->
      <?php endwhile; endif; ?>
      <?php wp_reset_query(); ?>

      <?php query_posts("showposts=1&post_type=post&cat=75"); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="werits werits--stories col-4">
          <h4><i class="ico ico-wer-stor"></i>Student stories</h4>
          <div class="werits--image">
            <?php if ( has_post_thumbnail()) { ?>
              <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            <?php } else { ?>
              <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            <?php } ?>
          </div>
          <!-- /.werits--image -->
          <div class="werits--content">
            <h5><?php the_title(); ?></h5>
            <?php wpeExcerpt('wpeExcerpt10'); ?>
            <span class="werits-date"><?php the_time('j F Y'); ?> <span><?php the_time('G:i'); ?></span></span>
            <a href="<?php the_permalink(); ?>" class="werits--more btn btn-blue">Read more</a>
          </div>
          <!-- /.werits--content -->
        </div>
        <!-- /.werits col-4 -->
      <?php endwhile; endif; ?>
      <?php wp_reset_query(); ?>

      <?php query_posts("showposts=1&post_type=post&cat=1"); ?>
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="werits werits--news col-4">
          <h4><i class="ico ico-wer-news"></i>News</h4>
          <div class="werits--image">
            <?php if ( has_post_thumbnail()) { ?>
              <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            <?php } else { ?>
              <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            <?php } ?>
          </div>
          <!-- /.werits--image -->
          <div class="werits--content">
            <h5><?php the_title(); ?></h5>
            <?php wpeExcerpt('wpeExcerpt10'); ?>
            <span class="werits-date"><?php the_time('j F Y'); ?> <span><?php the_time('G:i'); ?></span></span>
            <a href="<?php the_permalink(); ?>" class="werits--more btn btn-blue">Read more</a>
          </div>
          <!-- /.werits--content -->
        </div>
        <!-- /.werits col-4 -->
      <?php endwhile; endif; ?>
      <?php wp_reset_query(); ?>

    </div>
    <!-- /.row -->
  </div>
  <!-- /.container -->

  <?php get_template_part('templatepart-howtoproceed'); ?>

  <?php get_template_part('templatepart-whowhow'); ?>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>
