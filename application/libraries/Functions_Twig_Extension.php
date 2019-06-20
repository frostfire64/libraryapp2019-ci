<?php
class Functions_Twig_Extension extends \Twig\Extension\AbstractExtension
{
	private $avilable_functions;

	public function __construct($avilable_functions = [])
	{
//		parent::__construct();

		$this->avilable_functions = $avilable_functions;
	}

	public function getFunctions()
	{
		$twig_function_list = [];

		$functions = array_merge($this->avilable_functions['internal'], $this->avilable_functions['user']);

		foreach ($functions as $func){
			$twig_function_list[] = new \Twig\TwigFunction($func, $func);
		}

		return $twig_function_list;
	}
}
