<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
       $this->load->model('SearchModel');
     }

    public function DoSearch() {

		$search_input = url_title($_POST['search_key']);
		redirect('Search/Search_results/'.$search_input);
		
    }
	public function Search_results() {
		$keywords = explode("-", strtolower($this->uri->segment(3, "yolo")));	// "yolo" on placeholder
		$toReplace = array("%c3%a4", "%c3%bc", "%c3%b5", "%c3%b6");
		$replaceWith = array("ä","ü","õ","ö");
		$keywords2 = array();
		for ($i = 0; $i < sizeOf($keywords); $i++){
			$keyword = str_replace($toReplace, $replaceWith, $keywords[$i]);
			array_push($keywords2, $keyword);
		}
		$this->load->view('templates/header');
		if(strlen($this->uri->segment(3, "yolo")) > 0) { 	// "yolo" on placeholder
			$this->data['pictures'] = $this->SearchModel->getSearchResults($keywords2, $this->uri->segment(4, 0));
			$this->data['keywords'] = $this->uri->segment(3, "yolo");
			$this->data['small_header'] = "Otsingu tulemused";
	        $this->load->view('search_results', $this->data);
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