<?php
include APPPATH . 'controllers/Backend/Backend.php';

class TrabajosRealizados extends Backend {

    private $abm_status;

    public function __construct() {
        parent::__construct();
        $this->access_auth();
   //     $this->load->helper(array('url'));
        $this->load->model('TrabajosRealizados_model');
    }

    public function index() {
        $data['trabajosRealizados_array'] = $this->TrabajosRealizados_model->get_TrabajosRealizados();
        $data['title'] = TRABAJOS_TITLE;
        $data['folder_name'] = TRABAJOS_CLASS;
        $data['abm_status'] = $this->abm_status;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/index_title_container', $data);
        $this->load->view('templates/menu_backend');
        $this->load->view('Backend/' . TRABAJOS_CLASS . '/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Agregar ' . TRABAJOS_TITLE;
        $data['folder_name'] = TRABAJOS_CLASS;

        $this->form_validation->set_rules('nombre_empresa', 'Nombre empresa', 'required');
        $this->form_validation->set_rules('url_empresa', 'URL Empresa', 'required');
        $this->form_validation->set_rules('titulo_trabajo', 'Titulo trabajo', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

        $config_logo['upload_path'] = TRABAJOS_IMAGE_ROUTE;
        $config_logo['file_name'] = $this->TrabajosRealizados_model->get_lastId();
        $config_logo['allowed_types'] = 'gif|jpg|png';
        $config_logo['max_size'] = 0;
        $config_logo['max_width'] = 0;
        $config_logo['max_height'] = 0;
        $this->load->library('upload', $config_logo);

        if ($this->form_validation->run() === FALSE || !$this->upload->do_upload('logo_empresa')) {
            $data['image_upload_error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . TRABAJOS_CLASS . '/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->TrabajosRealizados_model->set_TrabajosRealizados();
            $this->abm_status = CREADO_MESSAGE;
            $this->index();
        }
    }

    public function modify() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Modificar ' . TRABAJOS_TITLE;
        $data['folder_name'] = TRABAJOS_CLASS;
        $this->form_validation->set_rules('nombre_empresa', 'Nombre empresa', 'required');
        $this->form_validation->set_rules('url_empresa', 'URL Empresa', 'required');
        $this->form_validation->set_rules('titulo_trabajo', 'Titulo trabajo', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');

        $config_logo['upload_path'] = TRABAJOS_IMAGE_ROUTE;
        $config_logo['file_name'] = $this->TrabajosRealizados_model->get_lastId();
        $config_logo['allowed_types'] = 'gif|jpg|png';
        $config_logo['max_size'] = 0;
        $config_logo['max_width'] = 0;
        $config_logo['max_height'] = 0;
        $this->load->library('upload', $config_logo);
        $this->upload->do_upload('logo_empresa');

        if ($this->form_validation->run() === FALSE) {
            $data['trabajoRealizado_item'] = ($this->input->post('id_trabajoRealizado') !== null) ? $this->TrabajosRealizados_model->get_TrabajosRealizados($this->input->post('id_trabajoRealizado')) : ((is_numeric($this->uri->segment(3, 0))) ? $this->TrabajosRealizados_model->get_TrabajosRealizados($this->uri->segment(3, 0)) : $this->TrabajosRealizados_model->get_TrabajosRealizados($this->uri->segment(4, 0)));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . TRABAJOS_CLASS . '/modify', $data);
            $this->load->view('templates/footer');
        } else {
            $this->TrabajosRealizados_model->update_TrabajosRealizados();
            $this->abm_status = MODIFICADO_MESSAGE;
            $this->index();
        }
    }

    public function delete() {
        $item_id = (is_numeric($this->uri->segment(3, 0))) ? $this->uri->segment(3, 0) : $this->uri->segment(4, 0);
        unlink(TRABAJOS_IMAGE_ROUTE . $item_id . '.png');
        $this->TrabajosRealizados_model->delete_TrabajosRealizados($item_id);
        $this->abm_status = ELIMINADO_MESSAGE;
        $this->index();
    }
}