<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

	function __Construct(){
    parent::__Construct ();
       $this->load->database(); // load database
       $this->load->model('EditModel'); // load model 
       $this->load->library('session');
	   $this->load->helper(array('form', 'url'));
       $this->load->library(array('session', 'ion_auth'));
     }

    public function index() {
	    $this->data['picture'] = $this->EditModel->getPicture($this->uri->segment(3, 1));
        $this->load->view('templates/header');
        $this->load->view('edit', $this->data);
        $this->load->view('templates/footer');
    }
 
	public function do_edit($id)
    {
			

			if (! $this->input->post('title') == ''){
				$this->EditModel->editTitle($id, $this->input->post('title'));
			}
			if (! $this->input->post('description') == ''){
				$this->EditModel->editDescription($id, $this->input->post('description'));
			}

            
            $this->load->view('templates/header');
            $this->load->view('edit_success');
            $this->load->view('templates/footer');
        }
    
    
 
}
?>