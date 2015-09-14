<?php

class Admin_model extends CI_Model
{
	public function __construct()
	{
		// Connect to the db using settings defined in config
		$this->load->database();
	}

	public function check_login()
	{
		// Load the helper and class required
		$this->load->helper('url');
		$this->load->library('session');
	
		// Set data array to what the user's input
		$data = array(
			'user' => $this->input->post('user'),
			'pass' => md5($this->input->post('pass')),
			'remember' => $this->input->post('remember')
		);
		
		// Set the where conditions for query below
		$where = array(
			'username' => $data['user'],
			'password' => $data['pass']
		);

		// Execute query
		$query = $this->db->get_where('users', $where);

		// If successful login
		if($query->num_rows() >= 1)
		{
			// If the the user selected 'remember me' set session data for the logged in user
			if (isset($data['remember']))
			{
				$session_data = array(
			        'username'  => $data['user'],
			        'logged_in' => TRUE
				);

				$this->session->set_userdata($session_data);
			}
		
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

?>