<?php
include APPPATH . 'controllers/Backend/Backend.php';

class Alianzas extends Backend {

    private $abm_status;

    public function __construct() {
        parent::__construct();
        $this->load->model('Alianzas_model');
    }

    public function index() {
        $data['alianzas_array'] = $this->Alianzas_model->get_Alianzas();
        $data['title'] = ALIANZAS_CLASS;
        $data['folder_name'] = ALIANZAS_CLASS;
        $data['abm_status'] = $this->abm_status;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/index_title_container', $data);
        $this->load->view('templates/menu_backend');
        $this->load->view('Backend/' . ALIANZAS_CLASS . '/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Agregar ' . ALIANZAS_CLASS;
        $data['folder_name'] = ALIANZAS_CLASS;
        $this->form_validation->set_rules('nombre_empresa', 'nombre_empresa', 'required');
        $this->form_validation->set_rules('url_empresa', 'url_empresa', 'required');
        $config['upload_path'] = ALIANZAS_IMAGE_ROUTE;
        $config['file_name'] = $this->Alianzas_model->get_lastId();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        if ($this->form_validation->run() === FALSE || !$this->upload->do_upload('logo_empresa')) {
            $data['image_upload_error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . ALIANZAS_CLASS . '/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Alianzas_model->set_Alianzas();
            $this->abm_status = CREADO_MESSAGE;
            $this->index();
        }
    }

    public function modify() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Modificar ' . ALIANZAS_CLASS;
        $data['folder_name'] = ALIANZAS_CLASS;
        $this->form_validation->set_rules('nombre_empresa', 'Nombre', 'required');
        $this->form_validation->set_rules('url_empresa', 'URL', 'required');
        $config['upload_path'] = ALIANZAS_IMAGE_ROUTE;
        $config['file_name'] = $this->input->post('id_empresa');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        $this->upload->do_upload('logo_empresa');
        if ($this->form_validation->run() === FALSE) {
            $data['Alianzas_item'] = ($this->input->post('id_empresa') !== null) ? $this->Alianzas_model->get_Alianzas($this->input->post('id_empresa')) : ((is_numeric($this->uri->segment(3, 0))) ? $this->Alianzas_model->get_Alianzas($this->uri->segment(3, 0)) : $this->Alianzas_model->get_Alianzas($this->uri->segment(4, 0)));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . ALIANZAS_CLASS . '/modify', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Alianzas_model->update_Alianzas();
            $this->abm_status = MODIFICADO_MESSAGE;
            $this->index();
        }
    }

    public function delete() {
        $item_id = (is_numeric($this->uri->segment(3, 0))) ? $this->uri->segment(3, 0) : $this->uri->segment(4, 0);
        unlink(ALIANZAS_IMAGE_ROUTE . $item_id . '.png');
        $this->Alianzas_model->delete_Alianzas($item_id);
        $this->abm_status = ELIMINADO_MESSAGE;
        $this->index();
    }
}