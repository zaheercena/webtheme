<?php get_header(); ?>
<?php
/***
//global $post;
//$args = array(
//'post_type' =>'slider',
//'numberposts' => -1,
//'orderby' => 'menu_order' );

//$slider_posts = get_posts($args);
//if($slider_posts) :
// start the loop
//while (have_posts()) : the_post();

//if ( has_post_thumbnail() ) {

//Image size small,large or medium
//echo the_post_thumbnail('admin');
//}
//endwhile;
//endif;**/
?>
<!-- This is Slider Function-->

<div class="row">
  <div class="col-md-12">
    <?php $taxas = get_taxonomies($args);?>
    <div id = "myCarousel" class="carousel slide" data-ride="carousel">

      <div class="carousel-inner">
        <div class="item active">
          <?php
          foreach($taxas as $taxonomy) {
            //echo wpse135208_cat_thumb_from_random_child($taxonomy->cat_ID);
          }  ?>
          <img src="<?php echo get_template_directory_uri();?> /img/img4.jpg" alt="">
          <div class="carousel-caption">
          </div>
        </div>

        <div class="item">
          <img src="<?php echo get_template_directory_uri();?> /img/img5.jpg" alt="">
          <div class="carousel-caption">
          </div>
        </div>

        <div class="item">
          <img src="<?php echo get_template_directory_uri();?> /img/img6.jpg" alt="">
          <div class="carousel-caption">
          </div>
        </div>

        <div class="item">
          <img src="<?php echo get_template_directory_uri();?> /img/img7.jpg" alt="">
          <div class="carousel-caption">
          </div>
        </div>

        <div class="item">
          <img src="<?php echo get_template_directory_uri();?> /img/img6.jpg" alt="">
          <div class="carousel-caption">
          </div>
        </div>

      </div>
    </div>
  </div>
</div>




<!-- This is Category Function-->
<?php $categories = get_categories($args);?>
<ul class="product-list">
  <li>
    <a href="#" class="product-image">

      <?php
      foreach($categories as $category) {
        if(wpse135208_cat_thumb_from_random_child($category->cat_ID)){
          echo wpse135208_cat_thumb_from_random_child($category->cat_ID);
          break;
        }
      }  ?>
      <img src="<?php //echo get_template_directory_uri();?> /img/img8.jpg" alt="">
      <span class="img">
        <img src="<?php //echo get_template_directory_uri();?> /img/img9.jpg" alt="">
      </span>
      <span class="title" href="localhost/kag/category/unstitched.php">New arrivals</span>
    </a>
  </li>
  <li>
    <a href="#" class="product-image">

      <?php
      foreach($categories as $category) {
        if(wpse135208_cat_thumb_from_random_child($category->cat_ID)){
          echo wpse135208_cat_thumb_from_random_child($category->cat_ID);
          break;
        }
      }  ?>
      <img src="<?php //echo get_template_directory_uri();?> /img/img9.jpg" alt="">
      <span class="img">
        <img  src="<?php //echo get_template_directory_uri();?> /img/img10.jpg" alt="">
      </span>
      <span class="title" href="localhost/kag/category/unstitched.php" target="_blank">unstitched></span>
    </a>
  </li>
  <li>
    <a href="#" class="product-image">

      <?php
      foreach($categories as $category) {
        if(wpse135208_cat_thumb_from_random_child($category->cat_ID)){
          echo wpse135208_cat_thumb_from_random_child($category->cat_ID);
          break;
        }
      }  ?>
      <img src="<?php //echo get_template_directory_uri();?> /img/img10.jpg" alt="">
      <span class="img">
        <img src="<?php //echo get_template_directory_uri();?> /img/img8.jpg" alt="">
      </span>
      <span class="title" href="https://localhost/kag/category/unstitched.php" target="_blank">pret</span>
    </a>
  </li>
</ul>
<div class="product-block">
  <a href="#">
    <span class="img">
      <img src="<?php echo get_template_directory_uri();?> /img/img11.jpg" alt="">
    </span>
    <span class="text-holder">
      <span class="text">
        <h2><input type="button" value="Tarzz Men" class="homebutton" id="btnHome" onClick="Javascript:window.location.href = 'https://localhost/kag/category/tarzz-men.php';" /></h2>
        <em class="shop-now">shop now</em>
      </span>
    </span>
  </a>
</div>
<div class="product-block">
  <a href="#">
    <span class="text-holder">
      <span class="text">
        <h2><input type="button" value="Accessories" class="homebutton" id="btnHome" onClick="Javascript:window.location.href = 'https://localhost/kag/category/women.php';" /></h2>
        <em class="shop-now">shop now</em>
      </span>
    </span>
    <span class="img">
      <img src="<?php echo get_template_directory_uri();?> /img/img12.jpg" alt="">
    </span>
  </a>
</div>
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
