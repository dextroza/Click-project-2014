<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getTicket'))
{
    /**
     * sprema tiket u bazu i printa tiket korisniku; prikazuje na ekran
     */
    function getTicket()
    {
        
        
        
    }   
}

if (!function_exists('load_controller'))
{
    /**
     * load controller ali ne pokazuje ga u url
     * @param string controller
     * @param string method optional
     * @return controller
     * 
     */
    function load_controller($controller, $method = 'index')
    {
        require_once(FCPATH . APPPATH . 'controllers/' . $controller . '.php');

        $controller = new $controller();

        return $controller->$method();
    }
}