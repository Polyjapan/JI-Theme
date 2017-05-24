<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<div class="container">
  <div class="leftPoster" <?php if ( get_header_image() ) : ?>
    style="background-image:url(<?php header_image(); ?>)"
    <?php endif; ?> >
  </div>
  <div class="rightContent">
    <!-- Start the Loop (= posts). -->
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <div class="post">
        <h3 class="post-title">
          <a href="<?php the_permalink ?>"><?php the_title(); ?></a>
          <span class="post-info">Published on <?php the_date(); ?></span>
        </h3>
      </div>
      <div class="post-content">
        <?php the_content(); ?>
      </div>
  <?php endwhile; else : ?>
    <p class="nothing"><?php _e( 'No post found ;(' ); ?></p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
