<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EditOption extends CI_Controller {
   
    function __construct()
    {
        parent::__construct();
        $this->load->model('edit','',TRUE);
        $this->load->model('options_model', TRUE);
        
       
    }
    //edit, add or delete option
    public function index() {
        
        if ($this->input->post()){
           
            $id = $this->input->post("id");
            $option  = new Options_Model();
            //if delete
            if ($this->input->post("delete")){
                
                $this->db->query("DELETE FROM opcija WHERE id = $id");
               redirect("nadzornik");
            }
            if(!$this->input->post("oznaka") || ! $this->input->post("opis") || $this->input->post("status") == NULL){
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
            redirect("nadzornik");
            
        }
        else{
            redirect("home");
        }
    }
    
    public function information() {
        $post = $this->input->post();
        $dateTime = $post["dateTime"];
        $totalTickets = $post["totalTickets"];
        $ordinalNumber = $post["ordinalNumber"];
        $timeNextTicket = $post["timeNextTicket"];
        $avgWaiting = $post["avgWaiting"];
        $workTime = $post["workTime"];
        
        $this->load->model("information");
        $information = new Information();
        $information->vrij_datum = $dateTime;
        $information->ukupan_br = $totalTickets;
        $information->redni_br = $ordinalNumber;
        $information->poc_rada = $workTime;
        $information->pros_vri_cek = $timeNextTicket;
        $information->uk_pros_vri_cek = $avgWaiting;
        $information->save();
        redirect("nadzornik");
        
    }
    
    
    
    
}