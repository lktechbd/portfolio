<?php
	global $portfolio_section_id;
	$portfolio_section_meta        = get_post_meta( $portfolio_section_id, 'portfolio-section-home', true );
	$portfolio_section             = get_post( $portfolio_section_id );
	$portfolio_section_title       = $portfolio_section->post_title;
	$portfolio_section_description = $portfolio_section->post_content;
?>


<section id="colorlib-hero" class="js-fullheight" data-section="home">

	<div class="flexslider js-fullheight">
		<?php
			$portfolio_sliders = $portfolio_section_meta['sliders'];
			if($portfolio_sliders):

			;?>
		<ul class="slides">
			<?php
				foreach($portfolio_sliders as $portfolio_slide):
					$portfolio_sliders_image = wp_get_attachment_image_src($portfolio_slide['image'], 'large');

				;?>
			<li style="background-image: url(<?php echo esc_url($portfolio_sliders_image[0]); ?>);">
				<div class="overlay"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-xs-12 js-fullheight slider-text">
							<div class="slider-text-inner js-fullheight">
								<div class="desc">
									<h1><?php echo esc_html($portfolio_slide['title']);?></h1>
									<h2><?php echo esc_html($portfolio_slide['desc']);?></h2>
									<p><a class="btn btn-primary btn-learn"><?php echo esc_html($portfolio_slide['button']);?> <i class="icon-download4"></i></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<?php endforeach;?>
		</ul>
		<?php endif ;?>
	</div>
</section>
