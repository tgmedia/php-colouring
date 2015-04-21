<?php

use Tgmedia\PhpColouring\Colouring;

class PhpColouringTest extends PHPUnit_Framework_TestCase {
	
	public function testColouring()
	{
		$colouring = new Colouring('#666666');
		$this->assertTrue($colouring->luminance(0.1) == '#707070');
	}
	
}