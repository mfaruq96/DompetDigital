<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');

		check_login();

		// load model
        $this->load->model('model_users');
        $this->load->model('model_saldo_in');
        $this->load->model('model_saldo_out');
        $this->load->model('model_virtual_account');
        $this->load->model('model_history');
    }
	
	public function index()
	{
		// login
		$user = $this->model_users->login();

		// cek saldo in
		$saldo_in = $this->model_saldo_in->get_current_user();
		$in = $saldo_in['saldo_in'];
		
		// cek saldo out
		$saldo_out = $this->model_virtual_account->get_current_user();
		$out = $saldo_out['saldo_out'];

		// current saldo
		$current_saldo = $in - $out;

		// count req in current user
		$count_req_in_current_user = $this->model_saldo_in->count_req_current_user();
		
		// count req out current user
		$count_req_out_current_user = $this->model_virtual_account->count_req_current_user();

		// get virtual account false
		$get_out_false = $this->model_virtual_account->get_req();
		
		// get virtual account false
		$get_in_false = $this->model_saldo_in->get_req();
		// var_dump($get_in_false);die;

		$data['current_user'] = $user;
		$data['title'] = "Dompet Digital | User";
		$data['current_saldo'] = $current_saldo;
		$data['notif_topup'] = $count_req_in_current_user;
		$data['notif_checkout'] = $count_req_out_current_user;
		$data['get_out_false'] = $get_out_false;
		$data['get_in_false'] = $get_in_false;

		$this->load->view('layouts/user_header', $data);
		$this->load->view('layouts/user_topbar');
		$this->load->view('user/index');
		$this->load->view('modal/modal_user');
		$this->load->view('layouts/user_footer');
	}

	public function add_saldo()
	{
		$cek = $this->input->post('topup');

		$this->form_validation->set_rules('topup', 'Topup', 'required|trim');

		if( $this->form_validation->run() == false ) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! no transactions!</div>');
			redirect('user');
		} else if ( $cek <= 19999 ) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! minimum top up Rp. 20,000</div>');
			redirect('user');
		} else {
			$this->model_saldo_in->add_saldo();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully, wait for admin approval.</div>');
            redirect('user');
		}
	}

	public function check_out()
	{
		$this->form_validation->set_rules('price', 'Price', 'required|trim');
		$this->form_validation->set_rules('remark', 'Remark', 'required|trim');

		if( $this->form_validation->run() == false ) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! no transactions!</div>');
			redirect('user');
		} else {
			$this->model_saldo_in->check_out();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data added successfully, please insert token to pay.</div>');
            redirect('user');
		}
	}

	public function pay()
	{
		// login
		$user = $this->model_users->login();

		$current_password = $this->input->post('current_password');
		// var_dump($current_password);die;

		if( !password_verify($current_password, $user['password']) ) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
			redirect('user');
		} else {
			// 
			$cek = $this->model_saldo_out->cek_pay();
	
			$this->form_validation->set_rules('token', 'Token', 'required|trim');
	
			if( $this->form_validation->run() == false ) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please insert your token to pay!</div>');
				redirect('user');
			} else if ( !$cek ) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">The token is incorrect!</div>');
				redirect('user');
			} else {
				$this->model_saldo_out->pay();
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! successful payment.</div>');
				redirect('user');
			}
		}
	}

	public function history()
	{
		// login
		$user = $this->model_users->login();

		// cek saldo in
		$saldo_in = $this->model_saldo_in->get_current_user();
		$in = $saldo_in['saldo_in'];
		
		// cek saldo out
		$saldo_out = $this->model_virtual_account->get_current_user();
		$out = $saldo_out['saldo_out'];

		// current saldo
		$current_saldo = $in - $out;

		// count req in current user
		$count_req_in_current_user = $this->model_saldo_in->count_req_current_user();
		
		// count req out current user
		$count_req_out_current_user = $this->model_virtual_account->count_req_current_user();

		// get virtual account false
		$get_out_false = $this->model_virtual_account->get_req();
		
		// get virtual account false
		$get_in_false = $this->model_saldo_in->get_req();

		// get history
		$get_history = $this->model_history->get_current_user();
		// var_dump($get_history);die;

		$data['current_user'] = $user;
		$data['title'] = "Dompet Digital | User";
		$data['current_saldo'] = $current_saldo;
		$data['notif_topup'] = $count_req_in_current_user;
		$data['notif_checkout'] = $count_req_out_current_user;
		$data['get_out_false'] = $get_out_false;
		$data['get_in_false'] = $get_in_false;
		$data['get_history'] = $get_history;

		$this->load->view('layouts/user_header', $data);
		$this->load->view('layouts/user_topbar');
		$this->load->view('user/history');
		$this->load->view('modal/modal_user');
		$this->load->view('layouts/user_footer');
	}

}
