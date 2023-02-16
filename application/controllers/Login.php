<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller {

  public function index() {
    if (!$this->session->userdata('session')) {
      $this->load->view('login/index.php');
    } else {
      redirect('home');
    }
  }

  public function validacion() {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $data = $this->login_model->iniciar($usuario, $contrasena);
    //print_r();die;
    if ($data == 'FALLIDO') {
      $this->session->set_flashdata('fallido', 'Intento Fallido.');
      redirect('login', 'refres');
    } else if ($data == 'BLOQUEADO') {
      $this->session->set_flashdata('sa-error2', 'Usuario bloqueado.');
      redirect('login', 'refres');
    } else if ($data == 'FALSE') {
      $this->session->set_flashdata('sa-error', 'Datos de autenticación erróneos.');
      redirect('login', 'refres');
    } else {
      $inf = ['id' => $data['rif']];

      $id_unidad = $inf['id'];
      $data2 = $this->login_model->consultar_organo($id_unidad);
      if ($data2) {
        $user_data = [
          'id_user' => $data['id'],
          'nombre' => $data['nombre'],
          'apellido' => $data['apellido'],
          'email' => $data['email'],
          'perfil' => $data['perfil'],
          'id_unidad' => $data['rif'],
          'rif' => $data['rif'],
          //'descripcion' => $data2['descripcion'],
          'unidad' => $data2['descripcion'],
          'rif_organoente' => $data['rif'],
          'session' => TRUE,
        ];

        $this->session->set_userdata($user_data);

        redirect('home');
      } else {
        echo "<script>alert('usuario o Clave Errorena! Por favor intente de nuevo.');</script>";
        redirect('login');
      }
    }
    // else{
    // 	echo "<script>alert('usuario o Clave Errorena! Por favor intente de nuevo.');</script>";
    //     redirect('login/index');
    // }
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect('login');
  }

  public function v_camb_clave() {
    if (!$this->session->userdata('session')) {
      redirect('login');
    }

    $this->load->view('templates/header.php');
    $this->load->view('templates/navigator.php');
    $this->load->view('login/cambiar_clave.php');
    $this->load->view('templates/footer.php');
  }

  public function cambiar_clave() {
    $id_usuario = $this->session->userdata('id_user');
    $clave = $this->input->POST('clave');
    $c_clave = $this->input->POST('c_clave');

    if ($clave == $c_clave) {
      $clave_r = password_hash(
        base64_encode(
          hash('sha256', $clave, true)
        ),
        PASSWORD_DEFAULT
      );
      //	print_r($clave_r);die;
      $data = array(
        'password' => $clave_r,
        'fecha_update' => date('Y-m-d h:i:s'),
      );
      $data = $this->login_model->cambiar_clave($id_usuario, $data);
      echo json_encode($data);
    } else {
      $data = 'false';
      echo json_encode($data);
    }
  }

  //Registro de Propietarios
  public function b_cedula(){
    $cedula_prop = $this->input->POST('cedula_prop');
    $data = $this->login_model->b_cedula_propietario($cedula_prop);
    echo json_encode($data);
  }
}
