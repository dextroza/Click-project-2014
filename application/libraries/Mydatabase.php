<?php

    class Mydatabase { 
        
        var $CI;       
        public function __construct()
        {
            $this->CI =& get_instance();
            $this->CI->load->database();     
            $this->CI->load->helper('url');
            $this->CI->load->library('session'); 
            $this->CI->config->item('base_url'); 
        } 

        public function getOrdinalNumber()
        {
         $query = $this->CI->db->query("SELECT MAX(rednibroj) as max_redni FROM tiket ");
         foreach($query->result() as $result){
             return $result->max_redni + 1;
         }
        }
    }  