<?php


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig extends Environment
{
	public function __construct()
	{
		$loader = new FilesystemLoader(VIEWPATH);
		parent::__construct($loader, [
			'cache' => false,
			'autoescape' => false,
//			'cache' => APPPATH.'/cache',
		]);
	}
}
