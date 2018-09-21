<?php

	global $portfolio_section_id;

	$portfolio_section_meta = get_post_meta($portfolio_section_id, 'portfolio-section-services', true);

	$portfolio_section = get_post($portfolio_section_id);
	$portfolio_section_title = $portfolio_section->post_title;
	$portfolio_section_description = $portfolio_section->post_content;
?>

<section class="colorlib-services" data-section="services" id="section-services">
	<div class="colorlib-narrow-content">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
				<span class="heading-meta"><?php echo esc_html($portfolio_section_title); ?></span>
				<h2 class="colorlib-heading"><?php echo esc_html($portfolio_section_meta['title']); ?></h2>
			</div>
		</div>


		<?php
			$portfolio_service_section = $portfolio_section_meta['services'];

			if($portfolio_service_section):
				?>



				<div class="row row-pt-md">
					<?php

						foreach ($portfolio_service_section as $portfolio_service) :

							;?>

							<div class="col-md-4 text-center animate-box">


								<div class="services <?php echo esc_attr($portfolio_service['bar-color']); ?>">
								<span class="icon">
									<i class="<?php echo esc_html($portfolio_service['icon']); ?>"></i>
								</span>
									<div class="desc">
										<h3><?php echo esc_html($portfolio_service['title']); ?></h3>
										<p><?php echo esc_html($portfolio_servicen['desc']); ?></p>
									</div>
								</div>



							</div>
						<?php endforeach; ?>

				</div>

			<?php endif; ?>
	</div>
</section>