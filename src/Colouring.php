<?php

namespace Tgmedia\PhpColouring;

class Colouring {

	var $colour;

	function __construct($colour) {
		$this->colour = preg_replace( '/[^0-9a-f]/i', '', $colour );
	}

	/**
     * Lightens/darkens a given colour (hex format), returning the altered colour in hex format
     * @param float $percent Decimal ( 0.2 = lighten by 20%(), -0.4 = darken by 40%() )
     * @return str colour as hexadecimal (with hash);
     */
	public function luminance( $percent ) {
		$new_hex = '#';

		if ( strlen( $this->colour ) < 6 ) {
			$this->colour = $this->colour[0] + $this->colour[0] + $this->colour[1] + $this->colour[1] + $this->colour[2] + $this->colour[2];
		}

		for ($i = 0; $i < 3; $i++) {
			$dec = hexdec( substr( $this->colour, $i*2, 2 ) );
			$dec = min( max( 0, $dec + $dec * $percent ), 255 );
			$new_hex .= str_pad( dechex( $dec ) , 2, 0, STR_PAD_LEFT );
		}

		return $new_hex;
	}
}