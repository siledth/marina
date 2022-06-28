<?php

class Tarifa_model extends CI_Model {

    //________FUENTE DE FINANCIAMIENTO_____________
    public function get_tarifa() {
        $query = $this->db->get('public.tarifa');
        if (count($query->result()) > 0) {
            return $query->result();
        }
    }

    public function saves($data) {
        return $this->db->insert('public.tarifa', $data);
    }

    public function delete_entry($id) {
        return $this->db->delete('public.tarifa', array('id_tarifa' => $id));
    }

    public function single_tarifa($edit_id_tarifa) {
        $this->db->select('*');
        $this->db->from('public.tarifa');
        $this->db->where('id_tarifa', $edit_id_tarifa);
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }

    public function update_tarifa($data) {
        return $this->db->update('public.tarifa', $data, array('id_tarifa' => $data['id_tarifa']));
    }

    
}
