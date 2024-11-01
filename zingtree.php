<?php
/*
Plugin Name: zingtree
Plugin URI: http://wordpress.org/plugins/zingtree/
Description: [zingtree name="Zingtree" id="123456789" ] shortcode
Version: 6.11
Author: Zingtree
Author URI: https://zingtree.com
License: GPLv3
*/


// this brings our zt-popup-modal.js file into the system
// it's used for popup buttons
// derived from https://code.tutsplus.com/articles/how-to-include-javascript-and-css-in-your-wordpress-themes-and-plugins--wp-24321

function register_popup_js()
{
    // Register the script like this for a plugin:
    wp_register_script( 'zt-popup-modal', plugins_url( '/js/zt-popup-modal.js', __FILE__ ), array( 'jquery' ), false, true );
    // Enqueue the script:
    wp_enqueue_script( 'zt-popup-modal' );
    
    // same for embed script
    wp_register_script( 'zt-embed', plugins_url( '/js/iframeResizerSmart.js', __FILE__ ) );
    wp_enqueue_script( 'zt-embed' );
}

add_action( 'wp_enqueue_scripts', 'register_popup_js' );



// tell WP about our shortcode
add_shortcode( 'zingtree', 'zingtree_handler' );


function zingtree_handler( $atts ) 
{
	
// set defaults	
	$defaults = array(
		'name' => 'Zingtree',	// tree name
		'id' => '148196706',	// Zingtree Tour
		'style' => 'buttons',	// style = buttons or panels
		'persist_names' => '',	// names of persistent buttons
		'persist_node_ids' => '',	// node IDs of persistent buttons
		'hide_title' => '',	        // 1 = hide title
		'hide_back_button' => '',	// 1 = hide back button
		'transition' => 'none',	// transition: none / fade / slide
		'speed' => '400',	    // speed of transition (msec)<br>

// new options for 4.0

        'display' => 'embed',               // can be 'embed' or 'popup'
        'button_text_color' => '#ffffff',   // text color for popup buttons
        'button_color' => '#314D68',        // background color for popup buttons
        'button_text' => 'Open Zingtree',   // the text of the button
        
// version 5.0

        'show_history' => '',          // =1 to embed history
        'show_breadcrumbs' => '',      // =1 to embed breadcrumbs
        
// version 6.0
        
        'scroll_parent_to_top' => 'no',   // = 1 to alwaysscroll the containing page to the top on each click
        'disable_scroll' => 'yes',        // = 0 to enable the automatic scrolling that occurs when embedding trees into web pages.
        'other_parameters' => ''         // any other URL parameters to add to the iFrame URL

        
	);



	foreach ( $defaults as $default => $value ) { // add defaults
		if ( ! @array_key_exists( $default, $atts ) ) { // mute warning with "@" when no params at all
			$atts[$default] = $value;
		}
	}
	
    // set default source
    $parms = "&z=wordpress" ;
    
    // other parameters
    if ($atts['other_parameters'] != '')
        $parms .= '&'.$atts['other_parameters'] ;

// disable scroll (set to 1 by defaiult)
    if ($atts['disable_scroll'] == 'yes')
        $parms .= "&disable_scroll=1" ;
    else
        $parms .= "&disable_scroll=0" ;
    	
// scroll_parent_to_top        
    if ($atts['scroll_parent_to_top'] == 'yes')
        $parms .= "&scroll_parent_to_top=1" ;
    
    
// handle persistent buttons	
	
	$persist_names = $atts['persist_names'] ;
	$persist_node_ids = $atts['persist_node_ids'] ;
	
	if ($persist_names != '')
		$parms .= "&persist_names=$persist_names&persist_node_ids=$persist_node_ids" ;	


// show history or breadcrumbs

    if ($atts['show_history'] == "yes")
        $parms .= "&embed_history=1" ;

    if ($atts['show_breadcrumbs'] == "yes")
        $parms .= "&embed_breadcrumbs=1" ;


// hide title

    if ($atts['hide_title'] == "yes")
        $parms .= "&notitle=1" ;


// hide back button

    if ($atts['hide_back_button'] == "yes")
        $parms .= "&hide_back_button=1" ;
        
// add transition effect

    if ($atts['transition'] != "none")
        $parms .= "&transition={$atts['transition']}&speed={$atts['speed']}" ;

// build deploy iFrame

    if ($atts['display'] == 'embed')
    {
        $html = sprintf ("	
        <iframe width=\"100%%\" frameborder=\"0\" seamless src=\"https://zingtree.com/deploy/tree.php?tree_id=%s&style=%s%s\"></iframe>
        <script type=\"text/javascript\">iFrameResize();</script>", 
        esc_html($atts['id']), 
        esc_html($atts['style']), 
        esc_html($parms) ) ;
    }
    
// popup code
    
    else
    {
        $html = sprintf ("	
        <button style=\"border-radius: 6px; border-style: none; font-family: Arial; color: %s; font-size: 20px; background: %s; padding: 10px 20px 10px 20px; text-decoration: none;\" 
onclick=\"show_popup('%s','&style=%s%s');\" >
%s
</button>
        ", 
        esc_html($atts['button_text_color']), 
        esc_html($atts['button_color']), 
        esc_html($atts['id']), 
        esc_html($atts['style']), 
        esc_html($parms),
        esc_html($atts['button_text'])
        
        ) ;
        
        
        
    }


// inject the code

	return($html);
	
}

