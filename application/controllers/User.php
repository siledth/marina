<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function index()
	{
		$data['organo']  = $this->User_model->consultar_organos();
		//$data['entes']   = $this->User_model->consultar_entes();
		//$data['enteads'] = $this->User_model->consultar_enteads();

		$this->load->view('templates/header.php');
		$this->load->view('templates/navigator.php');
		$this->load->view('user/add.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function save() 
	{
		$nombre = $this->input->post("nombre");
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$repeatPassord = $this->input->post("repeatPassord");
		$id_unidad = $this->input->post("id_unidad");
		$this->form_validation->set_rules('nombre', 'Nombre completo', 'required|min_length[1]');
		$this->form_validation->set_rules('email', 'Correo eléctronico', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('repeatPassord', 'Confirma contraseña', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header.php');
			$this->load->view('templates/navigator.php');
			$this->load->view('user/add.php', $data);
			$this->load->view('templates/footer.php');
		} else {

			$clave = password_hash(
				base64_encode(
					hash('sha256', $password, true)
				),
				PASSWORD_DEFAULT
			);

			$data = array(
				"nombre" => $nombre,
				"password" => $clave,
				"email" => $email,
				"foto" => 2,
				"perfil" => 1,
				"estado" => 1,
				"ultimo_login" => date("Y-m-d h:m:s"),
				"fecha" => date("Y-m-d"),
				"intentos" => 1,
				"unidad" => $id_unidad,
				"fecha_update" => date("Y-m-d"),
			);

			$this->User_model->save($data);
			$this->session->set_flashdata('success', 'Se guardo los datos correctamente');
			redirect('user/index');
		}
	}
	// guardar organismo externo
	public function save_organismo()
	{

		$data = array(
			'id_organoads'		=> $this->input->post("id_organoads"),
			'desc_organo'		=> $this->input->post("organo"),
			'cod_onapre'	 	=> $this->input->post("cod_onapre"),
			'siglas' 			=> $this->input->post("siglas"),
			'tipo_rif'			=> $this->input->post("tipo_rif"),
			'rif' 				=> $this->input->post("rif"),
			'id_clasificacion' 	=> $this->input->post("id_clasificacion"),
			'tel_local' 		=> $this->input->post("tel_local"),
			'tel_local_2' 		=> $this->input->post("tel_local_2"),
			'tel_movil'			=> $this->input->post("tel_movil"),
			'tel_movil_2' 		=> $this->input->post("tel_movil_2"),
			'pag_web' 			=> $this->input->post("pag_web"),
			'email'				=> $this->input->post("email"),
			'id_estado' 		=> $this->input->post("id_estado"),
			'id_municipio' 		=> $this->input->post("id_municipio"),
			'id_parroquia' 		=> $this->input->post("id_parroquia"),
			'direccion_fiscal' 	=> $this->input->post("direccion_fiscal"),
			'gaceta_oficial'	=> $this->input->post("gaceta_oficial"),
			'fecha_gaceta'		=> $this->input->post("fecha_gaceta"),
			'usuario' 			=> $this->session->userdata('id_user')
		);
		$data = $this->Configuracion_model->save_organismo($data);
		$this->session->set_flashdata('sa-success2', 'Se guardo los datos correctamente');
		redirect('user/cuentadante');
	}
	//_________________________________________________________________________________________________________________________________________________________
      //crerar usuario externo
	  public function int()
	{
		$data['organo']  = $this->User_model->consultar_organos();
		//$data['entes']   = $this->User_model->consultar_entes();
		//$data['enteads'] = $this->User_model->consultar_enteads();

		$this->load->view('templates/header.php');
		$this->load->view('templates/navigator.php');
		$this->load->view('user/usuarioexterno.php', $data);
		$this->load->view('templates/footer.php');
	}
		public function chk_password_expression($str)
			{
			if (1 !== preg_match("/^.*(?=.{6,})(?=.*[0-9])(?=.*[^a-zA-Z\d])(?=.*[a-z])(?=.*[A-Z]).*$/", $str))
			{
				$this->form_validation->set_message('chk_password_expression', '%s debe tener al menos 6
				caracteres y debe contener al menos una Caracter Especial ,una letra Minúscula, una Letra Mayúscula y un Número');
				return FALSE;
			}
			else
			{
				return TRUE;
			}
			}
		function select_validate($selectValue)
				{
				// 'none' is the first option and the text says something like "-Choose one-"
				if($selectValue == 'none')
				{
				$this->form_validation->set_message('select_validate', 'Selecione una opción');
				return false;
				}
				else // user picked something
				{
				return true;
				}
				}
		public function savedante()
	{
		$nombrecom = $this->input->post("nombrecom");
		$apellido = $this->input->post("apellido");
		$tipo_ced = $this->input->post("tipo_ced");
		$cedula = $this->input->post("cedula");
		$tele_1 = $this->input->post("tele_1");
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$repeatPassord = $this->input->post("repeatPassord");
		$usuario = $this->input->post("email");
		$unidad = $this->input->post("id_unidad");
		$perfil = $this->input->post("perfil");
		//aca empiezo las validaciones
		$this->form_validation->set_rules('perfil', 'perfil', 'required|callback_select_validate');
		$this->form_validation->set_rules('nombrecom', 'Nombre ', 'required|min_length[1]');
		$this->form_validation->set_rules('apellido', 'Apellido ', 'required|min_length[1]');
		$this->form_validation->set_rules('tipo_ced', 'tipo_ced ', 'required|min_length[1]');
		$this->form_validation->set_rules('cedula', 'cedula de dentidad', 'required|min_length[1]|is_natural');
		$this->form_validation->set_rules('tele_1', 'tele_1 comleto', 'required|min_length[1]|is_natural');
		//$this->form_validation->set_rules('email', 'Correo eléctronico ', 'required|valid_email|is_unique[usuarios.email]');
		$this->form_validation->set_rules( 'password', 'Contraseña', 'required');
		$this->form_validation->set_rules('repeatPassord', 'Confirma contraseña', 'required|matches[password]');
		
		if ($this->form_validation->run() == FALSE) {
			$data['organo']  = $this->User_model->consultar_organos();
			//$data['entes']   = $this->User_model->consultar_entes();
			//$data['enteads'] = $this->User_model->consultar_enteads();
			$this->load->view('templates/header.php');
			$this->load->view('templates/navigator.php');
			$this->load->view('user/usuarioexterno.php', $data);
			$this->load->view('templates/footer.php');

		} else {

			$clave = password_hash(
				base64_encode(
					hash('sha256', $password, true)
				),
				PASSWORD_DEFAULT
			);
			//esto es lo que va a la primera tabla usuarios
			$data = array(
				 
				
				"nombre" => $email,
				"apellido" => $apellido,
				"password" => $clave,
				
				"perfil" => $perfil,
				"foto" => 2,
				"id_estatus" => 1,
				"rif" => $unidad,
				"fecha" => date("Y-m-d h:m:s"),
				"fecha_update" => date("Y-m-d"),
				"cedula" => $cedula,
				"intentos" => 1,				
				"tele_1" => $tele_1,
				"nombrecom" =>$nombrecom

			);

			

			$this->User_model->savedante($data);
			$this->session->set_flashdata('success', 'El usuario Registrado es de uso personal, no se debe compartir.');
			redirect('user/int');
		}
	}


    //_________________________________________________________________________________________________________________
	public function usuario()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navigator.php');
		$this->load->view('user/users.php');
		$this->load->view('templates/footer.php');
	}
	public function savealicuota()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('desc_alicuota_iva', 'desc_alicuota_iva', 'required');
			$this->form_validation->set_rules('desc_porcentaj', 'desc_porcentaj', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if ($this->Tablas_model->savesalicuota($ajax_data)) {
					$data = array('responce' => 'success', 'message' => 'Datos Guardado');
				} else {
					$data = array('responce' => 'error', 'message' => 'Failed to add record');
				}
			}

			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
	public function fetchusuario()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->User_model->get_usuario();
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	public function deletealicuota()
	{
		if ($this->input->is_ajax_request()) {

			$del_id = $this->input->post('del_id');

			if ($this->Tablas_model->delete_alicuota($del_id)) {
				$data = array('response' => "success",);
			} else {
				$data = array('response' => "error");
			}

			echo json_encode($data);
		}
	}
	public function editausuario()
	{
		if ($this->input->is_ajax_request()) {
			$edit_id = $this->input->post('edit_id');

			if ($post = $this->User_model->single_usuario($edit_id)) {
				$data = array('responce' => 'success', 'post' => $post);
			} else {
				$data = array('responce' => 'error', 'message' => 'error al guardar');
			}
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
	public function updateusuario()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('edit_nombre', 'nombre', 'required');
			$this->form_validation->set_rules('edit_apellido', 'apellido', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$data['id'] = $this->input->post('edit_record_id');
				$data['nombre'] = $this->input->post('edit_nombre');
				$data['apellido'] = $this->input->post('edit_apellido');

				if ($this->User_model->update_usuario($data)) {
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
	public function propietario()
	{
		

		$this->load->view('templates/header.php');
		$this->load->view('templates/navigator.php');
		$this->load->view('user/propietario.php');
		$this->load->view('templates/footer.php');
	}
		
		
		public function propietar()
	{
        $nombrecom = $this->input->post("nombrecom");
        $apellido = $this->input->post("apellido");
        $tipo_ced = $this->input->post("tipo_ced");
        $cedula = $this->input->post("cedula");
        $tele_1 = $this->input->post("tele_1");
        $email = $this->input->post("email");
       
        //aca empiezo las validaciones
        
        $this->form_validation->set_rules('nombrecom', 'Nombre ', 'required|min_length[3]');
        $this->form_validation->set_rules('apellido', 'Apellido ', 'required|min_length[4]');
        $this->form_validation->set_rules('tipo_ced', 'tipo_ced ', 'required|min_length[1]');
        $this->form_validation->set_rules('cedula', 'cedula de dentidad', 'required|min_length[6]|max_length[20]|is_natural');
        $this->form_validation->set_rules('tele_1', 'telefono ', 'required|min_length[6]|max_length[15]|is_natural');
        $this->form_validation->set_rules('email', 'Correo eléctronico ', 'required|valid_email|is_unique[propiet.email]');
        if ($this->form_validation->run() == false) {
            
            $this->load->view('templates/header.php');
            $this->load->view('templates/navigator.php');
            $this->load->view('user/propietario.php');
            $this->load->view('templates/footer.php');
        } else {
           
            $data = array(
                 
                "cedula" => $cedula,
                "tipo_ced" => $tipo_ced,
                "nombrecom" => $nombrecom,
                "apellido" => $apellido,
                // "id_estatus" => 1,
               
                "fecha" => date("Y-m-d h:m:s"),
                "tele_1" => $tele_1,
                "email" => $email,
                

            );

            

            $this->User_model->savepropiet($data);
            $this->session->set_flashdata('success', 'El Proietario fue Registrado.');
            redirect('user/propietario');
        }
    }
	public function verpropietario()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navigator.php');
		$this->load->view('user/verpropiet.php');
		$this->load->view('templates/footer.php');
	}
	
	public function fetchverpropie()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->User_model->get_fetchverpropie();
			$data = array('responce' => 'success', 'posts' => $posts);
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}

	
	public function editverpropie()
	{
		if ($this->input->is_ajax_request()) {
			$edit_cedula = $this->input->post('edit_cedula');

			if ($post = $this->User_model->single_verpropie($edit_cedula)) {
				$data = array('responce' => 'success', 'post' => $post);
			} else {
				$data = array('responce' => 'error', 'message' => 'error al guardar');
			}
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
	public function updateverpropie()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('edit_nombrecom', 'nombre completo', 'required');
			$this->form_validation->set_rules('edit_tele_1', 'telefono', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$data['cedula'] = $this->input->post('edit_cedula');
				$data['nombrecom'] = $this->input->post('edit_nombrecom');
				$data['tele_1'] = $this->input->post('edit_tele_1');
				$data['email'] = $this->input->post('edit_email');

				if ($this->User_model->update_verpropie($data)) {
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
	public function delete()
{
    $id = $this->input->get('id');
    $resultado = $this->Programacion_model->delete($id);
    redirect('Buque/Plantilla');
   
}
	
    }