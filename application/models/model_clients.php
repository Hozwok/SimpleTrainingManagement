<?php

/*
    Autor: Hozwok
    
    Description: a simple model for clients
*/

class Model_clients extends CI_Model {

 	
    function get_all() {
        
        return $this->db->get_where("clients", array("deleted"=>0));
        
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
        
        $this->db->insert("clients", $data);
        
        $res =  $this->db->insert_id();
        
        return $res;
        
    }
    
    // ------------------------------------------------------------------------
    
    
    function search($term) {
        
        if(strlen($term)==0) {
            return false;
        }
        
        
        return $this->db->select("*")
                 ->from("clients")
                 ->where("deleted", 0)
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
    
    function link_class($client_id, $class_id) {
        
        if(!is_numeric($client_id) || !is_numeric($class_id))
            return false;
        
        $data = array();
        $data["id_class"]  = $class_id;
        $data["id_client"] = $client_id;
        
        $ext = $this->db->get_where("records", $data);
        
        if($ext->num_rows()>0) //link already existent
            return false;
            
        
        $this->db->insert("records", $data);
        
        $res = $this->db->insert_id();
        
        return $res;
        
    }
    
    // ------------------------------------------------------------------------
    
    function delete($id) {
        
        if (!is_numeric($id))
            return false;
            
        $this->db->where("ID", $id)
                 ->update("clients", array("deleted"=>1));
                 
        return true;
    }
  
}
