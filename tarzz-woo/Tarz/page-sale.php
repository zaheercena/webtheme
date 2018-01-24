<?php get_header(); ?>
<div class="content unstitched_page">

  <h1>Sale Products</h1>

  <?php $args = array(
    'post_type' => 'post' ,
    'orderby' => 'date' ,
    'order' => 'DESC' ,
    'posts_per_page' => 6,
    'cat' => '47',
    'paged' => get_query_var('paged'),
    'post_parent' => $parent
  ); ?>
  <div id="container_division">
    <?php query_posts($args); ?>
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

        <div class="small-12 columns">
          <div class="latest_news_cont">
            <div class="post-block">
            <a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            

            <?php the_excerpt(); ?>
            <br>

            <div class="clear"></div>
            </div>
          </div>
        </div>

      <?php endwhile; ?>
    <?php endif; ?>


    <div class="clear"></div>

  </div><!--end of content-->



  <div class="clear"></div>


  <?php get_footer(); ?>
