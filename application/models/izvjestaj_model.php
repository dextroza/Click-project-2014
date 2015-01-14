<?php

Class Izvjestaj_Model extends CI_Model {

    /**
     *  return number of tickets this day or month
     * @param int
     */
    public function getTotalTickets($date, $month = NULL) {
        if (isset($month)) {
            $array = explode("-", $month);
            $month = $array[0];
            $year = $array[1];
            $query = $this->db->query("SELECT COUNT(*) as ukupno FROM tiket WHERE MONTH(vrijemestvaranja) = $month AND YEAR(vrijemestvaranja) = $year");
        } else {
            $query = $this->db->query("SELECT COUNT(*) as ukupno FROM tiket WHERE DATE(vrijemestvaranja) = '$date'");
        }
        foreach ($query->result() as $row) {
            $numberTickets = $row->ukupno;
        }
        return $numberTickets;
    }

    /**
     * return array of available months
     * @return array
     */
    public function makeMonths() {
        $months = array();

        $query = $this->db->query("SELECT DISTINCT(CONCAT(MONTH(vrijemestvaranja),'-',YEAR(vrijemestvaranja))) month FROM tiket ");

        foreach ($query->result() as $row) {
            $months[] = $row->month;
        }
        return $months;
    }

    /**
     * find expected waiting time for ALL clients this day
     * @param date (yyyy-mm-dd) 
     * @return int waiting time
     */
    public function avgComingTime($date, $month = NULL) {
        if (isset($month)) {
            $array = explode("-", $month);
            $month = $array[0];
            $year = $array[1];

            $query1 = $this->db->query("SELECT SUM(vrijemecekanja) as ukupno_vrijeme FROM tiket"
                    . " WHERE MONTH(vrijemestvaranja) = $month AND YEAR(vrijemestvaranja) = $year"
                    . " AND vrijemeposluz IS NOT NULL");

            $query2 = $this->db->query("SELECT COUNT(*) as ukupan_broj FROM tiket "
                    . "WHERE MONTH(vrijemestvaranja) = $month AND "
                    . " YEAR(vrijemestvaranja) = $year AND vrijemeposluz IS NOT NULL");
        } else {
            $query1 = $this->db->query("SELECT SUM(vrijemecekanja) as ukupno_vrijeme FROM tiket"
                    . " WHERE DATE(vrijemestvaranja) = '$date' AND vrijemeposluz IS NOT NULL");
            $query2 = $this->db->query("SELECT COUNT(*) as ukupan_broj FROM tiket "
                    . "WHERE DATE(vrijemestvaranja) = '$date' AND vrijemeposluz IS NOT NULL");
        }
        foreach ($query1->result() as $row) {
            $totalTime = $row->ukupno_vrijeme;
        }

        foreach ($query2->result() as $row) {
            $totalNumber = $row->ukupan_broj;
        }

        return intval($totalTime / $totalNumber);
    }

    /**
     * return maximum waiting time of one client
     * @param date $date
     * @return type
     */
    public function maxAvgComingTime($date, $month = NULL) {
        if (isset($month)) {
            $array = explode("-", $month);
            $month = $array[0];
            $year = $array[1];
            $query = $this->db->query("SELECT MAX(vrijemecekanja) as max FROM tiket "
                    . "WHERE MONTH(vrijemestvaranja) = $month AND"
                    . " YEAR(vrijemestvaranja) = $year");
        } else {
            $query = $this->db->query("SELECT MAX(vrijemecekanja) as max FROM tiket WHERE DATE(vrijemestvaranja) = '$date' ");
        }
        foreach ($query->result() as $row) {
            $max = $row->max;
        }
        return $max;
    }

}
