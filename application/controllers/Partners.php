<?php
class Partners extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('partners_model');
    }

    public function index() {
      $data['partners_array'] = $this->partners_model->get_Partners();
        $data['title'] = PARTNERS_CLASS;
        $data['folder_name'] = PARTNERS_CLASS;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu_frontend');
        $this->load->view('partners' . '/index', $data);
        $this->load->view('templates/footer');
    }

}