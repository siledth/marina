<?php
    class Programacion_model extends CI_model{

        // PROGRAMACION
        public function consultar_programaciones($unidad){
            $this->db->select('*');
            $this->db->where('unidad', $unidad);
            $query = $this->db->get('programacion.programacion');
            return $query->result_array();
        }

        //----Registrar año de programación--
        public function agg_programacion_anio($data){
            $quers =$this->db->insert('programacion.programacion',$data);
            return true;
        }

        public function consultar_prog_anio($id_programacion, $unidad){
            $this->db->select('*');
            $this->db->where('unidad', $unidad);
            $this->db->where('id_programacion', $id_programacion);
            $query = $this->db->get('programacion.programacion');
            return $query->row_array();
        }

        //Consulta los proyectos por separado de cada programación
        public function consultar_proyectos(){
            $this->db->select('id,
                               matricula,                               
                        	   nombrebuque,
                        	   ');
            $query = $this->db->get('public.buque');
            return $query->result_array();
        }

        public function consultar_proyectos_compl($id_programacion, $id_unidad){
            $this->db->select('pp.id_p_proyecto,
	                           pp.nombre_proyecto,
	                           oc.desc_objeto_contrata ');
            $this->db->join('programacion.p_proyecto pp', 'pp.id_programacion = p.id_programacion');
            $this->db->join('programacion.objeto_contrata oc', 'oc.id_objeto_contrata = pp.id_obj_comercial');
            $this->db->where('p.id_programacion', $id_programacion);
            $query = $this->db->get('programacion..programacion p');
            return $query->result_array();

        }

        public function llenar_ff($proyectos){
            foreach ($proyectos as $key){
                $this->db->select('*');
                $this->db->where('id_enlace', $key['id_p_proyecto']);
                $this->db->from('programacion.p_items');
                $result = $this->db->get();
            }
            return $result->result_array();
        }
        //------------------------------------------------------
        // CONSULTAS GENERALES
        public function consulta_part_pres(){
            $this->db->select('*');
            $query = $this->db->get('public.tipobarco');
            return $result = $query->result_array();
        }
        public function consulta_tarifa(){
            $this->db->select('*');
            $query = $this->db->get('public.tarifa');
            return $result = $query->result_array();
        }
        public function consulta_matricula(){
            $this->db->select('*');
            $query = $this->db->get('public.buque');
            return $result = $query->result_array();
        }

      

        


        public function consulta_unid(){
            $this->db->select('*');
            $query = $this->db->get('programacion.unidad_medida');
            return $result = $query->result_array();
        }

        public function consulta_iva(){
            $this->db->select('*');
            $query = $this->db->get('public.alicuota_iva');
            return $result = $query->result_array();
        }
        public function consulta_dolar(){
            $this->db->select('*');
            $query = $this->db->get('public.dolar');
            return $result = $query->result_array();
        }

        

        //------------------------------------------------------
       
        //------------------------------------------------------
        //REGISTRAR BIENES
        public function save_bienes($acc_cargar,$dato1,$p_items,$p_ffinanciamiento){
            if ($acc_cargar == '1') {
                $quers =$this->db->insert('public.buque',$dato1);
                if ($quers) {
                    $id = $this->db->insert_id();
                    $cant_proy = $p_items['cedulat'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {
                        $data1 = array(
                            'id_buque'              => $id,
                            'cedulat'   		    => $p_items['cedulat'][$i],
                            'tipo_cedt'          	=> $p_items['tipo_cedt'][$i],
                            'nombrecomt'            => $p_items['nombrecomt'][$i],
                            'tele_1t' 	            => $p_items['tele_1t'][$i],
                            'cargot' 	            => $p_items['cargot'][$i],
                            'matricula'             => $p_items['matricula'],  
                        );
                        $this->db->insert('public.tripulacion',$data1);
                    }

                    $cant_pff = $p_ffinanciamiento['cedula'];
                    $count_pff = count($cant_pff);

                    for ($i=0; $i < $count_pff; $i++) {
                        $data2 = array(
                            'id_buque'              => $id,
                            'cedula'   		        => $p_ffinanciamiento['cedula'][$i],
                            'tipo_ced'          	=> $p_ffinanciamiento['tipo_ced'][$i],
                            'nombrecom'             => $p_ffinanciamiento['nombrecom'][$i],
                            'tele_1' 	            => $p_ffinanciamiento['tele_1'][$i],
                            'email' 	            => $p_ffinanciamiento['email'][$i],
                            'tipo' 	                => $p_ffinanciamiento['tipo'][$i],
                            'matricula'             => $p_ffinanciamiento['matricula'],
                        );
                        $this->db->insert('public.propiet',$data2);
                    }
                }
                return true;
            }elseif ($acc_cargar == '2') {
                $quers =$this->db->insert('programacion.p_acc_centralizada',$p_acc_centralizada);
                if ($quers) {
                    $id = $this->db->insert_id();
                    $cant_proy = $p_items['id_ccnu'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {
                        $data1 = array(
                            'id_enlace'                  => $id,
                            'id_p_acc'                   => 1,
                            'id_partidad_presupuestaria' => $p_items['id_par_presupuestaria'][$i],
                            'id_ccnu'                    => $p_items['id_ccnu'][$i],
                            'id_tip_obra'                => $p_items['id_tip_obra'],
                            'id_alcance_obra'            => $p_items['id_alcance_obra'],
                            'id_obj_obra'                => $p_items['id_obj_obra'],
                            'fecha_desde'                => $p_items['fecha_desde'],
                            'fecha_hasta'                => $p_items['fecha_hasta'],
                            'especificacion'             => $p_items['especificacion'][$i],
                            'id_unidad_medida'           => $p_items['id_unidad_medida'][$i],
                            'cantidad'                   => $p_items['cantidad'][$i],
                            'i'                          => $p_items['i'][$i],
                            'ii'                         => $p_items['ii'][$i],
                            'iii'                        => $p_items['iii'][$i],
                            'iv'                         => $p_items['iv'][$i],
                            'cant_total_distribuir'      => $p_items['cant_total_distribuir'][$i],
                            'costo_unitario'             => $p_items['costo_unitario'][$i],
                            'precio_total'               => $p_items['precio_total'][$i],
                            'alicuota_iva'               => $p_items['id_alicuota_iva'][$i],
                            'iva_estimado'               => $p_items['iva_estimado'][$i],
                            'monto_estimado'             => $p_items['monto_estimado'][$i],
                        );
                        $this->db->insert('programacion.p_items',$data1);
                    }

                    $cant_pff = $p_ffinanciamiento['id_par_presupuestaria'];
                    $count_pff = count($cant_pff);

                    for ($i=0; $i < $count_pff; $i++) {

                        $data2 = array(
                            'id_enlace'                  => $id,
                            'id_p_acc'                   => 1,
                            'id_estado'                  => $p_ffinanciamiento['id_estado'][$i],
                            'id_partidad_presupuestaria' => $p_ffinanciamiento['id_par_presupuestaria'][$i],
                            'id_fuente_financiamiento'   => $p_ffinanciamiento['id_fuente_financiamiento'][$i],
                            'porcentaje'                 => $p_ffinanciamiento['porcentaje'][$i],
                        );
                        $this->db->insert('programacion.p_ffinanciamiento',$data2);
                    }
                }
                return true;
            }
        }

        public function cons_nro_factura(){
            $this->db->select('id');
            $this->db->order_by('r.id desc');
            $query = $this->db->get('factura r');
            $response = $query->row_array();
            return $response;
        }

       
        public function save_factura($acc_cargar,$dato1,$p_items){
            //if ($acc_cargar == '1') {
                $quers =$this->db->insert('public.factura', $dato1);
                if ($quers) {
                    $id = $this->db->insert_id();
                    $cant_proy = $p_items['pies'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {

                        $tarifas = $p_items['tarifa'][$i];
                        $explode = explode('/', $tarifas);
                        $tarifa = $explode['0'];
                        $id_tarifa = $explode['1'];

                        $data1 = array(
                            'id_fact'        => $id,
                            'pies'   		 => $p_items['pies'][$i],
                            'matricula'      => $p_items['matricula'][$i],
                            'ob'          	 => $p_items['ob'][$i],
                            'id_tarifa'      => $id_tarifa,
                            'tarifa'         => $tarifa,
                            'dia' 	         => $p_items['dia'][$i],
                            'canon' 	     => $p_items['canon'][$i],
                            'monto_estimado' => $p_items['monto_estimado'][$i],
                        );
                        $quert = $this->db->insert('public.deta_factura',$data1);
                        
                        if ($quert) {
                            $this->db->select('*');
                            $this->db->from('public.mensualidad');
                            $this->db->where('matricula', $p_items['matricula'][$i]);
                            $this->db->where('id_tarifa', $id_tarifa);
                            $this->db->where('id_status', 0);
                            $query = $this->db->get();
                            $resultado = $query->row_array();
                            //print_r($resultado);die;
                            if ($resultado){
                                $fecha_deuda = $resultado['fecha_deuda'];
                                $explode = explode('-', $fecha_deuda);
                                $mes = $explode['1'];
                                $fecha_update = date('Y-m-d h:i:s');
                                $this->db->set('id_status', 2);
                                $this->db->set('fecha_update', $fecha_update);
                                $this->db->set('id_factura',  $id);
                                $this->db->where('matricula', $p_items['matricula'][$i]);
                                $this->db->where("TO_CHAR(fecha_deuda,'MM')", $mes);
                                $this->db->update('public.mensualidad');
                            }
                        }
                    }                    
                }
                return true;
            //}
        }


        function consulta_facturas(){
            $this->db->select("f.id,
                               f.nombre,
                               f.matricula,
                               f.total_bs as total,
                               e.id_status,
	                           e.descripcion as estatus");
            $this->db->join('estatus e', 'e.id_status = f.id_status', 'left');
            $query = $this->db->get('factura f');
            return $result = $query->result_array();

        }
        function consulta_recibo(){
            $this->db->select("f.id,
                               f.nombre,
                               f.matricula,
                               f.total_bs as total,
                               e.id_status,
	                           e.descripcion as estatus");
            $this->db->join('estatus e', 'e.id_status = f.id_status', 'left');
            $query = $this->db->get('recibo f');
            return $result = $query->result_array();

        }

        function ver_factura($data){
            //print_r($data);die;
            $this->db->select("f.id,
                               f.nro_factura,
                               f.nombre,
                               f.tele_1,
                               f.matricula,
                               f.total_bs as total,
                               e.id_status,
                               f.valor_iva,
                               f.total_iva,
                               f.total_mas_iva,
                               f.total_bs,
	                           e.descripcion as estatus");
            $this->db->join('estatus e', 'e.id_status = f.id_status', 'left');
            $this->db->where('f.id',$data);
            $query = $this->db->get('factura f');
            return $result = $query->row_array();
        }

        function ver_factura_tabla($data){
            //print_r($data);die;
            $this->db->select("*");
            $this->db->where('df.id_fact',$data);
            $query = $this->db->get('deta_factura df');
            return $result = $query->result_array();
        }
        function ver_recibo($data){
            //print_r($data);die;
            $this->db->select("f.id,
                               f.nro_factura,
                               f.nombre,
                               f.tele_1,
                               f.matricula,
                               f.total_bs as total,
                               e.id_status,
                               f.valor_iva,
                               f.total_iva,
                               f.total_mas_iva,
                               f.total_bs,
	                           e.descripcion as estatus");
            $this->db->join('estatus e', 'e.id_status = f.id_status', 'left');
            $this->db->where('f.id',$data);
            $query = $this->db->get('recibo f');
            return $result = $query->row_array();
        }
        function ver_recibo_tabla($data){
            //print_r($data);die;
            $this->db->select("*");
            $this->db->where('df.id_fact',$data);
            $query = $this->db->get('deta_recibo df');
            return $result = $query->result_array();
        }

        function anular_factura($data){
            $data1 = array('id_status' => '1',
                            'fecha_update' => date('Y-m-d h:i:s'));
            $this->db->where('id', $data['id_factura']);
            $update = $this->db->update('factura', $data1);
            return true;
        }
        public function cons_nro_recibo(){
            $this->db->select('id');
            $this->db->order_by('r.id desc');
            $query = $this->db->get('recibo r');
            $response = $query->row_array();
            return $response;
        }
        public function save_recibo($acc_cargar,$dato1,$p_items){
            if ($acc_cargar == '1') {
                $quers =$this->db->insert('public.recibo', $dato1);
                if ($quers) {
                    $id = $this->db->insert_id();
                    $cant_proy = $p_items['pies'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {
                        $data1 = array(
                            'id_fact'        => $id,
                            'pies'   		 => $p_items['pies'][$i],
                            'matricula'      => $p_items['matricula'][$i],
                            'ob'          	 => $p_items['ob'][$i],
                            'tarifa'         => $p_items['tarifa'][$i],
                            'dia' 	         => $p_items['dia'][$i],
                            'canon' 	     => $p_items['canon'][$i],
                            'monto_estimado' => $p_items['monto_estimado'][$i],
                        );
                        $this->db->insert('public.deta_recibo',$data1);
                    }                    
                }
                return true;
            }
        }

        //------------------------------------------------------
        // INVESTIGAR
        public function inf_1($id_p_proyecto){
           
            $this->db->select('*');
           // $this->db->join('programacion.propiet oc', 'oc.matricula = pp.matricula');
            $this->db->where('pp.matricula', $id_p_proyecto);
            $query = $this->db->get('public.buque pp');
            return $query->result_array();
        }

        public function inf_2($id_p_proyecto){
            $this->db->select('pf.matricula,
                        	   pf.cedula,
                        	   pf.tipo_ced,
                               pf.nombrecom,
                               pf.tele_1,
                               pf.email,
                               pf.tipo,
                        	   ff.matricula
                               ');
            $this->db->join('public.buque ff','ff.matricula = pf.matricula');
            $this->db->where('pf.matricula', $id_p_proyecto);
            
            $query = $this->db->get('public.propiet pf');
            return $query->result_array();
        }
        public function inf_5($id_p_proyecto){
            $this->db->select('pf.matricula,
                        	   pf.cedula,
                        	   pf.tipo_ced,
                               pf.nombrecom,
                               pf.tele_1,
                               pf.email,
                               pf.tipo,
                        	   ff.matricula
                               ');
            $this->db->join('public.buque ff','ff.matricula = pf.matricula');
            $this->db->where('pf.matricula', $id_p_proyecto);
            $this->db->where('pf.tipo', 'principal');
      
            
            $query = $this->db->get('public.propiet pf');
            return $query->result_array();
        }

        public function inf_2_edit($data){
            $this->db->select('pf.id_enlace,
                        	   pf.id_partidad_presupuestaria,
                        	   pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                        	   pf.id_estado,
                        	   pf.id_fuente_financiamiento,
                        	   ff.desc_fuente_financiamiento,
                        	   pf.porcentaje ');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pf.id_partidad_presupuestaria');
            $this->db->join('programacion.fuente_financiamiento ff','ff.id_fuente_financiamiento = pf.id_fuente_financiamiento');
            $this->db->where('pf.id_enlace', $data['id_p_proyecto']);
            $this->db->where('pf.id_p_acc', 0);
            $query = $this->db->get('programacion.p_ffinanciamiento pf');
            return $query->result_array();
        }

        public function inf_3($id_p_proyecto){
            $this->db->select('pi2.id_tripulacion,
                               pi2.cedulat,
                               pi2.nombrecomt,
                               pi2.matricula,
                               pi2.tele_1t,
                               pi2.cargot,
                               um.matricula,
                               ');
            $this->db->join('public.buque um','um.matricula = pi2.matricula');
            $this->db->where('pi2.matricula', $id_p_proyecto);
           
            $query = $this->db->get('public.tripulacion pi2');
            return $query->result_array();
        }

        public function inf_3_edit($data){
            $this->db->select('pi2.id_p_items,
                        	   pi2.id_enlace,
                               pi2.id_partidad_presupuestaria,
                               pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                        	   pi2.id_ccnu,
                        	   c2.desc_ccnu,
                        	   pi2.fecha_desde,
                        	   pi2.fecha_hasta,
                        	   pi2.especificacion,
                               pi2.id_unidad_medida,
                        	   um.desc_unidad_medida,
                        	   pi2.i,
                        	   pi2.ii,
                        	   pi2.iii,
                        	   pi2.iv,
                        	   pi2.precio_total,
                        	   pi2.alicuota_iva,
                               pi2.iva_estimado,
                               pi2.monto_estimado');
            $this->db->join('programacion.ccnu c2','c2.codigo_ccnu = pi2.id_ccnu');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
            $this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
            $this->db->where('pi2.id_enlace', $data['id_p_proyecto']);
            $this->db->where('pi2.id_p_acc', 0);
            $query = $this->db->get('programacion.p_items pi2');
            return $query->result_array();
        }

        public function inf_3_b($data){
            $this->db->select('pi2.id_p_items,
                        	   pi2.id_enlace,
                               pi2.id_partidad_presupuestaria,
                               pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                        	   pi2.id_ccnu,
                        	   c2.desc_ccnu,
                        	   pi2.fecha_desde,
                        	   pi2.fecha_hasta,
                        	   pi2.especificacion,
                               pi2.id_unidad_medida,
                        	   um.desc_unidad_medida,
                               pi2.cantidad,
                               pi2.costo_unitario,
                        	   pi2.i,
                        	   pi2.ii,
                        	   pi2.iii,
                        	   pi2.iv,
                               pi2.cant_total_distribuir,
                        	   pi2.precio_total,
                        	   pi2.alicuota_iva,
                               pi2.iva_estimado,
                               pi2.monto_estimado');
            $this->db->join('programacion.ccnu c2','c2.codigo_ccnu = pi2.id_ccnu');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
            $this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
            $this->db->where('pi2.id_enlace', $data['id_p_proyecto']);
            $this->db->where('pi2.id_p_acc', 0);
            $query = $this->db->get('programacion.p_items pi2');
            return $query->result_array();
        }

		public function inf_3_o($id_p_proyecto){
            $this->db->select('pi2.id_p_items,
                               pi2.id_enlace,
                               pi2.id_partidad_presupuestaria,
                               pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                               pi2.id_tip_obra,
                               to2.descripcion_tip_obr,
                               pi2.id_alcance_obra,
                               ao.descripcion_alcance_obra,
                               pi2.id_obj_obra,
                               oo.descripcion_obj_obra,
                               pi2.fecha_desde,
                               pi2.fecha_hasta,
                               pi2.especificacion,
                               pi2.id_unidad_medida,
                               um.desc_unidad_medida,
                               pi2.i,
                               pi2.ii,
                               pi2.iii,
                               pi2.iv,
                               pi2.precio_total,
                               pi2.alicuota_iva,
                               pi2.iva_estimado,
                               pi2.monto_estimado');
            $this->db->join('programacion.ccnu c2','c2.codigo_ccnu = pi2.id_ccnu', 'left');
            $this->db->join('programacion.tip_obra to2','to2.id_tip_obra = pi2.id_tip_obra', 'left');
            $this->db->join('programacion.alcance_obra ao','ao.id_alcance_obra = pi2.id_alcance_obra', 'left');
            $this->db->join('programacion.obj_obra oo','oo.id_obj_obra = pi2.id_obj_obra', 'left');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
            $this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
            $this->db->where('pi2.id_enlace', $id_p_proyecto['id_p_proyecto']);
            $this->db->where('pi2.id_p_acc', 0);
            $query = $this->db->get('programacion.p_items pi2');
            return $query->result_array();
        }

        public function editar_programacion_proy($id_p_proyecto, $id_programacion, $p_proyecto,$p_items,$p_ffinanciamiento){

            $this->db->where('id_programacion', $id_programacion);
            $this->db->where('id_p_proyecto', $id_p_proyecto);
            $update = $this->db->update('programacion.p_proyecto', $p_proyecto);

            if ($update){
                $this->db->where('id_enlace', $id_p_proyecto);
                $this->db->where('id_p_acc', 0);
                $this->db->delete('programacion.p_items');

                    $cant_proy = $p_items['id_ccnu'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {
                        $data1 = array(
                            'id_enlace'                  => $id_p_proyecto,
                            'id_p_acc'                   => 0,
                            'id_partidad_presupuestaria' => $p_items['id_par_presupuestaria'][$i],
                            'id_ccnu'                    => $p_items['id_ccnu'][$i],
                            'id_tip_obra'                => 0,
                            'id_alcance_obra'            => 0,
                            'id_obj_obra'                => 0,
                            'fecha_desde'                => $p_items['fecha_desde'][$i],
                            'fecha_hasta'                => $p_items['fecha_hasta'][$i],
                            'especificacion'             => $p_items['especificacion'][$i],
                            'id_unidad_medida'           => $p_items['id_unidad_medida'][$i],
                            'cantidad'                   => 0,
                            'i'                          => $p_items['i'][$i],
                            'ii'                         => $p_items['ii'][$i],
                            'iii'                        => $p_items['iii'][$i],
                            'iv'                         => $p_items['iv'][$i],
                            'cant_total_distribuir'      => 0,
                            'costo_unitario'             => 0,
                            'precio_total'               => $p_items['precio_total'][$i],
                            'alicuota_iva'               => $p_items['id_alicuota_iva'][$i],
                            'iva_estimado'               => $p_items['iva_estimado'][$i],
                            'monto_estimado'               => $p_items['monto_estimado'][$i],
                        );
                        $this->db->insert('programacion.p_items',$data1);
                    }

                    $this->db->where('id_enlace', $id_p_proyecto);
                    $this->db->where('id_p_acc', 0);
                    $this->db->delete('programacion.p_ffinanciamiento');

                    $cant_pff = $p_ffinanciamiento['id_par_presupuestaria'];
                    $count_pff = count($cant_pff);

                    for ($i=0; $i < $count_pff; $i++) {

                        $data2 = array(
                            'id_enlace'                  => $id_p_proyecto,
                            'id_p_acc'                   => 0,
                            'id_estado'                  => $p_ffinanciamiento['id_estado'][$i],
                            'id_partidad_presupuestaria' => $p_ffinanciamiento['id_par_presupuestaria'][$i],
                            'id_fuente_financiamiento'   => $p_ffinanciamiento['id_fuente_financiamiento'][$i],
                            'porcentaje'                 => $p_ffinanciamiento['porcentaje'][$i],
                        );
                        $this->db->insert('programacion.p_ffinanciamiento',$data2);
                    }
            }
            return true;
        }

        public function editar_programacion_proy_b($id_p_proyecto, $id_programacion, $p_proyecto,$p_items,$p_ffinanciamiento){
            $this->db->where('id_programacion', $id_programacion);
            $this->db->where('id_p_proyecto', $id_p_proyecto);
            $update = $this->db->update('programacion.p_proyecto', $p_proyecto);

            if ($update) {
                $this->db->where('id_enlace', $id_p_proyecto);
                $this->db->where('id_p_acc', 0);
                $this->db->delete('programacion.p_items');
                    $cant_proy = $p_items['id_ccnu'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {
                        $data1 = array(
                            'id_enlace'                  => $id_p_proyecto,
                            'id_p_acc'                   => 0,
                            'id_partidad_presupuestaria' => $p_items['id_par_presupuestaria'][$i],
                            'id_ccnu'                    => $p_items['id_ccnu'][$i],
                            'id_tip_obra'                => 0,
                            'id_alcance_obra'            => 0,
                            'id_obj_obra'                => 0,
                            'fecha_desde'                => $p_items['fecha_desde'],
                            'fecha_hasta'                => $p_items['fecha_hasta'],
                            'especificacion'             => $p_items['especificacion'][$i],
                            'id_unidad_medida'           => $p_items['id_unidad_medida'][$i],
                            'cantidad'                   => $p_items['cantidad'][$i],
                            'i'                          => $p_items['i'][$i],
                            'ii'                         => $p_items['ii'][$i],
                            'iii'                        => $p_items['iii'][$i],
                            'iv'                         => $p_items['iv'][$i],
                            'cant_total_distribuir'      => $p_items['cant_total_distribuir'][$i],
                            'costo_unitario'             => $p_items['costo_unitario'][$i],
                            'precio_total'               => $p_items['precio_total'][$i],
                            'alicuota_iva'               => $p_items['id_alicuota_iva'][$i],
                            'iva_estimado'               => $p_items['iva_estimado'][$i],
                            'monto_estimado'             => $p_items['monto_estimado'][$i],
                        );
                        $this->db->insert('programacion.p_items', $data1);
                    }
                    $this->db->where('id_enlace', $id_p_proyecto);
                    $this->db->where('id_p_acc', 0);
                    $this->db->delete('programacion.p_ffinanciamiento');
                    $cant_pff = $p_ffinanciamiento['id_par_presupuestaria'];
                    $count_pff = count($cant_pff);

                    for ($i=0; $i < $count_pff; $i++) {

                        $data2 = array(
                            'id_enlace'                  => $id_p_proyecto,
                            'id_p_acc'                   => 0,
                            'id_estado'                  => $p_ffinanciamiento['id_estado'][$i],
                            'id_partidad_presupuestaria' => $p_ffinanciamiento['id_par_presupuestaria'][$i],
                            'id_fuente_financiamiento'   => $p_ffinanciamiento['id_fuente_financiamiento'][$i],
                            'porcentaje'                 => $p_ffinanciamiento['porcentaje'][$i],
                        );
                        $this->db->insert('programacion.p_ffinanciamiento',$data2);
                    }
            }
            return true;
        }

		public function editar_programacion_proy_o($id_p_proyecto, $id_programacion, $p_proyecto, $p_items, $p_ffinanciamiento){

            $this->db->where('id_programacion', $id_programacion);
            $this->db->where('id_p_proyecto', $id_p_proyecto);
            $update = $this->db->update('programacion.p_proyecto', $p_proyecto);

            if ($update){
                $this->db->where('id_enlace', $id_p_proyecto);
                $this->db->where('id_p_acc', 0);
                $this->db->delete('programacion.p_items');

				
                    $cant_proy = $p_items['id_tip_obra'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {
                        $data_inf = array(
                            'id_enlace'                  => $id_p_proyecto,
                            'id_p_acc'                   => 0,
                            'id_partidad_presupuestaria' => $p_items['id_par_presupuestaria'][$i],
							'id_ccnu'                    => 0,
                            'id_tip_obra'                => $p_items['id_tip_obra'][$i],
                            'id_alcance_obra'            => $p_items['id_alcance_obra'][$i],
                            'id_obj_obra'                => $p_items['id_obj_obra'][$i],
                            'fecha_desde'                => $p_items['fecha_desde'][$i],
                            'fecha_hasta'                => $p_items['fecha_hasta'][$i],
                            'especificacion'             => $p_items['especificacion'][$i],
                            'id_unidad_medida'           => $p_items['id_unidad_medida'][$i],
                            'cantidad'                   => 0,
                            'i'                          => $p_items['i'][$i],
                            'ii'                         => $p_items['ii'][$i],
                            'iii'                        => $p_items['iii'][$i],
                            'iv'                         => $p_items['iv'][$i],
                            'cant_total_distribuir'      => 0,
                            'costo_unitario'             => 0,
                            'precio_total'               => $p_items['precio_total'][$i],
                            'alicuota_iva'               => $p_items['id_alicuota_iva'][$i],
                            'iva_estimado'               => $p_items['iva_estimado'][$i],
                            'monto_estimado'             => $p_items['monto_estimado'][$i],
                        );
                        $this->db->insert('programacion.p_items',$data_inf);
                    }

                    $this->db->where('id_enlace', $id_p_proyecto);
                    $this->db->where('id_p_acc', 0);
                    $this->db->delete('programacion.p_ffinanciamiento');

                    $cant_pff = $p_ffinanciamiento['id_par_presupuestaria'];
                    $count_pff = count($cant_pff);

                    for ($i=0; $i < $count_pff; $i++) {

                        $data2 = array(
                            'id_enlace'                  => $id_p_proyecto,
                            'id_p_acc'                   => 0,
                            'id_estado'                  => $p_ffinanciamiento['id_estado'][$i],
                            'id_partidad_presupuestaria' => $p_ffinanciamiento['id_par_presupuestaria'][$i],
                            'id_fuente_financiamiento'   => $p_ffinanciamiento['id_fuente_financiamiento'][$i],
                            'porcentaje'                 => $p_ffinanciamiento['porcentaje'][$i],
                        );
                        $this->db->insert('programacion.p_ffinanciamiento',$data2);
                    }
            }
            return true;
        }

        public function cons_items_proy($data){
            $this->db->select('pi2.id_p_items,
                        	   pi2.id_enlace,
                               pi2.id_partidad_presupuestaria,
                               pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                        	   pi2.id_ccnu,
                        	   c2.desc_ccnu,
                        	   pi2.fecha_desde,
                        	   pi2.fecha_hasta,
                        	   pi2.especificacion,
                               pi2.id_unidad_medida,
                        	   um.desc_unidad_medida,
                               pi2.cantidad,
                               pi2.costo_unitario,
                        	   pi2.i,
                        	   pi2.ii,
                        	   pi2.iii,
                        	   pi2.iv,
                               pi2.cant_total_distribuir,
                        	   pi2.precio_total,
                        	   pi2.alicuota_iva,
                               pi2.iva_estimado,
                               pi2.monto_estimado');
            $this->db->join('programacion.ccnu c2','c2.codigo_ccnu = pi2.id_ccnu');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
            $this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
            $this->db->where('pi2.id_p_items', $data['id_items_proy']);
            $this->db->where('pi2.id_p_acc', 0);
            $query = $this->db->get('programacion.p_items pi2');
			
            return $query->row_array();
        }

		public function cons_items_proy_o($data){
            $this->db->select('pi2.id_p_items,
								pi2.id_enlace,
								pi2.id_partidad_presupuestaria,
								pp.desc_partida_presupuestaria,
								pp.codigopartida_presupuestaria,
								pi2.id_tip_obra,
								to2.descripcion_tip_obr,
								pi2.id_alcance_obra,
								ao.descripcion_alcance_obra,
								pi2.id_obj_obra,
								oo.descripcion_obj_obra,
								pi2.fecha_desde,
								pi2.fecha_hasta,
								pi2.especificacion,
								pi2.id_unidad_medida,
								um.desc_unidad_medida,
								pi2.i,
								pi2.ii,
								pi2.iii,
								pi2.iv,
								pi2.precio_total,
								pi2.alicuota_iva,
								pi2.iva_estimado,
								pi2.monto_estimado');
				$this->db->join('programacion.ccnu c2','c2.codigo_ccnu = pi2.id_ccnu', 'left');
				$this->db->join('programacion.tip_obra to2','to2.id_tip_obra = pi2.id_tip_obra', 'left');
				$this->db->join('programacion.alcance_obra ao','ao.id_alcance_obra = pi2.id_alcance_obra', 'left');
				$this->db->join('programacion.obj_obra oo','oo.id_obj_obra = pi2.id_obj_obra', 'left');
				$this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
				$this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
            $this->db->where('pi2.id_p_items', $data['id_items_proy']);
            $this->db->where('pi2.id_p_acc', 0);
            $query = $this->db->get('programacion.p_items pi2');
			
            return $query->row_array();
        }


        public function llenar_par_pre_mod($data){
            $this->db->select('*');
            $this->db->where('codigopartida_presupuestaria !=', $data['cod_partida_pre']);
            $query = $this->db->get('programacion.partida_presupuestaria');
            return $query->result_array();
        }

        public function llenar_uni_med_mod($data){
            $this->db->select('*');
            $this->db->where('pi2.id_unidad_medida !=', $data['id_unid_med']);
            $query = $this->db->get('programacion.unidad_medida pi2');
            return $query->result_array();
        }

        public function llenar_alic_iva_mod(){
            $this->db->select('*');
            $query = $this->db->get('programacion.alicuota_iva');
            return $query->result_array();
        }

        public function llenar_selc_ccnu_m($data){
            $this->db->select('*');
            $this->db->like('desc_ccnu', $data['ccnu_b_m']);
            $query = $this->db->get('programacion.ccnu');
            return $query->result_array();
        }

		public function llenar_alic_tip_obra($data){
            $this->db->select('*');
			$this->db->where('id_tip_obra !=', $data['id_tipo_obra_m']);
            $query = $this->db->get('programacion.tip_obra');
            return $result = $query->result_array();
        }

		public function llenar_alic_alc_obra($data){
            $this->db->select('*');
			$this->db->where('id_alcance_obra !=', $data['alcance_obra_m']);
            $query = $this->db->get('programacion.alcance_obra');
            return $result = $query->result_array();
        }

		public function llenar_alic_obj_obra($data){
            $this->db->select('*');
			$this->db->where('id_obj_obra !=', $data['objeto_obra_m']);
            $query = $this->db->get('programacion.obj_obra');
            return $result = $query->result_array();
        }

        public function editar_fila_ip($data){

            $this->db->where('id_p_items', $data['id_items_proy']);

            $pp_s = $data['selc_part_pres'];
            if ($pp_s == 0) {
                $id_partidad_presupuestaria = $data['partida_pre'];
            }else {
                $id_partidad_presupuestaria = $data['selc_part_pres'];
            }

            $ccnu_s = $data['sel_ccnu'];
            if ($ccnu_s == 0) {
                $id_ccnu = $data['ccnu'];
            }else {
                $id_ccnu = $data['sel_ccnu'];
            }

            $unid_m_s = $data['sel_camb_unid_medi'];
            if ($unid_m_s == 0) {
                $id_unidad_medida = $data['unid_med'];
            }else {
                $id_unidad_medida = $data['sel_camb_unid_medi'];
            }

            $id_ali_iva = $data['sel_id_alic_iva'];
            if ($id_ali_iva == 0) {
                $alicuota_iva = $data['ali_iva_e'];
            }else {
                $alicuota_iva = $data['sel_id_alic_iva'];
            }

            $data1 = array(
                'id_partidad_presupuestaria' => $id_partidad_presupuestaria,
                'id_ccnu'                    => $id_ccnu,
                'fecha_desde'                => $data['fecha_desde_e'],
                'fecha_hasta'                => $data['fecha_hasta_e'],
                'especificacion'             => $data['esp'],
                'id_unidad_medida'           => $id_unidad_medida,
                'i'                          => $data['primero'],
                'ii'                         => $data['segundo'],
                'iii'                        => $data['tercero'],
                'iv'                         => $data['cuarto'],
                'precio_total'               => $data['prec_t'],
                'alicuota_iva'               => $alicuota_iva,
                'iva_estimado'               => $data['monto_iva_e'],
                'monto_estimado'             => $data['monto_tot_est'],
            );
            $update = $this->db->update('programacion.p_items', $data1);
            return true;
        }
        // ACCION CENTRALIZADA

        public function consultar_acc_centralizada($id_programacion){
            $this->db->select('pac.id_p_acc_centralizada,
                        	   pac.id_programacion,
                        	   pac.id_accion_centralizada,
                        	   ac.desc_accion_centralizada,
                        	   pac.id_obj_comercial,
                        	   oc.desc_objeto_contrata');
            $this->db->join('programacion.objeto_contrata oc', 'oc.id_objeto_contrata = pac.id_obj_comercial ');
            $this->db->join('programacion.accion_centralizada ac', 'ac.id_accion_centralizada = pac.id_accion_centralizada');
            $this->db->where('pac.id_programacion', $id_programacion);
            $query = $this->db->get('programacion.p_acc_centralizada pac');
            return $query->result_array();
        }

        public function consulta_act_com2(){
            $this->db->select('*');
            $this->db->where('id_objeto_contrata', 1);
            $query = $this->db->get('programacion.objeto_contrata');
            return $result = $query->result_array();
        }

        public function accion_centralizada(){
            $this->db->select('*');
            $query = $this->db->get('programacion.accion_centralizada');
            return $result = $query->result_array();
        }
      /*  public function delete($id)
        {
            $this->db->delete('editoriales', array('id' => $id));
        }*/
        public function delete($id){

            //$this->db->where('matricula', $id['id']);
            $query = $this->db->delete('public.buque', array('matricula' => $id));

            if ($query) {
               // $this->db->where('matricula', $id['id']);
                
                $query = $this->db->delete('public.propiet', array('matricula' => $id));

               // $this->db->where('matricula', array('matricula' => $id));
                
                $query = $this->db->delete('public.tripulacion', array('matricula' => $id));
            }
           return true;
        }

        public function inf_1_acc($id_p_acc_centralizada){
            $this->db->select('pac.id_p_acc_centralizada,
                        	   pac.id_programacion,
                        	   pac.id_accion_centralizada,
                        	   ac.desc_accion_centralizada,
                        	   pac.id_obj_comercial,
                        	   oc.desc_objeto_contrata ');
            $this->db->join('programacion.accion_centralizada ac', 'ac.id_accion_centralizada = pac.id_accion_centralizada');
            $this->db->join('programacion.objeto_contrata oc', 'oc.id_objeto_contrata = pac.id_obj_comercial ');
            $this->db->where('pac.id_p_acc_centralizada', $id_p_acc_centralizada);
            $query = $this->db->get('programacion.p_acc_centralizada pac ');
            return $query->result_array();
        }

        public function inf_2_acc_pdf($id_p_acc_centralizada){
            $this->db->select('pf.id_enlace,
                        	   pf.id_partidad_presupuestaria,
                        	   pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                        	   pf.id_estado,
                        	   pf.id_fuente_financiamiento,
                        	   ff.desc_fuente_financiamiento,
                        	   pf.porcentaje ');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pf.id_partidad_presupuestaria');
            $this->db->join('programacion.fuente_financiamiento ff','ff.id_fuente_financiamiento = pf.id_fuente_financiamiento');
            $this->db->where('pf.id_enlace', $id_p_acc_centralizada);
            $this->db->where('pf.id_p_acc', 1);
            $query = $this->db->get('programacion.p_ffinanciamiento pf');
            return $query->result_array();
        }

        public function inf_3_acc_pdf($id_p_acc_centralizada){
            $this->db->select('pi2.id_p_items,
                        	     pi2.id_enlace,
                               pi2.id_partidad_presupuestaria,
                               pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                        	     pi2.id_ccnu,
                        	     c2.desc_ccnu,
                               pi2.id_tip_obra,
                               to2.descripcion_tip_obr,
                               pi2.id_alcance_obra,
                               ao.descripcion_alcance_obra,
                               pi2.id_obj_obra,
                               oo.descripcion_obj_obra,
                               pi2.fecha_desde,
                               pi2.fecha_hasta,
                        	     pi2.especificacion,
                               pi2.id_unidad_medida,
                        	     um.desc_unidad_medida,
                        	     pi2.i,
                        	     pi2.ii,
                        	     pi2.iii,
                        	     pi2.iv,
                               pi2.costo_unitario,
                        	     pi2.precio_total,
                        	     pi2.alicuota_iva,
                               pi2.iva_estimado,
                               pi2.monto_estimado');
            $this->db->join('programacion.ccnu c2','c2.codigo_ccnu = pi2.id_ccnu', 'left');
            $this->db->join('programacion.tip_obra to2','to2.id_tip_obra = pi2.id_tip_obra', 'left');
            $this->db->join('programacion.alcance_obra ao','ao.id_alcance_obra = pi2.id_alcance_obra', 'left');
            $this->db->join('programacion.obj_obra oo','oo.id_obj_obra = pi2.id_obj_obra', 'left');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
            $this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
            $this->db->where('pi2.id_enlace', $id_p_acc_centralizada);
            $this->db->where('pi2.id_p_acc', 1);
            $query = $this->db->get('programacion.p_items pi2');
            return $query->result_array();
        }

        public function inf_2_acc($data){
            $this->db->select('pf.id_enlace,
                        	   pf.id_partidad_presupuestaria,
                        	   pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                        	   pf.id_estado,
                        	   pf.id_fuente_financiamiento,
                        	   ff.desc_fuente_financiamiento,
                        	   pf.porcentaje ');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pf.id_partidad_presupuestaria');
            $this->db->join('programacion.fuente_financiamiento ff','ff.id_fuente_financiamiento = pf.id_fuente_financiamiento');
            $this->db->where('pf.id_enlace', $data['id_p_acc_centralizada']);
            $this->db->where('pf.id_p_acc', 1);
            $query = $this->db->get('programacion.p_ffinanciamiento pf');
            return $query->result_array();
        }

        public function inf_3_acc($data){
            $this->db->select('pi2.id_p_items,
                        	   pi2.id_enlace,
                               pi2.id_partidad_presupuestaria,
                               pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                        	   pi2.id_ccnu,
                        	   c2.desc_ccnu,
                               pi2.fecha_desde,
                               pi2.fecha_hasta,
                        	   pi2.especificacion,
                               pi2.id_unidad_medida,
                        	   um.desc_unidad_medida,
                        	   pi2.i,
                        	   pi2.ii,
                        	   pi2.iii,
                        	   pi2.iv,
                               pi2.costo_unitario,
                        	   pi2.precio_total,
                        	   pi2.alicuota_iva,
                               pi2.iva_estimado,
                               pi2.monto_estimado');
            $this->db->join('programacion.ccnu c2','c2.codigo_ccnu = pi2.id_ccnu');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
            $this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
            $this->db->where('pi2.id_enlace', $data['id_p_acc_centralizada']);
            $this->db->where('pi2.id_p_acc', 1);
            $query = $this->db->get('programacion.p_items pi2');
            return $query->result_array();
        }

        public function inf_3_acc_b($data){
            $this->db->select('pi2.id_p_items,
                        	   pi2.id_enlace,
                               pi2.id_partidad_presupuestaria,
                               pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                        	   pi2.id_ccnu,
                        	   c2.desc_ccnu,
                               pi2.fecha_desde,
                               pi2.fecha_hasta,
                        	   pi2.especificacion,
                               pi2.id_unidad_medida,
                        	   um.desc_unidad_medida,
                               pi2.cantidad,
                        	   pi2.i,
                        	   pi2.ii,
                        	   pi2.iii,
                        	   pi2.iv,
                               pi2.cant_total_distribuir,
                               pi2.costo_unitario,
                        	   pi2.precio_total,
                        	   pi2.alicuota_iva,
                               pi2.iva_estimado,
                               pi2.monto_estimado');
            $this->db->join('programacion.ccnu c2','c2.codigo_ccnu = pi2.id_ccnu');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
            $this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
            $this->db->where('pi2.id_enlace', $data['id_p_acc_centralizada']);
            $this->db->where('pi2.id_p_acc', 1);
            $query = $this->db->get('programacion.p_items pi2');
            return $query->result_array();
        }

		public function inf_4_acc_o($data){
            $this->db->select('pi2.id_p_items,
								pi2.id_enlace,
								pi2.id_partidad_presupuestaria,
								pp.desc_partida_presupuestaria,
								pp.codigopartida_presupuestaria,
								pi2.fecha_desde,
								pi2.fecha_hasta,
								pi2.especificacion,
								pi2.id_unidad_medida,
								um.desc_unidad_medida,
								pi2.id_tip_obra,
								to2.descripcion_tip_obr,
								pi2.id_alcance_obra,
								ao.descripcion_alcance_obra,
								pi2.id_obj_obra,
								oo.descripcion_obj_obra,
								pi2.i,
								pi2.ii,
								pi2.iii,
								pi2.iv,
								pi2.costo_unitario,
								pi2.precio_total,
								pi2.alicuota_iva,
								pi2.iva_estimado,
								pi2.monto_estimado');
			$this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
            $this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
			$this->db->join('programacion.tip_obra to2','to2.id_tip_obra = pi2.id_tip_obra');
            $this->db->join('programacion.alcance_obra ao','ao.id_alcance_obra = pi2.id_alcance_obra');
            $this->db->join('programacion.obj_obra oo','oo.id_obj_obra = pi2.id_obj_obra');
            $this->db->where('pi2.id_enlace', $data['id_p_acc_centralizada']);
            $this->db->where('pi2.id_p_acc', 1);
            $query = $this->db->get('programacion.p_items pi2');
            return $query->result_array();
        }

        public function editar_programacion_acc($id_p_acc_centralizada, $id_programacion, $p_acc_centralizada,$p_items,$p_ffinanciamiento){

            $this->db->where('id_programacion', $id_programacion);
            $this->db->where('id_p_acc_centralizada', $id_p_acc_centralizada);
            $update = $this->db->update('programacion.p_acc_centralizada', $p_acc_centralizada);

            if ($update) {
                $this->db->where('id_enlace', $id_p_acc_centralizada);
                $this->db->where('id_p_acc', 1);
                $this->db->delete('programacion.p_items');

                    $cant_proy = $p_items['id_ccnu'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {
                        $data1 = array(
                            'id_enlace'                  => $id_p_acc_centralizada,
                            'id_p_acc'                   => 1,
                            'id_partidad_presupuestaria' => $p_items['id_par_presupuestaria'][$i],
                            'id_ccnu'                    => $p_items['id_ccnu'][$i],
							'id_tip_obra'                => 0,
                            'id_alcance_obra'            => 0,
                            'id_obj_obra'                => 0,
                            'fecha_desde'                => $p_items['fecha_desde'][$i],
                            'fecha_hasta'                => $p_items['fecha_hasta'][$i],
                            'especificacion'             => $p_items['especificacion'][$i],
                            'id_unidad_medida'           => $p_items['id_unidad_medida'][$i],
                            'cantidad'                   => 0,
                            'i'                          => $p_items['i'][$i],
                            'ii'                         => $p_items['ii'][$i],
                            'iii'                        => $p_items['iii'][$i],
                            'iv'                         => $p_items['iv'][$i],
                            'costo_unitario'             => 0,
                            'cant_total_distribuir'      => 0,
                            'precio_total'               => $p_items['precio_total'][$i],
                            'alicuota_iva'               => $p_items['id_alicuota_iva'][$i],
                            'iva_estimado'               => $p_items['iva_estimado'][$i],
                            'monto_estimado'               => $p_items['monto_estimado'][$i],
                        );
                        $this->db->insert('programacion.p_items',$data1);
                    }

                    $this->db->where('id_enlace', $id_p_acc_centralizada);
                    $this->db->where('id_p_acc', 1);
                    $this->db->delete('programacion.p_ffinanciamiento');

                    $cant_pff = $p_ffinanciamiento['id_par_presupuestaria'];
                    $count_pff = count($cant_pff);

                    for ($i=0; $i < $count_pff; $i++) {

                        $data2 = array(
                            'id_enlace'                  => $id_p_acc_centralizada,
                            'id_p_acc'                   => 1,
                            'id_estado'                  => $p_ffinanciamiento['id_estado'][$i],
                            'id_partidad_presupuestaria' => $p_ffinanciamiento['id_par_presupuestaria'][$i],
                            'id_fuente_financiamiento'   => $p_ffinanciamiento['id_fuente_financiamiento'][$i],
                            'porcentaje'                 => $p_ffinanciamiento['porcentaje'][$i],
                        );
                        $this->db->insert('programacion.p_ffinanciamiento',$data2);
                    }
            }
            return true;
        }

        public function editar_programacion_acc_b($id_p_acc_centralizada, $id_programacion, $p_acc_centralizada,$p_items,$p_ffinanciamiento){

            $this->db->where('id_programacion', $id_programacion);
            $this->db->where('id_p_acc_centralizada', $id_p_acc_centralizada);
            $update = $this->db->update('programacion.p_acc_centralizada', $p_acc_centralizada);

            if ($update) {
                $this->db->where('id_enlace', $id_p_acc_centralizada);
                $this->db->where('id_p_acc', 1);
                $this->db->delete('programacion.p_items');

                    $cant_proy = $p_items['id_ccnu'];
                    $count_prog = count($cant_proy);
                    for ($i=0; $i < $count_prog; $i++) {
                        $data1 = array(
                            'id_enlace'                  => $id_p_acc_centralizada,
                            'id_p_acc'                   => 1,
                            'id_partidad_presupuestaria' => $p_items['id_par_presupuestaria'][$i],
                            'id_ccnu'                    => $p_items['id_ccnu'][$i],
							'id_tip_obra'                => 0,
                            'id_alcance_obra'            => 0,
                            'id_obj_obra'                => 0,
                            'fecha_desde'                => $p_items['fecha_desde'],
                            'fecha_hasta'                => $p_items['fecha_hasta'],
                            'especificacion'             => $p_items['especificacion'][$i],
                            'id_unidad_medida'           => $p_items['id_unidad_medida'][$i],
                            'cantidad'                   => $p_items['cantidad'][$i],
                            'i'                          => $p_items['i'][$i],
                            'ii'                         => $p_items['ii'][$i],
                            'iii'                        => $p_items['iii'][$i],
                            'iv'                         => $p_items['iv'][$i],
                            'cant_total_distribuir'      => $p_items['cant_total_distribuir'][$i],
                            'costo_unitario'             => $p_items['costo_unitario'][$i],
                            'precio_total'               => $p_items['precio_total'][$i],
                            'alicuota_iva'               => $p_items['id_alicuota_iva'][$i],
                            'iva_estimado'               => $p_items['iva_estimado'][$i],
                            'monto_estimado'             => $p_items['monto_estimado'][$i],
                        );
                        $this->db->insert('programacion.p_items',$data1);
                    }

                    $this->db->where('id_enlace', $id_p_acc_centralizada);
                    $this->db->where('id_p_acc', 1);
                    $this->db->delete('programacion.p_ffinanciamiento');

                    $cant_pff = $p_ffinanciamiento['id_par_presupuestaria'];
                    $count_pff = count($cant_pff);

                    for ($i=0; $i < $count_pff; $i++) {

                        $data2 = array(
                            'id_enlace'                  => $id_p_acc_centralizada,
                            'id_p_acc'                   => 1,
                            'id_estado'                  => $p_ffinanciamiento['id_estado'][$i],
                            'id_partidad_presupuestaria' => $p_ffinanciamiento['id_par_presupuestaria'][$i],
                            'id_fuente_financiamiento'   => $p_ffinanciamiento['id_fuente_financiamiento'][$i],
                            'porcentaje'                 => $p_ffinanciamiento['porcentaje'][$i],
                        );
                        $this->db->insert('programacion.p_ffinanciamiento',$data2);
                    }
            }
            return true;
        }

        //FUNTION PARA EDITAR LA INFORMACION DESDE EL MODAL BIENES
        public function editar_fila_ip_b($data){

            $this->db->where('id_p_items', $data['id_items_proy']);

            $pp_s = $data['selc_part_pres'];
            if ($pp_s == 0) {
                $id_partidad_presupuestaria = $data['partida_pre'];
            }else {
                $id_partidad_presupuestaria = $data['selc_part_pres'];
            }

            $ccnu_s = $data['sel_ccnu'];
            if ($ccnu_s == 0) {
                $id_ccnu = $data['ccnu'];
            }else {
                $id_ccnu = $data['sel_ccnu'];
            }

            $unid_m_s = $data['sel_camb_unid_medi'];
            if ($unid_m_s == 0) {
                $id_unidad_medida = $data['unid_med'];
            }else {
                $id_unidad_medida = $data['sel_camb_unid_medi'];
            }

            $id_ali_iva = $data['sel_id_alic_iva'];
            if ($id_ali_iva == 0) {
                $alicuota_iva = $data['ali_iva_e'];
            }else {
                $alicuota_iva = $data['sel_id_alic_iva'];
            }

            $data1 = array(
                'id_partidad_presupuestaria' => $data['partida_pre'],
                'id_ccnu'                    => $id_ccnu,
                'especificacion'             => $data['esp'],
                'id_unidad_medida'           => $id_unidad_medida,
                'cantidad'                   => $data['cantidad'],
                'i'                          => $data['primero'],
                'ii'                         => $data['segundo'],
                'iii'                        => $data['tercero'],
                'iv'                         => $data['cuarto'],
                'cant_total_distribuir'      => $data['cantidad_distribuir'],
                'costo_unitario'             => $data['cost_uni'],
                'precio_total'               => $data['prec_t'],
                'alicuota_iva'               => $alicuota_iva,
                'iva_estimado'               => $data['monto_iva_e'],
                'monto_estimado'             => $data['monto_tot_est'],
            );
            $update = $this->db->update('programacion.p_items', $data1);
            return true;
        }

        public function cons_items_acc_b($data){
            $this->db->select('pi2.id_p_items,
                        	   pi2.id_enlace,
                               pi2.id_partidad_presupuestaria,
                               pp.desc_partida_presupuestaria,
                               pp.codigopartida_presupuestaria,
                        	   pi2.id_ccnu,
                        	   c2.desc_ccnu,
                        	   pi2.fecha_desde,
                        	   pi2.fecha_hasta,
                        	   pi2.especificacion,
                               pi2.id_unidad_medida,
                        	   um.desc_unidad_medida,
                               pi2.cantidad,
                               pi2.costo_unitario,
                        	   pi2.i,
                        	   pi2.ii,
                        	   pi2.iii,
                        	   pi2.iv,
                               pi2.cant_total_distribuir,
                        	   pi2.precio_total,
                        	   pi2.alicuota_iva,
                               pi2.iva_estimado,
                               pi2.monto_estimado');
            $this->db->join('programacion.ccnu c2','c2.codigo_ccnu = pi2.id_ccnu');
            $this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
            $this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
            $this->db->where('pi2.id_p_items', $data['id_items_proy']);
            $this->db->where('pi2.id_p_acc', 1);
            $query = $this->db->get('programacion.p_items pi2');
            return $query->row_array();
        }

		public function cons_items_acc_o($data){
            
			$this->db->select('pi2.id_p_items,
								pi2.id_enlace,
								pi2.id_partidad_presupuestaria,
								pp.desc_partida_presupuestaria,
								pp.codigopartida_presupuestaria,
								pi2.fecha_desde,
								pi2.fecha_hasta,
								pi2.especificacion,
								pi2.id_unidad_medida,
								um.desc_unidad_medida,
								pi2.id_tip_obra,
								to2.descripcion_tip_obr,
								pi2.id_alcance_obra,
								ao.descripcion_alcance_obra,
								pi2.id_obj_obra,
								oo.descripcion_obj_obra,
								pi2.i,
								pi2.ii,
								pi2.iii,
								pi2.iv,
								pi2.costo_unitario,
								pi2.precio_total,
								pi2.alicuota_iva,
								pi2.iva_estimado,
								pi2.monto_estimado');
			$this->db->join('programacion.partida_presupuestaria pp','pp.id_partida_presupuestaria = pi2.id_partidad_presupuestaria');
            $this->db->join('programacion.unidad_medida um','um.id_unidad_medida = pi2.id_unidad_medida');
			$this->db->join('programacion.tip_obra to2','to2.id_tip_obra = pi2.id_tip_obra');
            $this->db->join('programacion.alcance_obra ao','ao.id_alcance_obra = pi2.id_alcance_obra');
            $this->db->join('programacion.obj_obra oo','oo.id_obj_obra = pi2.id_obj_obra');
            $this->db->where('pi2.id_p_items', $data['id_items_proy']);
            $this->db->where('pi2.id_p_acc', 1);
            $query = $this->db->get('programacion.p_items pi2');
            return $query->row_array();
        }

        public function eliminar_acc($data){
            $this->db->where('id_p_acc_centralizada', $data['id_items_acc']);
            $query = $this->db->delete('programacion.p_acc_centralizada');

            if ($query) {
                $this->db->where('id_enlace', $data['id_items_acc']);
                $this->db->where('id_p_acc', 1);
                $query = $this->db->delete('programacion.p_items');

                $this->db->where('id_enlace', $data['id_items_acc']);
                $this->db->where('id_p_acc', 1);
                $query = $this->db->delete('programacion.p_ffinanciamiento');
            }
           return true;
        }


		public function editar_fila_ip_b_o($data){

            $this->db->where('id_p_items', $data['id_items_proy']);

            $pp_s = $data['selc_part_pres'];
            if ($pp_s == 0) {
                $id_partidad_presupuestaria = $data['partida_pre'];
            }else {
                $id_partidad_presupuestaria = $data['selc_part_pres'];
            }

            $sel_obra = $data['sel_obra'];
            if ($sel_obra == 0) {
                $sel_obra = $data['obra'];
            }else {
                $sel_obra = $data['sel_obra'];
            }

			$sel_alc_obr = $data['sel_alc_obr'];
            if ($sel_alc_obr == 0) {
                $sel_alc_obr = $data['alc_obr'];
            }else {
                $sel_alc_obr = $data['sel_alc_obr'];
            }

			$sel_obj_obr = $data['sel_obj_obr'];
            if ($sel_obj_obr == 0) {
                $sel_obj_obr = $data['obj_obr'];
            }else {
                $sel_obj_obr = $data['sel_obj_obr'];
            }

            $unid_m_s = $data['sel_camb_unid_medi'];
            if ($unid_m_s == 0) {
                $id_unidad_medida = $data['unid_med'];
            }else {
                $id_unidad_medida = $data['sel_camb_unid_medi'];
            }

            $id_ali_iva = $data['sel_id_alic_iva'];
            if ($id_ali_iva == 0) {
                $alicuota_iva = $data['ali_iva_e'];
            }else {
                $alicuota_iva = $data['sel_id_alic_iva'];
            }

            $data1 = array(
                'id_partidad_presupuestaria' => $data['partida_pre'],
                'id_tip_obra'                => $sel_obra,
                'id_alcance_obra'            => $sel_alc_obr,
				'id_obj_obra'            	 => $sel_obj_obr,
                'especificacion'             => $data['esp'],
                'id_unidad_medida'           => $id_unidad_medida,
				'fecha_desde'                => $data['fecha_desde_e'],
                'fecha_hasta'                => $data['fecha_hasta_e'],
                'cantidad'                   => $data['cant_total_dist_m'],
                'i'                          => $data['primero'],
                'ii'                         => $data['segundo'],
                'iii'                        => $data['tercero'],
                'iv'                         => $data['cuarto'],
                'cant_total_distribuir'      => 0,
                'costo_unitario'             => 0,
                'precio_total'               => $data['prec_t'],
                'alicuota_iva'               => $alicuota_iva,
                'iva_estimado'               => $data['monto_iva_e'],
                'monto_estimado'             => $data['monto_tot_est'],
            );
            $update = $this->db->update('programacion.p_items', $data1);
            return true;
        }
}