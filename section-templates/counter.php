<?php  

global $portfolio_section_id;
$portfolio_section_meta = get_post_meta($portfolio_section_id, 'portfolio-section-counter', true);

$portfolio_banner_image = get_template_directory_uri().'/assets/images/cover_bg_1.jpg';
if(isset($portfolio_section_meta['counter_image'])){
    $portfolio_banner_image = wp_get_attachment_image_src( $portfolio_section_meta['counter_image'], 'full');
}

$portfolio_section = get_post($portfolio_section_id);
$portfolio_section_title = $portfolio_section->post_title;
$portfolio_section_description = $portfolio_section->post_content;

?>



<div id="colorlib-counter" class="colorlib-counters" style="background-image: url(<?php echo esc_url($portfolio_banner_image[0]); ?>);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="colorlib-narrow-content">
		<div class="row">
		</div>
		
		<?php 
			$portfolio_counter_meta = $portfolio_section_meta['counters'];
			if ($portfolio_counter_meta) :

		 ?>
		<div class="row">
			
			<?php 

				foreach ($portfolio_counter_meta  as $portfolio_counter) :

			 ?>
			
			<div class="col-md-3 text-center animate-box">
				<span class="colorlib-counter js-counter" data-from="0" data-to="<?php echo esc_html($portfolio_counter['data-to']); ?>" data-speed="<?php echo esc_html($portfolio_counter['data-speed']); ?>" data-refresh-interval="50"></span>
				<span class="colorlib-counter-label"><?php echo esc_html($portfolio_counter['title']); ?></span>
			</div>
			
			<?php endforeach; ?>

			
		</div>


	<?php endif; ?>

	</div>
</div>