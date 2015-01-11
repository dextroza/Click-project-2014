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
            /**
             * problem sa ispisom vremena stvaranja jer je zapravo varijabla prazna zbog
             * spremanja vrijednosti u nju metodom save()
             * 
             * potrebno omogućiti novi library s database funkcijama koje bi se pozivale možda
             *  tu za to vrijeme stvaranj ili nešto drugo
             */
           
            if($this->input->post("choice"))
            {
                //$this->load->library("Mydatabase");
                
               
                $this->load->model("ticket_model");
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
                $printView = $this->load->view("ticket", $dataTicket, true);
                $dataPrint["body"] = $printView;
                $this->load->view("templates/main", $dataPrint);
                
                
            }
            else
            {
                $this->load->database();
             $dataOption = array();
             $this->load->model("Options_Model");
             $options = $this->Options_Model->get();
             foreach($options as $option){
                 $dataOption["options"][] = $option;
             }
             $optionsView = $this->load->view('components/choose_option', $dataOption, true);
             
             $dataHome = array();
             $dataHome["options"] = $optionsView;
             $home = $this->load->view('home', $dataHome, true);
             
             $data = array();
             $data["body"] = $home;
             $this->load->view('templates/main', $data);
            }
    }
    
    public function add() {
        
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */