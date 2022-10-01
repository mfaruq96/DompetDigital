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

	public function update_profile()
	{
		$email = $this->input->post('email');

		// upload image
		$upload_image = $_FILES['image'];
		if( $upload_image )
		{
			$config['allowed_types'] = 'gif|jpg|jpeg|png|svg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './assets/img/profile/';
			$this->load->library('upload', $config);
			
			if( $this->upload->do_upload('image') )
			{
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			} else
			{
				echo $this->upload->display_errors();
			}
		}
		// end upload image

		$data = [
			'name' => htmlspecialchars($this->input->post('name', true)),
			'phone' => htmlspecialchars($this->input->post('phone', true)),
			'address' => htmlspecialchars($this->input->post('address', true))
		];

		$this->db->set($data);
		$this->db->where('email', $email);
		$this->db->update('users');
	}

	public function change_password()
	{
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$current_password = $this->input->post('current_password');
		$new_password = $this->input->post('new_password1');

		if( !password_verify($current_password, $data['user']['password']) )
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
