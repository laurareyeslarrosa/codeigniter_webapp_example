<?php
class Inicio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('TrabajosRealizados_model');
    }

    public function index() {
        $data['trabajos_array'] = $this->TrabajosRealizados_model->get_TrabajosRealizados();
        $data['title'] = INICIO_CLASS;
        $data['folder_name'] = INICIO_CLASS;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu_frontend');
        $this->load->view('inicio' . '/index', $data);
        $this->load->view('templates/footer');
    }

}