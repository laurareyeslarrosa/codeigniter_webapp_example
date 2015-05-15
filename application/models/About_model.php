<?php
class About_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_AboutText() {
        $query = $this->db->get(ABOUT_CLASS);
        return $query->row_array();
    }

    public function update_AboutText() {
        $data = array(
            'id' => $this->input->post('id_about'),
            'texto' => $this->input->post('text_about')
        );
        $this->db->where('id', $data['id']);
        return $this->db->update(ABOUT_CLASS, $data);
    }
}