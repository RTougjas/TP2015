<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
       $this->load->model('SearchModel');
     }

    public function index() {
		
		$search_input = $_POST['search_key'];
		$keywords = explode(" ", strtolower($search_input));		
		$this->load->view('templates/header');
		if(strlen($search_input) > 0) {
			$this->data['pictures'] = $this->SearchModel->getSearchResults($keywords);
	        $this->load->view('album_photos', $this->data);
		}
		$this->load->view('templates/footer');
    }
 
 	public function Searchkey() {
 		
		$keyword = $_POST['search_key'];
		$keywords = explode(" ", $keyword);
		
		return $keyword;
 	}
 
 
}
?>