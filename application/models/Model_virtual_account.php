<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class model_virtual_account extends CI_Model
{

	public function get_current_user()
	{
		$email = $this->session->userdata('email');
		$current_user = $this->db->get_where('users', ['email' => $email])->row_array();
		$id_current_user = $current_user['id_user'];

		$this->db->select_sum('saldo_out');
		$saldo = $this->db->get_where('virtual_account', [
					'id_user' => $id_current_user,
					'status' => 1
				])
				->row_array();
		return $saldo;
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

		$this->db->count_all_results('virtual_account');
		$this->db->like($data);
		$this->db->from('virtual_account');
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
		$this->db->order_by('id_va', 'DESC');
		return $this->db->get('virtual_account')->result_array();
	}

}
