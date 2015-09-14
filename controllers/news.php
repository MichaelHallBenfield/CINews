<?php

class News extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Load in the required models and helpers
		$this->load->model('news_model');
		$this->load->helper('url_helper');
	}
	
	public function index()
	{	
		$this->load->helper('text');
	
		// Set the data to be passed to the views
		// This is the intial view for news so retrieve all articles
		$data['news'] = $this->news_model->get_news();
		$data['title'] = 'News Archive';
		
		// Load the views and cache the output
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('news/index', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function view($slug = NULL)
	{
		// Set data for the view
		// Retrieve one article based on $slug
		$data['news_item'] = $this->news_model->get_news($slug);
		
		// If the news item is empty show 404
		if(empty($data['news_item']))
		{
			show_404();
		}
		
		// Set the data title to the title of the news article
		$data['title'] = $data['news_item']['title'];
		
		// Load the views and cache the output
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
		$this->load->view('news/view', $data);
		$this->load->view('templates/footer', $data);
	}
	
	public function create()
	{
		// Load the required helper and class for form submission/validation
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		// Set the data title
		$data['title'] = 'Create a news item';
		
		// Set the form validation rules
		$this->form_validation->set_rules('title','Title','required');
		$this->form_validation->set_rules('text','Text','required');
		
		// If the form validation has not been run reload the form
		// Validation errors will be displayed when the view has been loaded
		if($this->form_validation->run() === FALSE)
		{
			// Load the views and cache the output
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav', $data);
			$this->load->view('news/create', $data);
			$this->load->view('templates/footer', $data);
		}
		else
		{
			// Load the views and cache the output
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav', $data);
	
			// If article upload is successful load success view
			// Else reload the form view
			if($this->news_model->set_news() === TRUE)
			{
				$this->load->view('news/success');
			}
			else
			{
				$this->load->view('news/create');
			}			
			
			$this->load->view('templates/footer', $data);			
		}
	}
}

?>