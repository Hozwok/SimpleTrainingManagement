<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Classes extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        
        $this->load->model("Model_classes");    
        
    }
    
    // ------------------------------------------------------------------------
    
	public function index() {
        
		redirect('/classes/browse');
		
	}
	
	// ------------------------------------------------------------------------
	
	public function browse() {
        
        $classes = $this->Model_classes->get_all();
        
        $this->load->view("classes_list", array("classes"=>$classes));
        
	}
	
	// ------------------------------------------------------------------------
	
	public function view($id) {
        
        $class   = $this->Model_classes->get($id);
        $clients = $this->Model_classes->get_class_client_history($id);
        
        $this->load->view("class_detail", array("class"=>$class, "clients" => $clients));
	    
	}
	
	// ------------------------------------------------------------------------
	
    public function form($id = false) {
        
        $class_data = array();
        $class_data["ID"]          = -1;
        $class_data["name"]        = "";
        $class_data["date_start"]  = "";
        $class_data["date_end"]    = "";
        $class_data["price"]       = "";
	    
	    if($id == false) { // new class
	        
	        if ($_POST) { //submit -> add class
	            
                $class_data["name"]         = $this->input->post("name");
                $class_data["date_start"]   = $this->input->post("date_start");
                $class_data["date_end"]     = $this->input->post("date_end");
                $class_data["price"]        = $this->input->post("price");
                
                if (strlen($class_data["name"]) < 1 || 
                    strlen($class_data["date_start"]) < 1 ||
                    strlen($class_data["date_end"]) < 1 ) {
                        
                    $this->session->set_flashdata('error', 'Class name, date start and date end are mandatory field.');
                    redirect('/classes/browse');
                }
                
	            $res_id = $this->Model_classes->add($class_data);
	            
	            if($res_id !== false && is_numeric($res_id) && $res_id>0) {
	                $this->session->set_flashdata('info', 'Class added successfully.');
	            } else {
	                $this->session->set_flashdata('error', 'Error while adding new class.');
	            }
	            
	            redirect('/classes/browse');
	            
	        } else {
	            
	            $this->load->view("class_form", array("class"=>$class_data));
	            
	        }
	        
	    } else { //existing class
	    
	    
	        if ($_POST) { //update class data
	        
                $class_data["name"]         = $this->input->post("name");
                $class_data["date_start"]   = $this->input->post("date_start");
                $class_data["date_end"]     = $this->input->post("date_end");
                $class_data["price"]        = $this->input->post("price");
                
                if (strlen($class_data["name"]) < 1 || 
                    strlen($class_data["date_start"]) < 1 ||
                    strlen($class_data["date_end"]) < 1 ) {
                        
                    $this->session->set_flashdata('error', 'Class name, date start and date end are mandatory field.');
                    redirect('/classes/browse');
                }  
                
	            if($this->Model_classes->update($id, $class_data)) {
	                $this->session->set_flashdata('info', 'Class updated successfully.');
	            } else {
	                $this->session->set_flashdata('error', 'Error while updating class data.');
	            }
	            
	            redirect('/classes/browse');
	            
	        } else { //load data from db to allow edit.
	            
	            $class = $this->Model_classes->get($id);    
	            
	            if ($class->num_rows() == 0) //No class found, unable to edit.
	                redirect('/classes/browse');
	       
	            $class = $class->row();
                
                $class_data["ID"]           = $class->ID;
                $class_data["name"]         = $class->name;
                $class_data["date_start"]   = $class->date_start;
                $class_data["date_end"]     = $class->date_end;
                $class_data["price"]        = $class->price;

	            $this->load->view("class_form", array("class"=>$class_data));
	            
	        }
	        
	        
	    }
	   
    }
    
    // ------------------------------------------------------------------------
    
    function delete($id) {
	    
	    $class = $this->Model_classes->get($id);
       
        if ($client->num_rows() == 0)
            redirect('/clients/browse');
            
            
	    if ($_POST) {
	        $res = $this->Model_class->delete($id);
	        
	        if ($res)
	            $this->session->set_flashdata('info', 'Class deleted successfully.');
	        else
	            $this->session->set_flashdata('error', 'Error while deleting class.');
	        
	        redirect('/classes/browse/');
	        
	    } else {
	        $this->load->view("class_delete", array("class" => $class)); //TODO
	    }
	    
	    
	}
	
	
}
