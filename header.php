<!DOCTYPE HTML>
<html <?php language_attributes( ); ?>>
<head>
	<meta charset="<?php bloginfo('charset') ;?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>

	<![endif]-->
	<?php wp_head(); ?>
</head>
<body>
<div id="colorlib-page">
	<div class="container-wrap">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">

			<div class="testimonials slider">


				<?php
					if(class_exists('Attachments')){

						$attachments = new Attachments('testimonials');

						if($attachments->exist()){
							while($attachment = $attachments->get()){ ?>
								<div class="text-center">
									<div class="author-img">
										<?php echo $attachments->image('medium');?>
									</div>
									<h1 id="colorlib-logo"><a href="<?php bloginfo('home');?>"><?php echo esc_html($attachments->field('name'));?></a></h1>
									<span class="position"><a href="<?php bloginfo('home');?>"><?php echo esc_html($attachments->field('position'));?></a> in <?php echo esc_html($attachments->field('country'));?></span>
								</div>
								<?php
							}
						}
					}

					;?>






			</div>




			<nav id="colorlib-main-menu" role="navigation" class="navbar">
				<?php
					wp_nav_menu( array(
						'theme_location' 	=> 'primary',
						'container_class'	=> 'collapse',
						'container_id'		=> 'navbar',
						'container'			=> ""
					));
				?>
			</nav>

			<?php get_footer();?>

		</aside>