<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ticket extends CI_Controller {

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
            if(!$this->input->post("choice")) show_404();
            $this->load->helper("url");
            $this->load->model('ticket_model');
            $ticket = new Ticket_Model();
            
            $ticket->oznaka = $this->input->post("choice");
            $this->load->database();
            //nalazimo najvisi redni broj i dodjeljujemo tiketu za 1 visi r.broj
            $query = $this->db->query("SELECT MAX(rednibroj) as max_redni FROM tiket ");
            foreach($query->result() as $result){
                $ordinalNumber = $result->max_redni + 1;
            }
            $ticket->rednibroj = $ordinalNumber;
            //ocekvrDolaska rješavamo u views/tiket ili tu funkcija
            //vrijemestvaranja je default curr. timestamp
            $ticket->save();
            $this->db->close();

            $dataTicket = array();
            $dataTicket["ticket"] = $ticket;
            $dataTicket["back"] = anchor("", "Back");
            $printView = $this->load->view("ticket", $dataTicket, true);
            $dataPrint["body"] = $printView;
            $this->load->view("templates/main", $dataPrint);

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */