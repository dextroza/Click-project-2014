<?php

Class Data extends CI_Model {

    /**
     * currentTicket
     * 
     * @return int redni broj
     */
    public function workTime() {
        $query = $this->db->query("SELECT pocetakrada FROM informacije where DATE(vrij_datum) = CURDATE()");

        foreach ($query->result() as $red) {
            return $red->pocetakrada;
        }
    }

    public function sumTickets() {
        $query = $this->db->query("SELECT COUNT(id) as suma FROM tiket where DATE(vrijemestvaranja) = CURDATE()");

        foreach ($query->result() as $red) {
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
        $this->load->model("information");
        $ticket = new Ticket_Model();
        $ticket->oznaka = $choice;
        //nalazimo najvisi redni broj i dodjeljujemo tiketu za 1 visi r.broj
        $query = $this->db->query("SELECT MAX(rednibroj) as max_redni, MAX(id) as id "
                . "FROM tiket WHERE DATE(vrijemestvaranja) = CURDATE() ");
        foreach ($query->result() as $result) {
            $ordinalNumber = $result->max_redni + 1 <= 999 ? $result->max_redni + 1 : 1;
            $noviId = $result->id + 1;
        }

        $ticket->rednibroj = $ordinalNumber;


        //ocekvrDolaska rješavamo u views/tiket ili tu u funkciji
        $waiting = $this->avgComingTime();

        $ticket->save();
        //novo
        // //TODO waiting zbrojiti na vrijeme stvaranja i upisati u ocekvrdolaska
        //spremimio u bazu da se automatski spremi vrijemestvaranja po defaultu

        $newTicket = new Ticket_Model();
        $newTicket->load($noviId); //loadamo isti taj tiket kako bi računali ocekvrdolaska
        $created = $newTicket->vrijemestvaranja;
        $unixcreated = strtotime($created);
        $secondsToWait = $waiting * 60;
        $expectedTime = $unixcreated + $secondsToWait; //unixtime

        $stringExpectedTime = date('Y-m-d H:i:s', $expectedTime);
        $newTicket->ocekvrdolaska = $stringExpectedTime;
        $newTicket->save();

        //kraj novog

        return $noviId;
    }

    /**
     * djelatnik works on button nextTicket, writes real /
     *  waiting time to next ticket
     * @return TRUE/FALSE
     * 
     */
    public function nextTicket() {
        $ticket = $this->currentTicket();
        $id = $ticket->id + 1;
        $this->load->model("ticket_model");
        $newTicket = new Ticket_Model();
        $newTicket->load($id);

        if (!isset($newTicket->vrijemestvaranja))
            return FALSE;
        $newTicket->vrijemeposluz = date("Y-m-d H:i:s");
        $currentTime = date("Y-m-d H:i:s");

        $created = $newTicket->vrijemestvaranja;
        $unixCreated = strtotime($created);
        $unixCurrent = strtotime($currentTime);

        $waitingTime = $unixCurrent - $unixCreated; //seconds
        $waitingTime /= 60;
        $newTicket->vrijemecekanja = $waitingTime;

        $newTicket->save();
        return TRUE;
    }

    /**
     * find expected waiting time for new client
     * @return int waiting time minutes
     */
    public function avgComingTime() {
        $query = $this->db->query("SELECT SUM(vrijemecekanja) as ukupno_vrijeme FROM tiket WHERE DATE(vrijemestvaranja) = CURDATE() AND vrijemeposluz IS NOT NULL");
        foreach ($query->result() as $row) {
            $totalTime = $row->ukupno_vrijeme;
        }
        $query = $this->db->query("SELECT COUNT(*) as ukupan_broj FROM tiket WHERE DATE(vrijemestvaranja) = CURDATE() AND vrijemeposluz IS NOT NULL");
        foreach ($query->result() as $row) {
            $totalNumber = $row->ukupan_broj;
        }
        //ako ne postoji tiket u bazi taj dan onda ne smije prikazivati podatke Trenutni tiket i vrijeme čekanja za sljedeći
      
        return intval($totalTime / $totalNumber);
    }

    /**
     * return average coming time for next client
     * @return date timestamp
     */
    public function avgNextTime() {
        $this->load->model("ticket_model");
        $nextTicket = new Ticket_Model();
        $currentTicket = $this->currentTicket();
        $nextId = $currentTicket->id + 1;
        $nextTicket->load($nextId);
        $avgNextTime = $nextTicket->ocekvrdolaska;
        //ako ne postoji sljedeći tiket u bazi za taj dan
        if (NULL === $avgNextTime)
            return FALSE;
        return $avgNextTime;
    }

    /**
     * return current Ticket model
     * @return \Ticket_Model
     */
    public function currentTicket() {

        $query = $this->db->query("SELECT max(id) id FROM tiket WHERE DATE(vrijemestvaranja) = CURDATE() AND vrijemeposluz <= CURTIME()");

        foreach ($query->result() as $row) {
            $id = $row->id;
        }
        //ako ne postoji tiket u tom danu
        if (NULL === $id){
            return NULL;
        }
        $query2 = $this->db->query("SELECT rednibroj FROM tiket WHERE id = $id");
        
        foreach ($query2->result() as $row) {
            $redni = $row->rednibroj;
        }
        $this->load->model("ticket_model");
        $ticket = new Ticket_Model();
        $ticket->load($id);
        return $ticket;
    }
    
    /**
     * check if one or more tickets exist today
     * @return boolean
     */
    public function existTickets() {
        $query  = $this->db->query("SELECT COUNT(*) as count FROM tiket WHERE DATE(vrijemestvaranja) = CURDATE() ");
        foreach($query->result() as $row){
            if ($row->count == 0) return FALSE;
        }
        
        return TRUE;
    }

    /**
     * what to Show to clients
     * @param array $data
     * @param array $optional
     * @return array
     */
    public function whatToShow($data, $optional = array()) {
        $status = isset($optional["status"]) ? TRUE : FALSE;
        $information = isset($optional["information"]) ? $optional["information"] : array("ordinalNumber" => 0,
            "dateTime" => 0,
            "totalTickets" => 0,
            "timeNextTicket" => 0,
            "workTime" => 0,
            "avgWaiting" => 0,
        );

        $repeat = isset($optional["repeat"]) && $optional["repeat"] == TRUE ? TRUE : FALSE;
        $ticket = isset($optional["ticket"]) && $optional["ticket"] == FALSE ? FALSE : TRUE;

        if ($information["ordinalNumber"] === "1" || $status == TRUE) {
           
            
                $currentTicket = $this->currentTicket();
                $currentTicket = $currentTicket->rednibroj;


                $ordinalNumberView = $this->load->view("components/information/current_ticket", array(
                    "ordinalNumber" => $currentTicket,
                    "repeat" => $repeat,
                    "ticket" => $ticket,
                        ), true);


                $data ["ordinalNumber"] = $ordinalNumberView;
            
        }

        if ($information["dateTime"] === "1" || $status == TRUE) {
            $dateTimeView = $this->load->view("components/information/date_time", array(), true);
            $data ["dateTime"] = $dateTimeView;
        }
        if ($information["totalTickets"] === "1" || $status == TRUE) {
            $totalTickets = $this->sumTickets();
            $totalTicketsView = $this->load->view("components/information/total_tickets", array("totalTickets" => $totalTickets), true);
            $data ["totalTickets"] = $totalTicketsView;
        }
        if ($information["timeNextTicket"] === "1" || $status == TRUE) {
            
            if (  FALSE !== $this->avgNextTime()){ 
               $avgComingTime = date("H:i", strtotime($this->avgNextTime())); //results in H:min
            }
            else $avgComingTime = FALSE;

            $timeNextTicketView = $this->load->view("components/information/time_next_ticket", array("timeNextTicket" => $avgComingTime,), true);
           
            
            $data ["timeNextTicket"] = $timeNextTicketView;
           
        }
        if ($information["workTime"] === "1" || $status == TRUE) {
            $workTime = $this->workTime();
            $workTimeView = $this->load->view("components/information/work_time", array("workTime" => $workTime), true);
            $data ["workTime"] = $workTimeView;
        }
        if ($information["avgWaiting"] === "1" || $status == TRUE) {
            
            $avgWaiting = $this->avgComingTime();
            $avgWaitingView = $this->load->view("components/information/avg_waiting", array("avgWaiting" => $avgWaiting), true);
            
            
            $data ["avgWaiting"] = $avgWaitingView;
            
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
        if (count($options) == 0)
            return;
        foreach ($options as $option) {
            if ($option->velfonta == 0)
                continue;
            if ($option->status != 0 || $status == TRUE)
                $dataOption["options"][] = $option;
        }
        //ako ima opcija, ali su sve safe delete :)
        if (count($dataOption) == 0)
            return;
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
        $query = $this->db->query("SELECT * FROM `prikaz` WHERE id = (SELECT MAX(id) FROM prikaz)");
        foreach ($query->result() as $row) {
            $dateTime = $row->vrij_datum;
            $totalTickets = $row->ukupan_br;
            $ordinalNumber = $row->redni_br;
            $timeNextTicket = $row->pros_vri_cek;
            $avgWaiting = $row->uk_pros_vri_cek;
            $workTime = $row->poc_rada;
        }
        return array("dateTime" => $dateTime,
            "totalTickets" => $totalTickets,
            "ordinalNumber" => $ordinalNumber,
            "timeNextTicket" => $timeNextTicket,
            "workTime" => $workTime,
            "avgWaiting" => $avgWaiting,
        );
    }

}

?>
