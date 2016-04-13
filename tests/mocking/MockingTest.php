<?php

class MockingTest extends PHPUnit_Framework_TestCase
{
	public function tearDown()
	{
		Mockery::close();
	}

	public function testBasicExample()
	{

	}
}