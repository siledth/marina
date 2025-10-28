<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Maletero extends CI_Controller
{

    public function registrar_maletero()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
        $data['maleteros'] = $this->Maletero_model->consultar_maletero();
        $usuario = $this->session->userdata('id_user');
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('maletero/crear_maletero.php', $data);
        $this->load->view('templates/footer.php');
    }
    public function registrar_b()
    {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = array(

            'descripcion' => $this->input->POST('nombre_b')


        );
        $data = $this->Maletero_model->registrar_b($data);
        echo json_encode($data);
    }
    //LLENAR MODAL PARA consultar Maletero
    public function consulta_b()
    {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Maletero_model->consulta_b($data);
        echo json_encode($data);
    }

    public function editar_b()
    {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();

        $data = array(
            'id' => $data['id_banco'],

            'descripcion' => $data['nombre_b'],

        );

        $data = $this->Maletero_model->editar_b($data);
        echo json_encode($data);
    }
    public function asignar_maletero()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
        $date = date('d');

        $generar = $this->Mensualidades_model->generar($date);

        if ($generar) {
            $data['ver_deudas'] = $this->Mensualidades_model->ver_deudas($date);
        }

        $data['maleteros'] = $this->Maletero_model->consultar_maletero();
        $data['asignacion'] = $this->Maletero_model->consultar_maletero_asignacion();

        $data['tarifa'] = $this->Maletero_model->consultar_tarifa();
        $data['banco'] = $this->Mensualidades_model->ver_banco();
        $data['tipoPago'] = $this->Maletero_model->ver_tipPago();
        $usuario = $this->session->userdata('id_user');
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('maletero/asignar_maletero.php', $data);
        $this->load->view('templates/footer.php');
    }
    public function registrar_maletero_asignacion()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
        $data = array(

            'id_maletero' => $this->input->POST('id_maletero'),
            'nombre' => $this->input->POST('nombre'),
            'cedrif' => $this->input->POST('cedrif'),
            'tele' => $this->input->POST('tele'),
            'correo' => $this->input->POST('correo'),
            'nombre_lancha' => $this->input->POST('nombre_lancha'),
            'id_tarifa' => $this->input->POST('id_tarifa'),
            'pago' => $this->input->POST('pago'),
            'id_tipo_pago' => $this->input->POST('id_tipo_pago'),
            'id_banco' => $this->input->POST('id_banco'),
            'nro_referencia' => $this->input->POST('nro_referencia'),
            'fechatrnas' => $this->input->POST('fechatrnas'),
            'nota' => $this->input->POST('nota'),

            'fecha_deuda' => date("Y-m-d"),
            'fecha_update' => date("Y-m-d"),
            'id_status' => 0,
            'asignado' => 1, // significa que el maletero esta asignado

        );
        $data = $this->Maletero_model->registrar_maletero_asignacion($data);
        echo json_encode($data);
    }

    public function mensualidades_maletero()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
        $data['maleteros'] = $this->Maletero_model->consultar_maletero();
        $data['asignacion'] = $this->Maletero_model->consultar_maletero_asignacion_pagos();


        $usuario = $this->session->userdata('id_user');
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('maletero/pagos_maletero.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function deudasmensualidades_maletero()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
        $data['maleteros'] = $this->Maletero_model->consultar_maletero();
        $data['asignacion'] = $this->Maletero_model->consultar_maletero_asignacion_deuda();
        $data['time'] = date("d-m-Y");
        $data['banco'] = $this->Mensualidades_model->ver_banco();
        $data['tipoPago'] = $this->Mensualidades_model->ver_tipPago();


        $usuario = $this->session->userdata('id_user');


        $resultado = $this->Maletero_model->generar_deudas_maleteros();


        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('maletero/deudad_maletero.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function consultar_deuda2()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $data = $this->input->post();
        $data =    $this->Maletero_model->consultar_deuda2($data);
        echo json_encode($data);
    }
    public function guardar_proc_pag_maleter()
    {
        if (!$this->session->userdata('session')) redirect('login');
        $data['time'] = date("d-m-Y");
        $data = $this->input->post();
        $data =    $this->Maletero_model->guardar_proc_pag_maleteros($data);
        echo json_encode($data);
    }

    public function reporte_maleteros()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
        $data['maleteros'] = $this->Maletero_model->consultar_maletero();
        $data['asignacion'] = $this->Maletero_model->consultar_maletero_asignacion_deuda();
        $data['time'] = date("d-m-Y");
        $data['banco'] = $this->Mensualidades_model->ver_banco();
        $data['tipoPago'] = $this->Mensualidades_model->ver_tipPago();
        $data['totales'] = array($this->Maletero_model->obtener_totales_maleteros());
        $data['finanzas'] = $this->Maletero_model->obtener_estado_financiero();
        $data['detalles'] = $this->Maletero_model->obtener_detalles_financieros();

        $usuario = $this->session->userdata('id_user');


        $resultado = $this->Maletero_model->generar_deudas_maleteros();


        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('maletero/reportemaletero.php', $data);
        $this->load->view('templates/footer.php');
    }

    //////////////////nuevo
    public function info_prepago()
    {
        if (!$this->session->userdata('session')) redirect('login');

        $id_asignacion_maletero = $this->input->post('id_asignacion_maletero');
        if (empty($id_asignacion_maletero)) {
            echo json_encode(['error' => 'Falta id_asignacion_maletero']);
            return;
        }

        $resp = $this->Maletero_model->preparar_prepago_info($id_asignacion_maletero);
        echo json_encode($resp);
    }

    public function registrar_prepago_maletero_auto()
    {
        if (!$this->session->userdata('session')) redirect('login');

        $data = [
            'id_asignacion_maletero' => $this->input->post('id_asignacion_maletero'),
            'id_tipo_pago'           => $this->input->post('id_tipo_pago'),
            'id_banco'               => $this->input->post('id_banco'),
            'nro_referencia'         => $this->input->post('nro_referencia'),
            'fechatrnas'             => $this->input->post('fechatrnas'),
            'nota'                   => $this->input->post('nota'),
        ];

        if (empty($data['id_asignacion_maletero'])) {
            echo json_encode(['error' => 'Falta id_asignacion_maletero']);
            return;
        }

        $resp = $this->Maletero_model->registrar_prepago_maletero_auto($data);
        echo json_encode($resp);
    }
}
