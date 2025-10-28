<?php
class Maletero_model extends CI_model
{
    //   function consultar_maletero(){
    //     $this->db->select('*');
    //     $this->db->from('public.maleteros');
    //     $this->db->order_by("id", "Asc");
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    function consultar_maletero()
    {
        $this->db->select('id, descripcion');
        $this->db->from('public.maleteros');
        $this->db->where('id NOT IN (SELECT id_maletero FROM public.asignacion_maletero)', NULL, FALSE);
        $this->db->order_by("id", "ASC");
        return $this->db->get()->result_array();
    }


    function ver_tipPago()
    {
        $this->db->select('*');
        $this->db->from('public.tipopago');
        $this->db->order_by("id_tipo_pago", "Asc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function consultar_tarifa()
    {
        $this->db->select('*');
        $this->db->from('public.tarifa');
        $this->db->where('id_tarifa', 12);
        $query = $this->db->get();
        return $query->result_array();
    }
    //GUARDAR
    function registrar_b($data)
    {
        $this->db->insert('public.maleteros', $data);
        return true;
    }
    //VER PARA ver maletero y editar
    function consulta_b($data)
    {
        $this->db->select('*');
        $this->db->from('public.maleteros');
        $this->db->where('id', $data['id']);
        // $this->db->order_by("codigo_b", "Asc");
        $query = $this->db->get();
        if (count($query->result()) > 0) {
            return $query->row();
        }
    }
    function editar_b($data)
    {
        $this->db->where('id', $data['id']);
        $update = $this->db->update('public.maleteros', $data);
        return true;
    }

    //  function registrar_maletero_asignacion($data){
    //     $this->db->insert('public.asignacion_maletero',$data);
    //     return $this->db->insert_id();
    // }
    // function registrar_maletero_asignacion($data) {
    //      $this->db->select('max(e.id_asignacion_maletero) as id');
    //             $query = $this->db->get('public.asignacion_maletero e');
    //             $response =$query->row_array();
    //             if ($response){
    //                 $id = $response['id'] + 1 ;

    //             $data1 = array(
    //                             'id_asignacion_maletero'     => $id,
    //                             'id_maletero'      => $data['id_maletero'],
    //                             'nombre'    => $data['nombre'],
    //                             'cedrif'	 	=> $data['cedrif'],
    //                             'tele'	 	=> $data['tele'],
    //                             'correo'	 	=> $data['correo'],
    //                             'nombre_lancha'	 	=> $data['nombre_lancha'],
    //                             'id_tarifa'	 	=> $data['id_tarifa'],
    //                             'fecha_deuda'	 	=> $data['fecha_deuda'],
    //                             'fecha_update'	 	=> $data['fecha_update'],
    //                             'id_status'	 	=> $data['id_status'],                   

    //                         );
    //             $x = $this->db->insert('public.asignacion_maletero',$data1);
    //            if ($x) {
    //                 $id = $id;         
    //                 $data3 = array(                 
    //                     'id_asignacion_maletero'		    => $id,
    //                     'id_status'		=> 2,
    //                     'pago'		=> $data['pago'],
    //                     'id_tipo_pago'		=> $data['id_tipo_pago'],
    //                     'id_banco'		=> $data['id_banco'],
    //                     'transactionid'		=> $data['nro_referencia'],
    //                     'fechatrnas'		=> $data['fechatrnas'],
    //                     'nota'		=> $data['nota'],



    //                         );
    //                         $this->db->insert('mensualidad_maletero', $data3);

    //                        return $id;  
    //                  }

    //         }
    //         } 

    public function registrar_maletero_asignacion($data)
    {
        // Iniciar la transacción
        $this->db->trans_start();
        $this->db->select('id_maletero');
        $this->db->where('id_maletero', $data['id_maletero']);
        $this->db->where('id_status', 0);
        $query8 = $this->db->get('public.asignacion_maletero');


        if ($query8->num_rows() > 0) {
            return array('error' => 'El maletero ya esta asignado.Seleccione otro Maletero');
        } else {
            // $query_check = $this->db->get('public.asignacion_maletero');

            // if ($query_check->num_rows() > 0) {
            //     // Si ya existe, retornar un error
            //     return array('error' => 'El registro con este id_maletero ya existe.');
            // }
            // Obtener el máximo id_asignacion_maletero
            $this->db->select('max(e.id_asignacion_maletero) as id');
            $query = $this->db->get('public.asignacion_maletero e');
            $response = $query->row_array();
            $this->db->select('max(m.id_factura) as id1');
            $query3 = $this->db->get('public.mensualidad_maletero m');
            $response3 = $query3->row_array();
            $fechatrnas = $data['fechatrnas'];
            if ($fechatrnas == '') {

                $fechatrnas1 = date("Y-m-d");
            } else {

                $fechatrnas1 = $data['fechatrnas'];
            }
            if ($response) {
                $id = $response['id'] + 1;

                $data1 = array(
                    'id_asignacion_maletero' => $id,
                    'id_maletero' => $data['id_maletero'],
                    'nombre' => $data['nombre'],
                    'cedrif' => $data['cedrif'],
                    'tele' => $data['tele'],
                    'correo' => $data['correo'],
                    'nombre_lancha' => $data['nombre_lancha'],
                    'id_tarifa' => $data['id_tarifa'],
                    'fecha_deuda' => $data['fecha_deuda'],
                    'fecha_update' => $data['fecha_update'],
                    'id_status' => $data['id_status'],
                );

                // Realizar el primer insert
                $x = $this->db->insert('public.asignacion_maletero', $data1);

                if ($x) {
                    $id_factura = $response3['id1'] + 1;

                    $data3 = array(
                        'id_asignacion_maletero' => $id,
                        'id_status' => 2,
                        'pago' => $data['pago'],
                        'id_tipo_pago' => $data['id_tipo_pago'],
                        'id_banco' => $data['id_banco'],
                        'transactionid' => $data['nro_referencia'],
                        'fechatrnas' => $fechatrnas1,
                        'nota' => $data['nota'],
                        'id_factura' => $id_factura,

                    );

                    // Realizar el segundo insert
                    $this->db->insert('mensualidad_maletero', $data3);
                }
                //actualizar estatus de asignacion maletero 
                //aca modifique
                $dat1 = array(
                    'asignado' => 1, // significa que el maletero esta asignado
                );

                $this->db->where('id', $data['id_maletero']);
                $update = $this->db->update('public.maleteros', $dat1);

                // Finalizar la transacción
                $this->db->trans_complete();
                // Verificar si la transacción fue exitosa
                if ($this->db->trans_status() === FALSE) {
                    // Si hubo un error, lanzar un error
                    return array('error' => 'Error al guardar los datos. Intente nuevamente.');
                } else {
                    return $id_factura; // Retornar el id si todo fue exitoso
                }
            } else {
                return array('error' => 'No se pudo obtener el ID de asignación.');
            }
        }
    }
    function consultar_maletero_asignacion()
    {
        $this->db->select('m.*, p.descripcion ');
        $this->db->from('public.asignacion_maletero m');
        $this->db->join('public.maleteros p', 'p.id = m.id_maletero');

        $this->db->order_by("id_asignacion_maletero", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    function consulta_maletero_asignacion($data1)
    {

        $query = $this->db->query("SELECT c.* , o.* , e.descripcion, m.descripcion as tipo_pago,
             p.descripcion as estatus
          
            
                 FROM  public.mensualidad_maletero c 
              join  public.asignacion_maletero o on o.id_asignacion_maletero = c.id_asignacion_maletero	
               join  public.maleteros e on e.id = o.id_maletero	
               join  public.tipopago m on m.id_tipo_pago = c.id_tipo_pago	
                join  public.estatus p on p.id_status = c.id_status	
                --join  public.clasificacion cl on cl.id_clasificacion = c.id_clasificacion
                -- join  public.organoente a on a.id_organoente = o.id_organoenteads	

                    
                 where c.id_factura = '$data1' 
                  ");
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
    }


    function consultar_maletero_asignacion_pagos()
    {
        $this->db->select('m.*, t.descripcion, p.nombre,p.nombre_lancha ');
        $this->db->from('public.mensualidad_maletero m');
        $this->db->join('public.asignacion_maletero p', 'p.id_asignacion_maletero = m.id_asignacion_maletero');
        $this->db->join('public.maleteros t', 't.id = p.id_maletero');
        $this->db->where('m.id_status', 2);



        $this->db->order_by("m.id_asignacion_maletero", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }
    function consultar_maletero_asignacion_deuda()
    {
        $this->db->select('m.*, t.descripcion, p.nombre,p.nombre_lancha ');
        $this->db->from('public.mensualidad_maletero m');
        $this->db->join('public.asignacion_maletero p', 'p.id_asignacion_maletero = m.id_asignacion_maletero');
        $this->db->join('public.maleteros t', 't.id = p.id_maletero');
        // $this->db->where('m.id_status', 0);

        $this->db->order_by("m.id_asignacion_maletero", "desc");
        $query = $this->db->get();
        return $query->result_array();
    }

    public function consultar_deuda2($data)
    {
        $this->db->select('m.*, t.descripcion, p.nombre,p.nombre_lancha ');
        $this->db->from('public.mensualidad_maletero m');
        $this->db->join('public.asignacion_maletero p', 'p.id_asignacion_maletero = m.id_asignacion_maletero');
        $this->db->join('public.maleteros t', 't.id = p.id_maletero');

        $this->db->where('m.id_mov_consig', $data['id_mov_consig']);
        $this->db->where('m.id_status', 0);
        $query = $this->db->get();
        $resultado = $query->row_array();
        return $resultado;
    }
    public function guardar_proc_pag_maleteros($data)
    {
        $this->db->select('max(m.id_factura) as id1');
        $query3 = $this->db->get('public.mensualidad_maletero m');
        $response3 = $query3->row_array();
        //$id= $data['id_mov_consig'];
        if ($data['fechatrnas'] == '') {
            $fecha_tranfer = date('Y-m-d');
        } else {
            $fecha_tranfer = $data['fechatrnas'];
        }
        if ($response3) {
            $id_factura = $response3['id1'] + 1;

            //aca modifique
            $data1 = array(
                'id_status' => 2,
                'fechapago' => date('Y-m-d'),
                'nota' => $data['nota'],
                'id_factura' => $id_factura,
                'pago' => $data['pago'],
                'id_tipo_pago' => $data['id_tipo_pago'],
                'id_banco' => $data['id_banco'],
                'transactionid' => $data['nro_referencia'],
                'fechatrnas' => $fecha_tranfer,
            );

            $this->db->where('id_mov_consig', $data['id_mov_consig_ver']);
            $update = $this->db->update('mensualidad_maletero', $data1);

            //return true;
            return $id_factura;
        }
    }
    // public function generar_deudas_maleteros()
    // {
    //     // Iniciar transacción
    //     $this->db->trans_start();

    //     // 1. Obtener maleteros asignados activos (id_status = 0)
    //     $this->db->select('id_asignacion_maletero, id_maletero, id_tarifa, fecha_reg');
    //     $this->db->where('id_status', 0);
    //     $asignaciones = $this->db->get('public.asignacion_maletero')->result_array();

    //     $deudas_generadas = 0;
    //     $hoy = date('Y-m-d');

    //     foreach ($asignaciones as $asignacion) {
    //         $fecha_registro = $asignacion['fecha_reg'];
    //         $proxima_deuda = date('Y-m-d', strtotime($fecha_registro . ' +3 months'));

    //         // Verificar si hoy es igual o posterior a la próxima fecha de deuda
    //         if ($hoy >= $proxima_deuda) {
    //             // 2. Verificar si ya existe una deuda para este período
    //             $this->db->where('id_asignacion_maletero', $asignacion['id_asignacion_maletero']);
    //             $this->db->where('date_deuda >=', $fecha_registro);
    //             $this->db->where('date_deuda <=', $proxima_deuda);
    //             $this->db->where('id_status', 0); // Deudas pendientes
    //             $existe_deuda = $this->db->get('public.mensualidad_maletero')->num_rows();

    //             if ($existe_deuda == 0) {
    //                 // 3. Obtener el monto de la tarifa
    //                 $this->db->select('desc_tarifa as monto');
    //                 $this->db->where('id_tarifa', $asignacion['id_tarifa']);
    //                 $tarifa = $this->db->get('public.tarifa')->row_array();

    //                 if ($tarifa) {
    //                     // 4. Insertar la nueva deuda
    //                     $deuda = array(
    //                         'id_asignacion_maletero' => $asignacion['id_asignacion_maletero'],
    //                         'id_status' => 0, // Deuda pendiente
    //                         'id_factura' => 0,
    //                         'id_tipo_pago' => 0,
    //                         'nro_referencia' => 0,
    //                         'pago' => $tarifa['monto'], // Monto de la tarifa
    //                         'id_banco' => 0,
    //                         'fechatrnas' => date('Y-m-d H:i:s'), // Fecha de registro de la deud
    //                         'transactionid' => 0,
    //                         'nota' => 'Deuda generada automáticamente',
    //                         'fechapago' => null, // No pagada aún
    //                         'fecha_reg' => date('Y-m-d H:i:s'), // Fecha de registro de la deuda
    //                         'tasa' => 0,
    //                         'bolivares' => 0,
    //                         'date_deuda' => $proxima_deuda, // Fecha en que vence

    //                     );

    //                     $this->db->insert('public.mensualidad_maletero', $deuda);
    //                     $deudas_generadas++;

    //                     // 5. Actualizar fecha_reg en asignación_maletero para próximo ciclo
    //                     $this->db->where('id_asignacion_maletero', $asignacion['id_asignacion_maletero']);
    //                     $this->db->update('public.asignacion_maletero', array(
    //                         'fecha_reg' => $proxima_deuda
    //                     ));
    //                 }
    //             }
    //         }
    //     }

    //     // Finalizar transacción
    //     $this->db->trans_complete();

    //     return array(
    //         'success' => true,
    //         'deudas_generadas' => $deudas_generadas,
    //         'message' => 'Proceso completado. Deudas generadas: ' . $deudas_generadas
    //     );
    // }

    public function generar_deudas_maleteros()
    {
        // Iniciar transacción
        $this->db->trans_start();

        // 1. Obtener maleteros asignados activos (id_status = 0)
        $this->db->select('id_asignacion_maletero, id_maletero, id_tarifa, fecha_reg');
        $this->db->where('id_status', 0);
        $asignaciones = $this->db->get('public.asignacion_maletero')->result_array();

        $deudas_generadas = 0;
        $hoy = date('Y-m-d');

        foreach ($asignaciones as $asignacion) {
            $fecha_registro = $asignacion['fecha_reg'];
            $proxima_deuda = date('Y-m-d', strtotime($fecha_registro . ' +3 months'));

            // Verificar si hoy es la fecha exacta de la próxima deuda
            if ($hoy == $proxima_deuda) {
                // 2. Verificar si ya existe esta deuda específica
                $this->db->where('id_asignacion_maletero', $asignacion['id_asignacion_maletero']);
                $this->db->where('DATE(date_deuda)', $proxima_deuda);
                $existe_deuda = $this->db->get('public.mensualidad_maletero')->num_rows();

                if ($existe_deuda == 0) {
                    // 3. Obtener el monto de la tarifa
                    $this->db->select('desc_tarifa as monto');
                    $this->db->where('id_tarifa', $asignacion['id_tarifa']);
                    $tarifa = $this->db->get('public.tarifa')->row_array();

                    if ($tarifa) {
                        // 4. Insertar la nueva deuda
                        $deuda = array(
                            'id_asignacion_maletero' => $asignacion['id_asignacion_maletero'],
                            'id_status' => 0, // Deuda pendiente
                            'pago' => $tarifa['monto'],
                            'date_deuda' => $proxima_deuda, // Fecha de vencimiento
                            'fechatrnas' => date('Y-m-d H:i:s'),
                            'nota' => 'Deuda trimestral generada automáticamente',
                            'fecha_reg' => date('Y-m-d H:i:s'),
                            // Campos por defecto
                            'id_factura' => 0,
                            'id_tipo_pago' => 0,
                            'nro_referencia' => '0',
                            'id_banco' => 0,
                            'transactionid' => '0',
                            'fechapago' => null,
                            'tasa' => 0,
                            'bolivares' => 0
                        );

                        $this->db->insert('public.mensualidad_maletero', $deuda);
                        $deudas_generadas++;

                        // 5. Actualizar fecha_reg en asignacion_maletero para el próximo ciclo
                        $this->db->where('id_asignacion_maletero', $asignacion['id_asignacion_maletero']);
                        $this->db->update('public.asignacion_maletero', array(
                            'fecha_reg' => $proxima_deuda
                        ));
                    }
                }
            }
        }

        // Finalizar transacción
        $this->db->trans_complete();

        return array(
            'success' => true,
            'deudas_generadas' => $deudas_generadas,
            'message' => 'Deudas generadas: ' . $deudas_generadas
        );
    }

    public function obtener_totales_maleteros()
    {
        // Consulta para obtener los totales
        $this->db->select("
        COUNT(*) as totalm,
        SUM(CASE WHEN asignado = 1 THEN 1 ELSE 0 END) as totalasignado,
        SUM(CASE WHEN asignado = 0 THEN 1 ELSE 0 END) as totaldisponible
    ");
        $this->db->from('public.maleteros');

        return $this->db->get()->row_array();
    }

    public function obtener_estado_financiero()
    {
        // Consulta para obtener total de deudas (id_status = 0)
        $this->db->select('SUM(pago) as total_deuda');
        $this->db->where('id_status', 0);
        $deudas = $this->db->get('public.mensualidad_maletero')->row_array();

        // Consulta para obtener total pagado (id_status = 1)
        $this->db->select('SUM(pago) as total_pagado');
        $this->db->where('id_status', 2);
        $pagos = $this->db->get('public.mensualidad_maletero')->row_array();

        return array(
            'total_deuda' => $deudas['total_deuda'] ?? 0,
            'total_pagado' => $pagos['total_pagado'] ?? 0
        );
    }

    public function obtener_detalles_financieros()
    {
        $this->db->select('
        m.id_asignacion_maletero,
        mal.descripcion as maletero,a.nombre,
        SUM(CASE WHEN m.id_status = 0 THEN m.pago ELSE 0 END) as deuda,
        SUM(CASE WHEN m.id_status = 2 THEN m.pago ELSE 0 END) as pagado
    ');
        $this->db->from('public.mensualidad_maletero m');
        $this->db->join('public.asignacion_maletero a', 'm.id_asignacion_maletero = a.id_asignacion_maletero');
        $this->db->join('public.maleteros mal', 'a.id_maletero = mal.id');
        $this->db->group_by('m.id_asignacion_maletero, mal.descripcion, a.nombre');

        return $this->db->get()->result_array();
    }

    ////////////////nuevo adelanto pago maletero
    // === PREVIEW: datos para el modal de Adelanto (sin elegir fecha) ===
    public function preparar_prepago_info($id_asignacion_maletero)
    {
        // Traer cabecera de asignación y tarifa
        $this->db->select('a.id_asignacion_maletero, a.id_maletero, a.id_tarifa, a.fecha_reg, a.nombre, a.nombre_lancha, m.descripcion AS maletero');
        $this->db->from('public.asignacion_maletero a');
        $this->db->join('public.maleteros m', 'm.id = a.id_maletero');
        $this->db->where('a.id_asignacion_maletero', $id_asignacion_maletero);
        $asig = $this->db->get()->row_array();

        if (!$asig) return ['error' => 'Asignación no encontrada'];

        // 1) Bloqueo por trimestre vencido
        $hoy = date('Y-m-d');
        $this->db->select('COUNT(*) AS cnt');
        $this->db->from('public.mensualidad_maletero');
        $this->db->where('id_asignacion_maletero', $id_asignacion_maletero);
        $this->db->where('id_status', 0);
        $this->db->where('date_deuda <=', $hoy);
        $vencidos = $this->db->get()->row_array();
        if ((int)$vencidos['cnt'] > 0) {
            return ['bloqueado' => true, 'message' => 'Tiene un trimestre vencido. No puede adelantar.'];
        }

        // Tarifa (monto)
        $this->db->select('desc_tarifa AS monto');
        $this->db->from('public.tarifa');
        $this->db->where('id_tarifa', $asig['id_tarifa']);
        $tarifa = $this->db->get()->row_array();
        if (!$tarifa) return ['error' => 'Tarifa no encontrada'];

        // 2) Calcular el próximo trimestre (sin saltos)
        $proximo = $this->calcular_proximo_trimestre($asig['fecha_reg'], $id_asignacion_maletero);

        if (!$proximo) {
            return ['error' => 'No se pudo calcular el próximo trimestre.'];
        }

        return [
            'success'                 => true,
            'id_asignacion_maletero'  => $asig['id_asignacion_maletero'],
            'maletero'                => $asig['maletero'],
            'asignado_a'              => $asig['nombre'],
            'lancha'                  => $asig['nombre_lancha'],
            'monto'                   => $tarifa['monto'],
            'date_deuda_sugerida'     => $proximo,   // <- esto se muestra en el modal (solo lectura)
        ];
    }

    // === CONFIRMAR: paga automáticamente el próximo trimestre calculado ===
    public function registrar_prepago_maletero_auto($data)
    {
        $id_asig = $data['id_asignacion_maletero'];

        // Repetimos controles y cálculos para consistencia
        $info = $this->preparar_prepago_info($id_asig);
        if (!empty($info['error'])) return $info;
        if (!empty($info['bloqueado'])) return $info;

        $date_deuda = $info['date_deuda_sugerida'];
        $monto      = $info['monto'];
        $fecha_transfer = !empty($data['fechatrnas']) ? $data['fechatrnas'] : date('Y-m-d');

        // ¿Ya existe registro para ese período?
        $this->db->from('public.mensualidad_maletero');
        $this->db->where('id_asignacion_maletero', $id_asig);
        $this->db->where('DATE(date_deuda) =', $date_deuda);
        $existe = $this->db->get()->row_array();

        // Siguiente id_factura
        $this->db->select('MAX(m.id_factura) AS id1');
        $max = $this->db->get('public.mensualidad_maletero m')->row_array();
        $id_factura = ((int)($max['id1'] ?? 0)) + 1;

        if ($existe) {
            // Si ya existe pagado, no permitir
            if ((int)$existe['id_status'] === 2) {
                return ['error' => 'Ese trimestre ya fue pagado.'];
            }
            // Si existe como pendiente (creado por tu generador) → actualizar a pagado (prepago)
            if ((int)$existe['id_status'] === 0) {
                $upd = [
                    'id_status'     => 2,
                    'fechapago'     => date('Y-m-d'),
                    'nota'          => $data['nota'],
                    'id_factura'    => $id_factura,
                    'pago'          => $monto,
                    'id_tipo_pago'  => $data['id_tipo_pago'] ?: 0,
                    'id_banco'      => $data['id_banco'] ?: 0,
                    'transactionid' => $data['nro_referencia'] ?: '0',
                    'fechatrnas'    => $fecha_transfer,
                ];
                $this->db->where('id_mov_consig', $existe['id_mov_consig']);
                $this->db->update('public.mensualidad_maletero', $upd);

                return ['success' => true, 'id_factura' => $id_factura, 'date_deuda' => $date_deuda, 'message' => 'Prepago aplicado al período pendiente.'];
            }
        }

        // No existe: crear registro como pagado para ese período (prepago)
        $insert = [
            'id_asignacion_maletero' => $id_asig,
            'id_status'     => 2, // pagado
            'id_factura'    => $id_factura,
            'id_tipo_pago'  => $data['id_tipo_pago'] ?: 0,
            'nro_referencia' => $data['nro_referencia'] ?: null,
            'pago'          => $monto,
            'id_banco'      => $data['id_banco'] ?: 0,
            'fechatrnas'    => $fecha_transfer,
            'transactionid' => $data['nro_referencia'] ?: '0',
            'nota'          => $data['nota'],
            'fechapago'     => date('Y-m-d'),
            'fecha_reg'     => date('Y-m-d'),
            'tasa'          => 0,
            'bolivares'     => 0,
            'date_deuda'    => $date_deuda,
        ];
        $ok = $this->db->insert('public.mensualidad_maletero', $insert);

        if ($ok) {
            return ['success' => true, 'id_factura' => $id_factura, 'date_deuda' => $date_deuda, 'message' => 'Prepago registrado correctamente.'];
        } else {
            return ['error' => 'No se pudo registrar el prepago.'];
        }
    }

    /**
     * Calcula el PRÓXIMO trimestre (cada 3 meses desde fecha_reg),
     * respetando estas reglas:
     *  - No se permite “saltar”: siempre devuelve el INMEDIATO siguiente
     *    a partir del ancla de ciclo (fecha_reg).
     *  - Si ya existe un registro (pendiente o pagado) para ese date_deuda,
     *    avanza +3m, y así sucesivamente, hasta encontrar el primer hueco futuro.
     */
    private function calcular_proximo_trimestre($fecha_reg, $id_asignacion_maletero)
    {
        if (!$fecha_reg) return null;

        $hoy = new DateTime(date('Y-m-d'));
        $anchor = new DateTime($fecha_reg); // ancla del ciclo (inicio)

        // Función para saber si existe algún registro (cualquiera status) para un date_deuda
        $existePeriodo = function ($dateStr) use ($id_asignacion_maletero) {
            $this->db->from('public.mensualidad_maletero');
            $this->db->where('id_asignacion_maletero', $id_asignacion_maletero);
            $this->db->where('DATE(date_deuda) =', $dateStr);
            return $this->db->count_all_results() > 0;
        };

        // Avanza en pasos de 3 meses desde el ancla hasta ubicar el 1er período futuro libre
        $curr = clone $anchor;
        while ($curr <= $hoy) {
            $curr->modify('+3 months');
        }

        // Si el primer futuro ya existe (pagado o pendiente), sigue sumando de a 3 meses
        $safeCounter = 0;
        while ($existePeriodo($curr->format('Y-m-d'))) {
            $curr->modify('+3 months');
            $safeCounter++;
            if ($safeCounter > 40) break; // safety
        }

        return $curr->format('Y-m-d');
    }
}
