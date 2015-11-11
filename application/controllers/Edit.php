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
	    $this->data['picture'] = $this->EditModel->getPicture($this->uri->segment(2, 1));
		$this->data['tags'] = $this->EditModel->getTags($this->uri->segment(2, 1));
        $this->load->view('templates/header');
        $this->load->view('edit', $this->data);
        $this->load->view('templates/footer');
    }
 
	public function do_edit($id)
    {
	
			if(! empty($_POST['tag'])){
				$tags = $_POST['tag'];
				for($i = 0; $i < count($tags); ++$i){
					$this->db->select("id"); 
					$this->db->from('tags');
					$this->db->where('tag',  $tags[$i]);
					$query = $this->db->get();
					$tag_id = $query->result()[0]->id;
					
					$this->db->where('picture_id', $id);
					$this->db->where('tag_id',$tag_id);
					$this->db->delete('pictures_tags'); 

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
				if ($this->db->get_where('tags', array('tag' => $tags[$i]))-> num_rows() == 0) {
					$info = array(
					'tag' => $tags[$i]
					);

					$this->load->database();
					$this->db->insert('tags', $info);
				}
					
				$this->db->select("id"); 
				$this->db->from('tags');
				$this->db->where('tag',  $tags[$i]);
				$query = $this->db->get();
				$tag_id = $query->result()[0]->id;
				
				$info = array(
				'picture_id' => $id ,
				'tag_id' => $tag_id
				);

				$this->load->database();
				$this->load->database();
				if ($this->checkTag($id,$tag_id)){
				$this->db->insert('pictures_tags', $info);
				}
				}
			}
            
            $this->load->view('templates/header');
            $this->load->view('edit_success');
            $this->load->view('templates/footer');
        }
    public function checkTag($picture_id, $tag_id){
			$this->db->select("picture_id"); 
			$this->db->from('pictures_tags');
			$this->db->where('picture_id', $picture_id);
			$this->db->where('tag_id', $tag_id);
			if ($this->db->get()->num_rows() == 0){
				return TRUE;
			} else {
				return FALSE;
				}
    }
    
 
}
?>