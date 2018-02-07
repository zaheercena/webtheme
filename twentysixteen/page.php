<?php
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php if(!is_cart() || !is_checkout() || !is_account()); { ?>
			<?php the_post_thumbnail();?>
			<div class="row">
				<div class="col-md-12">

<?php//Here I am Starting Dynamic Slider?>

<section id="featured-slider">
	<div id="slides">
		<div class="slides_container">

			<?php
				$loop = new WP_Query(array('post_type' => 'slidecust', 'posts_per_page' => -1, 'orderby'=> 'ASC'));

			$counter=1; ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<div class="slide">
					<?php $url = get_post_meta($post->ID, "url", true);
					if($counter == 0 )
					{?>
						<div class="item active">
							<?php echo the_post_thumbnail('full');
							$ounter++; ?>
						</div>
					<?php }
					else {?>
					<?php if($url!='') {
						//echo '<a href="'.$url.'">';
						echo the_post_thumbnail('full');
						//echo '</a>';
					} else {
						echo the_post_thumbnail('full');
					} ?>
					<div class="caption">
						<h5><?php //the_title(); ?></h5>
						<?php the_content();?>
					</div>
				</div>
				<?php } ?>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</div>
		<a href="#" class="prev">prev</a>
    <a href="#" class="next">next</a>

	</div>
</section>

<?php//Here I am Ending Dynamic Slider?>

					<!--<div id = "myCarousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<div class="item active">
								<img src="<?php //echo get_template_directory_uri();?> /img/img4.jpg" alt="">
								<div class="carousel-caption">
								</div>
							</div>

							<div class="item">
								<img src="<?php //echo get_template_directory_uri();?> /img/img5.jpg" alt="">
								<div class="carousel-caption">
								</div>
							</div>

							<div class="item">
								<img src="<?php //echo get_template_directory_uri();?> /img/img6.jpg" alt="">
								<div class="carousel-caption">
								</div>
							</div>

							<div class="item">
								<img src="<?php //echo get_template_directory_uri();?> /img/img7.jpg" alt="">
								<div class="carousel-caption">
								</div>
							</div>

							<div class="item">
								<img src="<?php //echo get_template_directory_uri();?> /img/img6.jpg" alt="">
								<div class="carousel-caption">
								</div>
							</div>

						</div>



					</div>
				</div>
			</div>-->

			<?php//Here I am Starting Categories?>


			<?php $categories = get_categories($args);?>
			<ul class="product-list">
				<li>
					<a href="#" class="product-image">

						<img src="<?php echo get_template_directory_uri();?> /img/img8.jpg" alt="">
						<span class="img">
							<img src="<?php echo get_template_directory_uri();?> /img/img9.jpg" alt="">
						</span>
						<!--<span class="title" href="http://localhost/kag/tarz/product-category/unstitched/">New arrivals</span>-->
						<span class="title" onclick="window.location='http://localhost/kag/tarz/product-category/new/'">New arrivals</span>
					</a>
				</li>
				<li>
					<a href="#" class="product-image">

						<img src="<?php echo get_template_directory_uri();?> /img/img9.jpg" alt="">
						<span class="img">
							<img  src="<?php echo get_template_directory_uri();?> /img/img10.jpg" alt="">
						</span>
						<!--<span class="title" href="http://localhost/kag/tarz/product-category/unstitched/" target="_blank">unstitched></span>-->
						<span class="title" onclick="window.location='http://localhost/kag/tarz/product-category/unstitched/'">unstitched</span>
					</a>
				</li>
				<li>
					<a href="#" class="product-image">

						<img src="<?php echo get_template_directory_uri();?> /img/img10.jpg" alt="">
						<span class="img">
							<img src="<?php echo get_template_directory_uri();?> /img/img8.jpg" alt="">
						</span>
						<!--<span class="title" href="http://localhost/kag/tarz/category/unstitched" target="_blank">pret</span>-->
						<span class="title" onclick="window.location='http://localhost/kag/tarz/product-category/pret/'">pret</span>
					</a>
				</li>
			</ul>

			<?php//Here I am Ending Categories?>


			<div class="product-block">
				<a href="#">
					<span class="img">
						<img src="<?php echo get_template_directory_uri();?> /img/img11.jpg" alt="">
					</span>
					<span class="text-holder">
						<span class="text">
							<!--<h1><span href="http://localhost/kag/tarz/product-category/tarzz-men/" type="button" class="btn btn-default subs-btn">Tarzz Men</span></h1>-->
							<h1><span class="title" onclick="window.location='http://localhost/kag/tarz/product-category/tarzz-men/'">Tarzz Men</span></h1>
							<em class="shop-now" onclick="window.location='http://localhost/kag/tarz/product-category/tarzz-men/'">shop now</em>
						</span>
					</span>
				</a>
			</div>
			<div class="product-block">
				<a href="#">
					<span class="text-holder">
						<span class="text">
							<!--<h1><span href="http://localhost/kag/tarz/product-category/accessories/" type="button" class="btn btn-default subs-btn">Accessories</span></h1>-->
							<h1><span class="title" onclick="window.location='http://localhost/kag/tarz/product-category/accessories/'">Accessories</span></h1>
							<em class="shop-now" onclick="window.location='http://localhost/kag/tarz/product-category/accessories/'">shop now</em>
						</span>
					</span>
					<span class="img">
						<img src="<?php echo get_template_directory_uri();?> /img/img12.jpg" alt="">
					</span>
				</a>
			</div>

			<?php //while ( have_posts() ) : the_post();
			//the_post_thumbnail();
			//do_action( 'storefront_page_before' );

			//get_template_part( 'content', 'page' );

			/**
			* Functions hooked in to storefront_page_after action
			*
			* @hooked storefront_display_comments - 10
			*/
			//do_action( 'storefront_page_after' );

			//endwhile; // End of the loop. ?>
		<?php } ?>
	</main><!-- #main -->
</div><!-- #primary -->
<?php
//do_action( 'storefront_sidebar' );
get_footer();?>
