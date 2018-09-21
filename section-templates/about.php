<?php  

global $portfolio_section_id;

$portfolio_section_meta = get_post_meta($portfolio_section_id, 'portfolio-section-about', true);

$portfolio_section = get_post($portfolio_section_id);
$portfolio_section_title = $portfolio_section->post_title;
$portfolio_section_description = $portfolio_section->post_content;
?>

<section class="colorlib-about" data-section="about" id="section-about">
	<div class="colorlib-narrow-content">
		<div class="row">
			<div class="col-md-12">
				<div class="row row-bottom-padded-sm animate-box" data-animate-effect="fadeInLeft">
					<div class="col-md-12">
						<div class="about-desc">
							<span class="heading-meta">
							<?php echo esc_html($portfolio_section_title); ?>
							</span>
							
							<h2 class="colorlib-heading"><?php echo esc_html($portfolio_section_meta['title']); ?></h2>
							<?php echo apply_filters( 'the_content', $portfolio_section_description); ?>
						</div>
					</div>
				</div>
				<?php  

				$portfolio_service_meta = $portfolio_section_meta['services'];
				
				?>
				<div class="row">

					<div class="col-md-3 animate-box" data-animate-effect="fadeInLeft">

						<div class="services color-1">
							<span class="icon2"><i class="<?php echo esc_html($portfolio_service_meta[1]['icon']); ?>"></i></span>
							<h3><?php echo esc_html($portfolio_service_meta[1]['title']); ?></h3>
						</div>
					</div>
					<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
						<div class="services color-2">
							<span class="icon2"><i class="<?php echo esc_html($portfolio_service_meta[2]['icon']); ?>"></i></span>
							<h3><?php echo esc_html($portfolio_service_meta[2]['title']); ?></h3>
						</div>
					</div>
					<div class="col-md-3 animate-box" data-animate-effect="fadeInTop">
						<div class="services color-3">
							<span class="icon2"><i class="<?php echo esc_html($portfolio_service_meta[3]['icon']); ?>"></i></span>
							<h3><?php echo esc_html($portfolio_service_meta[3]['title']); ?></h3>
						</div>
					</div>
					<div class="col-md-3 animate-box" data-animate-effect="fadeInBottom">
						<div class="services color-4">
							<span class="icon2"><i class="<?php echo esc_html($portfolio_service_meta[4]['icon']); ?>"></i></span>
							<h3><?php echo esc_html($portfolio_service_meta[4]['title']); ?></h3>
						</div>
					</div>
				</div>
				<div class="row">
					<?php
						$portfolio_hire_meta = $portfolio_section_meta['services'];
					?>
					<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
						<div class="hire">
							<h2><?php echo esc_html($portfolio_section_meta['hire']); ?></h2>
							<a href="#" class="btn-hire"><?php echo esc_html($portfolio_section_meta['button']); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>