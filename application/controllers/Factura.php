<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Factura extends CI_Controller {
   
	public function cons_nro_factura(){
        if(!$this->session->userdata('session'))redirect('login');
	   	$data =	$this->Programacion_model->cons_nro_factura();
	   	echo json_encode($data);
    }

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

    public function listar_info(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data = $this->Programacion_model->listar_info($data);
        echo json_encode($data);
    }
    
    public function registrar(){
        if(!$this->session->userdata('session'))redirect('login');
        $acc_cargar = 1;    
        $nombre     = $this->input->post("nombre");
        $matricula  = $this->input->post("matricular");
        $tele_1     = $this->input->post("tele_1");    
        
        $dato1 = array(
            "nro_factura"   => $this->input->post('numfact'),
            "nombre"        => $this->input->post('nombre'),
            "matricula"     => $this->input->post('matricular'),
            "tele_1"        => $this->input->post('tele_1'),
            "total_iva"     => $this->input->post('total_iva'),
            "total_mas_iva" => $this->input->post('total_mas_iva'),
            "total_bs"      => $this->input->post('total_bs'),
            "fechaingreso"  => date("Y-m-d"),
            "id_status"     => 0,
            "fecha_update"  => date("Y-m-d"),
            "valor_iva"   => $this->input->post('dolar'),
        );

        
        $p_items = array( //factura
            'pies'   		    => $this->input->post('pies'),
            'ob'          	    => $this->input->post('ob'),
            'tarifa'            => $this->input->post('tarifa'),
            'dia' 	            => $this->input->post('dia'),  
            'canon' 	        => $this->input->post('canon'), 
            'monto_estimado' 	=> $this->input->post('monto_estimado'), 
            'matricula' 	    => $this->input->post('matricularr'),        
        );
        $data = $this->Programacion_model->save_factura($acc_cargar,$dato1,$p_items);
        echo json_encode($data);
    }

    public function anuFac(){		
		if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['time']=date("d-m-Y");

        $data['facturas'] 	= $this->Programacion_model->consulta_facturas();
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('factura/anufactura.php', $data);
        $this->load->view('templates/footer.php');
	}

    public function verFactura(){
        if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
        $data['time']=date("d-m-Y");
        
        $id_factura = $this->input->get('id');

        $data['factura_ind'] = $this->Programacion_model->ver_factura($id_factura);
        $data['factura_ind_tabla'] = $this->Programacion_model->ver_factura_tabla($id_factura);
        
        $this->load->view('templates/header.php');
        
        $this->load->view('templates/navigator.php');
        $this->load->view('factura/ver', $data);
        $this->load->view('templates/footer.php');
    }

    // ANULAR
    public function anular_factura(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data = $this->Programacion_model->anular_factura($data);
        echo json_encode($data);
    }

    public function delete(){
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
    //Recibo
    public function Rec(){
		
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
		$this->load->view('factura/recibo.php', $data);
        $this->load->view('templates/footer.php');
	}
    public function cons_nro_factur(){
        if(!$this->session->userdata('session'))redirect('login');
	   	$data =	$this->Programacion_model->cons_nro_recibo();
	   	echo json_encode($data);
    }

    public function registrar_recibo(){
        if(!$this->session->userdata('session'))redirect('login');
        $acc_cargar = 1;    
        $nombre     = $this->input->post("nombre");
        $matricula  = $this->input->post("matricular");
        $tele_1     = $this->input->post("tele_1");    
        
        $dato1 = array(
            "nro_factura"   => $this->input->post('numfact'),
            "nombre"        => $this->input->post('nombre'),
            "matricula"     => $this->input->post('matricular'),
            "tele_1"        => $this->input->post('tele_1'),
            "total_iva"     => $this->input->post('total_iva'),
            "total_mas_iva" => $this->input->post('total_mas_iva'),
            "total_bs"      => $this->input->post('total_bs'),
            "fechaingreso"  => date("Y-m-d"),
            "id_status"     => 0,
            "fecha_update"  => date("Y-m-d"),
            "valor_iva"   => $this->input->post('dolar'),
        );

        $p_items = array( //factura
            'pies'   		    => $this->input->post('pies'),
            'ob'          	    => $this->input->post('ob'),
            'tarifa'            => $this->input->post('tarifa'),
            'dia' 	            => $this->input->post('dia'),  
            'canon' 	        => $this->input->post('canon'), 
            'monto_estimado' 	=> $this->input->post('monto_estimado'), 
            'matricula' 	    => $this->input->post('matricularr'),        
        );

        $data = $this->Programacion_model->save_recibo($acc_cargar,$dato1,$p_items);
        echo json_encode($data);
        

    }
    public function verRecibo(){
        if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
        $data['time']=date("d-m-Y");
        
        $id_factura = $this->input->get('id');
        $data['facturas'] 	= $this->Programacion_model->consulta_recibo();

        $data['factura_ind'] = $this->Programacion_model->ver_recibo($id_factura);
        $data['factura_ind_tabla'] = $this->Programacion_model->ver_recibo_tabla($id_factura);
        
        $this->load->view('templates/header.php');
        
        $this->load->view('templates/navigator.php');
        $this->load->view('factura/ver_recibo', $data);
        $this->load->view('templates/footer.php');
    }
    public function ver_reci(){
        if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
        $data['time']=date("d-m-Y");
        
        $id_factura = $this->input->get('id');

        $data['factura_ind'] = $this->Programacion_model->ver_recibo($id_factura);
        $data['factura_ind_tabla'] = $this->Programacion_model->ver_recibo_tabla($id_factura);
        
        $this->load->view('templates/header.php');
        
        $this->load->view('templates/navigator.php');
        $this->load->view('factura/ver_recb2', $data);
        $this->load->view('templates/footer.php');
    }
    
}