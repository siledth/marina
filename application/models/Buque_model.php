<?php
    class Buque_model extends CI_model{
        //consultar para desincorporar
        public function consultar_embarcaci($data){
            $this->db->select('m.matricula');
            $this->db->from('public.buque m');
            $this->db->join('public.mensualidad mc', 'm.matricula = mc.matricula', 'left');
            $this->db->where('m.matricula', $data['matricula']);
            $this->db->order_by('m.id desc');
            $query = $this->db->get();
            $resultado = $query->row_array();
            return $resultado;
	    }
        //  REVISA ESTO Y QUE ME SUGIERES, AHI ME MUESTRA SOLO LAS QUE ESTEN EN ESTATUS 2(PAGADO) PARA PODER DESINCORPORAR
        //LA CUESTION ES QUE DEBEN DE TENER TODO PAGO A LA FECHA, SI DEBEN ALGUNA MENSUALIDAD NO SE PUEDE EXONERAR.
        // COMO PLANTEO ESA EXECION ?
        public function get_desin() {
            $this->db->select('b.id,b.matricula, b.nombrebuque, e.id_status, b.observacion, b.fecha_desincorporacion,desincorporar');
            $this->db->from('public.buque b');
            $this->db->join('mensualidad e', 'e.matricula = b.matricula', 'left');
            $this->db->where('e.id_status =', '2');
            $this->db->group_by("b.matricula, b.nombrebuque, e.id_status, b.fecha_desincorporacion, b.observacion,b.id,desincorporar");
           $this->db->order_by('fecha_desincorporacion asc');
            $query = $this->db->get();
            if (count($query->result()) > 0) {
                return $query->result();
            }
        }
        public function single_desin($edit_id) {
            $this->db->select('*');
            $this->db->from('public.buque');

            $this->db->where('id', $edit_id);
            $query = $this->db->get();
            if (count($query->result()) > 0) {
                return $query->row();
            }
        }
        public function update_desin($data) {
            return $this->db->update('public.buque', $data, array('id' => $data['id']));
        }
    

	//CRUP BANCO
		function consultar_buque(){
			$this->db->select('*');
			$this->db->from('public.buque');
			$this->db->order_by("nombrebuque", "Asc");
			$query = $this->db->get();
			return $query->result_array();
		}

		public function save_buque($buque, $tripulacion, $propietarios){
            $this->db->select('max(e.id) as id');
            $query = $this->db->get('public.buque e');
            $response3 = $query->row_array();
            $id = $response3['id'] + 1 ;
            $buque1 = array(

                'id'=> $id,
                'nombrebuque'=> $buque['nombrebuque'],
                'matricula'=> $buque['matricula'],
                'trailer'=> $buque['trailer'],
                'pies'=> $buque['pies'],
                'tipo'=> $buque['tipo'],
                'color'=> $buque['color'],
                'eslora'=> $buque['eslora'],
                'manga'=> $buque['manga'],
                'puntal'=> $buque['puntal'],
                'bruto'=> $buque['bruto'],
                'neto'=> $buque['neto'],
                'canon'=> $buque['canon'],
                'tarifa'=> $buque['tarifa'],
                'dia' => $buque['dia'],
                'ubicacion'=> $buque['ubicacion'],
                'fechaingreso'=> $buque['fechaingreso'],
                'fecha_pago' => $buque['fecha_pago'],
                'id_tarifa'=> $buque['id_tarifa'],
                'desincorporar' => $buque['desincorporar'],


                
            );         
            $quers =$this->db->insert('public.buque',$buque1);

                if ($quers) {

                    $id = $id;
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
                           // 'email' 	            => $propietarios['email'][$i],
                            'autor' 	            => $tripulacion['autor'][$i],
                            
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

        public function editar_programacion_proy_o($buque, $tripulacion, $propietarios,$matricula,$id_buque){

            $this->db->where('matricula', $matricula);
           // $this->db->where('id_p_proyecto', $id_p_proyecto);
            $update = $this->db->update('public.buque', $buque);

            if ($update){
                $this->db->where('matricula', $matricula);
               // $this->db->where('id_p_acc', 0);
                $this->db->delete('public.tripulacion');	
                    $cant_proy = $tripulacion['cedulat'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {
                        $data_inf = array(
                          //  'id_buque'              => $id,
                            'cedulat'   		    => $tripulacion['cedulat'][$i],
                            'tipo_cedt'          	=> $tripulacion['tipo_cedt'][$i],
                            'nombrecomt'           	=> $tripulacion['nombrecomt'][$i],
                            'tele_1t' 	            => $tripulacion['tele_1t'][$i],
                            'cargot' 	            => $tripulacion['cargot'][$i],
                          //  'email' 	            => $propietarios['email'][$i],
                            'autor' 	            => $tripulacion['autor'][$i],
                            
                            'matricula'             => $tripulacion['matricula'],
                            'id_buque'             => $id_buque
                            
                        );
                        $this->db->insert('public.tripulacion',$data_inf);
                    }

                    $this->db->where('matricula', $matricula);
                   // $this->db->where('id_p_acc', 0);
                    $this->db->delete('public.propiet');

                    $cant_pff = $propietarios['cedula'];
                    $count_pff = count($cant_pff);

                    for ($i=0; $i < $count_pff; $i++) {

                        $data2 = array(
                          //  'id_buque'              => $id,
                            'cedula'   		        => $propietarios['cedula'][$i],
                            'tipo_ced'          	=> $propietarios['tipo_ced'][$i],
                            'nombrecom'             => $propietarios['nombrecom'][$i],
                            'tele_1' 	            => $propietarios['tele_1'][$i],
                            'email' 	            => $propietarios['email'][$i],
                            'tipo' 	            	=> $propietarios['tipo'][$i],
                            'matricula'             => $propietarios['matricula'],
                            'id_buque'             => $id_buque
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
