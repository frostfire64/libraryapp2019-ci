<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class MY_Controller extends CI_Controller {

	public $title;
	public $heading;

    public function __construct()
	{
		$this->title = config_item('app_name');
		$this->heading = config_item('app_name');
		parent::__construct();
	}

	public function render($template, $data = [], $return = false)
	{
		$this->load->library('Functions_Twig_Extension');
		$loader = new FilesystemLoader(VIEWPATH);
		$twig = new Environment($loader, [
			'cache' => false,
			'autoescape' => false,
//			'cache' => APPPATH.'/cache',
		]);
		// lets add all defined functions to twig template language

		$twig->addExtension(new Functions_Twig_Extension(get_defined_functions()));

//		$twig->display($template.'.twig'); die;

		$append_data = [
			'title' => $this->title,
			'heading' => $this->heading,
		];

		if (!$return) {
			return $this->output->set_output($twig->render($template.'.twig', $data));
		}

		return $twig->render($template.'.twig', $data);
	}
}

