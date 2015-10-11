<?php
    class User_Authentication extends CI_Controller {
        public function __construct() {
            parent::__construct();
            // Load form helper library
            $this->load->helper('form');
            // Load form validation library
            $this->load->library('form_validation');
            // Load session library
            $this->load->library('session');
            // Load database
            $this->load->model('Login_model');
            
            $this->load->helper('url');
        }
        
        // Show login page
        public function user_login_show() {
            $this->load->view('templates/header');
            $this->load->view('login/login_form');
            $this->load->view('templates/footer');
        }
        
        // Show registration page
        public function user_registration_show() {
            $this->load->view('templates/header');
            $this->load->view('login/registration_form');
            $this->load->view('templates/footer');
        }
        
        // Validate and store registration data in database
        public function new_user_registration() {
            // Check validation for user input in SignUp form
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                $this->user_registration_show();
            } else {
                $data = array(
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'admin' => 'false'
                );
                $result = $this->Login_model->registration_insert($data) ;
                if ($result == TRUE) {
                    $this->session->set_flashdata('message_display', 'Registration Successful !');
                    redirect('login');
                } else {
                    $this->session->set_flashdata('message_display', 'Username already exist!');
                    redirect('registration');
                }
            }
        }
        
        // Check for user login process
        public function user_login_process() {
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
                redirect('login');
            } else {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $result = $this->Login_model->login($username, $password);
                if($result == TRUE){
                    // Add user data in session
                    $result = $this->Login_model->read_user_information($username);
                    $this->session->set_userdata(array(
                        'username' => $username,
                        'admin' => $result[0]->admin
                    ));
                    redirect($this->session->userdata('referred_from'), 'refresh');
                }else{
                    $this->session->set_flashdata('error_message', 'Invalid Username or Password');
                    redirect('login');
                }
            }
        }
        
        public function show_user_info($username){
            $result = $this->Login_model->read_user_information($username);
            if($result != false){
                $data = array(
                    'id' => $result[0]->id,
                    'username' =>$result[0]->username,
                    'password' =>$result[0]->password,
                    'admin' => $result[0]->admin,
                    'posts' => $this->Login_model->count_posts($result[0]->id)
                );
                $this->load->view('templates/header');
                $this->load->view('login/profile', $data);
                $this->load->view('templates/footer');
            }
        }
        
        // Logout from admin page
        public function logout() {
            $this->session->sess_destroy();
            redirect(base_url());
        }
    }
?>