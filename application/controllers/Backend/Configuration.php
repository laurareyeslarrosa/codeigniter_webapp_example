<?php
include APPPATH . 'controllers/Backend/Backend.php';
class Configuration extends Backend {

    private $abm_status;

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios_model');
        $this->load->model('About_model');
    }

    public function index() {
        $data['usuario'] = $this->Usuarios_model->get_Usuarios();
        $data['aboutText'] = $this->About_model->get_AboutText();
        $data['title'] = 'Configuración';
        $data['folder_name'] = CONFIG_CLASS;
        $data['abm_status'] = $this->abm_status;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/index_title_container', $data);
        $this->load->view('templates/menu_backend');
        $this->load->view('Backend/' . CONFIG_CLASS . '/index', $data);
        $this->load->view('templates/footer');
    }


    public function modifyUser() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Modificar ' . USUARIOS_CLASS;
        $data['folder_name'] = CONFIG_CLASS;
        $this->form_validation->set_rules('nombre_usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required|min_length[6]');
        $this->form_validation->set_rules('password_confirm', 'Confirmar contraseña', 'required|min_length[6]');
        if ($this->form_validation->run() === FALSE) {
            $data['usuarios_item'] = ($this->input->post('id_usuario') !== null) ? $this->Usuarios_model->get_Usuarios($this->input->post('id_usuario')) : ((is_numeric($this->uri->segment(3, 0))) ? $this->Usuarios_model->get_Usuarios($this->uri->segment(3, 0)) : $this->Usuarios_model->get_Usuarios($this->uri->segment(4, 0)));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . CONFIG_CLASS . '/modifyUser', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Usuarios_model->update_Usuarios();
            $this->abm_status = MODIFICADO_MESSAGE;
            $this->index();
        }
    }


    public function modifyAbout() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Modificar ' . ABOUT_CLASS;
        $data['folder_name'] = CONFIG_CLASS;


        
        $this->form_validation->set_rules('text_about', 'Texto', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['about_item'] = ($this->input->post('id_about') !== null) ? $this->About_model->get_AboutText($this->input->post('id_about')) : ((is_numeric($this->uri->segment(3, 0))) ? $this->About_model->get_AboutText($this->uri->segment(3, 0)) : $this->About_model->get_AboutText($this->uri->segment(4, 0)));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . CONFIG_CLASS . '/modifyAbout', $data);
            $this->load->view('templates/footer');
        } else {
            $this->About_model->update_AboutText();
            $this->abm_status = MODIFICADO_MESSAGE;
            $this->index();
        }
    }

}