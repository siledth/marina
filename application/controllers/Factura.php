<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura extends CI_Controller {
   
	
    public function Fac(){
		
		if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
        $data['time']=date("d-m-Y");
        $data['fuente'] = $this->Programacion_model->consulta_part_pres();
        $data['tarifa'] = $this->Programacion_model->consulta_tarifa();
        $data['mat'] = $this->Programacion_model->consulta_matricula();
        $data['iva'] 	= $this->Programacion_model->consulta_iva();
        $data['dolar'] 	= $this->Programacion_model->consulta_dolar();
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('factura/factura.php', $data);
        $this->load->view('templates/footer.php');
	}
    
    public function registrar(){
        if(!$this->session->userdata('session'))redirect('login');
        $acc_cargar = $this->input->POST('acc_cargar');     
        $nombre = $this->input->post("nombre");
        $matricula = $this->input->post("matricula");
        $tele_1 = $this->input->post("tele_1");    
        
        $dato1 = array(
                
            "nombre" => $nombre,
            "matricula" => $matricula,
            "tele_1" => $tele_1,
                        
            "fechaingreso" => date("Y-m-d")            
        );

        $p_items = array( //factura
            'pies'   		        => $this->input->post('pies'),
            'ob'          	=> $this->input->post('ob'),
            'tarifa'             => $this->input->post('tarifa'),
            'dia' 	            => $this->input->post('dia'),  
            'canon' 	            => $this->input->post('canon'), 
            'monto_estimado' 	            => $this->input->post('monto_estimado'), 
            'matricula' 	            => $this->input->post('matricular'),
            
            
                    
        );

        

        $data = $this->Programacion_model->save_factura($acc_cargar,$dato1,$p_items);
        echo json_encode($data);
        

    }
    public function delete()
{
    $id = $this->input->get('id');
    $resultado = $this->Programacion_model->delete($id);
    redirect('Buque/Plantilla');
   
}
    public function eliminar_proy(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Programacion_model->eliminar_proy($data);
        echo json_encode($data);
    }
    public function Rec(){
		
		if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
        $data['time']=date("d-m-Y");
        $data['fuente'] = $this->Programacion_model->consulta_part_pres();
        $data['tarifa'] = $this->Programacion_model->consulta_tarifa();
        $data['matricula'] = $this->Programacion_model->consulta_matricula();
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('factura/recibo.php', $data);
        $this->load->view('templates/footer.php');
	}
}