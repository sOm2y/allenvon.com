<?php
    //set featured image size
    add_theme_support( 'post-thumbnails' );

    add_image_size( 'featured', 325, 244,true);
    add_image_size( 'post-thumb', 300, 125,true ); 
    add_image_size( 'information-detail', 500, 345,false );

    /**
	 * Add automatic image sizes
	 */
	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'portfolio', 400, 350, false ); 
		add_image_size( 'member-img', 200, 200, false ); //(scaled)
		add_image_size( 'people-img', 360, 360, true ); //(cropped)
		add_image_size( 'people-featured-img', 150, 120, true ); //(cropped)
	}


?>