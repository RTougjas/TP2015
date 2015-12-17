<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
    function __Construct(){
        parent::__Construct ();
        $this->load->model('GalleryModel'); // load model
        $this->load->library(array('session'));
    }

    public function index() {
	
		redirect('gallery/getAlbums');
		
    }
	
	// Controller used for displaying all albums when clicking on Albums navigation link on top navigation bar. 
	public function getAllAlbums() {
		$this->data['albums'] = $this->GalleryModel->getAllAlbums();
		$this->data['albums_photo_count'] = $this->GalleryModel->getAllAlbumsPhotoCount();
		
		//change this to use lang helper class. 
		$this->data['small_header'] = "Kõik albumid";
		
		$this->load->view('templates/header');
		$this->load->view('gallery', $this->data);
        $this->load->view('templates/footer');
		
		
	}
	
	
	public function getAlbums() {
		$this->data['albums'] = $this->GalleryModel->getAllAlbumsOffset($this->uri->segment(3, 0));
		$this->data['albums_photo_count'] = $this->GalleryModel->getAllAlbumsPhotoCount();
		
		//change this to use lang helper class. 
		$this->data['small_header'] = "Kõik albumid";
		
		$this->load->view('templates/header');
		$this->load->view('gallery', $this->data);
        $this->load->view('templates/footer');
		
		
	}
	
	public function getAlbumOwner($album_id) {
		
		$this->data['owner'] = $this->GalleryModel->get_album_owner($album_id);
		$this->load->view('templates/header');
		$this->load->view('gallery', $this->data);
        $this->load->view('templates/footer');
		
	}
	
	//all photos in database. 
	public function AllPhotos() {
		$this->data['pictures'] = $this->GalleryModel->getAllPhotosOffset($this->uri->segment(3, 0));
		$this->data['small_header'] = "Kõik pildid";
		$this->load->view('templates/header');
		$this->load->view('photos', $this->data);
        $this->load->view('templates/footer');
		
	}
	
	/*	Gives all albums of one user specified by user_id. 
		Username is for presenting purposes. 
	*/
	public function allUserAlbums($id, $username) {
        $username = rawurldecode($username);
		$this->data['albums'] = $this->GalleryModel->getAllUserAlbumsOffset($id, $this->uri->segment(5, 0));
		$this->data['id'] = $id;
		//$this->data['pictures'] = $this->GalleryModel->getAlbumPhotosOffset(0, 3);
		$this->data['albums_photo_count'] = $this->GalleryModel->getAllAlbumsPhotoCount();
		//if you change small_header here, make sure to change it in view - photos.php also.
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
		$this->data['pictures'] = $this->GalleryModel->getAlbumPhotosOffset($album_id, $this->uri->segment(5, 0));
        $this->data['album_id'] = $album_id;
		$this->data['owner'] = $this->GalleryModel->get_album_owner($album_id);
        $album_title = rawurldecode($album_title);
		if($album_title == "0") {
			$this->data['small_header'] = "";
		}
		else {
			$this->data['small_header'] = $album_title;
		}
        $this->load->view('templates/header');
        $this->load->view('photos', $this->data); 
        $this->load->view('templates/footer');
		
	}
	
	public function albumDetails($album_id) {

		$this->data['album_details'] = $this->GalleryModel->getAlbumDetails($album_id);
        $this->load->view('upload_form_photo', $this->data); 		
	}
    
    public function create_album(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('title', 'Title', 'min_length[0]');
        $this->form_validation->set_rules('description', 'Description', 'min_length[0]');
        //$this->output->enable_profiler(true);
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
                'user_id' => $this->ion_auth->get_user_id(),
				'created' => time(),
				'varasem_omanik' => $this->input->post('albumi_varasem_omanik'),
				'kihelkond' => $this->input->post('kihelkond'),
				'koht' => $this->input->post('koht'),
				'ligikaudne_aeg' => $this->input->post('ligikaudne_aeg')
            );
            $this->GalleryModel->create_album($info);
			$info['info'] = "Albumi ".$info['title']." loomine õnnestus";
			$this->session->set_flashdata('info', $info['info']);
			redirect('upload', 'refresh');
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
