<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Picture extends CI_Controller {
	function __Construct(){
    parent::__Construct ();
       $this->load->model('PictureModel'); // load model 
	   $this->load->helper('form');
     }

    public function photo() {
		$this->data['comments'] = $this->PictureModel->getComments($this->uri->segment(2, 1));
	    $this->data['picture'] = $this->PictureModel->getPicture($this->uri->segment(2, 1));
		$this->data['tags'] = $this->PictureModel->getTags($this->uri->segment(2, 1));
        $this->load->view('templates/header');
        $this->load->view('picture', $this->data);
        $this->load->view('templates/footer');
    }
 
	public function comment($id){
                $this->PictureModel->enterComment($id, $this->input->post('comment'));
				redirect('/picture/'.$id);
        }
 
}
?>