<?php

class NavigationTest extends WebTestCase
{
	public $fixtures=array(
		'navigations'=>'Navigation',
	);

	public function testShow()
	{
		$this->open('?r=navigation/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=navigation/create');
	}

	public function testUpdate()
	{
		$this->open('?r=navigation/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=navigation/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=navigation/index');
	}

	public function testAdmin()
	{
		$this->open('?r=navigation/admin');
	}
}
