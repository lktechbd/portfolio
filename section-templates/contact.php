<?php  

global $portfolio_section_id;

$portfolio_section_meta = get_post_meta($portfolio_section_id, 'portfolio-section-contact', true);

$portfolio_section = get_post($portfolio_section_id);
$portfolio_section_title = $portfolio_section->post_title;
$portfolio_section_description = $portfolio_section->post_content;
?>

<section class="colorlib-contact" data-section="contact" id="section-contact">
	<div class="colorlib-narrow-content">
		<div class="row">
			<div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
				<span class="heading-meta">
				<?php echo esc_html($portfolio_section_title); ?>
				</span>
				
				<h2 class="colorlib-heading"><?php echo esc_html($portfolio_section_meta['sub-title']); ?></h2>
			</div>
		</div>


		<div class="row">

			<?php 

				$portfolio_contacts = $portfolio_section_meta['contacts'];

				if ($portfolio_contacts):

			?>

			<div class="col-md-5">

				<?php 
					foreach($portfolio_contacts as $portfolio_contact):
				?>
				<div class="colorlib-feature colorlib-feature-sm animate-box" data-animate-effect="fadeInLeft">
					<div class="colorlib-icon">
						<i class="<?php echo esc_html($portfolio_contact['icon']) ;?>"></i>
					</div>
					<div class="colorlib-text">
						<p><a href="#"><?php echo esc_html($portfolio_contact['title']) ;?></a></p>
					</div>
				</div>

			<?php endforeach; ?>

			</div>

			<?php endif; ?>



			<div class="col-md-7 col-md-push-1">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 col-md-pull-1 animate-box" data-animate-effect="fadeInRight">
						<form action="">
							<?php wp_nonce_field('contact', 'contact');?>
							<div class="form-group">
								<input type="text" id="name" class="form-control" placeholder="Name">
							</div>
							<div class="form-group">
								<input type="email" id="email" class="form-control" placeholder="Email">
							</div>
							<div class="form-group">
								<input type="text" id="subject" class="form-control" placeholder="Subject">
							</div>
							<div class="form-group">
								<textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" id="send-message" class="btn btn-primary btn-send-message" value="Send Message">
							</div>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>