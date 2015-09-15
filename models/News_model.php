<?php

class News_model extends CI_Model
{
	public function __construct()
	{
		// Connect to the db using settings defined in config
		$this->load->database();
	}
	
	public function get_news($slug = FALSE)
	{
		// If slug is false get all news
		// Else get a specfic article
		if($slug === FALSE)
		{
			$this->db->order_by('id', 'DESC');
			$query = $this->db->get('news');
			return $query->result_array();
		}
		
		$query = $this->db->get_where('news', array('slug' => $slug));
		return $query->row_array();
	}
	
	public function set_news()
	{
		// Load the helper required
		$this->load->helper('url');
		
		// Hyphenate the title of the article to be used as the slug
		$slug = url_title($this->input->post('title'), 'dash', TRUE);
		
		// preg_replace to maintain line breaks when output
		$str = $this->input->post('text');
		$str = str_replace(array("\r\n", "\r", "\r\n\n"), PHP_EOL, $str);

		// Set data array
		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $str
		);

		// Insert data array to db
		return $this->db->insert('news', $data);
	}

	public function delete_row()
	{
		// Load the helper required
		$this->load->helper('url');
		
		// Foreach checked article delete from db
		foreach ($this->input->post('delete') as $k => $v)
		{
			$this->db->delete('news',array('id' => $v));
		}
		
		// If no rows have been deleted return false
		if($this->db->affected_rows() == 0)
		{
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}	
}

?>