<?php
class Alianzas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('alianzas_model');
    }

    public function index() {
      $data['alianzas_array'] = $this->alianzas_model->get_Alianzas();
        $data['title'] = ALIANZAS_CLASS;
        $data['folder_name'] = ALIANZAS_CLASS;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu_frontend');
        $this->load->view('alianzas' . '/index', $data);
        $this->load->view('templates/footer');
    }

}