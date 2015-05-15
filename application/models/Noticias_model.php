<?php
class Noticias_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_Noticias($noticia_id = FALSE) {
        if ($noticia_id === FALSE) {
            $this->db->order_by('id', 'DESC');
            $query = $this->db->get(NOTICIAS_CLASS);
            return $query->result_array();
        }
        $query = $this->db->get_where(NOTICIAS_CLASS, array('id' => $noticia_id));
        return $query->row_array();
    }

    public function set_Noticia() {
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'descripcion' => $this->input->post('descripcion')
        );
        return $this->db->insert(NOTICIAS_CLASS, $data);
    }

    public function update_Noticia() {
        $data = array(
            'id' => $this->input->post('id_noticia'),
            'titulo' => $this->input->post('titulo'),
            'descripcion' => $this->input->post('descripcion')
        );
        $this->db->where('id', $data['id']);
        return $this->db->update(NOTICIAS_CLASS, $data);
    }

    public function delete_Noticia($item_id) {
        return $this->db->delete(NOTICIAS_CLASS, array('id' => $item_id));
    }
}