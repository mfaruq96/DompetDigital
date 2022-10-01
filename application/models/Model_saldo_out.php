<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class model_saldo_out extends CI_Model
{
	
	public function pay()
	{
		$token = htmlspecialchars($this->input->post('token', true));
		$data_token = [
			'token_va' => $token,
			'status' => 0
		];
		$cek_va = $this->db->get_where('virtual_account', $data_token)->row_array();
		$id_va = $cek_va['id_va'];
		$remark = $cek_va['remark'];

		$cek_pay = $this->db->get_where('virtual_account', ['id_va' => $id_va])->row_array();

		$data_history = [
			'id_user' => $cek_pay['id_user'],
			'id_saldo' => 2,
			'saldo' => $cek_pay['saldo_out'],
			'status' => 1,
			'remark' => $cek_pay['remark']
		];
		$this->db->insert('history', $data_history);

		$email = $this->session->userdata('email');
		$current_user = $this->db->get_where('users', ['email' => $email])->row_array();
		$id_current_user = $current_user['id_user'];

		$data = [
			'id_user' => $id_current_user,
			'id_va' => $id_va,
			'status' => 1,
			'remark' => $remark
		];
		$this->db->insert('saldo_out', $data);

		$data_update = [
			'status' => 1
		];
		$this->db->where('id_va', $id_va);
		return $this->db->update('virtual_account', $data_update);
	}

	public function cek_pay()
	{
		$token = htmlspecialchars($this->input->post('token', true));
		$data_token = [
			'token_va' => $token,
			'status' => 0
		];
		return $this->db->get_where('virtual_account', $data_token)->row_array();
	}

}
