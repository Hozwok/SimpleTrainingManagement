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
    
    // ------------------------------------------------------------------------
    
    
    function search($term) {
        
        if(strlen($term)==0) {
            return false;
        }
        
        
        return $this->db->select("*")
                 ->from("clients")
                 ->like("CONCAT(firstname, ' ', lastname)", $term)
                 ->or_like("CONCAT(lastname, ' ', firstname)", $term)
                 ->get();
    }
    
    
    // ------------------------------------------------------------------------
    
    
    function get_client_classes($id) {
        
        if(!is_numeric($id))
            return false;
        
        $this->db->select('name, date_start, date_end, price');
        $this->db->from('classes');
        $this->db->join('records', 'records.id_class = classes.id');
        $this->db->where('records.id_client', $id );
        
        $query = $this->db->get();

        return $query;
        
    }
    
    // ------------------------------------------------------------------------
  
}

