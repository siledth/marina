<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
     public function registrar_b() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = array(
            
            'descripcion' => $this->input->POST('nombre_b') 
            
             
        );
        $data = $this->Maletero_model->registrar_b($data);
        echo json_encode($data);
    }
     //LLENAR MODAL PARA consultar Maletero
     public function consulta_b() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Maletero_model->consulta_b($data);
        echo json_encode($data);
    }
    
     public function editar_b() {
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
    public function registrar_maletero_asignacion() {
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

            'fecha_deuda' => '2025-02-01', 
            'fecha_update' => '2025-02-01'      ,
            'id_status' => 0  
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
        $data['time']=date("d-m-Y");
        $data['banco'] = $this->Mensualidades_model->ver_banco(); 
        $data['tipoPago'] = $this->Mensualidades_model->ver_tipPago(); 

         
        $usuario = $this->session->userdata('id_user');
        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('maletero/deudad_maletero.php', $data);
        $this->load->view('templates/footer.php');
    } 

     public function consultar_deuda2(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Maletero_model->consultar_deuda2($data);
        echo json_encode($data);
    }
      public function guardar_proc_pag_maleter(){
        if(!$this->session->userdata('session'))redirect('login');
        $data['time']=date("d-m-Y");
        $data = $this->input->post();
        $data =	$this->Maletero_model->guardar_proc_pag_maleteros($data);
        echo json_encode($data);
    }

    
    
}