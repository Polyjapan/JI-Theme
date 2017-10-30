<?php get_header(); ?>

<div class="container page-container">
    <div class="row">
      <div class="col-md-3">
        <?php get_template_part( 'inc/sidebar' ); ?>
      </div>
      <div class="col-md-9">
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <div class="post">
          <div class="post-content">
            <?php the_content(); ?>
          </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>
</div>

<?php get_footer(); ?>
