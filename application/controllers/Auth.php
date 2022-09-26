<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

		// load model
        $this->load->model('model_users');
    }
	
	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', [
            'min_length' => 'password too short!'
        ]);

		if( $this->form_validation->run() == false ) {
			$data['title'] = "Login";
			$this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('layouts/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users', ['email' => $email])->row_array();

		if ( $user ) {
			if ( $user['is_active'] == 1 ) {
				if ( password_verify($password, $user['password']) ) {
					$data = [
						'email' => $user['email'],
						'id_role' => $user['id_role']
					];
					$this->session->set_userdata($data);
					if ( $user['id_role'] == 1 ) {
						redirect('admin');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('auth');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('role', 'Role', 'required|trim');
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]',[
            'is_unique' => 'This email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
            ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password2]');

		if( $this->form_validation->run() == false ) 
        {  
			$data['title'] = "Register";
            $this->load->view('layouts/auth_header', $data);
			$this->load->view('auth/register');
			$this->load->view('layouts/auth_footer');
        } else {
			$this->model_users->register();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created.</div>');
            redirect('auth');
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');

		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout.</div>');
		redirect('auth');
	}

	public function check()
	{
		$id_role = $this->session->userdata('id_role');
		if ( $id_role == 1 ) {
			redirect('admin');
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Access blocked!</div>');
			redirect('user');
		}
	}

}
