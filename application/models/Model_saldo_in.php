<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class model_saldo_in extends CI_Model
{
	public function get_all()
    {
		$query = "SELECT `saldo_in`.*, `users`.`name`
                    FROM `saldo_in`
					JOIN `users`
                    ON `saldo_in`.`id_user` = `users`.`id_user`
                    ";
        return $this->db->query($query)->result_array();
    }

	public function get_current_user()
	{
		$email = $this->session->userdata('email');
		$current_user = $this->db->get_where('users', ['email' => $email])->row_array();
		$id_current_user = $current_user['id_user'];

		$this->db->select_sum('saldo_in');
		$saldo = $this->db->get_where('saldo_in', [
					'id_user' => $id_current_user,
					'status' => 1
				])
				->row_array();
		return $saldo;
	}

	public function add_saldo()
	{
		$email = $this->session->userdata('email');
		$current_user = $this->db->get_where('users', ['email' => $email])->row_array();
		$id_current_user = $current_user['id_user'];

		$data = [
			'id_user' => $id_current_user,
			'saldo_in' => htmlspecialchars($this->input->post('topup', true)),
			'status' => 0
		];
		return $this->db->insert('saldo_in', $data);
	}

	public function count_request_saldo()
	{
		$data = [
			'status' => 0
		];

		$this->db->count_all_results('saldo_in');
		$this->db->like($data);
		$this->db->from('saldo_in');
		return $this->db->count_all_results();
	}

	public function data_request_saldo()
	{
		$query = "SELECT `saldo_in`.*, `users`.`name`
                    FROM `saldo_in`
					JOIN `users`
                    ON `saldo_in`.`id_user` = `users`.`id_user`
                    WHERE `saldo_in`.`status` = 0
                    ";
        return $this->db->query($query)->result_array();
	}

	public function approval_saldo()
	{
		$email = $this->session->userdata('email');
		$current_user = $this->db->get_where('users', ['email' => $email])->row_array();
		$id_current_user = $current_user['id_user'];

		$id_in = $this->input->post('id_in');

		$id_cek = [
			'id_in' => $id_in
		];
		$this->db->where($id_cek);
		$cek_approve = $this->db->get('saldo_in')->row_array();

		$data_history = [
			'id_user' => $cek_approve['id_user'],
			'id_saldo' => 1,
			'saldo' => $cek_approve['saldo_in'],
			'status' => 1,
			'remark' => "top up"
		];
		$this->db->insert('history', $data_history);

		$data = [
			'status' => 1
		];
		$this->db->where('id_in', $id_in);
		return $this->db->update('saldo_in', $data);
	}

	public function count_saldo_in()
	{
		$this->db->count_all_results('saldo_in');
		$this->db->from('saldo_in');
		return $this->db->count_all_results();
	}

	public function check_out()
	{
		$day = date('d');
		$month = date('m');
		$year = date('Y');
		$code = mt_rand(1009, 9999);
		$token = $day . $month . $year . $code;
		// var_dump($token);die;

		$email = $this->session->userdata('email');
		$current_user = $this->db->get_where('users', ['email' => $email])->row_array();
		$id_current_user = $current_user['id_user'];

		$data = [
			'id_user' => $id_current_user,
			'saldo_out' => htmlspecialchars($this->input->post('price', true)),
			'status' => 0,
			'token_va' => $token,
			'remark' => htmlspecialchars($this->input->post('remark', true))
		];
		return $this->db->insert('virtual_account', $data);
	}

	public function count_req_current_user()
	{
		$email = $this->session->userdata('email');
		$current_user = $this->db->get_where('users', ['email' => $email])->row_array();
		$id_current_user = $current_user['id_user'];

		$data = [
			'id_user' => $id_current_user,
			'status' => 0
		];

		$this->db->count_all_results('saldo_in');
		$this->db->like($data);
		$this->db->from('saldo_in');
		return $this->db->count_all_results();
	}

	public function get_req()
	{
		$email = $this->session->userdata('email');
		$current_user = $this->db->get_where('users', ['email' => $email])->row_array();
		$id_current_user = $current_user['id_user'];

		$data = [
			'id_user' => $id_current_user,
			'status' => 0
		];

		$this->db->where($data);
		$this->db->order_by('id_in', 'DESC');
		return $this->db->get('saldo_in')->result_array();
	}

	public function sum_saldo_in()
	{
		$data = [
			'status' => 1
		];

		$this->db->select_sum('saldo_in');
		$this->db->where($data);
		return $this->db->get('saldo_in')->row_array();
	}

}
