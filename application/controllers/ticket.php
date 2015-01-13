<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Ticket extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('data','',TRUE);
        //$this->load->database();
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/ticket
	 *	- or -  
	 * 		http://example.com/index.php/ticket/index
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/ticket/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
        {
            if (!$this->input->post("choice"))
                show_404();

            $this->load->helper("url");
            $choice = $this->input->post("choice");
            $noviId = $this->data->newTicket($choice);
            //loadamo zadnji tiket iz baze u model - to je taj kojeg je korisnik stisnuo    
            $dataTicket = array();
            $loadTicket = new Ticket_Model();
            $loadTicket->load($noviId);
            $dataTicket["ticket"] = $loadTicket;
            $dataTicket["back"] = anchor("", "Back");
            $printView = $this->load->view("ticket", $dataTicket, true);
            $dataPrint["body"] = $printView;
            $this->load->view("templates/main", $dataPrint);
        }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */