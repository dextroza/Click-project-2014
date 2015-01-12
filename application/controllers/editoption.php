<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EditOption extends CI_Controller {
    //novo
    function __construct()
    {
        parent::__construct();
        $this->load->model('edit','',TRUE);
       
    }
    
    
}