<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		$this->load->view('auth/login');
	}

	public function register()
	{
		$this->load->view('auth/register');
	}
	
}
