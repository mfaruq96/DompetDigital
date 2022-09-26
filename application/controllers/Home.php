<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	
	public function index()
	{
		$data['title'] = "";

		// $this->load->view('layouts/auth_header', $data);
		$this->load->view('home/index');
		$this->load->view('modal/modal_user');
		// $this->load->view('layouts/auth_footer');
	}
	
}
