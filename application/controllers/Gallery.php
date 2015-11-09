<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
       $this->load->database(); // load database
       $this->load->model('GalleryModel'); // load model 
	   $this->load->library(array('session', 'ion_auth'));
     }

    public function index() {
		$this->data['pictures'] = $this->GalleryModel->getPictures();
		$this->load->view('templates/header');
        $this->load->view('gallery', $this->data); 
        $this->load->view('templates/footer');
    }
 
 
}
?>
