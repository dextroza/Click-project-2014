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
            $this->dataNadzornik["ordinalNumber"] = $this->load->view("components/information/current_ticket", 
                                                        array("ordinalNumber" => "56"), 
                                                        true);
            $this->dataNadzornik["dateTime"] = $this->load->view("components/information/date_time", 
                                                        array(), 
                                                        true);
            $this->dataNadzornik["totalTickets"] = $this->load->view("components/information/total_tickets", 
                                                        array("totalTickets" => "534"), 
                                                        true);
            $this->dataNadzornik["timeNextTicket"] = $this->load->view("components/information/time_next_ticket", 
                                                        array("timeNextTicket" => "19:56h"), 
                                                        true);
            $this->dataNadzornik["workTime"] = $this->load->view("components/information/work_time", 
                                                        array("workTime" => "08h"), 
                                                        true);
            
            $nadzornik = $this->load->view('nadzornik', $this->dataNadzornik, true);
            $data = array();
            $data["body"] = $nadzornik;
            //var_dump($this->session->userdata("logged_in")["id"]); //id logirane osobe
            $this->load->view('templates/main', $data);
    }
}
