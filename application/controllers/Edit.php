<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	function __Construct(){
        parent::__Construct ();
        $this->load->model(array('EditModel', 'upload_model', 'GalleryModel', 'Profile_model')); // load model 
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
     }

    public function index() {
	    $this->data['picture'] = $this->EditModel->getPicture($this->uri->segment(2, 1));
		$this->data['albums'] = $this->GalleryModel->getAllUserAlbums($this->ion_auth->get_user_id());
		$this->data['tags'] = $this->EditModel->getTags($this->uri->segment(2, 1));
		$this->data['photo_in_albums'] = $this->EditModel->getAlbums($this->uri->segment(2, 1));
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
		
		if(! empty($_POST['albumsChecked'])) {
			$albums = $_POST['albumsChecked'];
			$allAlbums = $_POST['allUserAlbums'];
			for($i = 0; $i < count($allAlbums); $i++) {
				for($j = 0; $j < count($albums); $j++) {
					if($allAlbums[$i] == $albums[$j]) {
						$this->EditModel->add_to_album($id, $allAlbums[$i]);
						break;
					}
					if($j == count($albums) - 1) {
						$this->EditModel->remove_from_album($id, $allAlbums[$i]);
					}
				}
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
		
		if (! $this->input->post('fotograaf') == ''){
            $this->EditModel->editFotograaf($id, $this->input->post('fotograaf'));
        }
		if (! $this->input->post('omanik') == ''){
            $this->EditModel->editOmanik($id, $this->input->post('omanik'));
        }
		if (! $this->input->post('varasem_omanik') == ''){
            $this->EditModel->editVarasem_omanik($id, $this->input->post('varasem_omanik'));
        }
		if (! $this->input->post('isikud_fotol') == ''){
            $this->EditModel->editIsikud_fotol($id, $this->input->post('isikud_fotol'));
        }
		if (! $this->input->post('kuupaev') == ''){
            $this->EditModel->editKuupaev($id, $this->input->post('kuupaev'));
        }
		if (! $this->input->post('ligikaudne_aeg') == ''){
            $this->EditModel->editLigikaudne_aeg($id, $this->input->post('ligikaudne_aeg'));
        }
		$this->EditModel->editKihelkond($id, $this->input->post('kihelkond'));
		if (! $this->input->post('koht') == ''){
            $this->EditModel->editKoht($id, $this->input->post('koht'));
        }
		$this->EditModel->editKvaliteet($id, $this->input->post('kvaliteet'));
		$this->EditModel->editColored($id, $this->input->post('colored'));
		$this->EditModel->editDigifoto($id, $this->input->post('digifoto'));

        if (! $this->input->post('title') == ''){
            $this->EditModel->editTitle($id, $this->input->post('title'));
        }
        if (! $this->input->post('description') == ''){
            $this->EditModel->editDescription($id, $this->input->post('description'));
        }
        if (! $this->input->post('tags') == ''){
            $tags = preg_split("/,/",$this->input->post('tags'));
            for($i = 0; $i < count($tags); ++$i) {
                if (!$this->upload_model->tag_exists(trim($tags[$i]))){
                    $info = array(
                       'tag' => trim($tags[$i])
                    );
                    $this->upload_model->add_tag($info);
                }

                $tag_id = $this->upload_model->get_tag_id(trim($tags[$i]));

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
    
    public function edit_person($id){
        $this->form_validation->set_rules('birthday', 'Sünniaeg', 'max_length[10]|callback_date_check');
        if($this->form_validation->run()){
            if (! $this->input->post('name') == ''){
                $data['name'] = $this->input->post('name');
            }
            if (! $this->input->post('birthday') == ''){
                $data['birthday'] = $this->input->post('birthday');
            }
            if (! $this->input->post('location') == ''){
                $data['location'] = $this->input->post('location');
            }
            $data['enabled'] = $this->input->post('enabled');
            $this->EditModel->edit_person($id, $data);
            //redirect('profile/person/'.$id, 'refresh');
			
			$data['person'] = $this->Profile_model->get_person($this->uri->segment(3, 1))[0];
			$data['success'] = "Andmed on edukalt uuendatud";
            $this->load->view('templates/header');
            $this->load->view('people/edit', $data); 
            $this->load->view('templates/footer');
			
        }
        else{
            $data = array(
                'name' => $this->input->post('name'),
                'birthday' => $this->input->post('birthday'),
                'location' => $this->input->post('location'),
            );
            $data['person'] = $this->Profile_model->get_person($this->uri->segment(3, 1))[0];
            $data['error'] = $this->form_validation->error_string();
            $this->load->view('templates/header');
            $this->load->view('people/edit', $data); 
            $this->load->view('templates/footer');
        }
    }
	
	public function delete_person($id) {
		$this->EditModel->delete_person($this->uri->segment(3, 1))[0];
		
        $data['people'] = $this->Profile_model->get_people();
        $this->load->view('templates/header');
        $this->load->view('people/all_people', $data); 
        $this->load->view('templates/footer');
		
	}
		
    function date_check($date){
        if(strlen($date) == 0){
            return true;
        }
        else{
            $year = (int) substr($date, 0, 4);
            $month = (int) substr($date, 5, 2);
            $day = (int) substr($date, 8, 2);
            if(checkdate($month, $day, $year)){
                return true;
            }
            else{
                $this->form_validation->set_message('date_check', '{field} pole õiges formaadis või kuupäev ei eksisteeri');
                return false;
            }
        }
    }
    
        
}
?>