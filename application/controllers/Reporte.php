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
	public function ubicaci(){
	
		$data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
		$data['time']=date("d-m-Y");
		$data['total'] = $this->Reporte_model->total();
		$data['canon'] = $this->Reporte_model->getCanon();
		
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/ubicacion.php', $data);
        $this->load->view('templates/footer.php');
	}
	
	public function ubicar(){
		if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
		$data['time']=date("d-m-Y");
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consulta_buque();
		$hasta     = $this->input->post("hasta");
		$desde     = $this->input->post("desde");
		$data['desde'] = date('Y-m-d', strtotime($desde));
		$data['hasta'] = date('Y-m-d', strtotime($hasta)); 
		//$hasta1= date('Y-m-d', strtotime($hasta)); 
		

		$data['fecha'] = $this->Reporte_model->consulta_ubicacion($hasta,$desde);
		$data['tierra'] = $this->Reporte_model->consulta_ubicacion_tierra($hasta,$desde);
		$data['agua'] = $this->Reporte_model->consulta_ubicacion_agua($hasta,$desde);
		$data['muelle1a'] = $this->Reporte_model->consulta_ubicacion_muelle1a($hasta,$desde);
		$data['muelle2a'] = $this->Reporte_model->consulta_ubicacion_muelle2a($hasta,$desde);
		$data['patio1'] = $this->Reporte_model->consulta_ubicacion_patio1($hasta,$desde);
		$data['patio2'] = $this->Reporte_model->consulta_ubicacion_patio2($hasta,$desde);
		$data['muelleb'] = $this->Reporte_model->consulta_ubicacion_muelleb($hasta,$desde);
		$data['muellec'] = $this->Reporte_model->consulta_ubicacion_muellec($hasta,$desde);
		$data['muelled'] = $this->Reporte_model->consulta_ubicacion_muelled($hasta,$desde);
		
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/ver_ubicacion.php', $data);
        $this->load->view('templates/footer.php');
	}

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

	//Reporte por tipo de Servicios
	public function servicios(){
		$data['descripcion']  = $this->session->userdata('unidad');
        $data['rif'] 		  = $this->session->userdata('rif');
		$data['t_servicios']  = $this->Reporte_model->t_servicios();  

		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/servicios/parametros_servc.php', $data);
        $this->load->view('templates/footer.php');
	}

	public function busq_x_tservicio(){
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
			't_servicio'	=> $this->input->post("t_servicio"),
			'start'		=> $star,
			'end'		=> $end,
		);
		$data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] 		 = $this->session->userdata('rif');
		$data['results'] 	 =	$this->Reporte_model->consultar_x_tservicio($data);
		$totales 	 =	$this->Reporte_model->consultar_x_tservicio2($data);
		$data['totl_pies_f'] = $totales['0']['total_pies'];
		$data['totl_monto_f'] = $totales['0']['total'];
		$data['totl_pies_r'] = $totales['1']['total_pies'];
		$data['totl_monto_r'] = $totales['1']['total'];
			
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/servicios/result_x_servicio.php', $data);
        $this->load->view('templates/footer.php');
	}

	//Graficas
	public function tt_ing_egr(){
		$data['descripcion']  = $this->session->userdata('unidad');
        $data['rif'] 		  = $this->session->userdata('rif'); 

		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/graficas/tt_ing_egr.php', $data);
        $this->load->view('templates/footer_g.php');
	}

	public function p_tt_ing_egr(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Reporte_model->p_tt_ing_egr($data);
		echo json_encode($data);
	}

	public function tt_ing_tar(){
		$data['descripcion']  = $this->session->userdata('unidad');
        $data['rif'] 		  = $this->session->userdata('rif');
		$data['t_servicios']  = $this->Reporte_model->t_servicios();

		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/graficas/tt_ing_tar.php', $data);
        $this->load->view('templates/footer_g.php');
	}

	public function p_tt_ing_tar(){
		if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data =	$this->Reporte_model->p_tt_ing_tar($data);
		echo json_encode($data);
	}
}
