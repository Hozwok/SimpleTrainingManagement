<?php

/*
    Autor: Hozwok
    
    Description: a simple model for clients
*/

class Model_classes extends CI_Model {

 	
    function get_all() {
        
        return $this->db->get("classes");
        
    }
    
    // ------------------------------------------------------------------------
    
    function get($id) {
        
        return $this->db->get_where("classes", array("id" => $id));
        
    }
    
    // ------------------------------------------------------------------------
    
    function delete($id) {
        
        $this->db->where("ID", $id)->update("classes", array("deleted"=>1));
        
        return true;
        
    }
    
    // ------------------------------------------------------------------------
    
    function add($data) {
       
        if(isset($data["ID"])) //ID column is AUTO INCREMENT
            unset($data["ID"]);
        
        $this->db->insert("classes", $data);
        
        $res =  $this->db->insert_id();
        
        return $res;
        
    }
    
    // ------------------------------------------------------------------------
   
    function update($id, $data) {
        
        if (!is_numeric($id))
            return false;
        
        if (isset($data["ID"])) // we don't want to update the ID!!
            unset($data["ID"]);
            
        $res = $this->db->where("ID", $id)->update("classes", $data);
    
        return $res;
    }
    
    // ------------------------------------------------------------------------
   
    /* function get_current_classes() {
        $this->db->select('name, date_start, date_end, price');
        $this->db->from('classes');
        $this->db->join('records', 'records.id_class = classes.id');
        $this->db->where('records.id_client', $id );
        $query = $this->db->get();
        return $query;
    } */
    
    // ------------------------------------------------------------------------
   
    function get_class_client_history($id_class) {
        
        if (!is_numeric($id_class))
            return false;
        
        return $this->db->select("firstname, lastname, name AS classname")
                    ->from("clients")
                    ->join("records", "records.id_client = clients.id")
                    ->join("classes", "classes.id = records.id_class")
                    ->get();
            
    }
    
    // ------------------------------------------------------------------------
   
   
    
}

?>