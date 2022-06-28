<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tarifa extends CI_Controller
{
	public function tarif()
	{
		$this->load->view('templates/header.php');
		$this->load->view('templates/navigator.php');
		$this->load->view('tablas/tarifa.php');
		$this->load->view('templates/footer.php');
	}
	public function save()
	{ 
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('desc_concepto', 'desc_concepto', 'required');
			$this->form_validation->set_rules('desc_condicion', 'desc_condicion', 'required');
            $this->form_validation->set_rules('desc_tarifa', 'desc_tarifa', 'required');
            $this->form_validation->set_rules('des_unidad', 'des_unidad', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$ajax_data = $this->input->post();
				if ($this->Tarifa_model->saves($ajax_data)) {
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
	public function fetchtarifa()
	{
		if ($this->input->is_ajax_request()) {
			$posts = $this->Tarifa_model->get_tarifa();
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
	public function edittarifa()
	{
		if ($this->input->is_ajax_request()) {
			$edit_id_tarifa = $this->input->post('edit_id_tarifa');

			if ($post = $this->Tarifa_model->single_tarifa($edit_id_tarifa)) {
				$data = array('responce' => 'success', 'post' => $post);
			} else {
				$data = array('responce' => 'error', 'message' => 'error al guardar');
			}
			echo json_encode($data);
		} else {
			echo "No direct script access allowed";
		}
	}
	public function updatetarifa()
	{
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('edit_id_tarifa', 'edit_id_tarifa', 'required');
			$this->form_validation->set_rules('edit_desc_condicion', 'desc_condicion', 'required');
			if ($this->form_validation->run() == FALSE) {
				$data = array('responce' => 'error', 'message' => validation_errors());
			} else {
				$data['id_tarifa'] = $this->input->post('edit_id_tarifa');
				$data['desc_concepto'] = $this->input->post('edit_desc_concepto');
				$data['desc_condicion'] = $this->input->post('edit_desc_condicion');
                $data['desc_tarifa'] = $this->input->post('edit_desc_tarifa');
                $data['des_unidad'] = $this->input->post('edit_des_unidad');
                $data['fecha'] = date("Y-m-d h:m:s");
               

				if ($this->Tarifa_model->update_tarifa($data)) {
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
}
