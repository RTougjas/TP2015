<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	public function __construct()
        {
         parent::__construct();
	}
	public function index()
	{
		$this->load->database();  
		
		$data = $this->db->query('SELECT title, description, location FROM pictures');

		$this->load->view('gallery', $data);
		
	}
	
}