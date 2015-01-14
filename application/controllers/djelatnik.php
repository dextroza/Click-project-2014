<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Djelatnik extends CI_Controller {
	private $dataDjelatnik = array();
        function __construct()
    {
        parent::__construct();
        $this->load->model('data','',TRUE);
        //$this->load->database();
    }
	public function index()
	{   $repeatSignal = false;	
            if ($this->input->post("repeat")){
                $repeatSignal = true;
            }
			if ($this->input->post("next")) {
				$this->data->nextTicket();
			}
            $this->load->helper("url");
            $this->dataDjelatnik = $this->data->whatToShow($this->dataDjelatnik, array("status" => TRUE,
                                                                                       "repeat" => $repeatSignal,
                                                                                      ));
            
            $data = array();
            $this->dataDjelatnik["back"] = anchor("", "Back");
            $djelatnik = $this->load->view('djelatnik', $this->dataDjelatnik, true);
            $data["body"] = $djelatnik;
            $this->load->view('templates/main', $data);
    }
}

