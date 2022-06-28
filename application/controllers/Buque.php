<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buque extends CI_Controller {

	public function buques(){
		if(!$this->session->userdata('session'))redirect('login');
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('user/buque.php');
        $this->load->view('templates/footer.php');
	}
    public function savebuques()
	{
        $nombrebuque = $this->input->post("nombrebuque");
        $matricula = $this->input->post("matricula");
        $trailer = $this->input->post("trailer");
        $pie = $this->input->post("pie");
        $tipo = $this->input->post("tipo");
        $color = $this->input->post("color");
        $eslora = $this->input->post("eslora");
        $manga = $this->input->post("manga");
        $puntal = $this->input->post("puntal");
        $bruto = $this->input->post("bruto");
        $neto = $this->input->post("neto");
        
        
        $nombrecom = $this->input->post("nombrecom");
        $apellido = $this->input->post("apellido");
        $tipo_ced = $this->input->post("tipo_ced");
        $cedula = $this->input->post("cedula");
        $tele_1 = $this->input->post("tele_1");
        $email = $this->input->post("email");

		
       
        //aca empiezo las validaciones
        
      $this->form_validation->set_rules('nombrebuque', 'nombrebuque ', 'required|min_length[3]');
        $this->form_validation->set_rules('matricula', 'matricula ', 'required|min_length[1]');
        $this->form_validation->set_rules('trailer', 'trailer ', 'required|min_length[1]');
        $this->form_validation->set_rules('pie', 'pie', 'required|is_natural');
        $this->form_validation->set_rules('tipo', 'tipo ', 'required|min_length[1]');
        $this->form_validation->set_rules('color', 'color ', 'required|min_length[1]');;
		
        $this->form_validation->set_rules('nombrecom', 'Nombre ', 'required|min_length[3]');
        $this->form_validation->set_rules('apellido', 'Apellido ', 'required|min_length[1]');
        $this->form_validation->set_rules('tipo_ced', 'tipo_ced ', 'required|min_length[1]');
        $this->form_validation->set_rules('cedula', 'cedula de dentidad', 'required|min_length[6]|max_length[20]|is_natural');
        $this->form_validation->set_rules('tele_1', 'telefono ', 'required|min_length[6]|max_length[15]|is_natural');
        $this->form_validation->set_rules('email', 'Correo eléctronico ', 'required');
      
        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header.php');
            $this->load->view('templates/navigator.php');
            $this->load->view('user/buque.php');
            $this->load->view('templates/footer.php');
        } else {
           
            $data1 = array(
                
                "nombrebuque" => $nombrebuque,
                "matricula" => $matricula,
                "trailer" => $trailer,
                "pie" => $pie,
                "tipo" => $tipo,
                "color" => $color,
                "eslora" => $eslora,
                "manga" => $manga,
                "puntal" => $puntal,
                "bruto" => $bruto,
                "neto" => $neto,
                "canon" => $pie,
                "fechaingreso" => date("Y-m-d h:m:s")            
			);
            
			$data2 = array(
				"cedula" => $cedula,
                "tipo_ced" => $tipo_ced,
                "nombrecom" => $nombrecom,
                "apellido" => $apellido,
                "fecha" => date("Y-m-d h:m:s"),
                "tele_1" => $tele_1,
                "email" => $email,   
				"id_buque" => null,
                "matricula" => $matricula
			);
            
            $this->User_model->savebueque($data1,$data2);
            $this->session->set_flashdata('success', 'Registrado.');
            
            redirect('user/buques');
        }
    }

    public function Plantilla(){
		if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('buque/planilla.php', $data);
        $this->load->view('templates/footer.php');
	}
    public function agregar(){
		if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
        $data['time']=date("d-m-Y");
        $data['fuente'] = $this->Programacion_model->consulta_part_pres();
        $data['tarifa'] = $this->Programacion_model->consulta_tarifa();
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('buque/agregare.php', $data);
        $this->load->view('templates/footer.php');
	}
    public function registrar_bien(){
        if(!$this->session->userdata('session'))redirect('login');
        $acc_cargar = $this->input->POST('acc_cargar');
        $nombrebuque = $this->input->post("nombrebuque");
        $matricula = $this->input->post("matricula");
        $trailer = $this->input->post("trailer");
        $pies = $this->input->post("pies");
        $tipo = $this->input->post("tipob");
        $color = $this->input->post("color");
        $eslora = $this->input->post("eslora");
        $manga = $this->input->post("manga");
        $puntal = $this->input->post("puntal");
        $bruto = $this->input->post("bruto");
        $neto = $this->input->post("neto");
        $tarifa = $this->input->post("tarifa"); 
        $canon = $this->input->post("canon"); 
        $dia = $this->input->post("dia"); 
        $ubicacion = $this->input->post("ubicacion");   
        
        $dato1 = array(
                
            "nombrebuque" => $nombrebuque,
            "matricula" => $matricula,
            "trailer" => $trailer,
            "pies" => $pies,
            "tipo" => $tipo,
            "color" => $color,
            "eslora" => $eslora,
            "manga" => $manga,
            "puntal" => $puntal,
            "bruto" => $bruto,
            "neto" => $neto,
            "canon" => $canon,
            "tarifa" => $tarifa,
            "dia" => $dia,
            "ubicacion" => $ubicacion,            
            "fechaingreso" => date("Y-m-d")            
        );

        $p_items = array( //tripulacion
            'cedulat'   		        => $this->input->post('cedulat'),
            'tipo_cedt'          	=> $this->input->post('tipo_cedt'),
            'nombrecomt'             => $this->input->post('nombrecomt'),
            'tele_1t' 	            => $this->input->post('tele_1t'),  
            'cargot' 	            => $this->input->post('cargot'), 
            "matricula" => $matricula, 
                    
        );

        $p_ffinanciamiento = array( //propietarios
            'cedula'   		        => $this->input->post('cedula'),
            'tipo_ced'          	=> $this->input->post('tipo_ced'),
            'nombrecom'             => $this->input->post('nombrecom'),
            'tele_1' 	            => $this->input->post('tele_1'),
            'email' 	            => $this->input->post('email'),
            'tipo' 	            => $this->input->post('tipo'),
            "matricula" => $matricula,

        );

        $data = $this->Programacion_model->save_bienes($acc_cargar,$dato1,$p_items,$p_ffinanciamiento);
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
}