<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class model_users extends CI_Model
{

    public function get_all()
    {
		$query = "SELECT `users`.*, `roles`.`role`
                    FROM `users`
					JOIN `roles`
                    ON `users`.`id_role` = `roles`.`id_role`
                    ";
        return $this->db->query($query)->result_array();
    }

	public function register()
	{
		$data = [
			'name' => htmlspecialchars($this->input->post('fullname', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'id_role' => htmlspecialchars($this->input->post('role', true)),
			'is_active' => 1
		];
		return $this->db->insert('users', $data);
	}

	public function login()
	{
		$email = [
			'email' => $this->session->userdata('email')
		];
		$this->db->where($email);
		$get_user = $this->db->get('users')->row_array();

		$id_user = $get_user['id_user'];

		$query = "SELECT `users`.*, `roles`.`role`
                    FROM `users`
					JOIN `roles`
                    ON `users`.`id_role` = `roles`.`id_role`
                    WHERE `users`.`id_user` = $id_user
                    ";
        return $this->db->query($query)->row_array();
	}

	public function count_users()
	{
		$this->db->count_all_results('users');
		$this->db->from('users');
		return $this->db->count_all_results();
	}

}
