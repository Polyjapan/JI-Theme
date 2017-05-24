<?php get_header(); ?>

<div class="container">
  <div class="leftPoster"
    <?php if ( get_header_image() ) : ?>
      style="background-image:url(<?php header_image(); ?>)"
    <?php endif; ?>
  >
  </div>
  <div class="rightContent">
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

<?php get_footer(); ?>
