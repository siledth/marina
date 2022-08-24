<?php

class Login_model extends CI_model {

    public function iniciar($usuario, $contrasena) {
        $this->db->select('*');
        $this->db->where('nombre', $usuario);
        $this->db->from('seguridad.usuarios');
        $result = $this->db->get();
        
        if ($result->num_rows() == 1) {
            $id_estatus = $result->row('id_estatus');
            if ($id_estatus == 1) {
                $db_clave = $result->row('password');
               
                if (password_verify(base64_encode(hash('sha256', $contrasena, true)), $db_clave)) {
                    return $result->row_array();
                }else {
                    $intento = $result->row('intentos');
                    if ($intento <= 1) {
                        $intento = $intento + 1;
                        $this->db->set('intentos', $intento);
                        $this->db->where('nombre', $usuario);
                        $this->db->update('seguridad.usuarios');
                        return 'FALLIDO';
                    } else if ($intento == 2) {
                        return 'BLOQUEADO';
                    };
                }
            } else {
                return 'FALSE';
            }
        } else {
            return 'FALSE';
        }
    }

    public function consultar_organo($id_unidad) {
        $this->db->select('id, descripcion, rif');
        $this->db->where('rif', $id_unidad);
        $this->db->from('empresa');
        $result = $this->db->get();
        return $result->row_array();
        
    }

    public function cambiar_clave($id_usuario, $data) {
        $this->db->where('id', $id_usuario);
        $update = $this->db->update('seguridad.usuarios', $data);
        return $update;
    }

}

?>
