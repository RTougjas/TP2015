<?php
    class Profile extends CI_Controller {
        public function __construct() {
            parent::__construct();
            
            $this->load->helper(array('url', 'form'));
            $this->load->library(array('form_validation'));
            $this->load->model('Profile_model');
        }
        
        public function show_user_info($username){
            $username = rawurldecode($username);
            $result = $this->Profile_model->read_user_information($username);
            if($result != false){
                $data = array(
                    'id' => $result[0]->id,
                    'username' =>$result[0]->username,
                    'first_name' =>$result[0]->first_name,
                    'last_name' =>$result[0]->last_name,
					'telephone' =>$result[0]->telephone,
					'location' =>$result[0]->location,
                    'posts' => $this->Profile_model->count_posts($result[0]->id),
					'album_count' => $this->Profile_model->count_albums($result[0]->id),
                    'csrf' => $this->_get_csrf_nonce()
                );
                $this->load->view('templates/header');
                $this->load->view('login/profile', $data);
                $this->load->view('templates/footer');
            }
        }
        
        public function uploads($id, $username){
            $this->data['pictures'] = $this->Profile_model->get_user_pictures($id, $this->uri->segment(5, 0));
			$this->data['id'] = $id;
            $username = rawurldecode($username);
			if($username == "0") {
				$this->data['small_header'] = "";
			}
			else {
				$this->data['small_header'] = $username;
			}
            $this->load->view('templates/header');
            $this->load->view('photos', $this->data); 
            $this->load->view('templates/footer');
        }
		
		public function albums($id, $username) {
			$this->data['albums'] = $this->Profile_model->get_user_albums($id, $this->uri->segment(5,0));
			$this->data['id'] = $id;
            $username = rawurldecode($username);
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
        
        public function create_person(){
            $this->form_validation->set_rules('name', 'Nime', 'required');
            $this->form_validation->set_rules('birthday', 'Sünniaeg', 'max_length[10]|callback_date_check');
            if($this->form_validation->run()){
                $data = array(
                    'name' => $this->input->post('name'),
                    'birthday' => ($this->input->post('birthday') == '') ? null : $this->input->post('birthday'),
                    'location' => $this->input->post('location'),
                    'life' => $this->input->post('life'),
                    'enabled' => $this->input->post('comments')
                );
                $this->Profile_model->insert_person($data);
                redirect('profile/all_people');
            }
            else{
                $data = array(
                    'name' => $this->input->post('name'),
                    'birthday' => $this->input->post('birthday'),
                    'location' => $this->input->post('location'),
                    'life' => $this->input->post('life')
                );
                $data['error'] = $this->form_validation->error_string();
                $this->load->view('templates/header');
                $this->load->view('people/create', $data); 
                $this->load->view('templates/footer');
            }
        }
        
        public function all_people(){
            //Array ( [id] => 1 [name] => test [birthday] => 1999-11-13 [location] => [life] => ) 
            $data['people'] = $this->Profile_model->get_people();
            $this->load->view('templates/header');
            $this->load->view('people/all_people', $data); 
            $this->load->view('templates/footer');
        }
        
        public function person($id){
            $data['info'] = $this->Profile_model->get_person($id)[0];
            $data['story'] = $this->Profile_model->get_story($id);
            
            $this->load->view('templates/header');
            $this->load->view('people/person', $data); 
            $this->load->view('templates/footer');
        }
        
        public function add_story($id){
            $info = array(
                'person_id' => $id,
                'comment' => $this->input->post('comment'),
				'contributor_id' => $this->ion_auth->get_user_id(),
				'contributor_username' => $this->session->userdata('username')
            );
            $this->Profile_model->add_story($info); 
            redirect('profile/person/'.$id);
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
        
        function _get_csrf_nonce()
        {
            $this->load->helper('string');
            $key   = random_string('alnum', 8);
            $value = random_string('alnum', 20);
            $this->session->set_flashdata('csrfkey', $key);
            $this->session->set_flashdata('csrfvalue', $value);

            return array($key => $value);
        }

        function _valid_csrf_nonce()
        {
            if ($this->input->post($this->session->flashdata('csrfkey')) !== FALSE &&
                $this->input->post($this->session->flashdata('csrfkey')) == $this->session->flashdata('csrfvalue'))
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }
?>