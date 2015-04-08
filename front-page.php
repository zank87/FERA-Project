<?php get_header(); ?>

	<div class="jumbotron">   
    	
    	<div class="container">
        <div class="row">
          <div class="col-sm-12">
            <?php query_posts('p=52'); ?>
            <?php while (have_posts()) : the_post(); ?>
              <?php the_content();?>
            <?php endwhile;?>
          </div>
        </div>
      </div>
	</div>

	<div class="container">

	<div class="row">
        <div class="col-sm-12">
          <?php wp_reset_query() ?>
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <?php the_content(); ?>

          <?php endwhile; endif; ?>
        
        </div>
        
	</div>

	</div>
<?php get_footer(); ?>