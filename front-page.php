<?php get_header(); ?> 

<div id="main">
	
	<?php if (have_posts()) : while (have_posts()) : the_post();
			$args = array(
			   'post_type' => 'attachment',
			   'numberposts' => -1,
			   'orderby'=> 'menu_order',
			   'order' => 'ASC',
			   'post_mime_type' => 'image',
			   'post_status' => null,
			   'post_parent' => $post->ID
			  ); ?>
	
	<div id="featured-slider">
		<div id="slides">
			<div class="slides_container">
			<?php
		  	$attachments = get_posts( $args );
		     	if ( $attachments ) {
		        	foreach ( $attachments as $attachment ) {
						echo wp_get_attachment_image($attachment->ID , 'full' );
		      	}
		   	}?>
			</div>
			<a href="#" class="prev">prev</a>
			<a href="#" class="next">next</a>
		</div>	
	</div><!-- #featured-slider -->
	
	<section id="content">

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
			<h1><?php the_title(); ?></h1>
			
			<?php the_content(); ?>
			
		</article>
		
		<?php endwhile; endif; ?>
		
	</section><!-- #content -->

<?php get_sidebar(); ?>

</div><!-- #main -->

<?php get_footer(); ?>