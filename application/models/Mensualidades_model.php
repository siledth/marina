<?php
    class Mensualidades_model extends CI_model{

	//CRUP BANCO
		function generar($date){
            //consulto los buques que tengan el día y el mes en ejecución
			$this->db->select('*');
            $this->db->where("TO_CHAR(fecha_pago,'DD')", $date);
			$this->db->from('public.buque');
			$this->db->order_by("nombrebuque", "Asc");
			$query = $this->db->get();
            $resultado = $query->result_array();
            //print_r($resultado);die;
            //Los cuento :D
            $count_pff = count($resultado);
            for ($i=0; $i < $count_pff; $i++) {
                foreach ($resultado as $key){
                    $matricula = $key['matricula'];
                    $fecha_pago_c =  date('d-m');
                    //Consulto que ya no esten registrados en la tabla de mensualidad para no repetir :X
                    $this->db->select('*');
                    $this->db->where('matricula', $matricula);
                    $this->db->where("TO_CHAR(fecha_deuda,'DD-MM')",  $fecha_pago_c);
                    $this->db->from('public.mensualidad');
                    $query = $this->db->get();
                    $resultado = $query->result_array();
                    if ($resultado != Array ( )) {
                       echo 'nop';
                    }else {
                        $fecha_pago = $key['fecha_pago'];
                        $fecha_pago = explode('-',$fecha_pago);
                        $dia = $fecha_pago['2'];
                        if ($dia == $date){
                            //Hacer consulta para verificar que no exista
                                $data_mens = array(
                                    'matricula'    => $key['matricula'],
                                    'pies'         => $key['pies'],
                                    'id_tarifa'    => $key['id_tarifa'],
                                    'tarifa'       => $key['tarifa'],
                                    'dia'          => $key['dia'],
                                    'canon'        => $key['canon'],
                                    'fecha_deuda'  => date('Y-m-d'),
                                    'id_status'    => 0,
                                    'fecha_update' => date('Y-m-d'),
                                    'id_factura'   => 0
                                );
                            $this->db->insert('public.mensualidad',$data_mens);
                        }  
                    }
                }
                return true;
            } 
            return true;
		}  

        public function ver_deudas(){
            $this->db->select('m.id_mensualidad,
                                m.matricula,
                                b.nombrebuque,
                                m.canon,
                                m.fecha_deuda,
                                m.id_status,
                                m.id_factura,
                                e.descripcion');
                        $this->db->from('public.mensualidad m');
                        $this->db->join('buque b', 'b.matricula = m.matricula ', 'left');
                        $this->db->join('estatus e', 'e.id_status = m.id_status', 'left');
                        $this->db->order_by("m.id_mensualidad", "Asc");
                        $query = $this->db->get();
                        $resultado = $query->result_array();
            return $resultado;
        }

        public function consultar_mens($data){
            $this->db->select('*');
            $this->db->from('public.mensualidad m');
            $this->db->join('buque b', 'b.matricula = m.matricula ', 'left');
            $this->db->join('estatus e', 'e.id_status = m.id_status', 'left');
            $this->db->where('id_mensualidad', $data['id_mensualidad']);
            $this->db->order_by("m.id_mensualidad", "Asc");
            $query = $this->db->get();
            $resultado = $query->row_array();
            return $resultado;
	    }
	}
?>
