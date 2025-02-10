<?php
class Maletero_model extends CI_model
{ 
  function consultar_maletero(){
    $this->db->select('*');
    $this->db->from('public.maleteros');
    $this->db->order_by("id", "Asc");
    $query = $this->db->get();
    return $query->result_array();
} 

 

         function ver_tipPago(){
    $this->db->select('*');
    $this->db->from('public.tipopago');
    $this->db->order_by("id_tipo_pago", "Asc");
    $query = $this->db->get();
    return $query->result_array();
} 

 function consultar_tarifa(){
    $this->db->select('*');
    $this->db->from('public.tarifa');
        $this->db->where('id_tarifa', 12);
    $query = $this->db->get();
    return $query->result_array();
} 
  //GUARDAR
 function registrar_b($data){
    $this->db->insert('public.maleteros',$data);
    return true;
}
//VER PARA ver maletero y editar
function consulta_b($data){
    $this->db->select('*');
    $this->db->from('public.maleteros');
    $this->db->where('id', $data['id']);
   // $this->db->order_by("codigo_b", "Asc");
    $query = $this->db->get();
    if (count($query->result()) > 0) {
        return $query->row();
    }
}
function editar_b($data){
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

public function registrar_maletero_asignacion($data) {
    // Iniciar la transacción
    $this->db->trans_start();
    $this->db->select('id_maletero');
   $this->db->where('id_maletero', $data['id_maletero']);
   $this->db->where('id_status', 0);
     $query8 = $this->db->get('public.asignacion_maletero');
    

  if ($query8->num_rows() > 0) {
            return array('error' => 'El maletero ya esta asignado.Seleccione otro Maletero');


    }
    else {
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

        }else {
        
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
 function consultar_maletero_asignacion(){
    $this->db->select('m.*, p.descripcion ');
    $this->db->from('public.asignacion_maletero m');
    $this->db->join('public.maleteros p', 'p.id = m.id_maletero');

    $this->db->order_by("id_asignacion_maletero", "desc");
    $query = $this->db->get();
    return $query->result_array();
} 

 function consulta_maletero_asignacion($data1){ 
    
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
                if($query->num_rows()>0){
                    return $query->result();
                }
                else{
                    return NULL;
                }
            }  


 function consultar_maletero_asignacion_pagos(){
    $this->db->select('m.*, t.descripcion, p.nombre,p.nombre_lancha ');
    $this->db->from('public.mensualidad_maletero m');
    $this->db->join('public.asignacion_maletero p', 'p.id_asignacion_maletero = m.id_asignacion_maletero');
    $this->db->join('public.maleteros t', 't.id = p.id_maletero');
   $this->db->where('m.id_status', 2);



    $this->db->order_by("m.id_asignacion_maletero", "desc");
    $query = $this->db->get();
    return $query->result_array();
} 
function consultar_maletero_asignacion_deuda(){
    $this->db->select('m.*, t.descripcion, p.nombre,p.nombre_lancha ');
    $this->db->from('public.mensualidad_maletero m');
    $this->db->join('public.asignacion_maletero p', 'p.id_asignacion_maletero = m.id_asignacion_maletero');
    $this->db->join('public.maleteros t', 't.id = p.id_maletero');
   $this->db->where('m.id_status', 0);



    $this->db->order_by("m.id_asignacion_maletero", "desc");
    $query = $this->db->get();
    return $query->result_array();
} 

public function consultar_deuda2($data){
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
        public function guardar_proc_pag_maleteros($data){
             $this->db->select('max(m.id_factura) as id1');
            $query3 = $this->db->get('public.mensualidad_maletero m');
            $response3 = $query3->row_array();
            //$id= $data['id_mov_consig'];
            if ($data['fechatrnas'] == '') {
                $fecha_tranfer = date('Y-m-d');
            }else{
                $fecha_tranfer = $data['fechatrnas'];
            }
            if ($response3){
                $id_factura = $response3['id1']+ 1;
            
            //aca modifique
            $data1 = array('id_status' => 2,
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
}