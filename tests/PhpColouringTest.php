<?php

use Tgmedia\PhpColouring\Colouring;

class PhpColouringTest extends PHPUnit_Framework_TestCase {
	
	public function testColouringOriginal()
	{
		$colouring = new Colouring('#646464');
		$this->assertTrue($colouring->colour() == '#646464');
	}
	
	public function testColouringLighten()
	{
		$colouring = new Colouring('#646464');
		$this->assertTrue($colouring->lighten(20) == '#969696');
	}
	
	public function testColouringDarken()
	{
		$colouring = new Colouring('#646464');
		$this->assertTrue($colouring->darken(20) == '#323232');
	}
	
}