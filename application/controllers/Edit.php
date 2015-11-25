<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	function __Construct(){
        parent::__Construct ();
        $this->load->model(array('EditModel', 'upload_model')); // load model 
        $this->load->helper(array('form', 'url'));
     }

    public function index() {
	    $this->data['picture'] = $this->EditModel->getPicture($this->uri->segment(2, 1));
		$this->data['tags'] = $this->EditModel->getTags($this->uri->segment(2, 1));
		$this->data['owner'] = $this->EditModel->checkUserOwner($this->uri->segment(2, 1), $this->ion_auth->get_user_id());
        $this->load->view('templates/header');
        $this->load->view('edit', $this->data);
        $this->load->view('templates/footer');
    }
	
	public function do_edit($id)
    {
        if(! empty($_POST['tag'])){
            $tags = $_POST['tag'];
            for($i = 0; $i < count($tags); ++$i){
                $tag_id = $this->upload_model->get_tag_id($tags[$i]);
                $this->EditModel->remove_tag($tag_id, $id);
            }
        }
		if ($this->EditModel->checkUserOwner($this->uri->segment(3, 1), $this->ion_auth->get_user_id())){
			if (!empty($this->input->post('comments'))){
				 $this->EditModel->commentsEnabled($id, true);
			} else {
				 $this->EditModel->commentsEnabled($id, false);
			}
	    }
		
		if ($this->EditModel->checkUserOwner($this->uri->segment(3, 1), $this->ion_auth->get_user_id())){
			if (!empty($this->input->post('publicpic'))){
				 $this->EditModel->publicPicture($id, true);
			} else {
				 $this->EditModel->publicPicture($id, false);
			}
	    }
		
        if (! $this->input->post('title') == ''){
            $this->EditModel->editTitle($id, $this->input->post('title'));
        }
        if (! $this->input->post('description') == ''){
            $this->EditModel->editDescription($id, $this->input->post('description'));
        }
        if (! $this->input->post('tags') == ''){
            $tags = preg_split("/,/",$this->input->post('tags'));
            for($i = 0; $i < count($tags); ++$i) {
                if (!$this->upload_model->tag_exists($tags[$i])){
                    $info = array(
                       'tag' => $tags[$i]
                    );
                    $this->upload_model->add_tag($info);
                }

                $tag_id = $this->upload_model->get_tag_id($tags[$i]);

                $info = array(
                    'picture_id' => $id,
                    'tag_id' => $tag_id
                );

                if (!$this->upload_model->check_tag_picture_exists($id, $tag_id)){
                    $this->upload_model->add_tag_to_picture($info);
                }

            }
        }

        $this->load->view('templates/header');
        $this->load->view('edit_success');
        $this->load->view('templates/footer');
    }
}
?>