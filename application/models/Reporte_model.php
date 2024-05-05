<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Reporte_model extends CI_Model {
    public function getCanon(){         
        $this->db->select('* ');
        $query = $this->db->get('public.buque');
        return $query->result_array();
	}
    public function getCanon2(){         
        $this->db->select('* ');
        $this->db->where('desincorporar', 1);
        $query = $this->db->get('public.buque');
        return $query->result_array();
	}
    public function bus_ubicacion(){         
        $this->db->select('*');
        $query = $this->db->get('public.ubicacion');
        return $query->result_array();
    }
   
    public function consulta_ubicacion( $desde, $hasta) {   
        $cadena = "id >= '1'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
	}
        
    public function consulta_ubicacion_tierra( $desde, $hasta) {
        $cadena = "id_tarifa ='2'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
	}
        
    public function consulta_ubicacion_agua( $desde, $hasta) {
       // die(print_r($hasta, TRUE));
        $cadena = "id_tarifa ='1'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
	}
    
     public function consulta_ubicacion_agua2($data){
         //die(print_r($data['desde'], TRUE));
        $this->db->select('m.*');
        $this->db->from('public.total_barco_ubica m');
        $this->db->where('m.ubicacion <', '6');
        $this->db->where('m.fechaingreso >=', $data['desde']);
        $this->db->where('m.fechaingreso <=', $data['hasta']); 
        $query = $this->db->get();
        $resultado = $query->row_array();
       // die(print_r($resultado, TRUE));
        return $resultado;
       
    }
    public function consulta_ubicacion_muelle1a( $desde, $hasta) {
        $cadena = "ubicacion = '1'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);

        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
	}

    public function consulta_ubicacion_muelle2a( $desde, $hasta) {
        $cadena = "ubicacion = '2'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
	}

    public function consulta_ubicacion_patio1( $desde, $hasta) {
        $cadena = "ubicacion = '6'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
	}

    public function consulta_ubicacion_patio2( $desde, $hasta) {
        $cadena = "ubicacion = '7'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num; 
	}

    public function consulta_ubicacion_patio3( $desde, $hasta) {
        $cadena = "ubicacion = '8'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
	}

    public function consulta_ubicacion_patio4( $desde, $hasta) {
        $cadena = "ubicacion = '9'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
	}

    public function consulta_ubicacion_muelleb( $desde, $hasta) {
        $cadena = "ubicacion = '3'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
	}

    public function consulta_ubicacion_muellec( $desde, $hasta) {
        $cadena = "ubicacion = '4'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
    }

    public function consulta_ubicacion_muelled( $desde, $hasta) {
        $cadena = "ubicacion = '5'";
        $this->db->where($cadena);
        $this->db->where('fechaingreso >=', $hasta);
        $this->db->where('fechaingreso <=', $desde);
        $this->db->from('public.total_barco_ubica');
        $num = $this->db->count_all_results();
        return $num;
    }
   
    public function total(){         
        $this->db->select('*');
        $query = $this->db->get('public.total_barco');
        return $query->result_array();
    }

    public function totalcanon(){         
        $this->db->select('*');
        //$this->db->where('desincorporar', 1);
        $query = $this->db->get('public.total_barco');
        return $query->result_array();
    }

    public function ver_deudas(){
        $this->db->select('m.id_mensualidad,
                        m.matricula,
                        b.nombrebuque,
                        m.tarifa,
                        m.pies,
                        m.canon,
                        m.fecha_deuda,
                        m.id_status,
                        m.id_factura,
                        e.descripcion');
        $this->db->from('public.mensualidad m');
        
        $this->db->where(' m.id_status', 0);
        
        $this->db->join('buque b', 'b.matricula = m.matricula ', 'left');
        $this->db->join('estatus e', 'e.id_status = m.id_status', 'left');
        $this->db->order_by("m.id_mensualidad", "Asc");
        $query = $this->db->get();
        $resultado = $query->result_array();
        return $resultado;
    }

    public function deuda(){         
        $this->db->select('*');
        $query = $this->db->get('public.por_pagar_barco');
        return $query->result_array();
    }

    //Reporte Condidión por pagar (tipo de pago)
    public function tp_pago(){         
        $this->db->select('*');
        $this->db->where('id_tipo_pago <', 7);
        $query = $this->db->get('public.tipopago');
        return $query->result_array();
    }

    public function consultar_t_pago($data){
        $this->db->select("m.matricula,
                            r.nombrebuque,
                            m.pies,
                            m.canon,
                            t.descripcion dtp_pago,
                            sum(to_number(mc.total_abonado_om,'999999999999D99'))  as total_bs");
        $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
        $this->db->join('tipopago t', 't.id_tipo_pago = mc.id_tipo_pago', 'left');
        $this->db->join('buque r', 'r.matricula = m.matricula', 'left');
        $this->db->where('mc.id_tipo_pago', $data['t_pago']);
        $this->db->where('mc.fecha_reg >=', $data['desde']);
        $this->db->where('mc.fecha_reg <=', $data['hasta']);
        $this->db->order_by('m.matricula');
        $this->db->group_by('m.matricula, m.pies, m.canon, t.descripcion,r.nombrebuque,mc.total_abonado_om');
        $query = $this->db->get('mov_consig mc');
        return $query->result_array();
    }

    public function consultar_t_pago2($data){
        $this->db->select("sum(m.canon) as canon,
                           sum(to_number(m.pies,'999999999999D99')) as pies,
                           sum(to_number(mc.total_abonado_om,'999999999999D99')) as total_dolares,
                           sum(to_number(mc.total_abonado_bs,'999999999999D99')) as total_bs");
        $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
        $this->db->where('mc.id_tipo_pago', $data['t_pago']);
        $this->db->where('mc.fecha_reg >=', $data['desde']);
        $this->db->where('mc.fecha_reg <=', $data['hasta']);
        $query = $this->db->get('mov_consig mc');
        return $query->row_array();
    }

    //detallado tipo de pagos
    public function consultar_t_pago_detallado($data){
        $this->db->select("mc.*");
        $this->db->where('mc.fecha_reg >=', $data['desde']);
        $this->db->where('mc.fecha_reg <=', $data['hasta']);        
        // $this->db->group_by('m.matricula,
        // r.nombrebuque,
        // m.pies,
        // m.canon,
        // mc.id_estatus, mc.fecha_reg, mc.id_banco, mc.fechatrnas,mc.nro_referencia,
        // t.descripcion,y.nombre_b,mc.totatotal_abonado_omlbs2');
        $query = $this->db->get('public.condxpagar_detallado mc');
        return $query->result_array();
    }
    public function consultar_t_pago_detallado2($data){
            $this->db->select("m.matricula,
            r.nombrebuque,
            m.pies,
            m.canon,
            mc.id_estatus, mc.fecha_reg, mc.id_banco, mc.fechatrnas,mc.nro_referencia,
            y.nombre_b, t.descripcion dtp_pago,
            sum(to_number(mc.total_abonado_bs,'999999999999D99')) as total_bs,
            sum(to_number(mc.total_abonado_om,'999999999999D99')) as total_dolares");
            $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
            $this->db->join('tipopago t', 't.id_tipo_pago = mc.id_tipo_pago', 'left');
            $this->db->join('buque r', 'r.matricula = m.matricula', 'left');
            $this->db->join('banco y', 'y.id_banco = mc.id_banco', 'left');
            $this->db->where('mc.id_tipo_pago >', 0);
            $this->db->where('mc.fecha_reg >=', $data['desde']);
            $this->db->where('mc.fecha_reg <=', $data['hasta']);
            $this->db->order_by('m.matricula');
            $this->db->group_by('m.matricula,
            r.nombrebuque,
            m.pies,
            m.canon,
            mc.id_estatus, mc.fecha_reg, mc.id_banco, mc.fechatrnas,mc.nro_referencia,
            t.descripcion,y.nombre_b');
            $query = $this->db->get('mov_consig mc');
            return $query->result_array();
        }
        public function consultar_t_pago2_detalle($data){
            $this->db->select("sum(m.canon) as canon2,
                            sum(to_number(m.pies,'999999999999D99')) as pies,
                             sum(to_number(m.total_abonado_om,'999999999999D99')) as total_abonado_om,
                            sum(to_number(m.total_abonado_bs,'999999999999D99')) as total_bs");
            $this->db->where('m.fecha_reg >=', $data['desde']);
            $this->db->where('m.fecha_reg <=', $data['hasta']);
            $query = $this->db->get('public.condxpagar_detallado m');
            return $query->row_array();
        }
        public function consultar_t_pago2_detalle2($data){
            $this->db->select("sum(m.canon) as canon,
                            sum(to_number(m.pies,'999999999999D99')) as pies,
                             sum(to_number(mc.total_abonado_om,'999999999999D99')) as total_dolares,
                            sum(to_number(mc.total_abonado_bs,'999999999999D99')) as total_bs");
            $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
            $this->db->where('mc.id_tipo_pago >', 0);
            $this->db->where('mc.fecha_reg >=', $data['desde']);
            $this->db->where('mc.fecha_reg <=', $data['hasta']);
            $query = $this->db->get('mov_consig mc');
            return $query->row_array();
        }

    //Reporte cxc por embarcaciones
    public function matriculas(){         
        $this->db->select('nombrebuque, matricula');
        $query = $this->db->get('public.buque');
        return $query->result_array();
    }

    public function consultar_cxc_embarc($data){
        //print_r($data);die;
        if ($data['matricula'] == 1) {
            $this->db->select("mc.id_mensualidad,
                                m.matricula,
                                m.pies,
                                m.canon,
                                m.fecha_deuda,
                                t.nombrebuque");
            $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
            $this->db->join('buque t', 't.matricula = m.matricula', 'left');
            $this->db->where('id_status', 0);
            $this->db->where('mc.fecha_reg >=', $data['desde']);
            $this->db->where('mc.fecha_reg <=', $data['hasta']);
            $this->db->order_by('m.matricula');
            $query = $this->db->get('mov_consig mc');
            return $query->result_array();
        }else{
            $this->db->select("mc.id_mensualidad,
                                m.matricula,
                                m.pies,
                                m.canon,
                                m.fecha_deuda,
                                t.nombrebuque");
            $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
            $this->db->join('buque t', 't.matricula = m.matricula', 'left');
            $this->db->where('m.matricula', $data['matricula']);
            $this->db->where('id_status', 0);
            $this->db->where('mc.fecha_reg >=', $data['desde']);
            $this->db->where('mc.fecha_reg <=', $data['hasta']);
            $this->db->order_by('m.matricula');
            $this->db->group_by('mc.id_mensualidad, m.matricula, m.pies, m.canon, m.fecha_deuda,t.nombrebuque');
            $query = $this->db->get('mov_consig mc');
            return $query->result_array();
        }
    }

    public function consultar_cxc_embarc2($data){
        if ($data['matricula'] == 1) {
            $this->db->select("sum(m.canon) as canon,
                            sum(to_number(m.pies,'999999999999D99')) as pies");
                            $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
                            //$this->db->where('m.matricula', $data['matricula']);
                            $this->db->where('id_status', 0);
                            $this->db->where('mc.fecha_reg >=', $data['desde']);
                            $this->db->where('mc.fecha_reg <=', $data['hasta']);
                            $query = $this->db->get('mov_consig mc');
                            return $query->row_array();
        }else{
            $this->db->select("sum(m.canon) as canon,
                               sum(to_number(m.pies,'999999999999D99')) as pies");
            $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
            $this->db->where('m.matricula', $data['matricula']);
            $this->db->where('id_status', 0);
            $this->db->where('mc.fecha_reg >=', $data['desde']);
            $this->db->where('mc.fecha_reg <=', $data['hasta']);
            $query = $this->db->get('mov_consig mc');
            return $query->row_array();
        }
    }

    //Reportes por tipos de servicios
    public function t_servicios(){         
        $this->db->select('*');
        $this->db->where('id_tarifa >', 2);
        $query = $this->db->get('public.tarifa');
        return $query->result_array();
    }

    public function consultar_x_tservicio($data){
        $tipo_serv = $data['t_servicio'];
        $start     = $data['start'];
        $end       = $data['end'];
        $query = $this->db->query("SELECT df.id, df.matricula,f.nombrep, b.nombrebuque, df.pies, df.canon, df.ob, f.fechaingreso, 'factura' as condicion
                                    FROM deta_factura df
                                    LEFT JOIN factura f on f.id = df.id_fact
                                    LEFT JOIN buque b on b.matricula = df.matricula
                                    WHERE df.id_tarifa = '$tipo_serv' AND f.fechaingreso >= '$start' AND f.fechaingreso <= '$end'
                                    UNION
                                    SELECT dr.id, dr.matricula,r.nombrep, b.nombrebuque, dr.pies, dr.canon, dr.ob, r.fechaingreso , 'recibo'
                                    FROM deta_recibo dr
                                    LEFT JOIN recibo r on r.id = dr.id_fact
                                    LEFT JOIN buque b on b.matricula = dr.matricula
                                    WHERE dr.id_tarifa = '$tipo_serv' and r.fechaingreso >= '$start' and r.fechaingreso <= '$end'
                                    ORDER BY condicion ");
        return $query->result_array();
    }

    public function consultar_x_tservicio2($data){
        $tipo_serv = $data['t_servicio'];
        $start     = $data['start'];
        $end       = $data['end'];
        $query = $this->db->query("SELECT sum(to_number(df.pies,'999999999999D99')) total_pies, sum(to_number(df.canon,'999999999999D99')) total , 'factura' as condicion
                                    FROM deta_factura df
                                    LEFT JOIN factura f on f.id = df.id_fact
                                    WHERE df.id_tarifa = '$tipo_serv' and f.fechaingreso >= '2022-07-01' and f.fechaingreso <= '2022-09-02'
                                    union
                                    SELECT sum(to_number(dr.pies,'999999999999D99')) total_pies, sum(to_number(dr.canon,'999999999999D99')) total, 'recibo'
                                    FROM deta_recibo dr
                                    LEFT JOIN recibo r on r.id = dr.id_fact
                                    WHERE dr.id_tarifa = '$tipo_serv' and r.fechaingreso >= '$start' and r.fechaingreso <= '$end'
                                    ORDER BY condicion ");
        return $query->result_array();
    }

    //Gráficos
    public function p_tt_ing_egr($data){
        $start = $data['start'];
        $end   = $data['end'];
        $query = $this->db->query("SELECT sum(to_number(restante_om ,'999999999999D99')) total,  'Deuda' as condicion
                                    FROM mov_consig mc
                                    WHERE id_estatus = 0
                                    UNION 
                                    SELECT sum(to_number(total_abonado_om ,'999999999999D99')) total,  'Pagado' as condicion
                                    FROM mov_consig mc
                                    WHERE id_estatus = 2
                                    union 
                                    select sum(to_number(total_abonado_om ,'999999999999D99')) total,  'Abonado' as condicion
                                    from mov_consig mc
                                    where id_estatus = 3
                                    ORDER BY condicion");
        return $query->result_array();
    }

    public function p_tt_ing_tar($data){
        $start      = $data['start'];
        $end        = $data['end'];

        $query2 = $this->db->query("SELECT t.desc_concepto,  sum(to_number(dr.monto_estimado ,'999999999999D99')) as total
                                    from deta_recibo dr 
                                    left join recibo r on r.id = dr.id_fact 
                                    left join tarifa t on t.id_tarifa = dr.id_tarifa  
                                    where dr.id_tarifa > 2 and r.fechaingreso >= '$start' and r.fechaingreso <= '$end'
                                    group by t.desc_concepto");
        return $query2->result_array();

    }

    public function f_p_tt_ing_tar($data){
        $start      = $data['start'];
        $end        = $data['end'];
        $query = $this->db->query("SELECT t.desc_concepto, sum(to_number(df.monto_estimado ,'999999999999D99')) as total
                                    from deta_factura df
                                    left join factura f on f.id = df.id_fact
                                    left join tarifa t on t.id_tarifa = df.id_tarifa 
                                    where df.id_tarifa > 2 and f.fechaingreso >= '$start' and f.fechaingreso <= '$end'
                                    group by t.desc_concepto");
        return $query->result_array();

    }

    ////buscar ubicacion detallada
    public function consultar_ubicacion_detallada($data){
        //print_r($data);die;
        if ($data['matricula'] == 0) {
            $this->db->select(" m.matricula,
                                m.pies,
                                m.canon,
                                m.fechaingreso,
                                m.nombrebuque,t.descripcion");
            $this->db->join('ubicacion t', 't.id = m.ubicacion', 'left');
            $this->db->where('desincorporar', 1);
            $this->db->where('m.fechaingreso >=', $data['start']);
            $this->db->where('m.fechaingreso <=', $data['end']);
            $this->db->order_by('m.matricula');
            $query = $this->db->get('buque m');
            return $query->result_array();
        }else{
            $this->db->select("m.matricula,
                                m.pies,
                                m.canon,
                                m.fechaingreso,
                                m.nombrebuque,
                                t.descripcion");
            $this->db->join('ubicacion t', 't.id = m.ubicacion', 'left');
            $this->db->where('m.ubicacion', $data['matricula']);
            $this->db->where('desincorporar', 1);
            $this->db->where('m.fechaingreso >=', $data['start']);
            $this->db->where('m.fechaingreso <=', $data['end']);
            $this->db->order_by('m.matricula');
            $this->db->group_by(' m.matricula, m.pies, m.canon, m.fechaingreso,m.nombrebuque,t.descripcion');
            $query = $this->db->get('buque m');
            return $query->result_array();
        }
    }
//////////reporte del jefe
    public function get_jefe(){         
        $this->db->select('r.*,t.desc_concepto');
        $this->db->join('tarifa t', 't.id_tarifa = r.id_tarifa', 'left');
        $query = $this->db->get('public.reporte_deuda_corto_final r');
        return $query->result_array();
	}

    public function get_jefe_total(){         
        $this->db->select("sum(m.total) as canon,
        sum(to_number(m.pies,'999999999999D99')) as pies");
        $query = $this->db->get('public.reporte_deuda_corto_final m');
        return $query->result_array();
	}

    //Reporte para usuario 
    public function reporte_usu($data){
        $this->db->select("cedula");
        $this->db->where('rif', $data);
        $queryew = $this->db->get('seguridad.usuarios');
        $queryew= $queryew->row_array();
        $cedula = $queryew['cedula'];
        $variales = explode("-", $cedula);

        $this->db->select("*");
        $this->db->where('cedula', $variales['1']);
        $this->db->where('tipo_ced', $variales['0']);
        $querys = $this->db->get('propiet');
        $querys = $querys->row_array();
        return $querys;

    }
    
}