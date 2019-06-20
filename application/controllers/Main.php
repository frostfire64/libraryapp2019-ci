<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends MY_Controller {

	public function index()
	{
		if ($this->user->is_login()){
			return $this->render('main', [ 'name' => 'Bartek' ]);
		}
		redirect('login');
	}
}
