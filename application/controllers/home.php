<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    private $dataHome = array();  
    private $information = array();
    //novo
    function __construct()
    {
        parent::__construct();
        $this->load->model('data','',TRUE);
        $this->load->database();
    }
    //kraj novog

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
            
            //admin i djelatnik          
            $this->load->helper(array('form'));
            $loginView = $this->load->view("components/login_view", array(),true);
            $this->dataHome["loginView"] = $loginView;
            $dataOption = $this->data->getOptions();
            $optionsView = $this->load->view('components/choose_option', $dataOption, true);
//            $optionsView = $this->data->getOptions();
            $this->dataHome["options"] = $optionsView;
//
            $this->information = $this->data->getConfig();
            $this->dataHome = $this->data->whatToShow($this->dataHome, array("information" =>$this->information));
//          $this->whatToShow();
//
            $home = $this->load->view('home', $this->dataHome, true);
            $data = array();
            $data["body"] = $home;
            $this->load->view('templates/main', $data);
        }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */