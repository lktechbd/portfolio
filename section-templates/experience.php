<?php

	global $portfolio_section_id;

	$portfolio_section_meta = get_post_meta($portfolio_section_id, 'portfolio-section-experience', true);

	$portfolio_section = get_post($portfolio_section_id);
	$portfolio_section_title = $portfolio_section->post_title;
	$portfolio_section_description = $portfolio_section->post_content;
?>

<section class="colorlib-experience" data-section="experience" id="section-experience">
	<div class="colorlib-narrow-content">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
				<span class="heading-meta">
					<?php echo esc_html($portfolio_section_title); ?>
					</span>
				<h2 class="colorlib-heading"><?php echo esc_html($portfolio_section_meta['sub-title']); ?></h2>
			</div>
		</div>

		<?php

			$portfolio_experiences = $portfolio_section_meta['experiences'];

			if($portfolio_experiences):

		?>

		<div class="row">
			<div class="col-md-12">


				<div class="timeline-centered">

					<?php
						foreach($portfolio_experiences as $portfolio_experience):
					;?>

					<article class="timeline-entry animate-box" data-animate-effect="fadeInLeft">
						<div class="timeline-entry-inner">

							<div class="timeline-icon <?php echo esc_attr($portfolio_experience['icon-class']);?> ">
								<i class="<?php echo esc_attr($portfolio_experience['icon']);?>"></i>
							</div>

							<div class="timeline-label">
								<h2><a href="#"><?php echo esc_attr($portfolio_experience['title']);?></a> <span><?php echo esc_attr($portfolio_experience['year']);?></span></h2>
								<?php echo esc_attr($portfolio_experience['desc']);?>
							</div>
						</div>
					</article>

					<?php endforeach;?>
				</div>
			</div>
		</div>
		<?php endif;?>
	</div>
</section>