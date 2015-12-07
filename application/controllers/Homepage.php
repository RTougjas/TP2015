<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
    function __Construct(){
        parent::__Construct ();
        $this->load->library(array('session'));
    }

    public function index() {
	
        $this->load->view('templates/header');
		$this->load->view('homepage');
        $this->load->view('templates/footer');
		
    }
	

}
?>
