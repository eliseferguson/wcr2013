<?php get_header(); ?>

<!--this is the single.php-->
<div class="column-main" role="main">
	<?php get_sidebar(); ?>
	

	<article class="content">
		<!-- ### START CONTENT ### -->
		<h1><?php if (is_category()) { single_cat_title(); } ?></h1>
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<!--inside the loop-->
					<span class="post-content">
					<h2><?php the_title(); ?></h2>
					<h6>Last updated: <?php the_modified_date(); ?></h6>
					<?php the_content(); ?>
					</span>
					<?php comments_template(); ?>
				<?php endwhile; ?>

		

		<?php else : ?>
			<p>Sorry, no posts matched your criteria.</p>
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