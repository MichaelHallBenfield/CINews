<?php

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// Load in any required models, helpers and classes
		$this->load->model('news_model');
		$this->load->model('admin_model');
		$this->load->helper('text');
		$this->load->helper('url_helper');
		$this->load->library('session');
	}

	public function index()
	{
		// Load in the required helpers and classes
		$this->load->helper('form');
		$this->load->library('form_validation');

		// Set the correct title
		$data['title'] = 'Admin Login';

		// Set the form validation rules
		$this->form_validation->set_rules('user', 'Username', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');

		// If the form validation has not been run reload the form
		// Validation errors will be displayed when the view has been loaded
		if($this->form_validation->run() === FALSE)
		{
			// Check if the session variable isset
			// Display admin news overview if it is	
			if ($this->session->has_userdata('logged_in'))
			{
				header('Location: /admin/news');
				die();
			}
			else
			{
				// Load the views
				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('admin/index', $data);
				$this->load->view('templates/footer', $data);
			}

		}
		else
		{
			// If the login check function returns true load all news articles
			if($this->admin_model->check_login() === TRUE)
			{
				$data['news'] = $this->news_model->get_news();
				
				header('Location: /admin/news');
				die();
			}
			else
			{
				// Load the views
				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav', $data);
				$this->load->view('admin/incorrect', $data);
				$this->load->view('admin/index', $data);
				$this->load->view('templates/footer', $data);
			}
		}
	}

	public function news()
	{ 
		// Load the helper and class required
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		// Set the title and load the news
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'Admin - News Overview';

		// Set the form validation rules for deletion of articles
		$this->form_validation->set_rules('delete','Deletion','exact_length[0]');

		// If the form validation has not been run reload the form
		// Validation errors will be displayed when the view has been loaded
		if($this->form_validation->run() === FALSE)
		{
			// Load the views
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav', $data);
			if($this->session->has_userdata('logged_in'))
			{
				$this->load->view('admin/news', $data);
			}
			else
			{
				header('Location: /admin/index');
				die();
			}
			$this->load->view('templates/footer', $data);
		}
		else
		{
			// Load the views
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav', $data);
			
			// If selected articles were successfully deleted display a success view
			// Or reload the news view w/admin features
			if($this->news_model->delete_row() === TRUE)
			{
				$this->load->view('admin/delete_success', $data);
			}
			elseif($this->session->has_userdata('logged_in'))
			{
				$this->load->view('admin/delete_error', $data);
				$this->load->view('admin/news', $data);
			}
			else
			{
				$this->load->view('admin/delete_error', $data);
				$this->load->view('admin/index', $data);
			}
			
			$this->load->view('templates/footer', $data);	
		}

	}
}

?>