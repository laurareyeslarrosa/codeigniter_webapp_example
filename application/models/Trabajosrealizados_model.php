<?php
class TrabajosRealizados_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_TrabajosRealizados($informacion_id = FALSE) {
        if ($informacion_id === FALSE) {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get(TRABAJOS_CLASS);
            return $query->result_array();
        }
        $query = $this->db->get_where(TRABAJOS_CLASS, array('id' => $informacion_id));
        return $query->row_array();
    }

    public function set_TrabajosRealizados() {
        $data = array(
            'nombre_empresa' => $this->input->post('nombre_empresa'),
            'url_empresa' => $this->input->post('url_empresa'),
            'titulo_trabajo' => $this->input->post('titulo_trabajo'),
            'descripcion' => $this->input->post('descripcion')
        );
        return $this->db->insert(TRABAJOS_CLASS, $data);
    }

    public function update_TrabajosRealizados() {
        $data = array(
            'id' => $this->input->post('id_trabajoRealizado'),
            'nombre_empresa' => $this->input->post('nombre_empresa'),
            'url_empresa' => $this->input->post('url_empresa)'),
            'titulo_trabajo' => $this->input->post('titulo_trabajo'),
            'descripcion' => $this->input->post('descripcion')
        );
        $this->db->where('id', $data['id']);
        return $this->db->update(TRABAJOS_CLASS, $data);
    }

    public function delete_TrabajosRealizados($item_id) {
        return $this->db->delete(TRABAJOS_CLASS, array('id' => $item_id));
    }

    public function get_lastId() {
        $last_id = $this->db->query("SELECT MAX(id) AS 'last_id' FROM " . TRABAJOS_CLASS);
        $last_id = $last_id->row_array();
        $last_id = ($last_id['last_id'] === null) ? 1 : $last_id['last_id'] + 1;
        return $last_id;
    }
}