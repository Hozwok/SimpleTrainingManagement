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
	
	
}
