<?php get_header(); ?>












<section class="cycle-gallery">
  <header class="header">
    <h1>Featured Products</h1>
  </header>
  <div class="mask">
    <div class="slideset">
      <div class="slide">

        <div id="container_division">
          <?php // Display blog posts on any page
          $temp = $wp_query; $wp_query= null;
          $wp_query = new WP_Query(); $wp_query->query('posts_per_page=5' . '&paged='.$paged);
          while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
          <div class="post-block">
            <h2><a href="<?php the_permalink(); ?>" title=""><?php the_post_thumbnail(); ?></a></h2>
            <span class="btn">shop now</span>
            <div class="product-info">
              <h2 class="product-name">
                <a href="#">Product Name</a>
              </h2>
              <div class="price-box">
                <span class="price">Rs. 7000</span>
              </div>
            </div>
          </div>
          <?php the_excerpt(); ?>

        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      </div>


</div>

</div>
</div>
<a href="#" class="btn-prev"><i class="icon-left-open-big"></i></a>
<a href="#" class="btn-next"><i class="icon-right-open-big"></i></a>
</section>
</div>
<section class="instagram-sec">
  <header class="header">
    <h1>Insta Feed</h1>
  </header>
  <div class="instagram-holder">
    <img src="<?php echo get_template_directory_uri();?> /img/img17.jpg" alt="">
  </div>
</section>
<div class="container">
  <ul class="services-list">
    <li>
      <div class="img">
        <img src="<?php echo get_template_directory_uri();?> /img/img18.png" alt="">
      </div>
      <div class="text">
        <h2>Free Shipping</h2>
        <p>Free Shipping on all Orders</p>
      </div>
    </li>
    <li>
      <div class="img">
        <img src="<?php echo get_template_directory_uri();?> /img/img19.png" alt="">
      </div>
      <div class="text">
        <h2>Free Exchange</h2>
        <p>10 days return on all items</p>
      </div>
    </li>
    <li>
      <div class="img">
        <img src="<?php echo get_template_directory_uri();?> /img/img20.png" alt="">
      </div>
      <div class="text">
        <h2>Premium Support</h2>
        <p>We support online 24 hours a day</p>
      </div>
    </li>
    <li>
      <div class="img">
        <img src="<?php echo get_template_directory_uri();?> /img/img21.png" alt="">
      </div>
      <div class="text">
        <h2>Black Friday</h2>
        <p>Huge discounts</p>
      </div>
    </li>
  </ul>
</div>
</div>
</main>
</div>

<?php get_footer(); ?>
