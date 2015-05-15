<?php
class Backend extends CI_Controller {


    public function __construct() {
        
        //DESBLOQUEAR DESDPUES DE TERMINAR CON EL BACKEND! error_reporting(0);
        
        parent::__construct();
        $this->load->library('session');
        $this->load->helper(array('url'));
        $this->access_auth();
        $this->set_default_form_validation_messages();
    }

    public function set_default_form_validation_messages()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_message('duration_validation', 'no posee el formato correcto');
        $this->form_validation->set_message('number_season_check', 'ya se encuentra en el sistema');
        $this->form_validation->set_message('number_episode_check', 'ya se encuentra en el sistema');
        $this->form_validation->set_message('date_validation', 'no posee el formato correcto');
        $this->form_validation->set_message('url_validation', 'no es válida');
    }

    public function access_auth()
    {
        if($this->session->userdata(LOGGED_IN) === null) {
            redirect(base_url(INDEX_FILE . 'login'));   
        }
        else
        {
            return false;
        }
    }
}