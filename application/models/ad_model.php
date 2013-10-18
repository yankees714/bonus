<?php
class Ad_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_ads(){
        $today = date("Y-m-d");

        $this->db->where('DATE_FORMAT(ads.start_date,"%Y-%m-%d") <', $today);
        $this->db->where('DATE_FORMAT(ads.end_date,"%Y-%m-%d") >', $today);

        $ads = $this->db->get('ads')->result();

        return $ads;
    }

    function get_ad(){
        $ads = $this->get_ads();

        $ad = $ads[array_rand($ads)];

        return $ad;
    }
}
?>