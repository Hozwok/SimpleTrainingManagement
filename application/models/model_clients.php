<?php

/*
    Autor: Hozwok
    
    Description: a simple model for clients
*/

class Model_clients extends CI_Model {

 	
    function get_all() {
        
        return $this->db->get("clients");
        
    }
    
    // ------------------------------------------------------------------------
    
    function get($id) {
        
        return $this->db->get_where("clients", array("id" => $id));
        
    }
    
    // ------------------------------------------------------------------------

    function update($id, $data) {
        
        if(!is_numeric($id))
            return false;
        
        if(isset($data["ID"])) // we don't want to update the ID!!
            unset($data["ID"]);
            
        $res = $this->db->where("ID", $id)->update("clients", $data);
    
        return $res;
    }
    
    // ------------------------------------------------------------------------
    
    function add($data) {
       
        if(isset($data["ID"])) //ID column is AUTO INCREMENT
            unset($data["ID"]);
            
        $res = $this->db->insert("clients", $data);
        
        return $res;
        
    }
}

