<?php

// function for outputting a beer recipe
function beer_recipe($field, $attr = null) {
	global $post;
	$meta = get_post_custom($post->ID);
	
	switch($field) {
        case 'recipeauthor':
			$recipeauthor = $meta['recipeauthor'][0];
			return $recipeauthor;
		break;
        
        case 'bjcpstyles':
			$bjcpstyles = get_the_term_list( $post->ID, 'bjcpstyles', '', ', ', '');
			return $bjcpstyles;
		break;
        
        case 'types':
			$types = get_the_term_list( $post->ID, 'types', '', ', ', '');
			return $types;
		break;
        
        case 'yeaststarter':
			$yeaststarter = $meta['yeaststarter'][0];
			return $yeaststarter;
		break;
        
        case 'yeasts':
			$yeasts = get_the_term_list( $post->ID, 'yeasts', '', ', ', '');
			return $yeasts;
		break;
        
        case 'originalgravity':
			$originalgravity = $meta['originalgravity'][0];
			return $originalgravity;
		break;
        
        case 'finalgravity':
			$finalgravity = $meta['finalgravity'][0];
			return $finalgravity;
		break;
    } // end switch
}
?>