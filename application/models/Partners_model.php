<?php
class Partners_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_Partners($partners_id = FALSE) {
        if ($partners_id === FALSE) {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get(PARTNERS_CLASS);
            return $query->result_array();
        }
        $query = $this->db->get_where(PARTNERS_CLASS, array('id' => $partners_id));
        return $query->row_array();
    }

    public function set_Partners() {
        $data = array(
            'nombre_empresa' => $this->input->post('nombre_empresa'),
            'url_empresa' => $this->input->post('url_empresa')
        );
        return $this->db->insert(PARTNERS_CLASS, $data);
    }

    public function update_Partners() {
        $data = array(
            'id' => $this->input->post('id_empresa'),
            'nombre_empresa' => $this->input->post('nombre_empresa'),
            'url_empresa' => $this->input->post('url_empresa')
        );
        $this->db->where('id', $data['id']);
        return $this->db->update(PARTNERS_CLASS, $data);
    }

    public function delete_Partners($item_id) {
        return $this->db->delete(PARTNERS_CLASS, array('id' => $item_id));
    }

    public function get_lastId() {
        $last_id = $this->db->query("SELECT MAX(id) AS 'last_id' FROM " . PARTNERS_CLASS);
        $last_id = $last_id->row_array();
        $last_id = ($last_id['last_id'] === null) ? 1 : intval($last_id['last_id']) + 1;
        return $last_id;
    }
}