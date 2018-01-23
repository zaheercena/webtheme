<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
		<meta name="description" content="<?php bloginfo('description');?>">
		<?php wp_head(); ?>
	</head>

	<?php

		if( is_front_page() ):
			$awesome_classes = array( 'awesome-class', 'my-class' );
		else:
			$awesome_classes = array( 'no-awesome-class' );
		endif;
	?>
		<div class="wrapper">
				<div class="page">
						<header id="header">
								<div class="header-holder container-fluid">
										<div class="row">
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
														<h1 class="logo">
																<a href="#"><img src="<?php echo get_template_directory_uri();?> /img/logo.png" alt="Tarzz"></a>
														</h1>
												</div>
												<div class="col-xs-3">
														<ul class="header-icon-list">
																<li>

																		<form method="get" action="#" class="nav-form-search" id="search_mini_form">
																			<?php //get_search_form(); ?>
																			<div class="add-class-holder">
																					<a class="a-class" href="#"><i class="icon-search"></i></a>
																					<div class="input-box">
																							<input type="search" placeholder="Search">
																					</div>
																			</div>
																		</form>
																</li>
																<li><a href="#"><i class="icon-bag1"></i></a></li>
														</ul>
												</div>
										</div>
								</div>

		<div class="container">

			<div class="row">

				<div class="col-xs-10">

					<nav class="navbar navbar-default">
					  <div class="container-fluid">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <!--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">-->
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					      <a class="navbar-brand" href="#"></a>
					    </div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<?php
									wp_nav_menu(array(
										'theme_location' => 'primary',
										'container' => false,
										'menu_class' => 'nav navbar-nav navbar-right'
										//'walker' => new Walker_Nav_Primary()
										)
									);
								?>
							</div>
					  </div><!-- /.container-fluid -->
					</nav>

				</div>

			</div>

			<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
