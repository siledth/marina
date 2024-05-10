<?php

class Login_model extends CI_model {
    public function iniciar($usuario, $contrasena) {
        $this->db->select('*');
        $this->db->where('email', $usuario);
        $this->db->from('seguridad.usuarios');
        $result = $this->db->get();
        if ($result->num_rows() == 1) {
            $id_estatus = $result->row('id_estatus');
            if ($id_estatus == 1) {
                $db_clave = $result->row('password');
                $rif = $result->row('rif');
                if (password_verify(base64_encode(hash('sha256', $contrasena, true)), $db_clave)) {
                    return $result->row_array();
                } else {
                    $intento = $result->row('intentos');
                    if ($intento <= 1) {
                        $intento = $intento + 1;
                        $this->db->set('intentos', $intento);
                        $this->db->where('email', $usuario);
                        $this->db->update('seguridad.usuarios');
                        return 'FALLIDO';
                    } 
                }
            } else {
                return 'BLOQUEADO';
            }
        } else {
            return 'FALSE';
        }
    }

    public function consultar_empresa($id_unidad) {
        $this->db->select('id, descripcion, rif');
        $this->db->where('rif', $id_unidad);
        $this->db->from('empresa');
        $result = $this->db->get();
        return $result->row_array();
    }

    public function cambiar_clave($id_usuario, $data)
    {
        $this->db->where('id', $id_usuario);
        $update = $this->db->update('seguridad.usuarios', $data);
       // return $update;
        if ($update == true) {               
            return 1;        
        } else {
            return 0;
        }
    }

    //Propietario
    public function b_cedula_usu($cedula_prop){
        $this->db->select('*');
        $this->db->where('cedula', $cedula_prop);
        $this->db->from('seguridad.usuarios');
        $result = $this->db->get();
        if ($result->row_array() != '') {
            return 'existe';
        }else{
            return 'no_existe';
        }
    }
    public function b_cedula_propietario($cedula_prop){
        $variables = explode("-", $cedula_prop);
        $this->db->select('*');
        $this->db->where('cedula', $variables['1']);
        $this->db->where('tipo_ced', $variables['0']);
        $this->db->from('propiet');
        $result = $this->db->get();
        return $result->row_array();
    }

    public function  guardar_prp($inf_usu,$inf_prop,$if_emp){
        //insertar propietario
        $this->db->select('*');
        $this->db->where('cedula', $inf_prop['cedula']);
        $this->db->from('propiet');
        $result = $this->db->get();
        if ($result->row_array() == '') {
            $query = $this->db->insert('public.propiet', $inf_prop);
        }
        //Insertar empresa
        $this->db->select('*');
        $this->db->where('rif', $if_emp['rif']);
        $this->db->from('empresa');
        $result = $this->db->get();
        if ($result->row_array() == '') {
            $query = $this->db->insert('empresa', $if_emp);
        }
        //Registrar Usuario
        $query = $this->db->insert('seguridad.usuarios', $inf_usu);
        return $query;
    }
}
?>
