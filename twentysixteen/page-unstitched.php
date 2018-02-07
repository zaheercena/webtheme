<?php

get_header(); ?>

<?php $catquery = new WP_Query( 'cat=20&posts_per_page=5' ); ?>
<ul>
<?php while($catquery->have_posts()) : $catquery->the_post(); ?>
<li><h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
  <?php the_post_thumbnail(); ?>
<ul><li><?php the_content(); ?></li>
</ul>
</li>
<?php endwhile; ?>
</ul>
<?php wp_reset_postdata(); ?>
<?php get_footer();?>
