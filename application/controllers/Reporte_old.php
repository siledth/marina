<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {
 
	/*public function Report(){
		if(!$this->session->userdata('session'))redirect('login');
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/total_canon.php');
        $this->load->view('templates/footer.php');
	}*/

	public function Report(){
	
		$data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
		$data['time']=date("d-m-Y");
		$data['total'] = $this->Reporte_model->total();
		$data['canon'] = $this->Reporte_model->getCanon();
		
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/total_canon.php', $data);
        $this->load->view('templates/footer.php');
	}
	public function saldoxpagar(){
	
		$data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] 		 = $this->session->userdata('rif');
	//	$data['time']		 = date("d-m-Y");
	    $data['total'] 		 = $this->Reporte_model->deuda();
		$data['ver_deudas']  = $this->Reporte_model->ver_deudas();    
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/Saldo_por_pagar.php', $data);
        $this->load->view('templates/footer.php');
	}

	//Reporte Condidión por pagar (tipo de pago)
	public function condxpagar(){
		$data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] 		 = $this->session->userdata('rif');
		$data['tp_pagos']    = $this->Reporte_model->tp_pago();    
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/condicion_x_pagar.php', $data);
        $this->load->view('templates/footer.php');
	}

	public function consultar_t_pago(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Reporte_model->consultar_t_pago($data);
        echo json_encode($data);
    }	
}
