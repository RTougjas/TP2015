<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
       $this->load->database(); // load database
       $this->load->model('GalleryModel'); // load model 
	   $this->load->library(array('session'));
     }

    public function index() {
		$this->data['albums'] = $this->GalleryModel->getAlbums();
		$this->data['pictures'] = $this->GalleryModel->getPictures();
		$this->load->view('templates/header');
        //sellega saadab gallery viewi muutujad 'albums' ja 'pictures'. Ning kõik töötab.
		$this->load->view('gallery', $this->data);
		//Sellega peaks saatma upload_formi viewi muutujad 'albums' ja 'pictures'. Asi ei 			tööta.
		//$this->load->view('upload_form', $this->data);
        $this->load->view('templates/footer');
    }
	
	public function showAlbums() {
		$this->data['albums'] = $this->GalleryModel->getAlbums();
		$this->load->view('templates/header');
		$this->load->view('templates/footer');
	}
 
 
}
?>
