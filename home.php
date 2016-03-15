<?php get_header(); ?>

<!--this is the home.php-->
<div class="column-main" role="main">
	<?php get_sidebar(); ?>
	
	<article class="content">
		<!-- ### START CONTENT ### -->
		
		<h1>We Can Ride Blog</h1>
<p><a class="feed" href="http://wecanride.org/blog/feed/atom/">Subscribe to this Blog</a></p>
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<!--inside the loop-->
					<span class="post-content">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<h6>Last updated: <?php the_modified_date(); ?></h6>
					<?php the_excerpt(); ?>
					<a class="read-more" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">Read More</a>
					</span>
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