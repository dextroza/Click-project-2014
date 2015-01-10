<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/home
	 *	- or -  
	 * 		http://example.com/index.php/home/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/home/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            //$this->load->helper('url');
            /**loadamo iz tablice oznaka kolko ima različtih oznaka
             * spremamo to sve u polje koje predajemo viewu choose ticket 
             * kako bi generirao preko foreach forme za oznake potrebne za home
             */
            //$chooseTicket = $this->load->view('components/choose_ticket', true);
            /**
             * u $home predajemo polje oznaka tiketa, chooseTicket i stavljamo ga u home div s oznakama
             */
            //loadamo iz baze
            if($this->input->post("choice"))
            {
             
                $this->load->model("ticket_model");
                $ticket = new Ticket_Model();
               
                $ticket->oznaka = $this->input->post("choice");
                $ticket->rednibroj = 150; //redniBroj+1;
                //ocekvrDolaska rješavamo u views/tiket
                //vrijemestvaranja je default curr. timestamp
                //uspjesno spojen na bazu
                $this->load->database();
                $ticket->save();
                $this->db->close();
                
                $dataTicket = array();
                $printView = $this->load->view("ticket", $dataTicket, true);
                $dataPrint["body"] = $printView;
                $this->load->view("templates/main", $dataPrint);
                
                
            }
            else
            {
            $tickets = array();
            $tickets["tickets"][] = "A - Uplate i isplate";
            $tickets["tickets"][] = "B - Krediti";
            $tickets["tickets"][] = "C - Pregled računa";
            //pravimo forme za oznake iz baze
            $ticketsView = $this->load->view('components/choose_ticket', $tickets, true);
            $dataHome["tickets"] = $ticketsView;
            $home = $this->load->view('home', $dataHome, true);
            //$data["ticket"] = anchor("ticket", "domagoj"); //razmisliti kako ćemo linkat oznaku na print i upisivanje u bazu
            $data["body"] = $home;
            $this->load->view('templates/main', $data);
            }
    }
    
    public function add() {
        
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */