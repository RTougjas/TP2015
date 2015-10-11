<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
       $this->load->database(); // load database
       $this->load->model('GalleryModel'); // load model 
     }

    public function index() {
        $this->data['pictures'] = $this->GalleryModel->getPictures();
        $this->load->view('templates/header');
        $this->load->view('gallery', $this->data); // load the view file , we are passing $data array to view file
        $this->load->view('templates/footer');
    }
 
 
}
?>
