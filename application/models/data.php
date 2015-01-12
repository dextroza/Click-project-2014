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
     * define what information to show to client
     * @param array $information
     * @return array dataHome
     */
    
    /**
     * currentTicket
     * 
     * @return int redni broj
     */
    public function currentTicket() {
        
        $query = $this->db->query("SELECT rednibroj FROM tiket WHERE id = (SELECT MAX(id) FROM tiket)");

        foreach($query->result() as $row){
          return $row->rednibroj;
        }
    }
    public function whatToShow($data, $optional = array()) {
        $status = isset($optional["status"]) ? TRUE:FALSE;
        $information = isset($optional["information"]) ? $optional["information"]:array("ordinalNumber" => 0,
                                                                                        "dateTime" =>0,
                                                                                        "totalTickets" => 0,
                                                                                        "timeNextTicket" =>0,
                                                                                        "workTime" => 0,
                                                                                        ); 
        
        
        if ($information["ordinalNumber"] === "1" || $status==TRUE)
             {  
            $currentTicket = $this->currentTicket();
            
                 $ordinalNumberView = $this->load->view("components/information/current_ticket", 
                                                        array("ordinalNumber" => $currentTicket), 
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
                 $totalTicketsView = $this->load->view("components/information/total_tickets", 
                                                        array("totalTickets" => "534"), 
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
                 $workTimeView = $this->load->view("components/information/work_time", 
                                                        array("workTime" => "08h"), 
                                                        true);
                 $data ["workTime"] = $workTimeView;
             }
             
        return $data;
             
    }

    /**
     * get all options for clients
     * @return array dataOption
     */
    public function getOptions() {
        $dataOption = array();
        $this->load->model("Options_Model");
        $options = $this->Options_Model->get();
        foreach ($options as $option) {
            $dataOption["options"][] = $option;
        }
        return $dataOption;
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