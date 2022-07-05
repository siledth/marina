<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensualidades extends CI_Controller {

	public function ver(){
		if(!$this->session->userdata('session'))redirect('login');
        if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['time']=date("d-m-Y");
        
        $date = date('d');
        $generar = $this->Mensualidades_model->generar($date);
        if ($generar) {
            $data['ver_deudas'] = $this->Mensualidades_model->ver_deudas($date);
        }
       
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('mensualidades/ver.php', $data);
        $this->load->view('templates/footer.php');
	}

}