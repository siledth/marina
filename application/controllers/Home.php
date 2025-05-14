<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        if (!$this->session->userdata('session')) {
            redirect('login');
        }
        $data['time'] = date("d-m-Y");

        $resultado = $this->Maletero_model->generar_deudas_maleteros();

        $this->load->view('templates/header.php');
        $this->load->view('templates/navigator.php',);
        $this->load->view('home/index.php');
        $this->load->view('templates/footer.php');
    }
}
