<?php
class Servicios_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_Servicios($informacion_id = FALSE) {
        if ($informacion_id === FALSE) {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get(SERVICIOS_CLASS);
            return $query->result_array();
        }
        $query = $this->db->get_where(SERVICIOS_CLASS, array('id' => $informacion_id));
        return $query->row_array();
    }

    public function get_Subservicios($informacion_id = FALSE) {
        if ($informacion_id === FALSE) {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get(SUBSERVICIOS_CLASS);
            return $query->result_array();
        }
        $query = $this->db->get_where(SUBSERVICIOS_CLASS, array('id' => $informacion_id));
        return $query->row_array();
    }

    public function get_Servicios_and_Subservicios() {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get(SERVICIOS_CLASS);
            $servicios_array = array();
    foreach ($query->result_array() as $key => $value) {
            $servicios_array[$value['id']] = $value;
            $query = $this->db->get_where(SUBSERVICIOS_CLASS, array('id_servicio' => $value['id']));

            $servicios_array[$value['id']][SUBSERVICIOS_CLASS] = $query->result_array();
            
             }         

      return $servicios_array;  

    }


    public function set_Servicios() {
        $data = array(
            'nombre_servicio' => $this->input->post('nombre_servicio'),
            'descripcion' => $this->input->post('descripcion')
        );
        return $this->db->insert(SERVICIOS_CLASS, $data);
    }

    public function set_Subservicios() {
        $data = array(
            'id_servicio' => $this->input->post('id_servicio'),
            'nombre' => $this->input->post('nombre'),
            'sigla' => $this->input->post('sigla'),
            'descripcion_general' => $this->input->post('descripcion_general'),
            'descripcion_larga' => $this->input->post('descripcion_larga')
        );
        return $this->db->insert(SUBSERVICIOS_CLASS, $data);
    }


    public function update_Servicios() {
        $data = array(
            'id' => $this->input->post('id_servicio'),
            'nombre_servicio' => $this->input->post('nombre_servicio'),
            'descripcion' => $this->input->post('descripcion')
        );
        $this->db->where('id', $data['id']);
        return $this->db->update(SERVICIOS_CLASS, $data);
    }


    public function update_Subservicios() {
        $data = array(
            'id' => $this->input->post('id_subservicio'),
            'id_servicio' => $this->input->post('id_servicio'),
            'nombre' => $this->input->post('nombre'),
            'sigla' => $this->input->post('sigla'),
            'descripcion_general' => $this->input->post('descripcion_general'),
            'descripcion_larga' => $this->input->post('descripcion_larga')
        );
        $this->db->where('id', $data['id']);
        return $this->db->update(SUBSERVICIOS_CLASS, $data);
    }

    public function delete_Servicios($item_id) {
        return $this->db->delete(SERVICIOS_CLASS, array('id' => $item_id));
    }


    public function delete_Subservicios($item_id) {
        return $this->db->delete(SUBSERVICIOS_CLASS, array('id' => $item_id));
    }

    public function get_lastId_Servicios() {
        $last_id = $this->db->query("SELECT MAX(id) AS 'last_id' FROM " . SERVICIOS_CLASS);
        $last_id = $last_id->row_array();
        $last_id = ($last_id['last_id'] === null) ? 1 : $last_id['last_id'] + 1;
        return $last_id;
    }

    public function get_lastId_Subservicios() {
        $last_id = $this->db->query("SELECT MAX(id) AS 'last_id' FROM " . SUBSERVICIOS_CLASS);
        $last_id = $last_id->row_array();
        $last_id = ($last_id['last_id'] === null) ? 1 : $last_id['last_id'] + 1;
        return $last_id;
    }
}