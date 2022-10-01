<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');

		check_login();

		// load model
        $this->load->model('model_users');
        $this->load->model('model_saldo_in');
        $this->load->model('model_virtual_account');
    }
	
	public function index()
	{
		// login
		$user = $this->model_users->login();

		// count request saldo
		$count_req = $this->model_saldo_in->count_request_saldo();
		
		// count request saldo
		$count_user = $this->model_users->count_users();
		
		// count request saldo
		$count_saldo_in = $this->model_saldo_in->count_saldo_in();

		// sum saldo in
		$sum_saldo_in = $this->model_saldo_in->sum_saldo_in();
		
		// sum saldo in
		$sum_saldo_out = $this->model_virtual_account->sum_saldo_out();
		// var_dump($sum_saldo_out);die;

		$data['title'] = "Dompet Digital | Admin";
		$data['active_page'] = "dashboard";
		$data['current_user'] = $user;
		$data['count_request_saldo'] = $count_req;
		$data['count_user'] = $count_user;
		$data['count_saldo_in'] = $count_saldo_in;
		$data['sum_saldo_in'] = $sum_saldo_in;
		$data['sum_saldo_out'] = $sum_saldo_out;

		$this->load->view('layouts/user_header', $data);
		$this->load->view('layouts/admin_sidebar');
		$this->load->view('layouts/user_topbar');
		$this->load->view('admin/index');
		$this->load->view('modal/modal_user');
		$this->load->view('layouts/user_footer');
	}

	public function request_saldo()
	{
		// login
		$user = $this->model_users->login();

		// count request saldo
		$count_req = $this->model_saldo_in->count_request_saldo();

		// data request saldo
		$data_req = $this->model_saldo_in->data_request_saldo();
		// var_dump($data_req);die;

		$data['current_user'] = $user;
		$data['data_request_saldo'] = $data_req;
		$data['count_request_saldo'] = $count_req;
		$data['title'] = "Dompet Digital | Admin";
		$data['active_page'] = "req_saldo";

		$this->load->view('layouts/user_header', $data);
		$this->load->view('layouts/admin_sidebar');
		$this->load->view('layouts/user_topbar');
		$this->load->view('admin/request_saldo');
		$this->load->view('modal/modal_user');
		$this->load->view('layouts/user_footer');
	}

	public function approval_saldo()
	{
		$this->model_saldo_in->approval_saldo();
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Approval completed.</div>');
		redirect('admin/request_saldo');
	}

	public function account()
	{
		// login
		$user = $this->model_users->login();

		// count request saldo
		$count_req = $this->model_saldo_in->count_request_saldo();

		// data request saldo
		$get_all_user = $this->model_users->get_all();
		// var_dump($users);die;

		$data['current_user'] = $user;
		$data['get_all_user'] = $get_all_user;
		$data['count_request_saldo'] = $count_req;
		$data['title'] = "Dompet Digital | Admin";
		$data['active_page'] = "account";

		$this->load->view('layouts/user_header', $data);
		$this->load->view('layouts/admin_sidebar');
		$this->load->view('layouts/user_topbar');
		$this->load->view('admin/account');
		$this->load->view('modal/modal_user');
		$this->load->view('layouts/user_footer');
	}

	public function saldo_in()
	{
		// login
		$user = $this->model_users->login();

		// count request saldo
		$count_req = $this->model_saldo_in->count_request_saldo();

		// data request saldo
		$get_all_in = $this->model_saldo_in->get_all();
		// var_dump($users);die;

		$data['current_user'] = $user;
		$data['get_all_in'] = $get_all_in;
		$data['count_request_saldo'] = $count_req;
		$data['title'] = "Dompet Digital | Admin";
		$data['active_page'] = "saldo_in";

		$this->load->view('layouts/user_header', $data);
		$this->load->view('layouts/admin_sidebar');
		$this->load->view('layouts/user_topbar');
		$this->load->view('admin/saldo_in');
		$this->load->view('modal/modal_user');
		$this->load->view('layouts/user_footer');
	}

	public function saldo_out()
	{
		// login
		$user = $this->model_users->login();

		// count request saldo
		$count_req = $this->model_saldo_in->count_request_saldo();

		// data request saldo
		$get_all_in = $this->model_virtual_account->get_all();
		// var_dump($users);die;

		$data['current_user'] = $user;
		$data['get_all_in'] = $get_all_in;
		$data['count_request_saldo'] = $count_req;
		$data['title'] = "Dompet Digital | Admin";
		$data['active_page'] = "saldo_out";

		$this->load->view('layouts/user_header', $data);
		$this->load->view('layouts/admin_sidebar');
		$this->load->view('layouts/user_topbar');
		$this->load->view('admin/saldo_out');
		$this->load->view('modal/modal_user');
		$this->load->view('layouts/user_footer');
	}

}
