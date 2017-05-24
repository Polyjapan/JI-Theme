<!-- page pour un post -->
<?php get_header(); ?>
<div class="container">
	<div class="leftPoster" <?php if ( get_header_image() ) : ?>
						style="background-image:url(<?php header_image(); ?>)"
			<?php endif; ?> >
			
	</div>
	<div class="rightContent">
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="post">
				<h1 class="post-title"><?php the_title(); ?></h1>
				<p class="post-info">
					Posté le <?php the_date(); ?> dans <?php the_category(', '); ?> par <?php the_author(); ?>.
				</p>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
