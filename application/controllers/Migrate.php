<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller
{
	private $migration_template;

	public function index()
	{
		$this->load->library('migration');

		if ($this->migration->current() === FALSE)
		{
			show_error($this->migration->error_string());
		}
	}

	public function create($name = 'migration')
	{
		$timestamp = time();
		$filename = config_item('migration_path').$timestamp.'_'.$name.'.php';

		$this->load->library('twig');

		$source = $this->twig->render('core/migration.twig', [
			'timestamp' => $timestamp,
			'filename' => $filename,
			'name' => $name
		]);

		if (file_put_contents($filename, $source)){
			echo ("Created a new migration at: ".$filename);
		}
	}

}
