<?php


class User
{
	private $CI;

	public function __construct()
	{
		$this->CI =& get_instance();

		$array = array(
			'is_login' => false,
		);

		$this->CI->session->set_userdata($array);
	}

	public function is_login()
	{
		return $this->CI->session->userdata('is_login');
	}
}
