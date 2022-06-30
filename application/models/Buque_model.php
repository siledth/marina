<?php
    class Buque_model extends CI_model{

	//CRUP BANCO
		function consultar_buque(){
			$this->db->select('*');
			$this->db->from('public.buque');
			$this->db->order_by("nombrebuque", "Asc");
			$query = $this->db->get();
			return $query->result_array();
		}
        function consulta_tc($data){
			$this->db->select('*');
			$this->db->from('public.buque');
			$this->db->where('id', $data['id']);
			$this->db->order_by("id", "Asc");
			$query = $this->db->get();
			if (count($query->result()) > 0) {
				return $query->row();
			}
		}

		function editar_tc($data){
			$this->db->where('id', $data['id']);
			$update = $this->db->update('public.buque', $data);
			return true;
		}
		//ELIMAR
		function eliminar_tc($data){
			$this->db->where('matricula', $data['matricula']);
			$query = $this->db->delete('public.buque');
			return true;
		}
		
	
	}
?>
