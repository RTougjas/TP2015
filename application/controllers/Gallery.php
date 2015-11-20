<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    function __Construct(){
        parent::__Construct ();
        $this->load->model('GalleryModel'); // load model 
        $this->load->library(array('session'));
        $this->load->helper('form');
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
	
	public function albumPhotos($album_id) {
		$this->data['pictures'] = $this->GalleryModel->getAlbumPhotos($album_id);
        $this->load->view('templates/header');
        $this->load->view('album_photos', $this->data); 
        $this->load->view('templates/footer');
		
	}
    
    public function create_album(){
        $this->output->enable_profiler(true);
        $info = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'user_id' => $this->ion_auth->get_user_id()
        );
        
        $this->GalleryModel->create_album($info);
        
        $this->load->view('templates/header');
        $this->load->view('create_album');
        $this->load->view('templates/footer');
    }
}
?>
