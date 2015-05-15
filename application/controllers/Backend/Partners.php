<?php
include APPPATH . 'controllers/Backend/Backend.php';

class Partners extends Backend {

    private $abm_status;

    public function __construct() {
        parent::__construct();
    //    $this->load->helper(array('url'));
        $this->load->model('Partners_model');
    }

    public function index() {
        $data['partners_array'] = $this->Partners_model->get_Partners();
        $data['title'] = PARTNERS_CLASS;
        $data['folder_name'] = PARTNERS_CLASS;
        $data['abm_status'] = $this->abm_status;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/index_title_container', $data);
        $this->load->view('templates/menu_backend');
        $this->load->view('Backend/' . PARTNERS_CLASS . '/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Agregar ' . PARTNERS_CLASS;
        $data['folder_name'] = PARTNERS_CLASS;
        $this->form_validation->set_rules('nombre_empresa', 'nombre_empresa', 'required');
        $this->form_validation->set_rules('url_empresa', 'url_empresa', 'required');

        $config['upload_path'] = PARTNERS_IMAGE_ROUTE;
        $config['file_name'] = $this->Partners_model->get_lastId();
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        if ($this->form_validation->run() === FALSE || !$this->upload->do_upload('logo_empresa')) {
            $data['image_upload_error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . PARTNERS_CLASS . '/create', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Partners_model->set_Partners();
            $this->abm_status = CREADO_MESSAGE;
            $this->index();
        }
    }

    public function modify() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Modificar ' . PARTNERS_CLASS;
        $data['folder_name'] = PARTNERS_CLASS;
        $this->form_validation->set_rules('nombre_empresa', 'nombre_empresa', 'required');
        $this->form_validation->set_rules('url_empresa', 'url_empresa', 'required');

        $config['upload_path'] = PARTNERS_IMAGE_ROUTE;
        $config['file_name'] = $this->input->post('id_empresa');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        $this->upload->do_upload('logo_empresa');
        if ($this->form_validation->run() === FALSE) {
            $data['Partners_item'] = ($this->input->post('id_empresa') !== null) ? $this->Partners_model->get_Partners($this->input->post('id_empresa')) : ((is_numeric($this->uri->segment(3, 0))) ? $this->Partners_model->get_Partners($this->uri->segment(3, 0)) : $this->Partners_model->get_Partners($this->uri->segment(4, 0)));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . PARTNERS_CLASS . '/modify', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Partners_model->update_Partners();
            $this->abm_status = MODIFICADO_MESSAGE;
            $this->index();
        }
    }

    public function delete() {
        $item_id = (is_numeric($this->uri->segment(3, 0))) ? $this->uri->segment(3, 0) : $this->uri->segment(4, 0);
        unlink(PARTNERS_IMAGE_ROUTE . $item_id . '.png');  
        $this->Partners_model->delete_Partners($item_id);
        $this->abm_status = ELIMINADO_MESSAGE;
        $this->index();
    }
}