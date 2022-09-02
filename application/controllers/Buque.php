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
    public function desin(){
		if(!$this->session->userdata('session'))redirect('login');
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('buque/desincorporar.php');
        $this->load->view('templates/footer.php');
	}

    public function fetchtdesin()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Buque_model->get_desin();
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
    public function editdesin()
	{
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');

			if ($post = $this->Buque_model->single_desin($edit_id)) {
				$data = array('responce' => 'success', 'post' => $post);
			} else {
				$data = array('responce' => 'error', 'message' => 'error al guardar');
			}
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
    public function updatedesin()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('edit_id', 'edit_id', 'required');
			$this->form_validation->set_rules('edit_desincorporar', 'desincorporar', 'required');
            $this->form_validation->set_rules('edit_observacion', 'observacion', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$data['id'] = $this->input->post('edit_id');
				$data['desincorporar'] = $this->input->post('edit_desincorporar');
                $data['observacion'] = $this->input->post('edit_observacion');
                $data['fecha_desincorporacion'] = date("Y-m-d h:m:s");
               

				if ($this->Buque_model->update_desin($data)) {
					$data = array('responce' => 'success', 'message' => 'Se Actualizo Correctamente');
				} else {
					$data = array('responce' => 'error', 'message' => 'Error al actualizar , revise la información Suministrada');
				}
			}

			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
    public function consultar_embarcacion(){
        if(!$this->session->userdata('session'))redirect('login');
        $data = $this->input->post();
        $data =	$this->Buque_model->consultar_embarcaci($data);
        echo json_encode($data);
    }
    public function Plantilla(){
		if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consulta_buque();
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
        $data['tarifa'] = $this->Programacion_model->consulta_tarifa_r();
        $data['ubicacion'] = $this->Programacion_model->consulta_ubicacion();
		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('buque/agregare.php', $data);
        $this->load->view('templates/footer.php');
	}

    //¡¡¡ESTA FUNCION SI REGISTRA AL BUQUE!!!!
    public function registrar_buque(){ 
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
       
        $tarifas = $this->input->post("tarifa"); 
        $explode = explode('/', $tarifas);
        $id_tarifa = $explode['0'];
        $tarifa = $explode['1'];
        $idd_tarida = $explode['2'];

        $canon = $this->input->post("canon"); 
        $dia = $this->input->post("dia"); 
        $ubicacion = $this->input->post("ubicacion");
        $fecha_pago  = $this->input->post("fecha_pago");   
        
        $buque = array(
                
            "nombrebuque"   => $nombrebuque,
            "matricula"     => $matricula,
            "trailer"       => $trailer,
            "pies"          => $pies,
            "tipo"          => $tipo,
            "color"         => $color,
            "eslora"        => $eslora,
            "manga"         => $manga,
            "puntal"        => $puntal,
            "bruto"         => $bruto,
            "neto"          => $neto,
            "canon"         => $canon,
            "id_tarifa"     => $idd_tarida,
            "tarifa"        => $tarifa,
            "dia"           => $dia,
            "ubicacion"     => $ubicacion,   
            "fecha_pago"    => $fecha_pago,      
            "fechaingreso"  => date("Y-m-d"),
            "desincorporar"  => 1

        ); 

        $tripulacion = array( //tripulacion
            'cedulat'   	=> $this->input->post('cedulat'),
            'tipo_cedt'     => $this->input->post('tipo_cedt'),
            'nombrecomt'    => $this->input->post('nombrecomt'),
            'tele_1t' 	    => $this->input->post('tele_1t'),  
            'cargot' 	    => $this->input->post('cargot'), 
            'email' 	 => $this->input->post('email'),
            'autor' 	    => $this->input->post('autor'), 
            "matricula"     => $matricula, 
                    
        ); 

        $propietarios = array( //propietarios
            'cedula'   	 => $this->input->post('cedula'),
            'tipo_ced'   => $this->input->post('tipo_ced'),
            'nombrecom'  => $this->input->post('nombrecom'),
            'tele_1' 	 => $this->input->post('tele_1'),
            'email' 	 => $this->input->post('email'),
            'tipo' 	     => $this->input->post('tipo'),
            "matricula"  => $matricula,

        );

        $data = $this->Buque_model->save_buque($buque, $tripulacion, $propietarios);
        echo json_encode($data);
    }

    public function delete(){
        if(!$this->session->userdata('session'))redirect('login');
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
    public function editar_proy(){
		if(!$this->session->userdata('session'))redirect('login');
        $data['descripcion'] = $this->session->userdata('unidad');
        $data['rif'] = $this->session->userdata('rif');
        $data['ver_proyectos'] = $this->Programacion_model->consultar_proyectos();
        $data['time']=date("d-m-Y");
        $data['fuente'] = $this->Programacion_model->consulta_part_pres();
        $data['tarifa'] = $this->Programacion_model->consulta_tarifa();
        $parametros              = $this->input->get('id');
        $separar                 = explode("/", $parametros);
        $data['id']   = $separar['0'];
        $data['matricula']       = $separar['1'];
       // $data['id_propiet'] = $separar['2'];
        
        $data['inf_1'] = $this->Programacion_model->inf_1($data['matricula']);

        $data['inf_1'] = $this->Programacion_model->inf_1($data['matricula']);

		$this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
		$this->load->view('buque/editar_proy.php', $data);
        $this->load->view('templates/footer.php');
	}
    public function ver_proy_editar(){
        if(!$this->session->userdata('session'))redirect('login');
		$data = $this->input->post();
		$data = $this->Programacion_model->inf_2_edit($data);
	    echo json_encode($data);
    }
    public function ver_proy_editar_items_o(){
        if(!$this->session->userdata('session'))
        redirect('login');
		$data = $this->input->post();
		$data = $this->Programacion_model->inf_3_o($data);
		echo json_encode($data);
    }
    //edir todo los datos del barco
    public function editar_programacion_proy_o(){
		if(!$this->session->userdata('session'))redirect('login');
        
        $id_buque = $this->input->post("id_buque");
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
       
        $tarifas = $this->input->post("tarifa"); 
        $explode = explode('/', $tarifas);
        $id_tarifa = $explode['0'];
        $tarifa = $explode['1'];
        $idd_tarida = $explode['2'];

        $canon = $this->input->post("canon"); 
        $dia = $this->input->post("dia"); 
        $ubicacion = $this->input->post("ubicacion");
        $fecha_pago  = $this->input->post("fecha_pago");

       

        $buque = array(
                
            "nombrebuque"   => $nombrebuque,
            "matricula"     => $matricula,
            "trailer"       => $trailer,
            "pies"          => $pies,
            "tipo"          => $tipo,
            "color"         => $color,
            "eslora"        => $eslora,
            "manga"         => $manga,
            "puntal"        => $puntal,
            "bruto"         => $bruto,
            "neto"          => $neto,
            "canon"         => $canon,
            "id_tarifa"     => $idd_tarida,
            "tarifa"        => $tarifa,
            "dia"           => $dia,
            "ubicacion"     => $ubicacion,   
            "fecha_pago"    => $fecha_pago,      
            "fechaingreso"  => date("Y-m-d")            
        ); 

        $tripulacion = array( //tripulacion
            'cedulat'   	=> $this->input->post('cedulat'),
            'tipo_cedt'     => $this->input->post('tipo_cedt'),
            'nombrecomt'    => $this->input->post('nombrecomt'),
            'tele_1t' 	    => $this->input->post('tele_1t'),  
            'cargot' 	    => $this->input->post('cargot'), 
            'email' 	 => $this->input->post('email'),
            'autor' 	    => $this->input->post('autor'), 
            "matricula"     => $matricula, 
            "id_buque"  => $id_buque,
                    
        );

        $propietarios = array( //propietarios
            'cedula'   	 => $this->input->post('cedula'),
            'tipo_ced'   => $this->input->post('tipo_ced'),
            'nombrecom'  => $this->input->post('nombrecom'),
            'tele_1' 	 => $this->input->post('tele_1'),
            'email' 	 => $this->input->post('email'),
            'tipo' 	     => $this->input->post('tipo'),
            "matricula"  => $matricula,
            "id_buque"  => $id_buque,

        );
     
        $data = $this->Buque_model->editar_programacion_proy_o($buque, $tripulacion, $propietarios,$matricula,$id_buque);
	  // $data = $this->Programacion_model->editar_programacion_proy_o($id_p_proyecto, $id_programacion, $p_proyecto,$p_items,$p_ffinanciamiento);
	   if ($data) {
		   $this->session->set_flashdata('sa-success2', 'Se guardo los datos correctamente');
		   redirect('Buque/Plantilla');
	   }else{
			 $this->session->set_flashdata('sa-error', 'error');
			redirect('Buque/Plantilla');
		 }
	}

    ////mod buque
    public function Barco() {
       $data['buque'] = $this->Buque_model->consultar_buque();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php');
        $this->load->view('buque/modi_buque.php', $data);
        $this->load->view('templates/footer.php');
    }

      //LLENAR MODAL PARA EDITAR
    public function consulta_tc() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Buque_model->consulta_tc($data);
        echo json_encode($data);
    }

//EDITAR

    public function editar_tc() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();

        $data = array(
            'id' => $data['id'],
            'nombrebuque' => $data['nombrebuque'],
            'color' => $data['color'],
            'trailer' => $data['trailer'],
            'ubicacion' => $data['ubicacion'],
        );

        $data = $this->Buque_model->editar_tc($data);
        echo json_encode($data);
    }

    //ELIMINAR
    public function eliminar_tc() {
        if (!$this->session->userdata('session'))
            redirect('login');
        $data = $this->input->post();
        $data = $this->Buque_model->eliminar_tc($data);
        echo json_encode($data);
    }

}