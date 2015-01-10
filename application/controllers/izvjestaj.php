<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Izvjestaj extends CI_Controller {
	public function index()
	{
            $izvjestaj= $this->load->view('izvjestaj', array(), true);
            $data["body"] = $izvjestaj;
            $this->load->view('templates/main', $data);
    }
}

