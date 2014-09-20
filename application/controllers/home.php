<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
	    if ($_POST && isset($_POST["search"])) { //We are searching for client
	        
	        $this->load->model("Model_clients");
	        
	        $search_term = $this->input->post("search");
	        $results = $this->Model_clients->search($search_term);
	        
	        $this->load->view('clients_browse', array("clients"=> $results, "search_term" => $search_term));
	        
	    } else { // default home page
	        
	        $this->load->view('home');    
	    }
	    
		
	}

    
}