<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buque extends CI_Controller
{

    public function buques()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('user/buque.php');
        $this->load->view('templates/footer.php');
    }
    public function desin()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('buque/desincorporar.php');
        $this->load->view('templates/footer.php');
    }

    public function fetchtdesin()
    {
        if ($this->input->is_ajax_request()) {
            $posts = $this->Buque_model->get_desin();
            $data = array('responce' => 'success', 'posts' => $posts);
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }
    public function editdesin()
    {
        if ($this->input->is_ajax_request()) {
            $edit_id = $this->input->post('edit_id');

            if ($post = $this->Buque_model->single_desin($edit_id)) {
                $data = array('responce' => 'success', 'post' => $post);
            } else {
                $data = array('responce' => 'error', 'message' => 'error al guardar');
            }
            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }
    public function updatedesin()
    {
        if ($this->input->is_ajax_request()) {
            $this->form_validation->set_rules('edit_id', 'edit_id', 'required');
            $this->form_validation->set_rules('edit_desincorporar', 'desincorporar', 'required');
            $this->form_validation->set_rules('edit_observacion', 'observacion', 'required');
            if ($this->form_validation->run() == FALSE) {
                $data = array('responce' => 'error', 'message' => validation_errors());
            } else {
                $data['id'] = $this->input->post('edit_id');
                $data['desincorporar'] = $this->input->post('edit_desincorporar');
                $data['observacion'] = $this->input->post('edit_observacion');
                $data['fecha_desincorporacion'] = date("Y-m-d h:m:s");


                if ($this->Buque_model->update_desin($data)) {
                    $data = array('responce' => 'success', 'message' => 'Se Actualizo Correctamente');
                } else {
                    $data = array('responce' => 'error', 'message' => 'Error al actualizar , revise la información Suministrada');
                }
            }

            echo json_encode($data);
        } else {
            echo "No direct script access allowed";
        }
    }
    public function consultar_embarcacion()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $data = $this->input->post();
        $data =    $this->Buque_model->consultar_embarcaci($data);
        echo json_encode($data);
    }
    public function Plantilla()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        //$data['ver_proyectos'] = $this->Programacion_model->consulta_buque();
        $data['ver_proyectos'] = $this->Buque_model->consulta_buque_listado();
        $data['tarifas']       = $this->Buque_model->get_tarifas();
        $data['tipos']         = $this->Buque_model->get_tipobarcos();
        $data['ubicaciones']   = $this->Buque_model->get_ubicaciones();
        $data['hoy']           = date('Y-m-d'); // <- importante para colores
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('buque/planilla.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function agregar()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
        $data['time'] = date("d-m-Y");
        $data['fuente'] = $this->Programacion_model->consulta_part_pres();
        $data['tarifa'] = $this->Programacion_model->consulta_tarifa_r();
        $data['ubicacion'] = $this->Programacion_model->consulta_ubicacion();
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('buque/agregare.php', $data);
        $this->load->view('templates/footer.php');
    }

    //¡¡¡ESTA FUNCION SI REGISTRA AL BUQUE!!!!
    public function registrar_buque()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $acc_cargar = $this->input->POST('acc_cargar');
        $nombrebuque = $this->input->post("nombrebuque");
        $matricula = $this->input->post("matricula");
        $trailer = $this->input->post("trailer");
        $pies = $this->input->post("pies");
        $tipo = $this->input->post("tipob");
        $color = $this->input->post("color");
        $eslora = $this->input->post("eslora");
        $manga = $this->input->post("manga");
        $puntal = $this->input->post("puntal");
        $bruto = $this->input->post("bruto");
        $neto = $this->input->post("neto");
        $vencimiento = $this->input->post("vencimiento");


        $tarifas = $this->input->post("tarifa");
        $explode = explode('/', $tarifas);
        $id_tarifa = $explode['0'];
        $tarifa = $explode['1'];
        $idd_tarida = $explode['2'];

        $canon = $this->input->post("canon");
        $dia = $this->input->post("dia");
        $ubicacion = $this->input->post("ubicacion");
        $fecha_pago  = '2022-02-01';

        $buque = array(

            "nombrebuque"   => $nombrebuque,
            "matricula"     => $matricula,
            "trailer"       => $trailer,
            "pies"          => $pies,
            "tipo"          => $tipo,
            "color"         => $color,
            "eslora"        => $eslora,
            "manga"         => $manga,
            "puntal"        => $puntal,
            "bruto"         => $bruto,
            "neto"          => $neto,
            "vencimiento"          => $vencimiento,

            "canon"         => $canon,
            "id_tarifa"     => $idd_tarida,
            "tarifa"        => $tarifa,
            "dia"           => $dia,
            "ubicacion"     => $ubicacion,
            "fecha_pago"    => $fecha_pago,
            "fechaingreso"  => date("Y-m-d"),
            "desincorporar"  => 1

        );

        $tripulacion = array( //tripulacion
            'cedulat'       => $this->input->post('cedulat'),
            'tipo_cedt'     => $this->input->post('tipo_cedt'),
            'nombrecomt'    => $this->input->post('nombrecomt'),
            'tele_1t'         => $this->input->post('tele_1t'),
            'cargot'         => $this->input->post('cargot'),
            'email'      => $this->input->post('email'),
            'autor'         => $this->input->post('autor'),
            "matricula"     => $matricula,

        );

        $propietarios = array( //propietarios
            'cedula'        => $this->input->post('cedula'),
            'tipo_ced'   => $this->input->post('tipo_ced'),
            'nombrecom'  => $this->input->post('nombrecom'),
            'tele_1'      => $this->input->post('tele_1'),
            'email'      => $this->input->post('email'),
            'tipo'          => $this->input->post('tipo'),
            "matricula"  => $matricula,

        );

        $data = $this->Buque_model->save_buque($buque, $tripulacion, $propietarios);
        echo json_encode($data);
    }

    public function delete()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $id = $this->input->get('id');
        $resultado = $this->Programacion_model->delete($id);
        redirect('Buque/Plantilla');
    }

    public function eliminar_proy()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $data = $this->input->post();
        $data =    $this->Programacion_model->eliminar_proy($data);
        echo json_encode($data);
    }
    public function editar_proy()
    {
        if (!$this->session->userdata('session')) redirect('login');
        //$data['id']  = $this->input->get('id');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
        $data['time'] = date("d-m-Y");
        $data['fuente'] = $this->Programacion_model->consulta_part_pres();
        $data['tarifa'] = $this->Programacion_model->consulta_tarifa();
        $data['ubicacion'] = $this->Programacion_model->consulta_ubicacion();



        $parametros              = $this->input->get('id');
        $separar                 = explode("/", $parametros);
        $data['id']   = $separar['0'];
        $data['matricula']       = $separar['1'];
        // $data['id_propiet'] = $separar['2'];

        $data['inf_1'] = $this->Programacion_model->inf_1($data['matricula']);

        //$data['inf_1'] = $this->Programacion_model->inf_1($data['matricula']);



        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('buque/editar_proy.php', $data);
        $this->load->view('templates/footer.php');
    }
    public function ver_proy_editar()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $data = $this->input->post();
        $data = $this->Programacion_model->inf_2_edit($data);
        echo json_encode($data);
    }
    public function ver_proy_editar_items_o()
    {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Programacion_model->inf_3_o($data);
        echo json_encode($data);
    }
    //edir todo los datos del barco
    public function editar_programacion_proy_o()
    {
        if (!$this->session->userdata('session')) redirect('login');

        $id_buque = $this->input->post("id_buque");
        $nombrebuque = $this->input->post("nombrebuque");
        $matricula = $this->input->post("matricula");
        $trailer = $this->input->post("trailer");
        $pies = $this->input->post("pies");
        $tipo = $this->input->post("tipob");
        $color = $this->input->post("color");
        $eslora = $this->input->post("eslora");
        $manga = $this->input->post("manga");
        $puntal = $this->input->post("puntal");
        $bruto = $this->input->post("bruto");
        $neto = $this->input->post("neto");

        $tarifas = $this->input->post("tarifa");
        $explode = explode('/', $tarifas);
        $id_tarifa = $explode['0'];
        $tarifa = $explode['1'];
        $idd_tarida = $explode['2'];

        $canon = $this->input->post("canon");
        $dia = $this->input->post("dia");
        $ubicacion = $this->input->post("ubicacion");
        // $fecha_pago  = $this->input->post("fecha_pago");



        $buque = array(

            "nombrebuque"   => $nombrebuque,
            "matricula"     => $matricula,
            "trailer"       => $trailer,
            "pies"          => $pies,
            "tipo"          => $tipo,
            "color"         => $color,
            "eslora"        => $eslora,
            "manga"         => $manga,
            "puntal"        => $puntal,
            "bruto"         => $bruto,
            "neto"          => $neto,
            "canon"         => $canon,
            "id_tarifa"     => $idd_tarida,
            "tarifa"        => $tarifa,
            "dia"           => $dia,
            "ubicacion"     => $ubicacion,
            // "fecha_pago"    => $fecha_pago,      
            //"fechaingreso"  => date("Y-m-d")            
        );

        $tripulacion = array( //tripulacion
            'cedulat'       => $this->input->post('cedulat'),
            'tipo_cedt'     => $this->input->post('tipo_cedt'),
            'nombrecomt'    => $this->input->post('nombrecomt'),
            'tele_1t'         => $this->input->post('tele_1t'),
            'cargot'         => $this->input->post('cargot'),
            'email'      => $this->input->post('email'),
            'autor'         => $this->input->post('autor'),
            "matricula"     => $matricula,
            "id_buque"  => $id_buque,

        );

        $propietarios = array( //propietarios
            'cedula'        => $this->input->post('cedula'),
            'tipo_ced'   => $this->input->post('tipo_ced'),
            'nombrecom'  => $this->input->post('nombrecom'),
            'tele_1'      => $this->input->post('tele_1'),
            'email'      => $this->input->post('email'),
            'tipo'          => $this->input->post('tipo'),
            "matricula"  => $matricula,
            "id_buque"  => $id_buque,

        );

        $data = $this->Buque_model->editar_programacion_proy_o($buque, $tripulacion, $propietarios, $matricula, $id_buque);
        // $data = $this->Programacion_model->editar_programacion_proy_o($id_p_proyecto, $id_programacion, $p_proyecto,$p_items,$p_ffinanciamiento);
        if ($data) {
            $this->session->set_flashdata('sa-success2', 'Se guardo los datos correctamente');
            redirect('Buque/Plantilla');
        } else {
            $this->session->set_flashdata('sa-error', 'error');
            redirect('Buque/Plantilla');
        }
    }

    ////mod buque
    public function Barco()
    {
        $data['buque'] = $this->Buque_model->consultar_buque();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('buque/modi_buque.php', $data);
        $this->load->view('templates/footer.php');
    }

    //LLENAR MODAL PARA EDITAR
    public function consulta_tc()
    {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Buque_model->consulta_tc($data);
        echo json_encode($data);
    }

    //EDITAR

    public function editar_tc()
    {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();

        $data = array(
            'id' => $data['id'],
            'nombrebuque' => $data['nombrebuque'],
            'color' => $data['color'],
            'trailer' => $data['trailer'],
            'ubicacion' => $data['ubicacion'],
        );

        $data = $this->Buque_model->editar_tc($data);
        echo json_encode($data);
    }

    //ELIMINAR
    public function eliminar_tc()
    {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Buque_model->eliminar_tc($data);
        echo json_encode($data);
    }

    ///// editar buque
    public function get_buque()
    {
        if (!$this->session->userdata('session')) redirect('login');

        $id = (int)$this->input->get('id');
        if (!$id) return $this->_json(['error' => 'ID inválido']);

        $row = $this->Buque_model->get_buque_by_id($id);
        if (!$row) return $this->_json(['error' => 'No encontrado']);

        return $this->_json(['success' => true, 'data' => $row]);
    }
    public function update_buque()
    {
        if (!$this->session->userdata('session')) redirect('login');

        $p = $this->input->post();

        if (empty($p['id']))           return $this->_json(['error' => 'Falta ID']);
        if (empty($p['nombrebuque']))  return $this->_json(['error' => 'Nombre es obligatorio']);
        if (empty($p['pies']))         return $this->_json(['error' => 'Pies es obligatorio']);
        if (empty($p['id_tarifa']))    return $this->_json(['error' => 'Seleccione una tarifa']);

        // Busca valor de tarifa vigente (desc_tarifa)
        $tarifaRow = $this->Buque_model->get_tarifa_by_id((int)$p['id_tarifa']);
        if (!$tarifaRow) return $this->_json(['error' => 'Tarifa inválida']);

        $pies        = (int)$p['pies'];
        $valorTarifa = (float)$tarifaRow['desc_tarifa'];
        $canon       = $pies * $valorTarifa;

        // Arma arreglo a guardar (el server recalcula y “congela” tarifa)
        $data = [
            'id'                    => (int)$p['id'],
            'nombrebuque'           => trim($p['nombrebuque']),
            'matricula'             => trim($p['matricula']),
            'trailer'               => isset($p['trailer']) ? $p['trailer'] : null, // 'Si'/'No' o ''
            'pies'                  => $pies,
            'tipo'                  => trim($p['tipo']),
            'color'                 => trim($p['color']),
            'eslora'                => trim($p['eslora']),
            'manga'                 => trim($p['manga']),
            'puntal'                => trim($p['puntal']),
            'bruto'                 => trim($p['bruto']),
            'neto'                  => trim($p['neto']),
            'canon'                 => $canon,
            'tarifa'                => number_format($valorTarifa, 2, '.', ''), // guardamos valor vigente

            'ubicacion' => ($p['ubicacion'] !== '' ? (int)$p['ubicacion'] : null),

            'id_tarifa'             => (int)$p['id_tarifa'],


            'vencimiento'           => !empty($p['vencimiento']) ? $p['vencimiento'] : null,
        ];

        $ok = $this->Buque_model->update_buque($data);
        if (!$ok) return $this->_json(['error' => 'No se pudo actualizar']);

        return $this->_json(['success' => true, 'message' => 'Actualizado', 'canon' => number_format($canon, 2, '.', '')]);
    }

    private function _json($payload)
    {
        $this->output->set_content_type('application/json')->set_output(json_encode($payload));
    }

    // public function alertas_json()
    // {
    //     if (!$this->session->userdata('session')) redirect('login');
    //     $dias = (int)($this->input->get('dias') ?? 5);

    //     $resp = $this->Buque_model->get_alertas_buques($dias);
    //     $this->output->set_content_type('application/json')->set_output(json_encode($resp));
    // }
    public function alertas_json()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $dias = (int)($this->input->get('dias') ?? 5);

        // $this->load->model('Buque_model');
        $res = $this->Buque_model->get_alertas_buques($dias);

        $payload = [
            'vencidas'          => $res['vencidas'],
            'por_vencer'        => $res['por_vencer'],
            'sin_fecha'         => $res['sin_fecha'],
            'vencidas_count'    => count($res['vencidas']),
            'por_vencer_count'  => count($res['por_vencer']),
            'sin_fecha_count'   => count($res['sin_fecha']),
            // total crítico: solo vencidas + por vencer
            'total_critico'     => count($res['vencidas']) + count($res['por_vencer']),
            // total general (incluye sin fecha)
            'total_general'     => $res['total'],
        ];

        $this->output->set_content_type('application/json')->set_output(json_encode($payload));
    }
}
