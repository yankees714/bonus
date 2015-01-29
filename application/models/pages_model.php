<?php
class Pages_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_content(){
        $this->db->where('page', "comments"); 
        $query = $this->db->get("pages");
        $row = $query->row();

        return $row->content;
    }
}
?>