<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensualidades extends CI_Controller {

    public function cons_nro_factur(){
        if(!$this->session->userdata('session'))redirect('login');
	   	$data =	$this->Mensualidades_model->cons_nro_notapago();
	   	echo json_encode($data);
    }
    public function cons_nro_adelanto(){
        if(!$this->session->userdata('session'))redirect('login');
	   	$data =	$this->Mensualidades_model->cons_nro_adelantos();
	   	echo json_encode($data);
    }

	public function ver(){
        if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['time']=date("d-m-Y");
        $data['te']=date('d');
        $data['mat'] = $this->Programacion_model->consulta_matricula();
        $date = date('d');
        
        $generar = $this->Mensualidades_model->generar($date);
       
        if ($generar) {
            $data['ver_deudas'] = $this->Mensualidades_model->ver_deudas($date);           
        }

        $data['banco'] = $this->Mensualidades_model->ver_banco(); 
        $data['tipoPago'] = $this->Mensualidades_model->ver_tipPago(); 

		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('mensualidades/ver.php', $data);
        $this->load->view('templates/footer.php');
	}

    public function consultar_mens(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Mensualidades_model->consultar_mens($data);
        echo json_encode($data);
    }

    public function consultar_dol(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Mensualidades_model->consultar_dol($data);
        echo json_encode($data);
    }

    public function guardar_proc_pag(){
        if(!$this->session->userdata('session'))redirect('login');
        $data['time']=date("d-m-Y");
        $data = $this->input->post();
        $data =	$this->Mensualidades_model->guardar_proc_pag($data);
        echo json_encode($data);
    }

    public function verPago(){
        if(!$this->session->userdata('session'))redirect('login');
        $id_mesualidad = $this->input->get('id');

        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
        $data['time']=date("d");

        $data['inf_buque'] =	$this->Mensualidades_model->ver_nota($id_mesualidad);
        $data['inf_pago']  =	$this->Mensualidades_model->ver_pagos($id_mesualidad);

        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('mensualidades/nota_pago.php', $data);
        $this->load->view('templates/footer.php');
    }

    public function listar_info(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data = $this->Mensualidades_model->listar_info($data);
        echo json_encode($data);
    }

    public function guardar_adelanto_pag(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Mensualidades_model->guardar_adelanto_pag($data);
        echo json_encode($data);
    }

    public function generar_fac(){
        if(!$this->session->userdata('session'))redirect('login');
        $id_mesualidad = $this->input->get('id');
        $data =	$this->Mensualidades_model->generar_factura($id_mesualidad);
        redirect('Mensualidades/ver', 'refres');
    }

    //ELIMINACIÒN DE PAGO
    public function eliminar_pago(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data = $this->Mensualidades_model->eliminar_pago($data);
        echo json_encode($data);
    }
    //ANULACIÒN DE FACTURA
    public function anular_factura(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data = $this->Mensualidades_model->anular_factura($data);
        echo json_encode($data);
    }
}