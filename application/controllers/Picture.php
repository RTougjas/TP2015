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
    
    public function remove_comment($id){
        $info = $this->PictureModel->get_comment_info($id);
        if($this->ion_auth->get_user_id() == $info->user_id || $this->ion_auth->is_admin() || $this->ion_auth->get_user_id() == $this->PictureModel->getPicture($info->picture_id)->user_id){
            $this->PictureModel->remove_comment($id);
            redirect('/picture/'.$info->picture_id);
        }
        else{
            return show_error("You don't have permissions to delete this comment");
        }
    }
 
}
?>