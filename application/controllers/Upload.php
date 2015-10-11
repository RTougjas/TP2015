<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->library('session');
        }

        public function index()
        {
                $this->load->view('upload_form', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

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
						'title' => $this->input->post('title'),
						'description' => $this->input->post('description'),
						'location' => 'https://glacial-meadow-6358.herokuapp.com/uploads/'.$data['upload_data']['file_name']
						);

						$this->load->database();
						$this->db->insert('pictures', $info);
						
						$this->load->library('ftp');
						$config['hostname'] = 'ftp.steffi.ee';
						$config['username'] = getenv('FTP_USER');
						$config['password'] = getenv('FTP_PASSWORD');
						$config['debug']	= TRUE;
						
						$this->ftp->connect($config);
						$this->ftp->upload('index.php', 'htdocs/index.php', 'ascii', 0775);
						$this->ftp->close();

						
						$this->load->view('templates/header');
                        $this->load->view('upload_success', $data);
                        $this->load->view('templates/footer');
                }
        }
}
?>