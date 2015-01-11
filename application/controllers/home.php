<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    private $dataHome = array();  
    private $information = array();

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
             $this->load->database();
             
             $optionsView = $this->getOptions();
             $this->dataHome["options"] = $optionsView;
             
             $this->information = $this->getConfig();
             $this->whatToShow();
             
             $home = $this->load->view('home', $this->dataHome, true);
             $data = array();
             $data["body"] = $home;
             $this->load->view('templates/main', $data);
        }
    
    /**
     * get configuration to show details to client
     * @param no
     * @return array
     */
    public function getConfig() {
            $query = $this->db->query("SELECT * FROM prikaz");
            foreach($query->result() as $row){
                $dateTime = $row->vrij_datum;
                $totalTickets = $row->ukupan_br;
                $ordinalNumber = $row->redni_br;
                $timeNextTicket = $row->pros_vri_cek;
                $workTime =  $row->poc_rada;   
            }
            return array( "dateTime" => $dateTime,
                          "totalTickets" => $totalTickets,
                          "ordinalNumber" => $ordinalNumber,
                          "timeNextTicket" => $timeNextTicket,
                          "workTime" => $workTime,
                        );
        
    }
    /**
     * get options view
     * @return string view of options
     */
    private function getOptions() {
             $dataOption = array();
             $this->load->model("Options_Model");
             $options = $this->Options_Model->get();
             foreach($options as $option){
                 $dataOption["options"][] = $option;
             }
             $optionsView = $this->load->view('components/choose_option', $dataOption, true);
             return $optionsView;
        
    }
    private function whatToShow() {
        if ($this->information["ordinalNumber"] === "1")
             {  
                 $ordinalNumberView = $this->load->view("components/information/current_ticket", 
                                                        array("ordinalNumber" => "56"), 
                                                        true);
                 $this->dataHome ["ordinalNumber"] = $ordinalNumberView;
             }
        
        if ($this->information["dateTime"] === "1")
             {  
                 $dateTimeView = $this->load->view("components/information/date_time", 
                                                        array(), 
                                                        true);
                 $this->dataHome ["dateTime"] = $dateTimeView;
             }
        if ($this->information["totalTickets"] === "1")
             {  
                 $totalTicketsView = $this->load->view("components/information/total_tickets", 
                                                        array("totalTickets" => "534"), 
                                                        true);
                 $this->dataHome ["totalTickets"] = $totalTicketsView;
             }
        if ($this->information["timeNextTicket"] === "1")
             {  
                 $timeNextTicketView = $this->load->view("components/information/time_next_ticket", 
                                                        array("timeNextTicket" => "19:56h"), 
                                                        true);
                 $this->dataHome ["timeNextTicket"] = $timeNextTicketView;
             }
        if ($this->information["workTime"] === "1")
             {  
                 $workTimeView = $this->load->view("components/information/work_time", 
                                                        array("workTime" => "08h"), 
                                                        true);
                 $this->dataHome ["workTime"] = $workTimeView;
             }      
             
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */