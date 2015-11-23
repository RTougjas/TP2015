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
	
	//For getting all photos in database. 
	public function AllPhotos() {
		$this->data['pictures'] = $this->GalleryModel->getPictures();
		$this->data['small_header'] = "Kõik pildid";
		$this->load->view('templates/header');
		$this->load->view('album_photos', $this->data);
        $this->load->view('templates/footer');
		
	}
	
	/*	Gives all albums of one user specified by user_id. 
		Username is for presenting purposes. 
	*/
	public function albums($id, $username) {
        $username = rawurldecode($username);
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
	
	/*	Gives all photos of one album specified by album_id.
		Album title is for presenting purposes.
	*/
	public function albumPhotos($album_id, $album_title) {
		$this->data['pictures'] = $this->GalleryModel->getAlbumPhotos($album_id);
        $this->data['album_id'] = $album_id;
        $album_title = rawurldecode($album_title);
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
    
    public function create_album(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title', 'Title', 'min_length[0]');
        $this->form_validation->set_rules('description', 'Description', 'min_length[0]');
        $this->output->enable_profiler(true);
        if ($this->form_validation->run() == TRUE){
            if($this->input->post('title') == ''){
                $title = 'untitled';
            }
            else{
                $title = $this->input->post('title');
            }
            $info = array(
                'title' => $title,
                'description' => $this->input->post('description'),
                'user_id' => $this->ion_auth->get_user_id()
            );

            $this->GalleryModel->create_album($info);
        }
        $this->load->view('templates/header');
        $this->load->view('create_album');
        $this->load->view('templates/footer');
    }
    
    public function remove_album($id){
        $this->GalleryModel->remove_album($id);
        $this->load->view('templates/header');
        $this->load->view('album_delete_success');
        $this->load->view('templates/footer');
    }
}
?>
