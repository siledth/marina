<?php
    class Mensualidades_model extends CI_model{
        public function cons_nro_notapago(){
            $this->db->select('nro_factura,id_status');
            $this->db->where("id_status", 2);
            $this->db->order_by('nro_factura desc');
            $query = $this->db->get('public.mensualidad');
            $response = $query->row_array();
            return $response;
        }
        public function cons_nro_adelantos(){
            $this->db->select('nro_factura,id_status');
            $this->db->where("id_status", 2);
            $this->db->order_by('nro_factura desc');
            $query = $this->db->get('public.mensualidad');
            $response = $query->row_array();
            return $response;
        } 

        function ver_banco(){
            $this->db->select('*');
            $this->db->from('public.banco');
            $query = $this->db->get();
            $resultado = $query->result_array();
            return $resultado;
        }
        ///modifique
        function ver_tipPago(){
            $this->db->select('*');
            $this->db->from('public.tipopago');
            $this->db->order_by('id_tipo_pago asc');
            $query = $this->db->get();
            $resultado = $query->result_array();
            return $resultado;
        }
        
        function generar($date){
            //consulto los buques que tengan el día y el mes en ejecución
			$this->db->select('matricula, fecha_pago, pies, id_tarifa, tarifa, dia, canon,desincorporar'); ///esto agregue desincorporar
            $this->db->where("TO_CHAR(fecha_pago,'DD')", $date);
            $this->db->where("desincorporar", 1);
			$this->db->from('public.buque');
			$this->db->order_by("nombrebuque", "Asc");
			$query = $this->db->get();
            $resultado = $query->result_array();
            //
            //Los cuento :D
            $count_pff = count($resultado);
            for ($i=0; $i < $count_pff; $i++) {
                foreach ($resultado as $key){
                    $matricula = $key['matricula'];
                    $fecha_pago_c =  date('Y-m-d');
                    //print_r($fecha_pago_c);die;
                    //Consulto que ya no esten registrados en la tabla de mensualidad para no repetir :X
                    $this->db->select('matricula, fecha_deuda');
                    $this->db->where('matricula', $matricula);
                    $this->db->where("fecha_deuda",  $fecha_pago_c);
                    $this->db->from('public.mensualidad');
                    $query = $this->db->get();
                    $resultado = $query->result_array();
                    //Si es diferente a un array vacio,realizara el ingreso
                    if ($resultado != Array ( )) {
                       //return 'nop';
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
                                    'id_factura'   => 0,
                                    'nro_factura'   => 0 //agregue esto fue lo unico para que la nota de entega llevara un correlativo
                                );
                            $query = $this->db->insert('public.mensualidad',$data_mens);
                            if ($query) {
                                $id_mensualidad = $this->db->insert_id();

                                $this->db->select('*');
                                $this->db->from('public.dolar');
                                $query = $this->db->get();
                                $resultado = $query->row_array();
                            
                                $id_dolar = $resultado['id_dolar'];
                                $dolar = $resultado['desc_dolarc'];
                                
                                $canon = $key['canon'];
                                $canonn = str_replace(".", "", $canon);

                                $valor = $canonn / $dolar;
                                $valor_bs = round($valor, 2);

                                $data_mov = array(
                                    'id_mensualidad'    => $id_mensualidad,
                                    'id_tipo_pago'      => 0,
                                    'nro_referencia'    => '',
                                    'total_ant_d'       => '0',
                                    'id_dolar'          => $id_dolar,
                                    'valor'             => $dolar,
                                    'total_ant_bs'      => '0',
                                    'total_abonado_bs'  => '0',
                                    'total_abonado_om'  => '0',
                                    'restante_bs'       => $valor_bs,
                                    'restante_om'       => $canon,
                                    'id_user'           => $this->session->userdata('id_user'),
                                    'id_estatus'        => 0
                                );
                                $this->db->insert('public.mov_consig',$data_mov);
                            }  
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
                        $this->db->order_by("m.id_mensualidad", "desc");
                        $query = $this->db->get();
                        $resultado = $query->result_array();
            return $resultado;
        }

        public function consultar_mens($data){
            $this->db->select('m.id_mensualidad,
                                m.matricula,
                                m.pies,
                                m.dia,
                                m.id_tarifa,
                                mc.restante_om canon,
                                mc.id_dolar,
                                mc.valor');
            $this->db->from('public.mensualidad m');
            $this->db->join('mov_consig mc', 'm.id_mensualidad = mc.id_mensualidad', 'left');
            $this->db->where('m.id_mensualidad', $data['id_mensualidad']);
            $this->db->order_by('mc.id_mov_consig desc');
            $query = $this->db->get();
            $resultado = $query->row_array();
            return $resultado;
	    }

        public function consultar_dol($data){
            $this->db->select('*');
            $this->db->from('public.dolar');
            $query = $this->db->get();
            $resultado = $query->row_array();
            return $resultado;
	    }

        public function guardar_proc_pag($data){
            if ($data['total_bs_pag'] == '0') {
                $id_estatus = 2;
            }else {
                $id_estatus = 3;
            }  

            if ($data['fechatrnas'] == '') {
                $fecha_tranfer = date('Y-m-d');
            }else{
                $fecha_tranfer = $data['fechatrnas'];
            }
            
            $this->db->select('id_mensualidad as id');
            $this->db->where('e.id_mensualidad', $data['id_mesualidad_ver']);
            $query = $this->db->get('public.mensualidad e');
            $response = $query->row_array();
            if ($response){
                $id = $response['id']+ 0;
            
            $data1 = array('id_mensualidad'     => $data['id_mesualidad_ver'],
                            'id_tipo_pago'      => $data['id_tipo_pago'],
                            'nro_referencia'    => $data['nro_referencia'],
                            'id_banco'          => $data['id_banco'],
                            'fechatrnas'        => $fecha_tranfer,
                            'total_ant_d'       => $data['canon'],
                            'id_dolar'          => $data['id_dolar'],
                            'valor'             => $data['dolar'],
                            'total_ant_bs'      => $data['bs'],
                            'total_abonado_bs'  => $data['cantidad_pagar_bs'],
                            'total_abonado_om'  => $data['cantidad_pagar_otra'],
                            'restante_bs'       => $data['total_bs_pag'],
                            'restante_om'       => $data['total_otra'],
                            'id_user'           => $this->session->userdata('id_user'),
                            'id_estatus'        => $id_estatus
                        );
            $x = $this->db->insert('mov_consig',$data1);
            //aca modifique
            $data1 = array('id_status' => $id_estatus,
                            'fecha_update' => date('Y-m-d h:i:s'),
                            'nro_factura' => $data['numfact'],
                            'nota' => $data['nota'],
                            'fechapago' => $data['fechapago'],
                        );
                            
            $this->db->where('id_mensualidad', $data['id_mesualidad_ver']);
            $update = $this->db->update('mensualidad', $data1);

            //return true;
            return $id;
        }
        } 

        public function ver_nota($data){
            $this->db->select("m.matricula,
                                m.nro_factura,
                                b.nombrebuque,
                                concat(p.tipo_ced,'-', p.cedula) cedula,
                                p.nombrecom,
                                p.tele_1,
                                m.pies,
                                m.id_tarifa,
                                m.tarifa,
                                m.fecha_deuda,
                                m.dia,
                                m.canon,
                                m.nota,
                                m.id_status,
                                m.fechapago,
                                e.descripcion estatus");
            $this->db->from('public.mensualidad m');
            $this->db->join('buque b', 'b.matricula = m.matricula', 'left');
            $this->db->join('propiet p', 'p.id_buque = b.id', 'left');
            $this->db->join('estatus e', 'e.id_status = m.id_status', 'left');
            $this->db->where('m.id_mensualidad', $data);
            $this->db->where('p.tipo', 'principal');
            $query = $this->db->get();
            $resultado = $query->row_array();
            return $resultado;
        }

        public function ver_pagos($data){
            $this->db->select('mc.*,
                               tp.id_tipo_pago as pago,
                               tp.descripcion');
            $this->db->from('mov_consig mc');
            $this->db->where('mc.id_mensualidad', $data);
            $this->db->where('mc.id_tipo_pago !=', '0');
            $this->db->join('tipopago tp', 'mc.id_tipo_pago = tp.id_tipo_pago ', 'left');
            $query = $this->db->get();
            $resultado = $query->result_array();
            return $resultado;
        }

        public function listar_info($data){
            $this->db->select("b.id,
                                concat(p.tipo_ced, '-',p.cedula) as cedula,
                                p.nombrecom,
                                p.tele_1,
                                b.pies,
                                b.dia,
                                b.id_tarifa,
                                t.desc_concepto,
                                t.desc_tarifa,
                                b.canon");
            $this->db->join('propiet p', 'p.id_buque = b.id', 'left');
            $this->db->join('tarifa t', 't.id_tarifa = b.id_tarifa', 'left');
            $this->db->where('b.matricula', $data['matricular']);
            $this->db->where('p.tipo', 'principal');
            $query = $this->db->get('buque b');
            return $query->row_array();
        }

        public function guardar_adelanto_pag($data){
            $this->db->select('*');
            $this->db->from('public.mensualidad m');
            $this->db->where('matricula', $data['matricular']);
            $this->db->order_by('id_mensualidad desc');
			$query = $this->db->get();
            $resultado = $query->row_array();
            
            if($resultado != '') {
                
                $fecha_deuda = $resultado['fecha_deuda'];
                $fecha_deudas = explode('-',$fecha_deuda);
                $dia = $fecha_deuda['2'];
                $anio = $fecha_deuda['0'];
                $fecha_f_deuda = date("Y-m-d",strtotime($fecha_deuda."+ 1 month"));

                if ($data['total_bs_pag_a'] == '0') {
                    $id_estatus = 2;
                }else {
                    $id_estatus = 3;
                }  
                $data_mens = array(
                        'matricula'    => $data['matricular'],
                        'pies'         => $data['pies_a'],
                        'id_tarifa'    => $data['id_tarifa_a'],
                        'tarifa'       => $data['tarifa_a1'],
                        'dia'          => $data['dias_a'],
                        'canon'        => $data['canon_a'],
                        'fecha_deuda'  => $fecha_f_deuda,
                        'id_status'    => $id_estatus,
                        'fecha_update' => date('Y-m-d'),
                        'id_factura'   => 0,
                        'nota'   => $data['nota_a'], // esto lo agregue
                        'nro_factura'   => $data['numfactura'] // esto lo agregue
                    );
                
                $query = $this->db->insert('public.mensualidad',$data_mens);
                if ($query) {
                    $id_mensualidad = $this->db->insert_id();

                    if ($data['fechatrnas_a'] == '') {
                        $fecha_tranfer = date('Y-m-d');
                    }else{
                        $fecha_tranfer = $data['fechatrnas_a'];
                    }
                    $data1 = array(
                        'id_mensualidad'    => $id_mensualidad,
                        'id_tipo_pago'      => $data['id_tipo_pago_a'],
                        'nro_referencia'    => $data['nro_referencia_a'],
                        'id_banco'          => $data['id_banco_a'],
                        'fechatrnas'        => $fecha_tranfer,
                        'total_ant_d'       => $data['canon_a'],
                        'id_dolar'          => $data['id_dolar_a'],
                        'valor'             => $data['dolar_a'],
                        'total_ant_bs'      => $data['bs_a'],
                        'total_abonado_bs'  => $data['cantidad_pagar_bs_a'],
                        'total_abonado_om'  => $data['cantidad_pagar_otra_a'],
                        'restante_bs'       => $data['total_bs_pag_a'],
                        'restante_om'       => $data['total_otra_a'],
                        'id_user'           => $this->session->userdata('id_user'),
                        'id_estatus'        => $id_estatus
                        /*-'fecha_reg'         => date('Y-m-d h:i:s')*/
                );
                    $x = $this->db->insert('mov_consig',$data1);
                }  
                return true;            
            }else{
                $this->db->select('*');
                $this->db->from('public.buque m');
                $this->db->where('matricula', $data['matricular']);
                $query = $this->db->get();
                $resultado = $query->row_array();
               
                $fecha_deuda = $resultado['fecha_pago'];
                $fecha_deuda = explode('-',$fecha_deuda);
                $dia = $fecha_deuda['2'];
                $anio = $fecha_deuda['0'];
                $mes_siguiente = date('m', strtotime('+1 month'));
                
                $fecha_f_deuda = $anio . '-' . $mes_siguiente . '-' . $dia;
                if ($data['total_bs_pag_a'] == '0') {
                    $id_estatus = 2;
                }else {
                    $id_estatus = 3;
                }  
                $data_mens = array(
                        'matricula'    => $data['matricular'],
                        'pies'         => $data['pies_a'],
                        'id_tarifa'    => $data['id_tarifa_a'],
                        'tarifa'       => $data['id_tarifa_a'],
                        'dia'          => $data['dias_a'],
                        'canon'        => $data['canon_a'],
                        'fecha_deuda'  => $fecha_f_deuda,
                        'id_status'    => $id_estatus,
                        'fecha_update' => date('Y-m-d'),
                        'id_factura'   => 0
                    );
                
                $query = $this->db->insert('public.mensualidad',$data_mens);
                if ($query) {
                    $id_mensualidad = $this->db->insert_id();

                    if ($data['fechatrnas_a'] == '') {
                        $fecha_tranfer = date('Y-m-d');
                    }else{
                        $fecha_tranfer = $data['fechatrnas_a'];
                    }
                    $data1 = array(
                        'id_mensualidad'    => $id_mensualidad,
                        'id_tipo_pago'      => $data['id_tipo_pago_a'],
                        'nro_referencia'    => $data['nro_referencia_a'],
                        'id_banco'          => $data['id_banco_a'],
                        'fechatrnas'        => $fecha_tranfer,
                        'total_ant_d'       => $data['canon_a'],
                        'id_dolar'          => $data['id_dolar_a'],
                        'valor'             => $data['dolar_a'],
                        'total_ant_bs'      => $data['bs_a'],
                        'total_abonado_bs'  => $data['cantidad_pagar_bs_a'],
                        'total_abonado_om'  => $data['cantidad_pagar_otra_a'],
                        'restante_bs'       => $data['total_bs_pag_a'],
                        'restante_om'       => $data['total_otra_a'],
                        'id_user'           => $this->session->userdata('id_user'),
                        'id_estatus'        => $id_estatus
                        /*-'fecha_reg'         => date('Y-m-d h:i:s')*/
                );
                    $x = $this->db->insert('mov_consig',$data1);
                }
                return true;  
            }
        } 

        public function generar_factura($data){
            
            $this->db->select("m.id_mensualidad,
                                m.matricula,
                                b.nombrebuque,
                                concat(p.tipo_ced, '-',p.cedula) as cedula,
                                p.nombrecom,
                                p.tele_1,
                                m.canon,
                                m.fecha_deuda,
                                m.id_status,
                                m.id_factura,
                                e.descripcion,
                                m.pies,
                                m.dia,
                                m.id_tarifa");
            $this->db->from('public.mensualidad m');
            $this->db->join('buque b', 'b.matricula = m.matricula ', 'left');
            $this->db->join('estatus e', 'e.id_status = m.id_status', 'left');
            $this->db->join('propiet p', 'p.id_buque = b.id', 'left');
            $this->db->where('m.id_mensualidad', $data);
            $this->db->where('p.tipo', 'principal');
            $this->db->order_by("m.id_mensualidad", "Asc");
            $query = $this->db->get();
            $resultado1 = $query->row_array();
            
            $this->db->select('*');
            $this->db->from('mov_consig mc');
            $this->db->where('mc.id_mensualidad', $data);
            $this->db->order_by('id_mov_consig desc');
            $query = $this->db->get();
            $resultado2 = $query->row_array();
            
            $this->db->select(' max(f.id), f.nro_factura ');
            $this->db->from('factura f');
            $this->db->group_by('f.nro_factura');
            $this->db->order_by('f.nro_factura desc');
            $query = $this->db->get();
            $resultado3 = $query->row_array();
           
            $number = $resultado3['nro_factura'] + 1;
            $length = 5;
            $nro_factura = substr(str_repeat(0, $length).$number, - $length);

            $this->db->select('*');
            $this->db->from('alicuota_iva');
            $query = $this->db->get();
            $resultado4 = $query->row_array();

            $canonn = str_replace(".", "", $resultado2['total_abonado_bs']);
            $total_iva = $canonn *  $resultado4['desc_alicuota_iva'] ;

            $total_mas_iva = $canonn + $total_iva;
            $total_bs_s =  $total_mas_iva / $resultado2['valor'];
            $total_bs = number_format($total_bs_s, 2);

            $factura = array(
                "nro_factura"   => $nro_factura,
                "nombre"        => $resultado1['nombrebuque'],
                "matricula"     => $resultado1['matricula'],
                "cedula"        => $resultado1['cedula'],
                "tele_1"        => $resultado1['tele_1'],
                "total_iva"     => $total_iva,
                "total_mas_iva" => $total_mas_iva,
                "total_bs"      => $total_bs,
                "fechaingreso"  => date("Y-m-d"),
                "id_status"     => 2,
                "fecha_update"  => date("Y-m-d"),
                "valor_iva"     => $resultado2['valor'],
                'id_tipo_pago'  => $resultado2['id_tipo_pago'],
                'id_banco'      => $resultado2['id_banco'],
                'nro_referencia'=> $resultado2['nro_referencia'],
                'fechatrnas' 	=> $resultado2['fechatrnas'],
            );
            $this->db->insert('public.factura', $factura);
            $id_factura = $this->db->insert_id();
            
            $data1 = array('id_factura' => $id_factura,
                            'fecha_update' => date('Y-m-d h:i:s'));
            $this->db->where('id_mensualidad', $data);
            $update = $this->db->update('mensualidad', $data1);


            $p_items = array( //detalle factura
                'matricula' 	    => $resultado1['matricula'],
                'pies'   		    => $resultado1['pies'],
                'ob'          	    => $resultado1['fecha_deuda'],
                'tarifa'            => $resultado1['id_tarifa'],
                'dia' 	            => $resultado1['dia'],
                'canon' 	        => $resultado1['canon'], 
                'monto_estimado' 	=> $resultado1['canon'],
                'id_fact'           => $id_factura,
                'id_tarifa'         => $resultado1['id_tarifa'],          
            );
            $this->db->insert('public.deta_factura',$p_items);
            return true;
        }

        //ELIMINACIÒN DEL PAGO
        public function eliminar_pago($data){

            $this->db->select('*');
            $this->db->where('id_mensualidad', $data['id_mensualidad']);
            $this->db->from('public.mov_consig');
            $query = $this->db->get();
            $resultado = $query->row_array();
            
            $this->db->select('*');
            $this->db->where('id_mensualidad', $data['id_mensualidad']);
            $this->db->from('public.mensualidad');
            $query = $this->db->get();
            $resultado1 = $query->row_array();
            $matricula = $resultado1['matricula'];

            $this->db->select('*');
            $this->db->where('matricula', $matricula);
            $this->db->from('public.buque');
            $query = $this->db->get();
            $resultado2 = $query->row_array();

            
            $id_dolar = $resultado['id_dolar'];
            $dolar = $resultado['valor'];
            
            $canon = $resultado2['canon'];
            $canonn = str_replace(".", "", $canon);

            $valor = $canonn / $dolar;
            $valor_bs = round($valor, 2);

            $data_mov = array(
                'id_mensualidad'    => $data['id_mensualidad'],
                'id_tipo_pago'      => 0,
                'nro_referencia'    => '',
                'total_ant_d'       => '0',
                'id_dolar'          => $resultado['id_dolar'],
                'valor'             => $resultado['valor'],
                'total_ant_bs'      => '0',
                'total_abonado_bs'  => '0',
                'total_abonado_om'  => '0',
                'restante_bs'       => $valor_bs,
                'restante_om'       => $canon,
                'id_user'           => $this->session->userdata('id_user'),
                'id_estatus'        => 0
            );

            $this->db->where('id_mensualidad', $data['id_mensualidad']);
            $query = $this->db->delete('public.mov_consig');

            $this->db->insert('public.mov_consig',$data_mov);
            
            if ($query){
                $fecha_update = date('Y-m-d h:i:s');
                $this->db->set('id_status', 0);
                $this->db->set('fecha_update', $fecha_update);
                $this->db->where('id_mensualidad', $data['id_mensualidad']);
                $this->db->update('public.mensualidad');
                return true;
            }
            return true;
        }

        function anular_factura($data){
            $datos = explode('/', $data['id_factura']);
            $id_factura = $datos['0'];
            $id_mensualidad = $datos['1'];
            $data1 = array('id_status' => '1',
                        'fecha_update' => date('Y-m-d h:i:s'));
            $this->db->where('id', $id_factura);
            $update = $this->db->update('factura', $data1);
            

            $fecha_update = date('Y-m-d h:i:s');
            $this->db->set('id_factura', 0);
            $this->db->set('nro_factura', '');
            $this->db->set('fecha_update', $fecha_update);
            $this->db->where('id_mensualidad', $id_mensualidad);
            $this->db->update('public.mensualidad');

            return true;
        }
	}
?>
