<?php
class Contacto extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('informacionEmpresa_model');
    }

    public function index() {
     // $data['informacion_array'] = $this->informacionEmpresa_model->get_InformacionEmpresa();
        $data['title'] = CONTACTO_CLASS;
        $data['folder_name'] = CONTACTO_CLASS;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu_frontend');
        $this->load->view('contacto' . '/index', $data);
        $this->load->view('templates/footer');
    }

}