<?php

class Upload extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('session', 'ion_auth'));
    }

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('upload_form', array('error' => ' ' ));
        $this->load->view('templates/footer');
    }

    public function do_upload()
    {
	
		$file = $_FILES['userfile']['tmp_name'];
		$remote_dir = "uploads/";
		$remote_file = $remote_dir . $_FILES['userfile']['name'];
		$ftp_server = "ftp.steffi.ee";
		
		$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server");
		$login = ftp_login($conn_id, 'upload_steffi.ee', 'uXZNKBA');
		
		if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
		 //echo "successfully uploaded $file\n";
         
         $info = array(
		'user_id' => $this->ion_auth->get_user_id(),
         'title' => $this->input->post('title'),
         'description' => $this->input->post('description'),
         'location' => 'http://www.steffi.ee/'.$remote_file
         );
		 
         $this->load->database();
         $this->db->insert('pictures', $info);
		 
         $this->load->view('templates/header');
         $this->load->view('upload_success');
         $this->load->view('templates/footer');
		 
		} else {
		 $error = array('error' => $this->upload->display_errors());
		 
         $this->load->view('templates/header');
         $this->load->view('upload_form', $error);
         $this->load->view('templates/footer');
		}
		
		/*
		
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png';
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
            $data = array('upload_data' => $this->upload->data());

            $info = array(
			'user_id' => $this->ion_auth->get_user_id(),
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'location' => '/tp2015/uploads/'.$data['upload_data']['file_name']
            );

            $this->load->database();
            $this->db->insert('pictures', $info);

            //todo:fix ftp connection
            /* 
            $this->load->library('ftp');
            $config['hostname'] = 'ftp.steffi.ee';
            $config['username'] = getenv('FTP_USER');
            $config['password'] = getenv('FTP_PASSWORD');
            $config['debug']	= TRUE;

            $this->ftp->connect($config);
            $this->ftp->upload('index.php', '/htdocs/index.php', 'ascii', 0775);
            $this->ftp->close();

            //close comment here
            $this->load->view('templates/header');
            $this->load->view('upload_success', $data);
            $this->load->view('templates/footer');
        }
		
		*/
    }
    
    public function getlist(){
        $this->load->library('ftp');
        $config['hostname'] = 'ftp://steffi.ee';
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