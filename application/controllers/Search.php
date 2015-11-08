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
        $this->data['pictures'] = $this->SearchModel->getSearchResults($_POST['search_key']);
		$this->load->view('templates/header');
        $this->load->view('gallery', $this->data); 
        $this->load->view('templates/footer');
    }
 
 
}
?>