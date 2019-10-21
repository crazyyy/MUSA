<?php /* Template Name: Search Result Page */get_header();?>
<div class="container">
  <div class="row">
    <?php if (function_exists('easy_breadcrumbs')) {easy_breadcrumbs();}?>

    <article class="article--content col-md-12">
      <div class="row">
        <h1 class="page-title col-12"><?php the_title();?></h1>
        <div class="col-12">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa enim corporis saepe repellendus veniam sequi
          tempora, hic at vel quos voluptas adipisci eveniet omnis repellat eos laboriosam cum aut assumenda.

          <?php
$data = $_POST;
var_dump($data)
?>
        </div>

      </div><!-- /.row -->
      <!-- /.col-3 position--bottom-right -->
    </article>
  </div><!-- /.row -->
</div><!-- /.container -->


<?php get_footer();?>