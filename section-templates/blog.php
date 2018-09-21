<?php

global $portfolio_section_id;

$portfolio_section_meta = get_post_meta($portfolio_section_id, 'portfolio-section-blog', true);

$portfolio_section = get_post($portfolio_section_id);
$portfolio_section_title = $portfolio_section->post_title;
$portfolio_section_description = $portfolio_section->post_content;

?>

<section class="colorlib-blog" data-section="blog" id="section-blog">
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
			wp_nonce_field('loadmorep', 'loadmorep');
			;?>
		<div class="row">
			<?php

				$count_posts = $portfolio_blog_post->found_posts;

				$post_count = $portfolio_section_meta['post-count'];
				$portfolio_blog_post = new WP_Query(array(
					'post_type'		=> 'post',
					'posts_per_page'=> $post_count,
				));
				while($portfolio_blog_post->have_posts()) :
					$portfolio_blog_post->the_post();

			?>
			<div id="posts-container" class="col-md-4 col-sm-6 animate-box my-posts"
				 data-animate-effect="fadeInLeft"
				 data-count = "<?php echo esc_attr($post_count);?>"
				 data-sid = "<?php echo esc_attr($portfolio_section_id);?>"
				 data-ni = "<?php echo esc_attr($post_count);?>"
			>
				<div class="blog-entry">

					<a href="<?php the_permalink(); ?>" class="blog-img">
						<?php the_post_thumbnail('portfolio-blog'); ?>
					</a>
					<div class="desc">
						<span>
							<small><?php echo esc_html(get_the_date()); ?> </small> |
							<small> <?php the_category(" "); ?> </small> |
							<small> <i class="icon-bubble3"></i>
								<?php
									$portfolio_comment_number = get_comments_number(  );
									if($portfolio_comment_number<=1){
										echo $portfolio_comment_number." ".__(" ", "portfolio");
									}else{
										echo $portfolio_comment_number." ".__(" ", "portfolio");
									}
								?>
							<?php  wp_list_comments(); ?>
							</small>
						</span>

						<h3>
							<a href="<?php the_permalink();?>"><?php the_title(); ?></a>
						</h3>
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>

			<?php endwhile; ?>


		</div>
		<div class="row">
			<div class="col-md-12 animate-box">
				<button class="btn btn-primary btn-lg btn-load-more" id="loadmore"><?php _e('Load more', 'portfolio'); ?>
					<i class="icon-reload"></i></button>

			</div>
		</div>
	</div>

</section>

