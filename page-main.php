<?php 
/*
  Template Name: Page Main
*/
?>

<?php get_header(); ?>

	<div class="jumbotron">   
    	
    	<div class="container">

      <?php query_posts( array('category_name' => 'jumbotron', 'posts_per_page' => 1)); ?>
      <?php while (have_posts()) : the_post(); ?>
        <?php the_content();?>
      <?php endwhile;?>

    	</div>
	
	</div>

	<div class="container">

	<div class="row">
        <div class="col-md-12">
          <?php wp_reset_query() ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <?php the_content(); ?>

          <?php endwhile; endif; ?>
        
        </div>
        
	</div>

	</div>
<?php get_footer(); ?>