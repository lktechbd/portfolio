<?php  

global $portfolio_section_id;

$portfolio_section_meta = get_post_meta($portfolio_section_id, 'portfolio-section-skills', true);

$portfolio_section = get_post($portfolio_section_id);
$portfolio_section_title = $portfolio_section->post_title;
$portfolio_section_description = $portfolio_section->post_content;
?>



<section class="colorlib-skills" data-section="skills" id="section-skills">
	<div class="colorlib-narrow-content">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-md-pull-3 animate-box" data-animate-effect="fadeInLeft">
				<span class="heading-meta"><?php echo esc_html($portfolio_section_title); ?></span>
				<h2 class="colorlib-heading animate-box"><?php echo esc_html($portfolio_section_meta['sub-title']); ?></h2>
			</div>
		</div>

		<?php 

			$portfolio_skills = $portfolio_section_meta['skills'];

			if ($portfolio_skills) :
		 ?>

		<div class="row">
			<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
				<?php echo apply_filters('the_content', $portfolio_section_description); ?>
			</div>

			<?php 

			foreach ($portfolio_skills as $portfolio_skill) :

			?>

			<div class="col-md-6 animate-box" data-animate-effect="<?php echo esc_html($portfolio_skill['animate-effect']); ?>">
				<div class="progress-wrap">
					<h3><?php echo esc_html($portfolio_skill['title']); ?></h3>
					<div class="progress">
						<div class="progress-bar <?php echo esc_html($portfolio_skill['bar-color']); ?> " role="progressbar" aria-valuenow="<?php echo esc_html($portfolio_skill['skill-limit']); ?>"
							 aria-valuemin="0" aria-valuemax="100" style="width:<?php echo esc_html($portfolio_skill['skill-limit']); ?>% ">
							<span><?php echo esc_html($portfolio_skill['skill-limit']); ?>%</span>
						</div>
					</div>
				</div>
			</div>

			<?php endforeach; ?>

		</div>
		<?php endif; ?>

	</div>
</section>