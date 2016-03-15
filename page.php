<?php get_header(); ?>

<!--this is page.php-->
<div class="column-main" role="main">
	<?php get_sidebar(); ?>
	<h1><?php the_title(); ?></h1>
	<article class="content">
		<!-- ### START CONTENT ### -->
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	    
	    <p><?php the_content(__('(more...)')); ?></p>
            <h6>Last updated: <?php the_modified_date(); ?></h6>
	    <hr>
	    <?php endwhile; else: ?>
	    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	    <?php endif; ?>
		<!-- ### END CONTENT ### -->
	</article>
	
	<section class="logos">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Logo Area')) : ?>
		
		<?php endif; ?>
	</section>
	<section class="contact-information">
		<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Contact Information Area')) : ?>
		
		<?php endif; ?>
	</section>
</div>

<?php get_footer(); ?>