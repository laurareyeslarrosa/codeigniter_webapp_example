<?php
include APPPATH . 'controllers/Backend/Backend.php';

class InformacionEmpresa extends Backend {

    private $abm_status;

    public function __construct() {
        parent::__construct();
        $this->load->model('informacionEmpresa_model');
    }

    public function index() {
        $data['informacionEmpresa_array'] = $this->informacionEmpresa_model->get_InformacionEmpresa();
        $data['title'] = INFORMACION_TITLE;
        $data['folder_name'] = INFORMACION_CLASS;
        $data['abm_status'] = $this->abm_status;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/index_title_container', $data);
        $this->load->view('templates/menu_backend');
        $this->load->view('Backend/' . INFORMACION_CLASS . '/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Agregar ' . INFORMACION_TITLE;
        $data['folder_name'] = INFORMACION_CLASS;
        $this->form_validation->set_rules('title_informacion', 'Titulo', 'required');
        $this->form_validation->set_rules('description_informacion', 'Descripcion', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . INFORMACION_CLASS . '/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->informacionEmpresa_model->set_InformacionEmpresa();
            $this->abm_status = CREADO_MESSAGE;
            $this->index();
        }
    }

    public function modify() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Modificar ' . INFORMACION_TITLE;
        $data['folder_name'] = INFORMACION_CLASS;
        $this->form_validation->set_rules('title_informacion', 'Titulo', 'required');
        $this->form_validation->set_rules('description_informacion', 'Descripcion', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['informacionEmpresa_item'] = ($this->input->post('id_informacion') !== null) ? $this->informacionEmpresa_model->get_informacionEmpresa($this->input->post('id_informacion')) : ((is_numeric($this->uri->segment(3, 0))) ? $this->informacionEmpresa_model->get_informacionEmpresa($this->uri->segment(3, 0)) : $this->informacionEmpresa_model->get_informacionEmpresa($this->uri->segment(4, 0)));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . INFORMACION_CLASS . '/modify', $data);
            $this->load->view('templates/footer');
        } else {
            $this->informacionEmpresa_model->update_InformacionEmpresa();
            $this->abm_status = MODIFICADO_MESSAGE;
            $this->index();
        }
    }

    public function delete() {
        $item_id = (is_numeric($this->uri->segment(3, 0))) ? $this->uri->segment(3, 0) : $this->uri->segment(4, 0);
        $this->informacionEmpresa_model->delete_InformacionEmpresa($item_id);
        $this->abm_status = ELIMINADO_MESSAGE;
        $this->index();
    }
}