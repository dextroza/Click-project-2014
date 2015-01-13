<?php


Class Data extends CI_Model
 {
    
    function test() {

        $this->db->select('id, username, password');
        $this->db->from('korisnici');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }
    
    /**
     * currentTicket
     * 
     * @return int redni broj
     */
	public function workTime () {
		$query = $this->db->query("SELECT pocetakrada FROM informacije where DATE(vrij_datum) = CURDATE()");
		
		foreach($query->result() as $red) {
			return $red->pocetakrada;
		}
	}
	public function sumTickets () {
		$query = $this->db->query("SELECT COUNT(id) as suma FROM tiket where DATE(vrijemestvaranja) = CURDATE()");
		
		foreach($query->result() as $red) {
			return $red->suma;
		}
	}
        
        /**
         * get new ticket for client
         * @param string $choice
         * @return int id of last ticket
         */
        public function newTicket($choice) {
             $this->load->model('ticket_model');
            $ticket = new Ticket_Model();
            $ticket->oznaka = $choice;
            //nalazimo najvisi redni broj i dodjeljujemo tiketu za 1 visi r.broj
            $query = $this->db->query("SELECT MAX(rednibroj) as max_redni, MAX(id) as id "
                                        . "FROM tiket WHERE DATE(vrijemestvaranja) = CURDATE() ");
            foreach($query->result() as $result){
                $ordinalNumber = $result->max_redni + 1 <= 999  ? $result->max_redni + 1 : 1 ;
                $noviId = $result->id +1;
            }
            $ticket->rednibroj = $ordinalNumber;
            //ocekvrDolaska rješavamo u views/tiket ili tu u funkciji
            $waiting = $this->avgComingTime();
            //TODO waiting zbrojiti na vrijeme stvaranja i upisati u ocekvrdolaska
            
            $ticket->save();
            return $noviId;
            
        }
	 public function nextTicket () {
	 	$ticket = $this->currentTicket();
		$id = $ticket->id + 1;
		$this->load->model("ticket_model");
		$newTicket = new Ticket_Model(); 
		$newTicket->load($id); 
		$newTicket->vrijemeposluz = date("Y-m-d H:i:sa");
		$newTicket->save();
	 }
         
        public function avgComingTime() {
            $query = $this->db->query("SELECT SUM(vrijemecekanja) as ukupno_vrijeme FROM tiket WHERE DATE(vrijemestvaranja) = CURDATE()");
            foreach($query->result() as $row){
                $totalTime = $row->ukupno_vrijeme;
            } 
            $query = $this->db->query("SELECT COUNT(*) as ukupan_broj FROM tiket WHERE DATE(vrijemestvaranja) = CURDATE()");
            foreach($query->result() as $row){
                $totalNumber = $row->ukupan_broj;
            }
            return intval($totalTime/$totalNumber);
         }
         
        /**
         * 
         * @return \Ticket_Model
         */
    public function currentTicket() {
        
        $query = $this->db->query("SELECT max(id) id FROM tiket WHERE DATE(vrijemestvaranja) = CURDATE() AND vrijemeposluz <= CURTIME()");
        
        foreach($query->result() as $row){
          $id = $row->id;
        }
        $query2 = $this->db->query("SELECT rednibroj FROM tiket WHERE id = $id");
        foreach($query2->result() as $row){
            $redni = $row->rednibroj;
        }
        $this->load->model("ticket_model");
        $ticket  = new Ticket_Model();
        $ticket->load($id);        
        return $ticket;
        
    }
    /**
     * what to Show to clients
     * @param array $data
     * @param array $optional
     * @return array
     */
    public function whatToShow($data, $optional = array()) {
        $status = isset($optional["status"]) ? TRUE:FALSE;
        $information = isset($optional["information"]) ? $optional["information"]:array("ordinalNumber" => 0,
                                                                                        "dateTime" =>0,
                                                                                        "totalTickets" => 0,
                                                                                        "timeNextTicket" =>0,
                                                                                        "workTime" => 0,
                                                                                        ); 
        $repeat = isset($optional["repeat"])?TRUE:FALSE;
        
        
        if ($information["ordinalNumber"] === "1" || $status==TRUE)
             {  
            $currentTicket = $this->currentTicket();
            $currentTicket = $currentTicket->rednibroj;
            
           
            
            
                 $ordinalNumberView = $this->load->view("components/information/current_ticket", 
                                                        array("ordinalNumber" => $currentTicket,
                                                              "repeat" => $repeat,
                                                            ), 
                                                        true);
                 $data ["ordinalNumber"] = $ordinalNumberView;
             }
        
        if ($information["dateTime"] === "1" || $status==TRUE)
             {  
                 $dateTimeView = $this->load->view("components/information/date_time", 
                                                        array(), 
                                                        true);
                 $data ["dateTime"] = $dateTimeView;
             }
        if ($information["totalTickets"] === "1" || $status==TRUE)
             {  
			 	$totalTickets = $this->sumTickets();
                 $totalTicketsView = $this->load->view("components/information/total_tickets", 
                                                        array("totalTickets" => $totalTickets), 
                                                        true);
                 $data ["totalTickets"] = $totalTicketsView;
             }
        if ($information["timeNextTicket"] === "1" || $status==TRUE)
             {  
                 $timeNextTicketView = $this->load->view("components/information/time_next_ticket", 
                                                        array("timeNextTicket" => "19:56h"), 
                                                        true);
                 $data ["timeNextTicket"] = $timeNextTicketView;
             }
        if ($information["workTime"] === "1" || $status==TRUE)
             {  
			 	$workTime = $this->workTime();
                 $workTimeView = $this->load->view("components/information/work_time", 
                                                        array("workTime" => $workTime), 
                                                        true);
                 $data ["workTime"] = $workTimeView;
             }
             
        return $data;
             
    }

    /**
     * get all options for clients
     * @param boolean means employee
     * @return array dataOption
     */
    public function getAllOptions($status = FALSE) {
        $dataOption = array();
        $this->load->model("Options_Model");
        $options = $this->Options_Model->get();
        if (count($options) == 0) return;
        foreach ($options as $option) {
            if ($option->velfonta == 0) continue;
            if ($option->status != 0  || $status == TRUE)
                $dataOption["options"][] = $option;
        }
        //ako ima opcija, ali su sve safe delete :)
        if (count($dataOption) == 0) return;
        return $dataOption;
    }
    
    /**
     * get one option
     * @param int $id
     * @return \Options_Model
     */
    public function getOption($id) {
        $this->load->model("Options_Model");
        $option = new Options_Model();
        $option->load($id);
        return $option;
        
        
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

}

?>
