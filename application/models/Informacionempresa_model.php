<?php
class InformacionEmpresa_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_InformacionEmpresa($informacion_id = FALSE) {
        if ($informacion_id === FALSE) {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get(INFORMACION_CLASS);
            return $query->result_array();
        }
        $query = $this->db->get_where(INFORMACION_CLASS, array('id' => $informacion_id));
        return $query->row_array();
    }

    public function set_InformacionEmpresa() {
        $data = array(
            'titulo' => $this->input->post('title_informacion'),
            'descripcion' => $this->input->post('description_informacion')
        );
        return $this->db->insert(INFORMACION_CLASS, $data);
    }

    public function update_InformacionEmpresa() {
        $data = array(
            'id' => $this->input->post('id_informacion'),
            'titulo' => $this->input->post('title_informacion'),
            'descripcion' => $this->input->post('description_informacion')
        );
        $this->db->where('id', $data['id']);
        return $this->db->update(INFORMACION_CLASS, $data);
    }

    public function delete_InformacionEmpresa($item_id) {
        return $this->db->delete(INFORMACION_CLASS, array('id' => $item_id));
    }
}