<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clients extends CI_Controller {

    function __construct() {
        
        parent::__construct();
        
        $this->load->model("Model_clients");    
        
    }
    
    // ------------------------------------------------------------------------
    
	public function index() {
	    
		redirect('/clients/browse');
	}
	
	// ------------------------------------------------------------------------
	
	public function browse() {
	    
	    $clients = $this->Model_clients->get_all();
	    
	    
	    $this->load->view("clients_browse", array("clients"=>$clients));
	    
	}
	
	// ------------------------------------------------------------------------
	
	public function view($id = false) {
	    
	    if(!is_numeric($id)) // No numeric id
	        redirect('/clients/browse');
	    
	    
	    $client = $this->Model_clients->get($id);
	    
	    
	    if($client->num_rows() == 0) //No client found.
	        redirect('/clients/browse');
	        
	        
	    $this->load->view("client_detail", array("client"=>$client));
	   
	}
    
    // ------------------------------------------------------------------------
    
    public function form($id = false) {
        
        //init data array.
        $client_data = array();
        $client_data["ID"]          = -1;
        $client_data["firstname"]   = "";
        $client_data["lastname"]    = "";
        $client_data["email"]       = "";
        $client_data["postcode"]    = "";
	    
	    if($id == false) { // new client
	        
	        if ($_POST) { //submit -> add client
	            
                $client_data["firstname"]   = $this->input->post("firstname");
                $client_data["lastname"]    = $this->input->post("lastname");
                $client_data["email"]       = $this->input->post("email");
                $client_data["postcode"]    = $this->input->post("postcode");

	            $res_id = $this->Model_clients->add($client_data);
	            
	            if($res_id !== false && is_numeric($res_id) && $res_id>0) {
	                //client added : faslhmessage : ok
	            } else {
	                //error: flashmessage
	            }
	            
	            redirect('/clients/browse', 'refresh');
	            
	        } else {
	            
	            $this->load->view("client_form", array("client"=>$client_data));
	            
	        }
	        
	    } else { //existing client
	    
	    
	        if ($_POST) { //update client data
	        
	            //$client_data["ID"]          = $id;
	            
                $client_data["firstname"]   = $this->input->post("firstname");
                $client_data["lastname"]    = $this->input->post("lastname");
                $client_data["email"]       = $this->input->post("email");
                $client_data["postcode"]    = $this->input->post("postcode");

	            if($this->Model_clients->update($id, $client_data)) {
	                //flashmessage : OK
	            } else {
	                //fashmessage : error!
	            }
	            
	            redirect('/clients/browse');
	            
	        } else { //load data from db to allow edit.
	            
	            $client = $this->Model_clients->get($id);    
	            
	            if ($client->num_rows() == 0) //No client found, unable to edit.
	                redirect('/clients/browse');
	       
	            $client = $client->row();
                
                $client_data["ID"]          = $client->ID;
                $client_data["firstname"]   = $client->firstname;
                $client_data["lastname"]    = $client->lastname;
                $client_data["email"]       = $client->email;
                $client_data["postcode"]    = $client->postcode;

	            $this->load->view("client_form", array("client"=>$client_data));
	            
	        }
	        
	        
	    }
	   
	   
	}
    
    
    
}