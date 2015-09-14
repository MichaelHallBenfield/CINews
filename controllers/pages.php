<?php

class Pages extends CI_Controller
{
	// Display the homepage view by default
	// Any term without a route will be taken as $page
	public function view ($page = 'home')
	{
		// If the passed variable doesn't exist - show 404
		if(!file_exists(APPPATH.'/views/pages/'.$page.'.php'))
		{
			// This is not the page you are looking for
			show_404();
		}
		
		$data['title'] = ucfirst($page); // Capitalise the first letter
		
		// Load the views and cache the output
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('pages/'.$page, $data);
		$this->load->view('templates/footer', $data);
	}
}

?>