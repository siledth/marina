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
    
}