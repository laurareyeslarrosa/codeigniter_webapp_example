<?php
include APPPATH . 'controllers/Backend/Backend.php';

class Servicios extends Backend {

    private $abm_status;

    public function __construct() {
        parent::__construct();
        $this->access_auth();
  //      $this->load->helper(array('url'));
        $this->load->model('servicios_model');
    }

    public function index() {
        $data['servicios_array'] = $this->servicios_model->get_Servicios_and_Subservicios();
        $data['title'] = SERVICIOS_CLASS;
        $data['folder_name'] = SERVICIOS_CLASS;
        $data['abm_status'] = $this->abm_status;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/index_title_container', $data);
        $this->load->view('templates/menu_backend');
        $this->load->view('Backend/' . SERVICIOS_CLASS . '/index', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Agregar ' . SERVICIOS_CLASS;
        $data['folder_name'] = SERVICIOS_CLASS;
        $this->form_validation->set_rules('nombre_servicio', 'Nombre servicio', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
        $lastId = $this->servicios_model->get_lastId_Servicios();


        if ($this->form_validation->run() === FALSE) {
                 $data['image_upload_error'] = '';
               
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu_backend');
                $this->load->view('Backend/' . SERVICIOS_CLASS . '/create', $data);
                $this->load->view('templates/footer');
        }
        else
        {
            $config['upload_path'] = SERVICIOS_IMAGE_ROUTE_ICON;
            $config['file_name'] = $lastId;
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 0;
            $config['max_width'] = 0;
            $config['max_height'] = 0;         
            $this->load->library('upload', $config);
           if (!$this->upload->do_upload('imagenIcono')) {
                $data['image_upload_error'] = $this->upload->display_errors();
          
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu_backend');
                $this->load->view('Backend/' . SERVICIOS_CLASS . '/create', $data);
                $this->load->view('templates/footer');
        }
        else 


        {
            $config['upload_path'] = SERVICIOS_IMAGE_ROUTE;
            
            $this->upload->initialize($config);
        
            if ($this->form_validation->run() === FALSE || !$this->upload->do_upload('imagenInicio')) {
                $data['image_upload_error'] = $this->upload->display_errors();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/menu_backend');
                $this->load->view('Backend/' . SERVICIOS_CLASS . '/create', $data);
                $this->load->view('templates/footer');
            } else {
                $this->servicios_model->set_Servicios();
                $this->abm_status = CREADO_MESSAGE;
                $this->index();
            }            
        }
    
        }
    }


    public function create_subservice() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Agregar ' . SUBSERVICIOS_CLASS;
        $data['folder_name'] = SERVICIOS_CLASS;

        $data['servicios_array'] = $this->servicios_model->get_Servicios();



 //           'id_servicio' => $this->input->post('id_servicio'),
 

        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('sigla', 'Sigla', 'required');
        $this->form_validation->set_rules('descripcion_general', 'Descripcion general', 'required');
        $this->form_validation->set_rules('descripcion_larga', 'Descripcion larga', 'required');
        $lastId = $this->servicios_model->get_lastId_Subservicios();

        $config['upload_path'] = SUBSERVICIOS_IMAGE_ROUTE;
        $config['file_name'] = $lastId;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        if ($this->form_validation->run() === FALSE || !$this->upload->do_upload('logo_subservicio')) {
            $data['image_upload_error'] = $this->upload->display_errors();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . SERVICIOS_CLASS . '/create_subservice', $data);
            $this->load->view('templates/footer');
        } else {
            $this->servicios_model->set_Subservicios();
            $this->abm_status = CREADO_MESSAGE;
            $this->index();
        }
    }

    public function modify() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Modificar ' . SERVICIOS_CLASS;
        $data['folder_name'] = SERVICIOS_CLASS;
        $this->form_validation->set_rules('nombre_servicio', 'Nombre servicio', 'required');
        $this->form_validation->set_rules('descripcion', 'Descripcion', 'required');
        $config['upload_path'] = SERVICIOS_IMAGE_ROUTE_ICON;
        $config['file_name'] = $this->input->post('id_servicio');
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 0;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $this->load->library('upload', $config);
        $this->upload->do_upload('imagenIcono');  
        $config['upload_path'] = SERVICIOS_IMAGE_ROUTE;
        $this->upload->initialize($config);
        $this->upload->do_upload('imagenInicio');
        if ($this->form_validation->run() === FALSE) {
            $data['servicios_item'] = ($this->input->post('id_servicio') !== null) ? $this->servicios_model->get_Servicios($this->input->post('id_servicio')) : ((is_numeric($this->uri->segment(3, 0))) ? $this->servicios_model->get_Servicios($this->uri->segment(3, 0)) : $this->servicios_model->get_Servicios($this->uri->segment(4, 0)));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . SERVICIOS_CLASS . '/modify', $data);
            $this->load->view('templates/footer');
        } else {
            $this->servicios_model->update_Servicios();
            $this->abm_status = MODIFICADO_MESSAGE;
            $this->index();
        }
    }



    public function modify_subservice() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Modificar ' . SERVICIOS_CLASS;
        $data['folder_name'] = SERVICIOS_CLASS;
        $data['servicios_array'] = $this->servicios_model->get_Servicios();
        $this->form_validation->set_rules('nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('sigla', 'Sigla', 'required');
        $this->form_validation->set_rules('descripcion_general', 'Descripcion general', 'required');
        $this->form_validation->set_rules('descripcion_larga', 'Descripcion larga', 'required');
        $config_logo['upload_path'] = SUBSERVICIOS_IMAGE_ROUTE;
        $config_logo['file_name'] = $this->input->post('id_subservicio');
        $config_logo['allowed_types'] = 'gif|jpg|png';
        $config_logo['max_size'] = 0;
        $config_logo['max_width'] = 0;
        $config_logo['max_height'] = 0;
        $this->load->library('upload', $config_logo);
        $this->upload->do_upload('logo_subservicio');
        if ($this->form_validation->run() === FALSE) {
            $data['subservicios_item'] = ($this->input->post('id_subservicio') !== null) ? $this->servicios_model->get_Subservicios($this->input->post('id_subservicio')) : ((is_numeric($this->uri->segment(3, 0))) ? $this->servicios_model->get_Subservicios($this->uri->segment(3, 0)) : $this->servicios_model->get_Subservicios($this->uri->segment(4, 0)));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu_backend');
            $this->load->view('Backend/' . SERVICIOS_CLASS . '/modify_subservice', $data);
            $this->load->view('templates/footer');
        } else {
            $this->servicios_model->update_Subservicios();
            $this->abm_status = MODIFICADO_MESSAGE;
            $this->index();
        }
    }

    public function delete() {
        $item_id = (is_numeric($this->uri->segment(3, 0))) ? $this->uri->segment(3, 0) : $this->uri->segment(4, 0);
        unlink(SERVICIOS_IMAGE_ROUTE_ICON . $item_id . '.png');
        unlink(SERVICIOS_IMAGE_ROUTE . $item_id . '.png');
        $this->servicios_model->delete_Servicios($item_id);
        $this->abm_status = ELIMINADO_MESSAGE;
        $this->index();
    }


    public function delete_subservice() {
        $item_id = (is_numeric($this->uri->segment(3, 0))) ? $this->uri->segment(3, 0) : $this->uri->segment(4, 0);
        unlink(SUBSERVICIOS_IMAGE_ROUTE . $item_id . '.png');
        $this->servicios_model->delete_Subservicios($item_id);
        $this->abm_status = ELIMINADO_MESSAGE;
        $this->index();
    }
}