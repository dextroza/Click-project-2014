<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Djelatnik extends CI_Controller {
	public function index()
	{
            $djelatnik = $this->load->view('djelatnik', array(), true);
            $data["body"] = $djelatnik;
            $this->load->view('templates/main', $data);
    }
}

