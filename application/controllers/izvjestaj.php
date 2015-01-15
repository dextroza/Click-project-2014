<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Izvjestaj extends CI_Controller {

    private $dataIzvjestaj;

    public function __construct() {
        parent::__construct();
        $this->load->model("izvjestaj_model", 'izvjestaj', TRUE);
        $this->load->helper("url");
        $this->load->library("table");
    }

    public function index() {
        if ($this->input->post("day")) {
            $date = $this->input->post("day");
            $Heading = "Prosječni broj izdanih tiketa po satu";
            
            $this->dataIzvjestaj["date"] = '<h4 style="padding-left:50px;">Datum: ' . $date . '</h4>';
            //date to sql date 'yyyy-mm-dd'
            $temp = explode("/", $date);
            $new = array();
            $new[0] = $temp[2];
            $new[1] = $temp[0];
            $new[2] = $temp[1];
            $new = implode("-", $new);
            $date = $new;
           //end

            //table data
            $numberTickets = $this->izvjestaj->getTotalTickets($date);
            $avgHour = intval($numberTickets / 8);
            $avgComingTime = $this->izvjestaj->avgComingTime($date);
            $maxComingTime = $this->izvjestaj->maxAvgComingTime($date);

        } 
        else if ($this->input->post("month")) {
            $month = $this->input->post("month");
            $this->dataIzvjestaj["date"] = '<h4 style="padding-left:50px;">Datum: ' . $month . '</h4>';
            $Heading = "Prosječni broj izdanih tiketa po danu";
            
            $numberTickets = $this->izvjestaj->getTotalTickets('',$month);
            $avgHour = intval($numberTickets / 30); //po mjesecu
            $avgComingTime = $this->izvjestaj->avgComingTime('',$month);
            $maxComingTime = $this->izvjestaj->maxAvgComingTime('', $month);
   
        }
        
        else redirect("nadzornik");
        
        //generate table and view
        $tmpl = array(
                'table_open' => '<table border="2" class="table_my"  cellpadding="0" cellspacing="0">',
                'heading_cell_start' => '<th class="table_head">',
            );
        $this->table->set_template($tmpl);
        
         $heading = array("Broj izdanih tiketa", $Heading,
                "Prosječno vrijeme čekanja stranaka", "Maksimalno vrijeme čekanja stranaka");
            $this->table->set_heading($heading);
            $this->table->add_row($numberTickets, $avgHour, $avgComingTime . " min", $maxComingTime);
            $table = $this->table->generate();
            $this->dataIzvjestaj["table"] = $table;
        //end to view
        $this->dataIzvjestaj["back"] = anchor("nadzornik", "Back");
        $izvjestaj = $this->load->view('izvjestaj', $this->dataIzvjestaj, true);
        $data = array();
        $data["body"] = $izvjestaj;
        $this->load->view('templates/main', $data);
    }

}
