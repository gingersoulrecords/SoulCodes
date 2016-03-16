<?php 
/*
Plugin Name: SoulBlock
Plugin URI: http://gingersoulrecords.com
Description: A set of shortcodes to control content layouts
Version: 0.1.0
Author: Dave Bloom
Author URI:  http://gingersoulrecords.com
*/

add_action( 'plugins_loaded', array( 'SoulBlock', 'init') );
class SoulBlock {
	public static function init(){
		add_action( 'wp_enqueue_scripts', array( 'SoulBlock', 'styles') );
		add_shortcode( 'div', array( 'SoulBlock', 'shortcode' ) );
		add_shortcode( 'div_nested', array( 'SoulBlock', 'shortcode' ) );
		add_shortcode( 'div_nested2', array( 'SoulBlock', 'shortcode' ) );
		add_shortcode( 'div_nested3', array( 'SoulBlock', 'shortcode' ) );
		add_shortcode( 'div_nested4', array( 'SoulBlock', 'shortcode' ) );
		add_shortcode( 'div_nested5', array( 'SoulBlock', 'shortcode' ) );
	}
	public static function styles(){
		wp_register_style( 'soulblock', plugins_url( 'soulblock.css', __FILE__ ) );
		wp_enqueue_style( 'soulblock' );
	}
	private static function _add_class( $classes, $class ) {
		if ( !in_array( $class, $classes ) ) {
			$classes[] = $class;
		}
		return $classes;
	}
	public static function shortcode( $args=array(), $content="" ) {
		$defaults = array(
			'class' => false,
			'float' => 'left',
			'padding' => 1,
		);
		$args = wp_parse_args( $args, $defaults );

		$class = $args['class'] ? explode( ' ', $args['class'] ) : array();
		$class = self::_add_class( $class, 'soulblock' );

		// $class = self::_add_class( $class, "sm-float-{$args['float']}" );
		// unset( $args['float'] );

		$parse_attributes = array( 'width', 'float', 'clear', 'margin', 'padding', 'display', 'position', 'text-align', 'border', 'letterspacing', 'z-index' );
		$sizes = array( 'sm', 'md', 'lg', 'xl' );
		foreach ( $parse_attributes as $attribute ) { 
			if ( isset( $args[$attribute]) ) {
				$value = $args[$attribute];
				if ( 'z-index' == $attribute ) {
					$value = str_replace( '-', 'n', $value );
				}
				$class = self::_add_class( $class, "sm-{$attribute}-{$value}" );
				unset( $args[$attribute] );
			}
			foreach ( $sizes as $size ) {
				$sized_attribute = "{$size}-{$attribute}";
				$value = $args[$sized_attribute];
				if ( 'z-index' == $sized_attribute ) {
					$value = str_replace( '-', 'n', $value );
				}
				if ( isset( $args[$sized_attribute]) ) {
					$class = self::_add_class( $class, "{$sized_attribute}-{$value}" );
					unset( $args[$sized_attribute] );
				}
			}
		}

		$class = apply_filters( 'soulblock_class', $class, $args, $content );

		$attributes = array();
		foreach( $args as $key => $value) {
			$attributes[$key] = $value;
		}
		$attributes['class'] = implode( ' ', $class );
		$attributes = apply_filters( 'soulblock_attributes', $attributes, $args, $content );

		$tag = '<div';
		foreach ( $attributes as $key => $value ) {
			$value = esc_attr( $value );
			$tag .= " {$key}=\"{$value}\"";
		}
		$tag .= '>';

		$tag_end = '</div>';

		$content = do_shortcode( $content );
		$content = "{$tag}{$content}{$tag_end}";
		return $content;
	}
}