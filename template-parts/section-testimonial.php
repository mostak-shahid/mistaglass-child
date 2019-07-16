<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-testimonial-animation'];
$animation_delay = ( $mosacademy_options['sections-testimonial-animation-delay'] ) ? $mosacademy_options['sections-testimonial-animation-delay'] : 0;
$title = $mosacademy_options['sections-testimonial-title'];
$content = $mosacademy_options['sections-testimonial-content'];
$shortcode = $mosacademy_options['sections-testimonial-shortcode'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_testimonial', $page_details ); 
?>
<section id="section-testimonial" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_testimonial hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_testimonial', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if ($shortcode) : ?>
					<div class="shortcode"><?php echo do_shortcode( $shortcode ) ?></div>
				<?php endif ?>

	            <?php if($mosacademy_options['sections-testimonial-view-more']['text_field_3']) echo '<div class="testimonial-link-wrapper '.$mosacademy_options['sections-testimonial-view-more']['text_field_3'].'">'; ?>
	                <?php if ($mosacademy_options['sections-testimonial-view-more']['text_field_1'] AND $mosacademy_options['sections-testimonial-view-more']['text_field_2']) : ?>
	                    <a class="testimonial-link <?php echo do_shortcode( $mosacademy_options['sections-testimonial-view-more']['text_field_4'] )  ?>" href="<?php echo do_shortcode( $mosacademy_options['sections-testimonial-view-more']['text_field_2'] )  ?>"><?php echo do_shortcode( $mosacademy_options['sections-testimonial-view-more']['text_field_1'] )  ?></a>
	                <?php endif; ?>
	            <?php if($mosacademy_options['sections-testimonial-view-more']['text_field_3']) echo '</div>'; ?>

		<?php 
		/*
		* action_after_testimonial hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_testimonial', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_testimonial', $page_details  ); ?>