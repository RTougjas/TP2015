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
		$this->data['pictures_in_albums'] = $this->GalleryModel->getAlbumPhotoCount();
		$this->load->view('templates/header');
		$this->load->view('gallery', $this->data);
        $this->load->view('templates/footer');
    }
	
	public function albums($id) {
		$this->data['albums'] = $this->GalleryModel->getUserAlbums($id);
		$this->data['pictures'] = $this->GalleryModel->getPictures();
		$this->data['pictures_in_albums'] = $this->GalleryModel->getAlbumPhotoCount();
        $this->load->view('templates/header');
        $this->load->view('gallery', $this->data); 
        $this->load->view('templates/footer');
		
	}
}
?>
