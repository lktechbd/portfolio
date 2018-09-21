<?php
	if ( class_exists( 'Attachments' ) ) {
		require_once "lib/attachments.php";
	}
	require_once get_theme_file_path("/lib/csf/cs-framework.php");
	require_once get_theme_file_path( "/inc/metaboxes/section.php" );
	require_once get_theme_file_path( "/inc/metaboxes/page.php" );
	require_once get_theme_file_path( "/inc/metaboxes/section-home.php" );
	require_once get_theme_file_path( "/inc/metaboxes/section-about.php" );
	require_once get_theme_file_path( "/inc/metaboxes/section-services.php" );
	require_once get_theme_file_path( "/inc/metaboxes/section-counter.php" );
	require_once get_theme_file_path( "/inc/metaboxes/section-skills.php" );
	require_once get_theme_file_path( "/inc/metaboxes/section-education.php" );
	require_once get_theme_file_path( "/inc/metaboxes/section-experience.php" );
	require_once get_theme_file_path( "/inc/metaboxes/section-work.php" );
	require_once get_theme_file_path( "/inc/metaboxes/section-blog.php" );
	require_once get_theme_file_path( "/inc/metaboxes/section-contact.php" );



	define( 'CS_ACTIVE_FRAMEWORK',   false  ); // default true
	define( 'CS_ACTIVE_METABOX',     true ); // default true
	define( 'CS_ACTIVE_TAXONOMY',    false ); // default true
	define( 'CS_ACTIVE_SHORTCODE',   false ); // default true
	define( 'CS_ACTIVE_CUSTOMIZE',   false ); // default true


	define( 'CS_ACTIVE_LIGHT_THEME',  true  ); // default false



if(site_url() == "http://portfolio"){
    define("VERSION", time());
}else{
    define("VERSION", wp_get_theme()->get("Version"));
}

function portfolio_theme_setup(){
    load_theme_textdomain( "portfolio");
    add_theme_support( "title-tag" );
    add_theme_support( "post-thumbnails" );
    add_theme_support("custom-header");
    add_theme_support( "custom-logo" );

    add_theme_support( "post-formats", array(
        "audio", 
        "link", 
        "image", 
        "video", 
        "quote", 
        "gallery"
    ) );
    add_theme_support( 'html5', array(
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
    add_editor_style("assets/css/editor-style.css");
	add_image_size( "portfolio-blog", 245, 165, true);

    register_nav_menu('primary', __('Main Menu', 'portfolio'));

}
add_action( "after_setup_theme", "portfolio_theme_setup");


function portfolio_metabox_init(){
	CSFramework_Metabox::instance( $options );
}
add_action('init', 'portfolio_metabox_init');

function portfolio_assets(){

    // Enqueue Style Files

	wp_enqueue_style('tine-style', "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.7.1/tiny-slider.css");
	wp_enqueue_style('Quicksand-font', '//fonts.googleapis.com/css?family=Quicksand:300,400,500,700');
    wp_enqueue_style('Playfai-font', '//fonts.googleapis.com/css?family=Playfair+Display:400,400i,70');
    wp_enqueue_style('animate-css', get_theme_file_uri("/assets/css/animate.css"));
    wp_enqueue_style('icomoon-css', get_theme_file_uri("/assets/css/icomoon.css"));
    wp_enqueue_style('bootstrap-css', get_theme_file_uri("/assets/css/bootstrap.css"));
    wp_enqueue_style('flexslider-css', get_theme_file_uri("/assets/css/flexslider.css"));
    wp_enqueue_style('flaticon-css', get_theme_file_uri("/assets/fonts/flaticon/font/flaticon.css"));
    wp_enqueue_style('owl-carousel-css', get_theme_file_uri("/assets/css/owl.carousel.min.css"));
    wp_enqueue_style('owl-theme-css', get_theme_file_uri("/assets/css/owl.theme.default.min.css"));
    wp_enqueue_style('style-css', get_theme_file_uri("/assets/css/style.css"));
    wp_enqueue_style('portfolio-stylesheet', get_stylesheet_uri(), null);
 
    

    // JS File Load

	wp_enqueue_script( 'modernizer-js', get_theme_file_uri("/assets/js/modernizr-2.6.2.min.js"), null, null);
	wp_enqueue_script( 'respond-js', get_theme_file_uri("/assets/js/respond.min.js"), null, null);
	wp_enqueue_script( 'easing-js', get_theme_file_uri("/assets/js/jquery.easing.1.3.js"), array('jquery'), VERSION, true);
	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri("/assets/js/bootstrap.min.js"), array('jquery'), VERSION, true);
	wp_enqueue_script( 'isotope-pkgd-js', get_theme_file_uri("/assets/js/isotope.pkgd.min.js"), array('jquery'), VERSION, true);
	wp_enqueue_script( 'isotope-js', get_theme_file_uri("/assets/js/isotope.js"), array('jquery'), VERSION, true);
	wp_enqueue_script( 'waypoints-js', get_theme_file_uri("/assets/js/jquery.waypoints.min.js"), array('jquery'), VERSION, true);
	wp_enqueue_script( 'flexslider-js', get_theme_file_uri("/assets/js/jquery.flexslider-min.js"), array('jquery'), VERSION, true);
	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri("/assets/js/owl.carousel.min.js"), array('jquery'), VERSION, true);
	wp_enqueue_script( 'countTo-js', get_theme_file_uri("/assets/js/jquery.countTo.js"), array('jquery'), VERSION, true);
	wp_enqueue_script( 'contact-js', get_theme_file_uri("/assets/js/contact.js"), array('jquery'), VERSION, true);
	wp_enqueue_script( 'loadmore-js', get_theme_file_uri("/assets/js/loadmore-blog.js"), array('jquery'), VERSION, true);

	wp_enqueue_script("tiny-js", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.7.1/min/tiny-slider.js", null, "2.7.1", true);
	wp_enqueue_script("feahterlight-js", "//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js",array("jquery"), "0.0.1", true );
	wp_enqueue_script("tine-slider-js", get_template_directory_uri()."/assets/js/tiny-slider.js", array("jquery", "feahterlight-js"), VERSION, true);

    wp_enqueue_script( 'main-js', get_theme_file_uri("/assets/js/main.js"), array('jquery'), VERSION, true);

    $ajaxurl = admin_url("admin-ajax.php");
    wp_localize_script('loadmore-js', 'portfoliourl', array('ajaxurl'=>$ajaxurl));
}
add_action( 'wp_enqueue_scripts', 'portfolio_assets' );



	function portfolio_footer_widget(){

		register_sidebar(array(
			'name'			=> __('Copyright Widget', 'meal'),
			'id'			=> 'copyright',
			'description'	=>	__('Copyright Widgets Here', 'meal'),
			'before_widget'	=>	'<div id="%1$s" class="%2$s">',
			'after_widget'	=>	'</div>',
			'before_title'	=> '',
			'after_title'	=>	'',
		));


	}
	add_action('widgets_init', 'portfolio_footer_widget');

//	function portfolio_change_nav_menu($menus){
//		$string_to_replace = home_url("/")."section/";
//		if(is_front_page()) {
//			foreach ($menus as $menu) {
//				$new_url = str_replace($string_to_replace, "#", $menu->url);
//				if($new_url != $menu->url){
//					$new_url= rtrim($new_url, "/");
//				}
//				$menu->url = $new_url;
//			}
//		}
//
//		return $menus;
//
//	}
//	add_filter('wp_nav_menu_objects', 'portfolio_change_nav_menu');


	function portfolio_contact_email(){
		if(check_ajax_referer('contact','cn')) {
			$name    = isset( $_POST['name'] ) ? $_POST['name'] : '';
			$email   = isset( $_POST['email'] ) ? $_POST['email'] : '';
			$subject   = isset( $_POST['subject'] ) ? $_POST['subject'] : '';
			$message = isset( $_POST['message'] ) ? $_POST['message'] : '';

			$_message    = sprintf( "%s \nFrom: %s\nEmail: %s\nsubject: %s", $message, $name, $email, $subject );
			$admin_email = get_option( 'admin_email' );

			//postfix plugin for mail send

			wp_mail( 'lktechbd@gmail.com', __( 'Someone tried to contact you', 'meal' ), $_message, "From: admin@nexus-bd.net\r\n" );
			die( 'successful' );
		}
		die('error');
	}
	add_action('wp_ajax_contact','portfolio_contact_email');
	add_action('wp_ajax_nopriv_contact','portfolio_contact_email');




	function load_posts_by_ajax_callback() {

	    check_ajax_referer('load_more_posts', 'security');

	    $paged = $_POST['page'];

	    $args = array(

	        'post_type' => 'post',

	        'post_status' => 'publish',

	        'posts_per_page' => '2',

	        'paged' => $paged,

	    );

	    $my_posts = new WP_Query( $args );

	    if ( $my_posts->have_posts() ) :

			?>

			<?php while ( $my_posts->have_posts() ) : $my_posts->the_post() ?>

			<div class="col-md-4 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
				<div class="blog-entry">

					<a href="<?php the_permalink(); ?>" class="blog-img">
						<?php echo the_post_thumbnail('portfolio-blog'); ?>
					</a>



					<div class="desc">
						<span><small><?php echo esc_html(get_the_date()); ?> </small> | <small> <?php the_category(" "); ?> </small> | <small> <i class="icon-bubble3"></i>


								<?php
									$portfolio_comment_number = get_comments_number(  );
									if($portfolio_comment_number<=1){
										echo $portfolio_comment_number." ".__(" ", "portfolio");
									}else{
										echo $portfolio_comment_number." ".__(" ", "portfolio");
									}
								?>


								<?php  wp_list_comments(); ?>


					</small></span>
						<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
						<?php the_content(); ?>
					</div>
				</div>
			</div>



			<?php endwhile ?>

			<?php

	    endif;

	    die();

	}



	add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
	add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');


	function get_max_page_number(){
		global $wp_query;

		return $wp_query->max_num_pages;

	}

	function portfolio_loadmore_posts(){

		if(wp_verify_nonce($_POST['nonce'], 'loadmorep')){
			$count_posts = $portfolio_blog_post->found_posts;
			$portfolio_section_id = $_POST['sid'];
			$portfolio_section_meta = get_post_meta($portfolio_section_id, 'portfolio-section-blog', true);

			$post_count = $portfolio_section_meta['post-count'];

			$portfolio_blog_post = new WP_Query(array(
				'post_type'		=> 'post',
				'posts_per_page'=> $post_count,
			));

			$count_posts = array_slice($count_posts, $post_count);

			while($portfolio_blog_post->have_posts()) :
				$portfolio_blog_post->the_post();

				if($portfolio_blog_post >= $count_posts ){
					break;
				}
				?>

				<div id="posts-container" class="col-md-4 col-sm-6 animate-box my-posts"
					 data-count="<?php echo esc_attr($post_count);?>"
					 data-sid ="<?php echo esc_attr($portfolio_section_id);?>"
					 data-ni ="<?php echo esc_attr($post_count);?>"
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

			<?php endwhile;


		}
		die();
	}
	add_action('wp_ajax_loadmorep', 'portfolio_loadmore_posts');
	add_action('wp_ajax_nopriv_loadmorep', 'portfolio_loadmore_posts');