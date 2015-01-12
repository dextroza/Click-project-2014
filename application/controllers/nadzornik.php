<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nadzornik extends CI_Controller {
        private $dataNadzornik = array();
        
        function __construct()
        {
        parent::__construct();
        $this->load->model('data','',TRUE);
        }
   
	public function index()
	{
            if($this->input->post("option")){
                $editOption = $this->load->view("components/edit_option",array(), true);
                $this->dataNadzornik["editOption"] = $editOption;
            }
           
            $this->load->helper("url");
            $this->load->helper("form");
            
            $optionsList = array();
            $dataOption = $this->data->getOptions();
            $optionsList["dataOption"] = $dataOption;
            //var_dump($optionsList["dataOption"]["options"][0]);
            $newOption = anchor("newOption", "Dodaj novu opciju", 'class="list-group-item"');  
            $optionsList["newOption"] = $newOption;
            
            
            $optionsView = $this->load->view("components/options_list", $optionsList, true);
            $this->dataNadzornik["optionsList"] = $optionsView;       
            
            $this->dataNadzornik = $this->data->whatToShow($this->dataNadzornik, array("status" => TRUE));
            
            $nadzornik = $this->load->view('nadzornik', $this->dataNadzornik, true);
            $data = array();
            $data["body"] = $nadzornik;
            //var_dump($this->session->userdata("logged_in")["id"]); //id logirane osobe
            $this->load->view('templates/main', $data);
    }
    
}
