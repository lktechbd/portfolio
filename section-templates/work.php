<?php
	global $portfolio_section_id;
	$portfolio_section_meta = get_post_meta($portfolio_section_id, 'portfolio-section-work', true);


	$portfolio_section = get_post($portfolio_section_id);
	$portfolio_section_title = $portfolio_section->post_title;
	$portfolio_section_description = $portfolio_section->post_content;

?>




<section class="colorlib-work" data-section="work" id="section-work">
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
			$portfolio_gallery_items   = $portfolio_section_meta['works'];
			$portfolio_item_categories = [];
			foreach ( $portfolio_gallery_items as $portfolio_gallery_item ) {
				$portfolio_gallery_item_categories = explode( ",", $portfolio_gallery_item['category'] );
				foreach ( $portfolio_gallery_item_categories as $portfolio_gallery_item_category ) {
					$portfolio_gallery_item_category = trim( $portfolio_gallery_item_category );
					if ( ! in_array( $portfolio_gallery_item_category, $portfolio_item_categories ) ) {
						array_push( $portfolio_item_categories, $portfolio_gallery_item_category );
					}
				}
			}

		?>

		<div class="row filter">
			<button data-name='*' class="btn btn-info active"><?php _e('All', 'portfolio');?></button>

			<?php
				foreach($portfolio_item_categories as $portfolio_item_category ):

			;?>
			<button data-name=".<?php echo esc_attr($portfolio_item_category);?>" class="btn "><?php echo esc_html($portfolio_item_category);?></button>
			<?php endforeach;?>

		</div>

		<div class="row grid ">
			<?php
				foreach ( $portfolio_gallery_items as $portfolio_gallery_item ):
				$portfolio_item_class = str_replace( ",", " ", $portfolio_gallery_item['category'] );
				$portfolio_item_image_id = $portfolio_gallery_item['image'];
				$portfolio_item_thumbnail = wp_get_attachment_image_src($portfolio_item_image_id,'medium');
				$portfolio_item_categories_array = explode(",",$portfolio_gallery_item['category']);
			?>

			<div class="col-md-6 grid-item <?php echo esc_attr( $portfolio_item_class); ?>">
				<div class=" animate-box" data-animate-effect="fadeInLeft">
					<div class="project" style="background-image: url(<?php echo esc_url($portfolio_item_thumbnail[0]); ?>">
						<div class="desc">
							<div class="con">
								<h3><a href="work.html"><?php echo esc_html($portfolio_gallery_item['title']) ?></a></h3>
								<span><?php echo esc_html($portfolio_gallery_item['sub-title']) ?></span>
								<p class="icon">
									<span><a href="#"><i class="icon-share3"></i></a></span>
									<span><a href="#"><i class="icon-eye"></i> 100</a></span>
									<span><a href="#"><i class="icon-heart"></i> 49</a></span>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php endforeach;?>


		</div>

	</div>

</section>