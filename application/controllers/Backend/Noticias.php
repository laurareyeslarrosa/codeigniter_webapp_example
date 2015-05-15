<?php
include APPPATH . 'controllers/Backend/Backend.php';

class Noticias extends Backend {

    private $abm_status;

    public function __construct() {
        parent::__construct();
        $this->load->model('noticias_model');
    }

    public function index() {
        $data['noticias_array'] = $this->noticias_model->get_Noticias();
        $data['title'] = NOTICIAS_CLASS;
        $data['folder_name'] = NOTICIAS_CLASS;
        $data['abm_status'] = $this->abm_status;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/index_title_container', $data);
        $this->load->view('templates/menu_backend');
        $this->load->view('Backend/' . NOTICIAS_CLASS . '/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Agregar ' . NOTICIAS_CLASS;
        $data['folder_name'] = NOTICIAS_CLASS;
        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . NOTICIAS_CLASS . '/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->noticias_model->set_Noticia();
            $this->abm_status = CREADO_MESSAGE;
            $this->index();
        }
    }

    public function modify() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Modificar ' . NOTICIAS_CLASS;
        $data['folder_name'] = NOTICIAS_CLASS;
        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['noticias_item'] = ($this->input->post('id_noticia') !== null) ? $this->noticias_model->get_Noticias($this->input->post('id_noticia')) : ((is_numeric($this->uri->segment(3, 0))) ? $this->noticias_model->get_Noticias($this->uri->segment(3, 0)) : $this->noticias_model->get_Noticias($this->uri->segment(4, 0)));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . NOTICIAS_CLASS . '/modify', $data);
            $this->load->view('templates/footer');
        } else {
            $this->noticias_model->update_Noticia();
            $this->abm_status = MODIFICADO_MESSAGE;
            $this->index();
        }
    }

    public function delete() {
        $item_id = (is_numeric($this->uri->segment(3, 0))) ? $this->uri->segment(3, 0) : $this->uri->segment(4, 0);
        $this->noticias_model->delete_Noticia($item_id);
        $this->abm_status = ELIMINADO_MESSAGE;
        $this->index();
    }
}