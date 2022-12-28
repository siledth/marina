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
        $this->db->select('max(e.id_tarifa) as id');// esto busca el ultimo numero en la tabla 
        $query = $this->db->get('public.tarifa e');
        $response3 = $query->row_array();
        $id = $response3['id'] + 1 ; // aca al ultimo numero le sumo 1 para que sea el id 


        $datos2 = array(

            'id_tarifa'=> $id,
            'desc_concepto'=> $data['desc_concepto'],
            'desc_condicion'=> $data['desc_condicion'],
            'desc_tarifa'=> $data['desc_tarifa'],
            'des_unidad'=> $data['des_unidad'],
            'fecha'=> $data['fecha']            
        );         

        return $this->db->insert('public.tarifa', $datos2);
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
