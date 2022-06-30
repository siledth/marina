<?php
    class Buque_model extends CI_model
    { 
        public function update($id, $nombre)
        {
            $this->db->where('id', $id);
            $this->db->set('nombre', $nombre);
            return $this->db->update('editoriales');
        }
    }
    ?>