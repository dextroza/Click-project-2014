<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $this->load->helper('url');
            /**loadamo iz tablice oznaka kolko ima različtih oznaka
             * spremamo to sve u polje koje predajemo viewu choose ticket 
             * kako bi generirao preko foreach forme za oznake potrebne za home
             */
            //$chooseTicket = $this->load->view('components/choose_ticket', true);
            /**
             * u $home predajemo polje oznaka tiketa, chooseTicket i stavljamo ga u home div s oznakama
             */
            $home = $this->load->view('home', array(), true);
            $data["ticket"] = anchor("ticket", "domagoj"); //razmisliti kako ćemo linkat oznaku na print i upisivanje u bazu
            $data["body"] = $home;
            $this->load->view('templates/main', $data);
    }
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */