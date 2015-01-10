<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Nadzornik extends CI_Controller {
	public function index()
	{
            $nadzornik = $this->load->view('nadzornik', array(), true);
            $data["body"] = $nadzornik;
            $this->load->view('templates/main', $data);
    }
}
