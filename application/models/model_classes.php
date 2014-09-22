<?php

class Model_classes extends CI_Model {

 	
    function get_all() {
        
        return $this->db->get_where("classes", array("deleted"=>0));
        
    }
    
    // ------------------------------------------------------------------------
    
    function get($id) {
        
        return $this->db->get_where("classes", array("id" => $id));
        
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
    
    function delete($id) {
        
        if (!is_numeric($id))
            return false;
            
        $this->db->where("ID", $id)
                 ->update("classes", array("deleted"=>1));
                 
        return true;
    }
   
    
}

?>