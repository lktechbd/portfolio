<?php
	/*
	 * Template Name: Landing Page
	 * */

	get_header();?>



		<div id="colorlib-main">

			<?php

				$portfolio_current_page_id = get_the_ID();
				$portfolio_page_meta = get_post_meta($portfolio_current_page_id,'portfolio-page-sections',true);
				foreach($portfolio_page_meta['sections'] as $portfolio_page_section):
					$portfolio_section_id = $portfolio_page_section['section'];
					$portfolio_section_meta = get_post_meta($portfolio_section_id,'portfolio-section-type',true);
					$portfolio_section_type = $portfolio_section_meta['type'];

					get_template_part("section-templates/{$portfolio_section_type}");
				endforeach;
			?>



		</div><!-- end:colorlib-main -->
	</div><!-- end:container-wrap -->
</div><!-- end:colorlib-page -->



