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
	        
	    $classes = $this->Model_clients->get_client_classes($id);
	    
	    $this->load->view("client_detail", array("client"=>$client, "classes" => $classes));
	   
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
                
                if (strlen($client_data["firstname"]) < 1 || strlen($client_data["lastname"]) < 1) {
                    $this->session->set_flashdata('error', 'First and Last name are mandatory.');
                    redirect('/clients/browse', 'refresh');
                }
                
	            $res_id = $this->Model_clients->add($client_data);
	            
	            if($res_id !== false && is_numeric($res_id) && $res_id>0) {
	                $this->session->set_flashdata('info', 'Client added successfully.');
	            } else {
	                $this->session->set_flashdata('error', 'Error while adding new client.');
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
                
                if (strlen($client_data["firstname"]) < 1 || strlen($client_data["lastname"]) < 1) {
                    $this->session->set_flashdata('error', 'First and Last name are mandatory.');
                    redirect('/clients/browse', 'refresh');
                }
                
	            if($this->Model_clients->update($id, $client_data)) {
	                $this->session->set_flashdata('info', 'Client updated successfully.');
	            } else {
	                $this->session->set_flashdata('error', 'Error while updating client info.');
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

    function add_class($client_id, $class_id = false) {
       
        if(!is_numeric($client_id)) // No numeric client id
            redirect('/clients/browse');
        
        $this->load->model("Model_classes");
        
        $client = $this->Model_clients->get($client_id);
        
        if($client->num_rows() == 0)
            redirect('/clients/browse');
           
        if (is_numeric($class_id)) { //we are gonna add the relationship
            $res = $this->Model_clients->link_class($client_id, $class_id);
            
            if ($res) {
                $this->session->set_flashdata('info', 'Class linked to client successfully.');
	        } else {
	            $this->session->set_flashdata('error', 'Error while linking class. Maybe already linked?');
	        }
            
            redirect("/clients/browse");
            
        } else { //first time load. Let the user choose which class
            
            $classes = $this->Model_classes->get_all();
            
            $this->load->view("classes_list", array("classes" => $classes, "client" => $client));
    	        
        }
        
    }
	   
	   
	function delete($id) {
	    
	    $client = $this->Model_clients->get($id);
       
        if ($client->num_rows() == 0)
            redirect('/clients/browse');
            
            
	    if ($_POST) {
	        $res = $this->Model_clients->delete($id);
	        
	        if ($res)
	            $this->session->set_flashdata('info', 'Client deleted successfully.');
	        else
	            $this->session->set_flashdata('error', 'Error while deleting client.');
	        
	        redirect('/clients/browse/');
	        
	    } else {
	        $this->load->view("client_delete", array("client" => $client));
	    }
	    
	    
	}


    
    
    
}