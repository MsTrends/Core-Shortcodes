<?php

class MS_Shortcodes {


	#-----------------------------------------------------------------#
	# Init Shortcodes Functions
	#-----------------------------------------------------------------# 

	public function __construct() {

		add_shortcode( 'clear', array( $this, 'clear_shortcode') );
		add_shortcode( 'button', array( $this, 'button_shortcode') );
		add_shortcode( 'highlight', array( $this, 'highlight_shortcode') );
		add_shortcode( 'alert', array( $this, 'alert_shortcode') );
		add_shortcode( 'toggle', array( $this, 'toggle_shortcode') );
		add_shortcode( 'tabs', array( $this, 'tabs_shortcode') );
		add_shortcode( 'tab', array( $this, 'tab_shortcode') );

	}


	#-----------------------------------------------------------------#
	# CLEAR
	#-----------------------------------------------------------------# 

	public function clear_shortcode( $atts ) {

	   return '<div class="clear vertical-space-20"></div>';

	}


	#-----------------------------------------------------------------#
	# HIGHLIGHT
	#-----------------------------------------------------------------#

	public function highlight_shortcode( $atts, $content = null ) {

		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );
		return '<span class="highlight">' . $content . '</span>';

	}


	#-----------------------------------------------------------------#
	# ALERTS
	#-----------------------------------------------------------------#

	public function alert_shortcode( $atts, $content = null ) {

		$defaults = array( 'style' => '' );
	    extract(shortcode_atts($defaults, $atts));

	   	$class = 'trend-alert';
	   	$class .= ' '. $style;

	   	$output = '<div class="'.$class.'">';
	   	$output .= do_shortcode( $content );
	   	$output .= '</div>';

	      return $output;

	}


	#-----------------------------------------------------------------#
	# BUTTONS
	#-----------------------------------------------------------------# 

	public function button_shortcode( $atts, $content = null ) {
	    
		$defaults = array(
			'url'		=> '#',
 			'target'	=> 'blank', // blank, self, parent, top
			'color'		=> 'black', // black, grey, green, blue, yellow, red, purple, orange, pink
			'type'      => 'square', // square, round
			'size'      => 'medium', // small, medium, large
	    );

	    extract(shortcode_atts($defaults, $atts));

		// TARGET SETUP
		if		($target == 'blank' || $target == '_blank' ) 	{ $target = ' target="_blank"'; }
		elseif	($target == 'self' || $target == '_self' )		{ $target = ' target="_self"'; }
		elseif	($target == 'parent' || $target == '_parent' )	{ $target = ' target="_parent"'; }
		elseif	($target == 'top' || $target == '_top' )		{ $target = ' target="_top"'; }
		else	{$target = '';}

		// BUTTON OUTPUT
		$output = '<a href="'.$url.'" class="trend-button '.$color.' '.$size.' '.$type.' " '.$target.'>'.do_shortcode($content).'</a>';

	    return $output;

	}
	
	
	#-----------------------------------------------------------------#
	# TOGGLES
	#-----------------------------------------------------------------# 

	public function toggle_shortcode( $atts, $content = null ) {
		
		$defaults = array(
			'title'    	 => 'Toggle Title',
			'state'		 => 'collapse'
		);

	    extract(shortcode_atts($defaults, $atts));

	    $id = sanitize_title($title);

		// BODY STATE
		if		($state == 'open') { $active = ' active'; }
		else	{$active = '';}
	    
		return "
		<div class='trend-toggle'>

			<div class='trend-toggle-heading ". $active ."'>
				<p class='trend-toggle-title'><a href='#". $id ."'>". $title ."</a></p>
			</div>

			<div id='". $id ."' class='trend-toggle-body ". $state ."'>
				<div class='trend-toggle-content'>". do_shortcode( $content ) ."</div>
			</div>

		</div>";
	}


	#-----------------------------------------------------------------#
	# TABS
	#-----------------------------------------------------------------# 

	public function tabs_shortcode( $atts, $content = null ) {

		$defaults = array();
		extract( shortcode_atts( $defaults, $atts ) );

		preg_match_all( '/tab title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );

		$tab_titles = array();
		if( isset($matches[1]) ){ $tab_titles = $matches[1]; }

		$output = '';

		if( count($tab_titles) ){

			$output .= '<div class="trend-tabs">';

			$output .= '<ul class="trend-tab-headings">';

			foreach( $tab_titles as $tab ){
				$output .= '<li><a href="#tab-'. sanitize_title( $tab[0] ) .'">' . $tab[0] . '</a></li>';
			}
		    $output .= '</ul>';
		    
		    $output .= '<div class="trend-tab-contents">';
		    $output .= do_shortcode( $content );
		    $output .= '</div>';

		    $output .= '</div>';
		    $output .= '<div class="clear"></div>';

		} else {
			$output .= do_shortcode( $content );
		}

		return $output;
	
	}


	public function tab_shortcode( $atts, $content = null ) {

		$defaults = array( 'title' => 'Tab' );
		extract( shortcode_atts( $defaults, $atts ) );

		return '<div id="tab-'. sanitize_title( $title ) .'" class="trend-tab-body">'. do_shortcode( $content ) .'</div>';
	
	}




}