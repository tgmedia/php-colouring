<?php
namespace Tgmedia\PhpColouring;

/**
 * PHP Colour class
 *
 * The class allows colour manipulation
 *
 * @package    Tgmedia
 * @subpackage PhpColouring
 * @author     Tim Greenwood <tim@tgmedia.co.uk>
 */

class Colouring {

	var $colour;

	function __construct($colour)
	{
		$this->colour = $this->hex2rgb(preg_replace( '/[^0-9a-f]/i', '', $colour ));
	}

	private function hex2rgb($colour)
	{
		if ( $colour[0] == '#' ) {
			$colour = substr( $colour, 1 );
		}
		if ( strlen( $colour ) == 6 ) {
			list( $r, $g, $b ) = array( $colour[0] . $colour[1], $colour[2] . $colour[3], $colour[4] . $colour[5] );
		} elseif ( strlen( $colour ) == 3 ) {
			list( $r, $g, $b ) = array( $colour[0] . $colour[0], $colour[1] . $colour[1], $colour[2] . $colour[2] );
		} else {
			return false;
		}
		$r = hexdec( $r );
		$g = hexdec( $g );
		$b = hexdec( $b );
		return array( 'r' => $r, 'g' => $g, 'b' => $b );
	}

	private function rgb2hex($colour)
	{
		return '#' . sprintf('%02x', $colour['r']) . sprintf('%02x', $colour['g']) . sprintf('%02x', $colour['b']);
	}

	/**
     * Change the luminance of a HEX colour
     *
     * @param integer    $percent    Integer number: positive to lighten, negative to darken
     * @return string  $new_hex
     */
	public function luminance( $percent )
	{
		$values = [];
		foreach($this->colour as $index => $colour) {
			$new = ($colour + ($percent/10 * 25));
			if ($new > 255) $new = 255;
			else if ($new < 0) $new = 0;
			$values[$index] = $new;
		}
		return $this->rgb2hex($values);
	}
}