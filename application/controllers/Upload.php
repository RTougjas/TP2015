<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('upload_model');
		$this->load->model('GalleryModel');
        $this->load->helper(array('form', 'url'));
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
		
        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());

            $this->load->view('templates/header');
            $this->load->view('upload_form', $error);
            $this->load->view('templates/footer');
        }
        else
        {
			//picture table
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
			
            $this->load->view('templates/header');
            $this->load->view('upload_success', $data);
            $this->load->view('templates/footer');
        }
		
    }
    
    public function getlist(){
        $this->load->library('ftp');
        $config['hostname'] = 'www.steffi.ee';
        $config['username'] = getenv('FTP_USER');
        $config['password'] = getenv('FTP_PASSWORD');
        $config['debug']	= TRUE;
        $config['timeout'] = 10;
        echo "test1";
        
        $ftp_con = $this->ftp->connect($config);
        if($ftp_con === FALSE){
            echo "test2";
            //redirect(baseurl());
        }
        else{
            echo "test3";
            $list = $this->ftp->list_files();
            echo "test4";
            $this->ftp->close();
            $this->load->view('templates/header');
            print_r($list);
            $this->load->view('templates/footer');
        }
    }
	
}
?>