<?php
class Usuarios_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_Usuarios($informacion_id = FALSE) {
        if ($informacion_id === FALSE) {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get(USUARIOS_CLASS);
            return $query->row_array();
        }
        $query = $this->db->get_where(USUARIOS_CLASS, array('id' => $informacion_id));
        return $query->row_array();
    }

    public function get_Usuario_credentials() {  
        $data = array(
            'usuario' => $this->input->post('nombre_usuario')
        );
        $query = $this->db->get_where(USUARIOS_CLASS, $data);
        return $query->row_array();
    }

    public function update_Usuarios() {
        $data = array(
            'id' => $this->input->post('id_usuario'),
            'usuario' => $this->input->post('nombre_usuario'),
            'password' => hash('sha512', $this->input->post('password'))
        );
        $this->db->where('id', $data['id']);
        return $this->db->update(USUARIOS_CLASS, $data);
    }
}