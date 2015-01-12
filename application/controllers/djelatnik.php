<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Djelatnik extends CI_Controller {
	private $dataNadzornik=array();
	public function index()
	{		
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
            $djelatnik = $this->load->view('djelatnik', $this->dataNadzornik, true);
            $data["body"] = $djelatnik;
            $this->load->view('templates/main', $data);
    }
}

