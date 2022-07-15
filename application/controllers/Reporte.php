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
	public function Repor(){
	
		$data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
		$data['time']=date("d-m-Y");
		$data['canon'] = $this->Reporte_model->getCanon();
		
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('Reporte/canon.php', $data);
        $this->load->view('templates/footer.php');
	}
}
