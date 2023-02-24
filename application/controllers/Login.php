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
      $data2 = $this->login_model->consultar_empresa($id_unidad);
      if ($data2) {
        $user_data = [
          'id_user' => $data['id'],
          'nombre' => $data['nombre'],
          'apellido' => $data['apellido'],
          'email' => $data['email'],
          'perfil' => $data['perfil'],
          'id_unidad' => $data['rif'],
          'rif' => $data['rif'],
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
  public function b_cedula_usu(){
    $cedula_prop = $this->input->POST('cedula_prop');
    $data = $this->login_model->b_cedula_usu($cedula_prop);
    echo json_encode($data);
  }

  public function b_cedula(){
    $cedula_prop = $this->input->POST('cedula_prop');
    $data = $this->login_model->b_cedula_propietario($cedula_prop);
    echo json_encode($data);
  }

  public function registrar_prp(){
    $nombrecomp = $this->input->post('nombre');
    $nombres = explode(' ',  $nombrecomp );

    //Para generar clave aleatoria
    $comb = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); 
    $combLen = strlen($comb) - 1; 
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $combLen);
        $pass[] = $comb[$n];
    }
    $clave = implode($pass); 
    $passwords = implode($pass); 
    $password = password_hash(
      base64_encode(
        hash('sha256', $passwords, true)
      ),
      PASSWORD_DEFAULT
    );
    $inf_usu = array(
      'cedula'       => $this->input->post('cedula_prop'),
      'nombre'       => $nombres[0],
      'apellido'     => $nombres[1],
      'email'        => $this->input->post('email'),
      'rif'          => $this->input->post('rif'),
      'password'     => $password,
      'tele_1'       => $this->input->post('tele_1'),
      'perfil'       => 3,
      'foto'         => 2,
      'intentos'     => 0,
      'id_estatus'   => 1,
      'fecha'        => date('Y-m-d h:i:s'),
      'fecha_update' => date('Y-m-d h:i:s')
    );

    $variables = $this->input->post('cedula_prop');
    $ced = explode("-", $variables);

    $inf_prop = array(
      'cedula'     => $ced['1'],
      'tipo_ced'   => $ced['0'],
      'nombrecom'  => $this->input->post('propietario'),
      'tele_1'     => $this->input->post('tele_1'),
      'email'      => $this->input->post('email'),
      'tipo'       => $this->input->post('tipo'),
      'matricula'  => 0,
      'id_buque'   => 0
    );

    $if_emp = array(
      'rif'          => $this->input->post('rif'),
      'descripcion'  => $this->input->post('propietario'),
      'fecha'        => date('Y-m-d h:i:s'),
      'fecha_update' => date('Y-m-d h:i:s')
    );
    require 'PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer(true);                           // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'roxiyasp@gmail.com';               // SMTP username
    //$mail->Password = 'kefxqwunkuubkdlf';
    $mail->Password = 'uzoauwmlntkoofgm';                 // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->Timeout = 20;
    $mail->setFrom('roxiyasp@gmail.com', 'Mailer');

    $mail->addAddress($this->input->post('email'), 'Joe User');     // Add a recipient
    $mail->Subject = 'Envio de contraseña';
    $mail->Body    = 'Contraseña para ingresar <b>' . $clave .'</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    //$mail->SMTPDebug = true;
    $data = $this->login_model->guardar_prp($inf_usu,$inf_prop, $if_emp);
    if ($data == true) {
      if(!$mail->send()) {
        echo json_encode(false);
      }else {
        echo json_encode($data);
      }
    }
  }
}
