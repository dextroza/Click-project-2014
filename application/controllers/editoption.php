<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EditOption extends CI_Controller {
    //novo
    function __construct()
    {
        parent::__construct();
        $this->load->model('edit','',TRUE);
        $this->load->model('options_model', TRUE);
       
    }
    
    public function index() {
        if ($this->input->post()){
            $id = $this->input->post("id");
            $option  = new Options_Model();
            //if delete
            if ($this->input->post("delete")){
                $this->db->query("DELETE FROM opcija WHERE id = $id");
               redirect("nadzornik");
            }
            
            
            $columns = $this->input->post();
            //add or update option
            if ("" != $id ) $option->load($id);
            $option->oznaka = $columns["oznaka"];
            $option->opis = $columns["opis"];
            $option->velfonta = $columns["velfonta"];
            $option->bojafonta = $columns["bojafonta"];
            $option->status = $columns["status"];
 
            $option->save();
            redirect("nadzornik"); //refresh?
            
        }
        else{
            redirect("home");
        }
    }
    
    
    
    
}