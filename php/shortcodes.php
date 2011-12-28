<?php
function brew_add_shortcodes() {
	add_shortcode('beer_recipes', 'beer_recipes');
}

function beer_recipes( $atts ) {
	extract( shortcode_atts( array(), $atts ) );
	$args = array( 'post_type' => 'brew_beer_recipe', 'posts_per_page' => 10 );
	$sq = new WP_Query( $args );
    if ($sq->have_posts()) :
	$out = '<ul class="post_list">'; ?>
				<?php  while ($sq->have_posts()) : $sq->the_post();
					$time = get_the_time('F j, Y');
					$permalink = get_permalink();
					$title = get_the_title();
					$bloginfo = get_template_directory_uri();
					if ( has_post_thumbnail()) {
						$img_src = wp_get_attachment_image_src( get_post_thumbnail_id($GLOBALS['post']->ID), 'size_70_50');
						$thumbnail = $img_src[0];
					}
					else $thumbnail = '';
					$default_thumb = $bloginfo.'/images/post_thumb.jpg';
					$thumbnail = ( $thumbnail == '' ) ? $default_thumb : $thumbnail;
						$format = '<li><a class="pl_thumb" href="%3$s" rel="bookmark" title="' . __( 'Permanent Link to %4$s', 'volt' ) . '"><img src="%2$s" alt="%4$s"/></a><div class="pl_title"><h5><a href="%3$s" rel="bookmark" title="' . __( 'Permanent Link to %4$s', 'volt' ) . '">%4$s</a></h5></div></li>';
						$out .= sprintf ($format, $bloginfo, $thumbnail, $permalink, $title);
			    endwhile;
                $out .= '</ul>';
				return $out;
		endif;
	wp_reset_postdata(); // Restore global post data stomped by the_post().
}