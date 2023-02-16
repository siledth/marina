
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Propietarios extends CI_Controller {public function Plantilla(){
		if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
      
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('propietario/propietario.php', $data);
        $this->load->view('templates/footer.php');
	}
}