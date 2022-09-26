<?php

function check_login()
{
	$ci = get_instance();

	if ( !$ci->session->userdata('email') ) {
		$ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please login!</div>');
		redirect('auth');
	} else {
		$id_role = $ci->session->userdata('id_role');
		$menu = $ci->uri->segment(1);

		$query_menu = $ci->db->get_where('menu', ['menu' => $menu])->row_array();
        $id_menu = $query_menu['id_menu'];

        $query_users_access = $ci->db->get_where('access_menu', [
            'id_role' => $id_role,
            'id_menu' => $id_menu
        ]);
		if( $query_users_access->num_rows() < 1 )
        {
            redirect('auth/check');
        }
	}
}

?>
