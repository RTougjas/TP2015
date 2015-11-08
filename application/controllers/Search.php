<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
       $this->load->database(); // load database
       $this->load->model('SearchModel');
	   $this->load->library(array('session', 'ion_auth'));
     }

    public function index() {
		
		$search_input = $_POST['search_key'];
		$keywords = explode(" ", $search_input);
		$this->load->view('templates/header');
		if(strlen($search_input) > 0) {
			$this->data['pictures'] = $this->SearchModel->getSearchResults($keywords);
	        $this->load->view('gallery', $this->data);
		}
		$this->load->view('templates/footer');
    }
 
 	public function Searchkey() {
 		
		//$keyword = $_POST['search_key'];
		//$keywords = explode(" ", $keyword);
		
		return $keyword;
 	}
 
 
}
?>