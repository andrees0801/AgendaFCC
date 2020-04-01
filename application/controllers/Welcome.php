<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('bases');
		$this->load->library('session');
	}
	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('nav-lateral');
		$this->load->view('calendario');
		$this->load->view('footer');
	}

	public function Fechas_Disponibles()
	{
		$this->load->view('header');
		$this->load->view('nav-lateral');
		$this->load->view('fechas_disponibles');
		$this->load->view('footer');
	}

	public function realizar_apartado()
	{
		echo $_GET['dia_1']."<br>";
		echo $_GET['hora-i-1']."<br>";
		echo $_GET['hora-f-1'];
	}

	/* Obtencion de horarios ocupados */
	public function obtener_fechas_solicitadas()
	{
		$inmueble = $_GET['inmueble'];

		$defaultEvents =  array();
		$defaultEvent = new stdClass();

		switch ($inmueble) {
			case "Auditorio Albert Einstein":
				
				/*Aqui inicia el for de todos los valores obtenidos de la bd*/

					/* Obtenemos los valores de la bd y se crea el elemento */
					$fecha_inicio = date_create('2020-03-31 09:00');
					$fecha_fin = date_create('2020-03-31 12:00');
					
					/* Le damos el formato aceptado por el plugin */
					$inicio = date_format($fecha_inicio, 'D M d o G:i:00');
					$fin = date_format($fecha_fin, 'D M d o G:i:00');

					$defaultEvent->title = 'Auditorio 09:00-12:00';
					$defaultEvent->start = $inicio;
					$defaultEvent->end = $fin;
					$defaultEvent->className = 'bg-info';

					array_push($defaultEvents, $defaultEvent);

				/*Aqui finaliza el for */

				break;

			case "Mural":

				/* Obtenemos los valores de la bd y se crea el elemento */
				$fecha_inicio = date_create('2020-03-31 09:00');
				$fecha_fin = date_create('2020-03-31 12:00');
				
				/* Le damos el formato aceptado por el plugin */
				$inicio = date_format($fecha_inicio, 'D M d o G:i:00');
				$fin = date_format($fecha_fin, 'D M d o G:i:00');

				$defaultEvent->title = 'Mural 09:00-12:00';
				$defaultEvent->start = $inicio;
				$defaultEvent->end = $fin;
				$defaultEvent->className = 'bg-info';

				array_push($defaultEvents, $defaultEvent);

				break;
		}
		echo json_encode($defaultEvents);

	}
}
