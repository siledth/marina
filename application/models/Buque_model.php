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

		public function save_buque($buque, $tripulacion, $propietarios){
           // print_r($buque);die;
                $quers =$this->db->insert('public.buque',$buque);

                if ($quers) {
                    $id = $this->db->insert_id();
                    $cant_proy = $tripulacion['cedulat'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {
                        $data1 = array(
                            'id_buque'              => $id,
                            'cedulat'   		    => $tripulacion['cedulat'][$i],
                            'tipo_cedt'          	=> $tripulacion['tipo_cedt'][$i],
                            'nombrecomt'           	=> $tripulacion['nombrecomt'][$i],
                            'tele_1t' 	            => $tripulacion['tele_1t'][$i],
                            'cargot' 	            => $tripulacion['cargot'][$i],
                            'matricula'             => $tripulacion['matricula'],  
                        );
                        $this->db->insert('public.tripulacion',$data1);
                    }

                    $cant_pff = $propietarios['cedula'];
                    $count_pff = count($cant_pff);

                    for ($i=0; $i < $count_pff; $i++) {
                        $data2 = array(
                            'id_buque'              => $id,
                            'cedula'   		        => $propietarios['cedula'][$i],
                            'tipo_ced'          	=> $propietarios['tipo_ced'][$i],
                            'nombrecom'             => $propietarios['nombrecom'][$i],
                            'tele_1' 	            => $propietarios['tele_1'][$i],
                            'email' 	            => $propietarios['email'][$i],
                            'tipo' 	            	=> $propietarios['tipo'][$i],
                            'matricula'             => $propietarios['matricula'],
                        );
                        $this->db->insert('public.propiet',$data2);
                    }
                }
                return true;
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
