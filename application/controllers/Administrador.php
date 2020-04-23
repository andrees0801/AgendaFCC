<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('bases');
		$this->load->library('session');
	}
	
	public function Inicio()
	{
		$data['solicitudes'] = $this->bases->obtener_solicitudes();

		$this->load->view('administrador/header');
		$this->load->view('administrador/nav-lateral');
		$this->load->view('administrador/inicio',$data);
		$this->load->view('administrador/footer');
	}

	public function verificar_solicitud()
	{
		$this->bases->verificar_solicitud($_GET['id']);
	}

	public function aprobar_solicitud()
	{
		$this->bases->aprobar_solicitud($_GET['id']);
		//Aqui enviamos un correo
	}

	public function eliminar_solicitud()
	{
		$solicitud_id = $this->bases->obtener_solicitud_id($_GET['id'])[0]->solicitud_id;

		$this->bases->eliminar_solicitud($solicitud_id);
		$this->bases->eliminar_horarios($solicitud_id);
	}

	public function obtener_horarios()
	{
		$horarios = $this->bases->obtener_horarios_solicitud($_GET['id']);
		$show_horarios = "";
		for($i=0; $i<count($horarios); $i++)
		{
			$show_horarios .= "
			<tr>
				<td>".$horarios[$i]->fecha."</td>
				<td>".$horarios[$i]->hora_inicial."</td>
				<td>".$horarios[$i]->hora_fin."</td>
				<td>".$horarios[$i]->espacio."</td>
			</tr>
			";
		}

		echo $show_horarios;
	}

}
