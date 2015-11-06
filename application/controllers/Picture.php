<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picture extends CI_Controller {
	function __Construct(){
    parent::__Construct ();
       $this->load->database(); // load database
       $this->load->model('PictureModel'); // load model 
       $this->load->library(array('ion_auth', 'session'));
     }

    public function photo() {
	    $this->data['picture'] = $this->PictureModel->getPicture($this->uri->segment(3, 4));
        $this->load->view('templates/header');
        $this->load->view('picture', $this->data);
        $this->load->view('templates/footer');
    }
 
	
 
}
?>