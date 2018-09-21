<?php

	global $portfolio_section_id;

	$portfolio_section_meta = get_post_meta($portfolio_section_id, 'portfolio-section-education', true);

	$portfolio_section = get_post($portfolio_section_id);
	$portfolio_section_title = $portfolio_section->post_title;
	$portfolio_section_description = $portfolio_section->post_content;
?>


<section class="colorlib-education" data-section="education" id="section-education">
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

			$portfolio_education_tabs = $portfolio_section_meta['educations'];

			if($portfolio_education_tabs):

			;?>
		<div class="row">
			<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
				<div class="fancy-collapse-panel">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

						<?php
							foreach($portfolio_education_tabs as $portfolio_education_tab):

							;?>
								<div class="panel panel-default">
									<div class="panel-heading" role="tab"
										 id="<?php echo esc_html($portfolio_education_tab['tab-heading']);?>">
										<h4 class="panel-title">
											<a class="collapsed" data-toggle="collapse" data-parent="#accordion"
											   href="#<?php echo esc_html($portfolio_education_tab['tab-id']);?>"
											   aria-expanded="false" aria-controls="<?php echo esc_html($portfolio_education_tab['tab-id']);?>">
												<?php echo esc_html($portfolio_education_tab['title']);?>
											</a>
										</h4>
									</div>
									<div id="<?php echo esc_html($portfolio_education_tab['tab-id']);?>"
										 class="panel-collapse collapse" role="tabpanel"
										 aria-labelledby="<?php echo esc_html($portfolio_education_tab['tab-heading']);?>">
										<div class="panel-body">
											<?php echo esc_html($portfolio_education_tab['tab-content']);?>
										</div>
									</div>
								</div>

						<?php endforeach;?>
				</div>
			</div>
		</div>
	</div>
	<?php endif;?>

</section>