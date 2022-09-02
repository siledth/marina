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
        $data['rif'] = $this->session->userdata('rif');
		//	$data['time']=date("d-m-Y");
	    $data['total'] = $this->Reporte_model->deuda();
		$data['ver_deudas'] = $this->Reporte_model->ver_deudas();    
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
		$this->load->view('Reporte/tp_pago/parametros_x_pagar.php', $data);
        $this->load->view('templates/footer.php');
	}

	public function bus_x_tpago(){

		$fecha_D = $this->input->post("start");
		$parametros = explode("/",$fecha_D);
		$dia 	= $parametros['0'];
		$mes	= $parametros['1'];
		$anio	= $parametros['2'];
		$star   = $anio .'-'. $mes .'-'. $dia;
		
		$fecha_H = $this->input->post("end");
		$parametros2 = explode("/",$fecha_H);
		$dia2 	= $parametros2['0'];
		$mes2	= $parametros2['1'];
		$anio2	= $parametros2['2'];
		$end   = $anio2 .'-'. $mes2 .'-'. $dia2;
		
		$data = array(
			't_pago'	=> $this->input->post("t_pago"),
			'start'		=> $star,
			'end'		=> $end,
		);
		$data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] 		 = $this->session->userdata('rif');
		$data['results'] 	 =	$this->Reporte_model->consultar_t_pago($data);
		$data['results_2'] 	 =	$this->Reporte_model->consultar_t_pago2($data);
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/tp_pago/result_x_pagar.php', $data);
        $this->load->view('templates/footer.php');
	}

	//Reporte por cuentas por pagar por cada embarcación
	public function cxc_embarcacion(){
		$data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] 		 = $this->session->userdata('rif');
		$data['matriculas']  = $this->Reporte_model->matriculas();    
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/cxc_embarcacion/cxc_embarcaciones.php', $data);
        $this->load->view('templates/footer.php');
	}

	public function bus_x_embarcacion(){

		$fecha_D = $this->input->post("start");
		$parametros = explode("/",$fecha_D);
		$dia 	= $parametros['0'];
		$mes	= $parametros['1'];
		$anio	= $parametros['2'];
		$star   = $anio .'-'. $mes .'-'. $dia;
		
		$fecha_H = $this->input->post("end");
		$parametros2 = explode("/",$fecha_H);
		$dia2 	= $parametros2['0'];
		$mes2	= $parametros2['1'];
		$anio2	= $parametros2['2'];
		$end   = $anio2 .'-'. $mes2 .'-'. $dia2;
		
		$data = array(
			'matricula'	=> $this->input->post("matricula"),
			'start'		=> $star,
			'end'		=> $end,
		);
		
		$data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] 		 = $this->session->userdata('rif');

		$data['results'] 	 =	$this->Reporte_model->consultar_cxc_embarc($data);
		$data['results_2'] 	 =	$this->Reporte_model->consultar_cxc_embarc2($data);

		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/cxc_embarcacion/result_cxc_embarcaciones.php', $data);
        $this->load->view('templates/footer.php');
	}
}
