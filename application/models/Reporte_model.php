<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Reporte_model extends CI_Model {
    public function getCanon(){         
        $this->db->select('* ');
        $query = $this->db->get('public.buque');
        return $query->result_array();
	}

    
    public function consulta_ubicacion( $desde, $hasta) {
        //  die(print_r($resultado, TRUE));
        $num = $this->db->count_all('public.buque');
        //die(print_r($num, TRUE));
        
     
      return $num;
        
	}
        
    public function consulta_ubicacion_tierra( $desde, $hasta) {
       
        $cadena = "ubicacion > '5'";
        $this->db->where($cadena);
        $this->db->from('public.buque');
        $num = $this->db->count_all_results();
        return $num;
       
       
       
        //  die(print_r($resultado, TRUE));
       //Configuracion_model.php $num = $this->db->count_all('public.buque');
       // $this->db->where('ubicacion >', 5);
        //die(print_r($num, TRUE));
        
     
      return $num;
        
	}
        
    public function consulta_ubicacion_agua( $desde, $hasta) {
        $cadena = "ubicacion < '6'";
        $this->db->where($cadena);
        $this->db->from('public.buque');
        $num = $this->db->count_all_results();
        return $num;
        
     
      return $num;
        
	}
    public function consulta_ubicacion_muelle1a( $desde, $hasta) {
        $cadena = "ubicacion = '1'";
        $this->db->where($cadena);
        $this->db->from('public.buque');
        $num = $this->db->count_all_results();
        return $num;
        
     
      return $num;
        
	}
    public function consulta_ubicacion_muelle2a( $desde, $hasta) {
        $cadena = "ubicacion = '2'";
        $this->db->where($cadena);
        $this->db->from('public.buque');
        $num = $this->db->count_all_results();
        return $num;
        
     
      return $num;
        
	}
    public function consulta_ubicacion_patio1( $desde, $hasta) {
        $cadena = "ubicacion = '6'";
        $this->db->where($cadena);
        $this->db->from('public.buque');
        $num = $this->db->count_all_results();
        return $num;
        
     
      return $num;
        
	}
    public function consulta_ubicacion_patio2( $desde, $hasta) {
        $cadena = "ubicacion = '7'";
        $this->db->where($cadena);
        $this->db->from('public.buque');
        $num = $this->db->count_all_results();
        return $num;
        
     
      return $num;
        
	}
    public function consulta_ubicacion_muelleb( $desde, $hasta) {
        $cadena = "ubicacion = '3'";
        $this->db->where($cadena);
        $this->db->from('public.buque');
        $num = $this->db->count_all_results();
        return $num;
        
     
      return $num;
        
	}
    public function consulta_ubicacion_muellec( $desde, $hasta) {
    $cadena = "ubicacion = '4'";
    $this->db->where($cadena);
    $this->db->from('public.buque');
    $num = $this->db->count_all_results();
    return $num;


    return $num;
    }
    public function consulta_ubicacion_muelled( $desde, $hasta) {
    $cadena = "ubicacion = '5'";
    $this->db->where($cadena);
    $this->db->from('public.buque');
    $num = $this->db->count_all_results();
    return $num;
    }
   
	
    public function total(){         
        $this->db->select('*');
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
        $query = $this->db->get('public.tipopago');
        return $query->result_array();
    }

    public function consultar_t_pago($data){
        $this->db->select("mc.id_mensualidad,
                            m.matricula,
                            m.pies,
                            m.canon,
                            t.descripcion dtp_pago,
                            m.fecha_deuda,
                            sum(to_number(mc.total_abonado_bs,'999999999999D99')) as total_bs");
        $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
        $this->db->join('tipopago t', 't.id_tipo_pago = mc.id_tipo_pago ', 'left');
        $this->db->where('mc.id_tipo_pago', $data['t_pago']);
        $this->db->where('mc.fecha_reg >=', $data['start']);
        $this->db->where('mc.fecha_reg <=', $data['end']);
        $this->db->order_by('m.matricula');
        $this->db->group_by('mc.id_mensualidad, m.matricula, m.pies, m.canon, m.fecha_deuda, t.descripcion');
        $query = $this->db->get('mov_consig mc');
        return $query->result_array();
    }

    public function consultar_t_pago2($data){
        $this->db->select("sum(m.canon) as canon,
                           sum(to_number(m.pies,'999999999999D99')) as pies,
                           sum(to_number(mc.total_abonado_bs,'999999999999D99')) as total_bs");
        $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
        $this->db->where('mc.id_tipo_pago', $data['t_pago']);
        $this->db->where('mc.fecha_reg >=', $data['start']);
        $this->db->where('mc.fecha_reg <=', $data['end']);
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
                                m.fecha_deuda");
            $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
            $this->db->where('id_status', 0);
            $this->db->where('mc.fecha_reg >=', $data['start']);
            $this->db->where('mc.fecha_reg <=', $data['end']);
            $this->db->order_by('m.matricula');
            $query = $this->db->get('mov_consig mc');
            return $query->result_array();
        }else{
            $this->db->select("mc.id_mensualidad,
                                m.matricula,
                                m.pies,
                                m.canon,
                                m.fecha_deuda");
            $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
            $this->db->where('m.matricula', $data['matricula']);
            $this->db->where('id_status', 0);
            $this->db->where('mc.fecha_reg >=', $data['start']);
            $this->db->where('mc.fecha_reg <=', $data['end']);
            $this->db->order_by('m.matricula');
            $this->db->group_by('mc.id_mensualidad, m.matricula, m.pies, m.canon, m.fecha_deuda');
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
                            $this->db->where('mc.fecha_reg >=', $data['start']);
                            $this->db->where('mc.fecha_reg <=', $data['end']);
                            $query = $this->db->get('mov_consig mc');
                            return $query->row_array();
        }else{
            $this->db->select("sum(m.canon) as canon,
                               sum(to_number(m.pies,'999999999999D99')) as pies");
            $this->db->join('mensualidad m', 'm.id_mensualidad = mc.id_mensualidad', 'left');
            $this->db->where('m.matricula', $data['matricula']);
            $this->db->where('id_status', 0);
            $this->db->where('mc.fecha_reg >=', $data['start']);
            $this->db->where('mc.fecha_reg <=', $data['end']);
            $query = $this->db->get('mov_consig mc');
            return $query->row_array();
        }
        
    }
}