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

    
}