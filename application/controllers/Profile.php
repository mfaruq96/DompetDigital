<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
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
		$this->load->view('profile/index');
		$this->load->view('modal/modal_user');
		$this->load->view('layouts/user_footer');
	}

	public function edit_profile()
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
		$this->load->view('profile/edit_profile');
		$this->load->view('modal/modal_user');
		$this->load->view('layouts/user_footer');
	}

	public function update_profile()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');
        $this->form_validation->set_rules('address', 'Address', 'required|trim');
		// var_dump($this->input->post());die;

		if( $this->form_validation->run() == false ) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed! please complete the data.</div>');
			redirect('profile/edit_profile');
		} else {
			$this->model_users->update_profile();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated.</div>');
            redirect('profile');
		}
	}

	public function change_password()
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

		$this->form_validation->set_rules('current_password', 'Current Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('new_password1', 'New Password', 'trim|required|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'trim|required|min_length[6]|matches[new_password1]');

		if( $this->form_validation->run() == false ) {
			$this->load->view('layouts/user_header', $data);
			$this->load->view('layouts/user_topbar');
			$this->load->view('profile/change_password');
			$this->load->view('modal/modal_user');
			$this->load->view('layouts/user_footer');
		} else {
			$current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if( !password_verify($current_password, $user['password']) )
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('profile/change_password');
            } else
            {
                if( $current_password == $new_password )
                {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('profile/change_password');
                } else
                {
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('users');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Change password successfully.</div>');
                    redirect('profile/change_password');
                }
            }
		}
	}

}
