<?php
class Servicios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('servicios_model');
    }

    public function index() {
      $data['servicios_array'] = $this->servicios_model->get_Servicios();
        $data['title'] = SERVICIOS_CLASS;
        $data['folder_name'] = SERVICIOS_CLASS;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu_frontend');
        $this->load->view('servicios' . '/index', $data);
        $this->load->view('templates/footer');
    }

}