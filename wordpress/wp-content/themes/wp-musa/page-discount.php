<?php /* Template Name: Discount Page */ get_header(); ?>
  <div class="container">
    <div class="row">
      <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>

      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <h1 class="page-title col-12"><?php the_title(); ?></h1>
        <h3 class="discount--subtitle discount--subtitle__1 col-12">Discount</h3>

        <div class="discount--container discount--container_1 col-3">
          <h6 class="discount--number">01.<span>10%</span></h6>
          <p><span>Take 10% discount</span>from your offer</p>
        </div>
        <!-- /.discount--container col-3 -->
        <div class="discount--item discount--item_11 col-2">
          <p>After receiving an invitation to study - take a selfie!</p>
        </div>
        <!-- /.discount--item discount--item_11 col-2 -->
        <div class="discount--item discount--item_12 col-2">
          <p>Post a photo (selfie) on instagram or facebook</p>
        </div>
        <!-- /.discount--item discount--item_12 col-2 -->
        <div class="discount--item discount--item_13 col-2">
          <p>Add a hashtag under the photo # musa.in.ua and mark us in the photo</p>
        </div>
        <!-- /.discount--item discount--item_13 col-2 -->
        <div class="discount--item discount--item_14 col-2">
          <p>Share our Facebook sites and follow us on Instagram</p>
        </div>
        <!-- /.discount--item discount--item_14 col-2 -->

        <div class="discount--container discount--container_2 col-3">
          <h6 class="discount--number">02.<span>100$</span></h6>
          <p><span>Take 100$ cash</span>of bringing your every friend to musa.in.ua</p>
        </div>
        <!-- /.discount--container col-3 -->
        <div class="discount--item discount--item_21 col-2">
          <p>Be our customer</p>
        </div>
        <!-- /.discount--item discount--item_21 col-2 -->
        <div class="discount--item discount--item_22 col-2">
          <p>Pay basic services</p>
        </div>
        <!-- /.discount--item discount--item_22 col-2 -->
        <div class="discount--item discount--item_23 col-2">
          <p>Bring anyone to your company as a new customer</p>
        </div>
        <!-- /.discount--item discount--item_23 col-2 -->
        <div class="discount--item discount--item_24 col-2">
          <p>Provide payment details</p>
        </div>
        <!-- /.discount--item discount--item_24 col-2 -->

      </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="container-fluid container-color--bluelight">
      <div class="row">
        <div class="container">
          <div class="row">
            <h3 class="discount--subtitle discount--subtitle__2 col-12">Cooperation</h3>
            <div class="discount--container discount--container_3 col-3">
              <h6 class="discount--number">01.<span>25%</span></h6>
              <p><span>Parthner</span>from your offer</p>
            </div>
            <!-- /.discount--container col-3 -->
            <div class="discount--item discount--item_31 col-2">
              <p>You alread need have office or place for office and need do company nameplate of M.U.S.A</p>
            </div>
            <!-- /.discount--item discount--item_31 col-2 -->
            <div class="discount--item discount--item_32 col-2">
              <p>You need do local reklam like big board</p>
            </div>
            <!-- /.discount--item discount--item_32 col-2 -->
            <div class="discount--item discount--item_33 col-2">
              <p>You need do all rules what need do for take 10% discount</p>
            </div>
            <!-- /.discount--item discount--item_33 col-2 -->
            <div class="discount--item discount--item_34 col-2">
              <p>You need send scan copy of signatured public offer</p>
            </div>
            <!-- /.discount--item discount--item_34 col-2 -->

            <div class="discount--container discount--container_4 col-3">
              <h6 class="discount--number">02.<span>15%</span></h6>
              <p><span>Agent</span>from your offer</p>
            </div>
            <!-- /.discount--container col-3 -->
            <div class="discount--item discount--item_41 col-2">
              <p>You dont need have office or place</p>
            </div>
            <!-- /.discount--item discount--item_41 col-2 -->
            <div class="discount--item discount--item_42 col-2">
              <p>You can do reklam by the way that you think is best for you</p>
            </div>
            <!-- /.discount--item discount--item_42 col-2 -->
            <div class="discount--item discount--item_43 col-2">
              <p>You need do all rules what need do for take 10% discount</p>
            </div>
            <!-- /.discount--item discount--item_43 col-2 -->
            <div class="discount--item discount--item_44 col-2">
              <p>You need send scan copy of signatured public offer</p>
            </div>
            <!-- /.discount--item discount--item_44 col-2 -->

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
