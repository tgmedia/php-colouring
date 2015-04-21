<?php

use Tgmedia\PhpColouring\Colouring;

class PhpColouringTest extends PHPUnit_Framework_TestCase {
	
	public function testColouringLighten()
	{
		$colouring = new Colouring('#646464');
		$this->assertTrue($colouring->luminance(20) == '#969696');
	}
	
	public function testColouringDarken()
	{
		$colouring = new Colouring('#646464');
		$this->assertTrue($colouring->luminance(-20) == '#323232');
	}
	
}