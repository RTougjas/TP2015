<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    function __Construct(){
      parent::__Construct ();
       $this->load->model('GalleryModel'); // load model 
	   $this->load->library(array('session'));
     }

    public function index() {
		$this->data['albums'] = $this->GalleryModel->getAlbums();
		$this->data['pictures'] = $this->GalleryModel->getPictures();
		$this->data['pictures_in_albums'] = $this->GalleryModel->getAlbumPhotoCount();
		$this->data['small_header'] = "Kõik albumid";
		$this->load->view('templates/header');
		$this->load->view('gallery', $this->data);
        $this->load->view('templates/footer');
    }
	
	public function albums($id, $username) {
		$this->data['albums'] = $this->GalleryModel->getUserAlbums($id);
		$this->data['pictures'] = $this->GalleryModel->getPictures();
		$this->data['pictures_in_albums'] = $this->GalleryModel->getAlbumPhotoCount();
		if($username == "0") {
			$this->data['small_header'] = "";
		}
		else {
			$this->data['small_header'] = $username;
		}
        $this->load->view('templates/header');
        $this->load->view('gallery', $this->data); 
        $this->load->view('templates/footer');
		
	}
	
	public function albumPhotos($album_id, $album_title) {
		$this->data['pictures'] = $this->GalleryModel->getAlbumPhotos($album_id);
		if($album_title == "0") {
			$this->data['small_header'] = "";
		}
		else {
			$this->data['small_header'] = $album_title;
		}
        $this->load->view('templates/header');
        $this->load->view('album_photos', $this->data); 
        $this->load->view('templates/footer');
		
	}
}
?>
