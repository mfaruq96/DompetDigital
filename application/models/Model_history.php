<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class model_history extends CI_Model
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

		$data = [
			'id_user' => $id_current_user
		];
		$this->db->where($data);
		return $this->db->get('history')->result_array();
	}

}
