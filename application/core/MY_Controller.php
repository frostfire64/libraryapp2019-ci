<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class MY_Controller extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
	}

	public function render($template, $data = [], $return = false)
	{
		$loader = new FilesystemLoader(VIEWPATH);
		$twig = new Environment($loader, [
			'cache' => APPPATH.'/cache',
		]);

//		$twig->display($template.'.twig'); die;

		if (!$return) {
			var_dump($twig->render($template.'.twig', $data));die;
			return $this->output->set_output($twig->render($template.'.twig', $data));
		}

		return $twig->render($template.'.twig', $data);
	}
}

