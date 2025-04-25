<?php

require_once APPPATH . 'third_party/fpdf/fpdf.php';

class Pdf extends FPDF
{
  var $id_programacion;
  var $Maletero_model;

  function __construct($id_programacion)
  {
    parent::__construct();
    $this->id_programacion = $id_programacion;
    $this->Maletero_model = new Maletero_model();
  }



  function Header()
  {
    // Set font
    $this->SetFont('Arial', 'B', 15);
    // Set the cell margins
    $this->SetMargins(15, 15, 15);
    $this->Image(base_url() . 'baner/logo.png', 15, 10, 45);
    //  $this->Image(base_url().'baner/logo.png',155,10,45);

    $this->Ln(4);
    // Add a new cell with the header text
    $this->SetFont('Arial', 'B', 20);

    $this->Cell(0, 5, utf8_decode('MARINA CARABALLEDA'), 0, 1, 'C');
    $this->Ln(4);

    $this->Cell(0, 5, utf8_decode('Recibo Pago Maleteros  '), 0, 1, 'C');

    $this->SetFont('Arial', 'B', 9);
    $this->Ln(10);
  }
  function Footer()
  {
    // Set the cell margins
    $this->SetMargins(30, 15, 30);
    $this->Ln(1);
    $this->SetY(-20);
    // Add footer section
    $this->SetFont('Arial', '', 9);
    $this->Cell(150, 5, utf8_decode('J413233010 MARINA CARABALLEDA    Pagina') . $this->PageNo() . '/' . $this->AliasNbPages, 0, 1, 'C');

    //$this->Cell(150, 5, utf8_decode('                            Pagina'). $this->PageNo(). '/'. $this->AliasNbPages, 0, 0, 'C');


  }
}

class Pdf_maletero extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function pdfrt()
  {
    // Get the id_programacion variable from the URL
    $id_programacion = $this->input->get('id');

    // Create a new instance of the Pdf class and pass the $id_programacion argument
    $pdf = new Pdf($id_programacion);
    $pdf->AliasNbPages();

    // Set the document properties
    $pdf->AddPage('P', array(215.9, 279.4));

    $pdf->SetFont('Arial', '', 12);


    $da = $this->session->userdata('rif');


    $id_programacion = $this->input->get('id');

    $data = $this->Maletero_model->consulta_maletero_asignacion($id_programacion);
    if ($data != '') {

      foreach ($data as $d) {

        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(35, 5, utf8_decode('Número Recibo:'), 0, 0, 'R');

        $pdf->SetFont('Arial', '', 12);
        $id_factura = str_pad($d->id_factura, 5, '0', STR_PAD_LEFT);
        $pdf->Cell(60, 5, utf8_decode($id_factura), 0, 0, 'L');

        //  $pdf->MultiCell(125, 5, utf8_decode($id_factura), 0, 'L');

        //  $pdf->Cell(40,5, number_format($d->precio_total, 2, ",", "."),0,0,'R');
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(34, 5, utf8_decode('Fecha de Pago:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 5, date("d/m/Y", strtotime($d->fechapago)), 0, 1, 'C');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(34, 8, utf8_decode('Nombre y Apellido:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(125, 8, utf8_decode($d->nombre), 0, 'L');
        $pdf->SetFont('Arial', 'B', 12);

        $pdf->Cell(19, 8, utf8_decode('Cedula/RIF:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(125, 8, utf8_decode($d->cedrif), 0, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(14, 8, utf8_decode('Telefono:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(30, 8, utf8_decode($d->tele), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 8, utf8_decode('Correo:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(50, 8, utf8_decode($d->correo), 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(35, 8, utf8_decode('Asignado a Lancha:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(20, 8, utf8_decode($d->nombre_lancha), 0, 1, 'L');
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(14, 5, utf8_decode('Maletero:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(24, 5, utf8_decode($d->descripcion), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 5, utf8_decode('Monto Pagado $:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(24, 5, utf8_decode($d->pago), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 5, utf8_decode('Tipo de Pago:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(24, 5, utf8_decode($d->tipo_pago), 0, 1, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(33, 10, utf8_decode('Modalidad de Pago'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(24, 10, utf8_decode('Trimestral'), 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(30, 10, utf8_decode('Observación:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 12);
        $pdf->MultiCell(125, 10, utf8_decode($d->nota), 0, 'L');

        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 50);

        $pdf->Cell(100, 5, utf8_decode('Condición:'), 0, 0, 'R');
        $pdf->SetFont('Arial', '', 50);
        $pdf->Cell(24, 5, utf8_decode($d->estatus), 0, 1, 'L');
      }
    }



    $pdf->Ln(1);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(25, 5, utf8_decode(''), 0, 1, 'L');
    $pdf->SetTextColor(255, 0, 0);

    $pdf->MultiCell(180, 4, utf8_decode(''), 0, 'J');
    $pdf->SetTextColor(0, 0, 0);

    $pdf->SetFont('Arial', '', 7);
    $pdf->MultiCell(180, 4, utf8_decode(''), 0, 'J');

    $pdf->Output('Pago Maletero.pdf', 'D');
  }
}
