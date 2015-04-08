<?php 
/*
	Template Name: Jumbotron Top Page
*/
?>
<?php get_header(); ?>

    <div class="container" role="main">

	    <div class="row">

	    	<div class="col-md-12 ">

				<div class="page-header">	
					<h1><?php wp_title(''); ?></h1>
				</div>
						
			


				<div class="jumbotron">
					<div class-"container">

						<?php
						$the_slug = 'jumbotron_post';
						$args=array(
							'name'           => '23',
							'post_type'      => 'post',
							'post_status'    => 'publish',
							'posts_per_page' => 1
						);
						$my_posts = get_posts( $args );
						if( $my_posts ) {
							echo 'ID on the first post found ' . $my_posts[0]->ID;
						}
						?>

					</div>
				</div>

			
			<?php wp_reset_query(); ?>




				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article>

				    <div class="page-header">	
				    	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				    	<p>By <?php the_author(); ?> on <?php echo the_time('l, F jS, Y'); ?> in <?php the_category( ', ' );?>.  <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></p>
				    </div>				

					<?php the_excerpt(); ?>

				</article>
				<?php endwhile; endif; ?>

	    	</div>

	    	<?php get_sidebar('blog'); ?>

	    </div>

	    

    </div>

<?php get_footer(); ?>