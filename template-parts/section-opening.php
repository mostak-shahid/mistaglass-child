<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-opening-animation'];
$animation_delay = ( $mosacademy_options['sections-opening-animation-delay'] ) ? $mosacademy_options['sections-opening-animation-delay'] : 0;
$title = $mosacademy_options['sections-opening-title'];
$content = $mosacademy_options['sections-opening-content'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_opening', $page_details ); 
?>
<section id="section-opening" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_opening hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_opening', $page_details ); 
		?>
			<div class="row justify-content-lg-center">
				<div class="col-lg-10">
					<div class="media">
						<img src="<?php echo get_stylesheet_directory_uri() ?>/images/opening-hours.png" class="align-self-center mr-3" alt="<?php echo $alt_tag['inner'] ?>Opening Hours">
						<div class="media-body align-self-center">				
						<?php if ($title) : ?>				
							<div class="title-wrapper">
								<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
							</div>
						<?php endif; ?>
						<?php if ($content) : ?>				
							<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
						<?php endif; ?>
						<?php if ($mosacademy_options['contact-hour']) : ?>				
							<div class="hour-wrapper"><?php echo do_shortcode( '[hours]' ) ?></div>
						<?php endif; ?>

						</div>
					</div>					
				</div>
			</div>

		<?php 
		/*
		* action_after_opening hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_opening', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_opening', $page_details  ); ?>