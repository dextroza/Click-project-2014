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
	{		
            $this->dataDjelatnik = $this->data->whatToShow($this->dataDjelatnik, array("status" => TRUE));

            $djelatnik = $this->load->view('djelatnik', $this->dataDjelatnik, true);
            $data["body"] = $djelatnik;
            $this->load->view('templates/main', $data);
    }
}

