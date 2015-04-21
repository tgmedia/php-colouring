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

	private $colour;

	function __construct($colour)
	{
		$this->colour = $this->hex2rgb(preg_replace( '/[^0-9a-f]/i', '', $colour ));
	}

	/**
	 * Convert HEX colour to RGB
	 *
     * @param string    $colour    Colour as HEX
     * @return array    RGB colour as array
	 **/
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

	/**
	 * Convert RGB colour to HEX
     * @param array     $colour    RGB colour as array
     * @return string   RGB colour as HEX
	 **/
	private function rgb2hex($colour)
	{
		return '#' . sprintf('%02x', $colour['r']) . sprintf('%02x', $colour['g']) . sprintf('%02x', $colour['b']);
	}

	/**
     * Make the colour lighter
     *
     * @param integer    $percent    Percentage to lighten the colour
     * @return string    $new_hex    Lighter colour as HEX
     */
	public function lighten( $percent )
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

	/**
     * Make the colour darker
     *
     * @param integer    $percent    Percentage to darken the colour
     * @return string    $new_hex    Darker colour as HEX
     */
	public function darken( $percent )
	{
		$values = [];
		foreach($this->colour as $index => $colour) {
			$new = ($colour - ($percent/10 * 25));
			if ($new > 255) $new = 255;
			else if ($new < 0) $new = 0;
			$values[$index] = $new;
		}
		return $this->rgb2hex($values);
	}

	/**
     * Return the original colour
     *
     * @return string  Original colour
     */
	public function colour()
	{
		return $this->rgb2hex($this->colour);
	}
}