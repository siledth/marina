<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Reporte_model extends CI_Model {
    public function getCanon(){         
        $this->db->select('* ');
        $query = $this->db->get('public.buque');
        return $query->result_array();
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
    
}