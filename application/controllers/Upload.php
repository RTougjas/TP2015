<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('upload_model');
		$this->load->model('GalleryModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function index()
    {
		$this->data['albums'] = $this->GalleryModel->getAllAlbums();
        $this->load->view('templates/header');
        //$this->load->view('upload_form', array('error' => ' ' ));
		$this->load->view('upload_form', $this->data);
        $this->load->view('templates/footer');
    }

    public function do_upload()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|tiff|tif';
        $config['max_size']             = 100000;
        $config['max_width']            = 102400;
        $config['max_height']           = 76800;

        $this->load->library('upload', $config);
        
        $this->form_validation->set_rules('title', 'Pealkirja', 'required');
        $this->form_validation->set_rules('description', 'Kirjelduse', 'required');
		
        if ($this->upload->do_upload('userfile') && $this->form_validation->run())
        {
            
            $data = array('upload_data' => $this->upload->data());

			$comments_enabled = 'false';
			if ( !empty($this->input->post('comments'))){
				$comments_enabled = 'true';
			}
			$publicpic = 'false';
			if ( !empty($this->input->post('ispublic'))){
				$publicpic = 'true';
			}
		
            $info = array(
                'user_id' => $this->ion_auth->get_user_id(),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'location' => 'http://46.101.241.57/uploads/'.$data['upload_data']['file_name'],
                'comments_enabled' => $comments_enabled,
                'publicpic' => $publicpic,
                'created' => time(),
                'colored' => $_POST['colored'],
                'kihelkond' => $this->input->post('kihelkond'),
                'koht' => $this->input->post('koht'),
                'digifoto' => $this->input->post('digifoto'),
                'fotograaf' => $this->input->post('fotograaf'),
                'omanik' => $this->input->post('omanik'),
                'varasem_omanik' => $this->input->post('varasem_omanik'),
                'kvaliteet' => $_POST['kvaliteet'],
                'isikud_fotol' => $this->input->post('isikud_fotol'),
                'ligikaudne_aeg' => $this->input->post('ligikaudne_aeg'),
                'kuupaev' => $this->input->post('kuupaev')
            );
			
			$this->upload_model->upload($info);
            
            $picture_id = $this->upload_model->get_picture_id($info['location']);
			
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
                    'picture_id' => $picture_id,
                    'tag_id' => $tag_id
				);

				if (!$this->upload_model->check_tag_picture_exists($picture_id, $tag_id)){
				    $this->upload_model->add_tag_to_picture($info);
				}
				
			}
			$info['info'] = "Your file was successfully uploaded";
			$this->session->set_flashdata('info', $info['info']);
			redirect('upload', 'refresh');
			
            //$this->load->view('templates/header');
            //$this->load->view('upload_success', $data);
            //$this->load->view('templates/footer');
        }
        else 
        {
            $info = array(
                'user_id' => $this->ion_auth->get_user_id(),
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'koht' => $this->input->post('koht'),
                'digifoto' => $this->input->post('digifoto'),
                'fotograaf' => $this->input->post('fotograaf'),
                'omanik' => $this->input->post('omanik'),
                'varasem_omanik' => $this->input->post('varasem_omanik'),
                'isikud_fotol' => $this->input->post('isikud_fotol'),
                'ligikaudne_aeg' => $this->input->post('ligikaudne_aeg'),
                'kuupaev' => $this->input->post('kuupaev'),
                'tags' => $this->input->post('tags')
            );
            if(!$this->upload->do_upload('userfile')){
                $info['error'] = $this->upload->display_errors();
            }
            elseif(!$this->form_validation->run()){
                $info['error'] = $this->form_validation->error_string();

            }
			//$info['albums'] = $this->GalleryModel->getAlbums($this->uri->segment(3, 0));
			//$this->load->view('templates/header');
            $this->load->view('upload_form_photo', $info);
            //$this->load->view('templates/footer');
			
			$this->session->set_flashdata('error', $info['error']);
			redirect('upload', 'refresh');

			
        }
		
    }
	
}
?>