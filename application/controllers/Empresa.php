<?php
class Empresa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('informacionEmpresa_model');
    }

    public function index() {
      $data['informacion_array'] = $this->informacionEmpresa_model->get_InformacionEmpresa();
        $data['title'] = INFORMACION_CLASS;
        $data['folder_name'] = INFORMACION_CLASS;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu_frontend');
        $this->load->view('empresa' . '/index', $data);
        $this->load->view('templates/footer');
    }

}