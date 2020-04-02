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
		redirect(base_url().'Welcome/Agendas');
	}

	public function Agendas()
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

	public function ej()
	{
		// $hoy = getdate();
		// echo $hoy[0];
		// $escapado = addslashes("Is your name O'Reilly?");
		// $descapado = stripslashes($escapado);

		// echo $escapado."<br>";
		// echo $descapado;

		// $horarios =  array();
		// $horario = new stdClass();

		//array_push($horarios, $horario);

	}

	public function realizar_apartado()
	{
		$nombre = addslashes($_GET['nombre']);
		$apellido = addslashes($_GET['apellido']);
		$correo = addslashes($_GET['correo']);
		$evento = addslashes($_GET['evento']);

		$espacio = addslashes($_GET['espacio']);

		$hoy = getdate();
		$solicitud_id = md5($evento.$correo.$hoy['year'].$hoy[0]);

		$horarios =  array();
		$horario = new stdClass();

		$i = 1;

		$disponible = TRUE;

		while(!empty($_GET['dia_'.$i]))
		{
			$horario->dia = $_GET['dia_'.$i];
			$horario->inicio = $_GET['hora-i-'.$i];
			$horario->fin = $_GET['hora-f-'.$i];
			array_push($horarios, $horario);

			$inicio = date( 'H:i:s', strtotime('+1 minute', strtotime ($horario->inicio)));
			$fin = date( 'H:i:s', strtotime('-1 minute', strtotime ($horario->fin)));

			$disponible = $this->bases->verificar_horario($horario->dia, $inicio, $fin, $espacio);

			if($disponible == TRUE)
			{
				break;
			}

			$i++;
		}

		if($disponible == FALSE){

			/* Agregamos la solicitud */
			$this->bases->agregar_solicitud($solicitud_id, $nombre, $apellido, $correo, $evento);

			for($h = 0; $h < count($horarios); $h++){
				
				$this->bases->agregar_horario($solicitud_id, $horarios[$h]->dia, $horarios[$h]->inicio, $horarios[$h]->fin, $espacio);
			}
			
			//Redireccionar a una vista de satisfactorio
			redirect(base_url().'Welcome/registro_exitoso');
		}else{
			//Redireccionar a una vista de no satisfactorio
			redirect(base_url().'Welcome/registro_fracasado');
		}
		
	}

	public function registro_exitoso()
	{
		$this->load->view('header');
		$this->load->view('nav-lateral');
		$this->load->view('success_registro');
		$this->load->view('footer');
	}

	public function registro_fracasado()
	{
		$this->load->view('header');
		$this->load->view('nav-lateral');
		$this->load->view('denied_registro');
		$this->load->view('footer');
	}

	public function obtener_disponibilidad()
	{
		$espacio = $_GET['espacio'];
		$dia = $_GET['dia'];
		$inicio = $_GET['inicio'];
		$fin = $_GET['fin'];

		$inicio = date( 'H:i:s', strtotime('+1 minute', strtotime ($inicio)));
		$fin = date( 'H:i:s', strtotime('-1 minute', strtotime ($fin)));

		$disponible = $this->bases->obtener_horarios_no_disponibles($dia, $inicio, $fin, $espacio);


		echo json_encode($disponible);
	}

	/* Obtencion de horarios ocupados */
	public function obtener_fechas_solicitadas()
	{
		$inmueble = $_GET['inmueble'];

		$defaultEvents =  array();

		$horarios_query = $this->bases->obtener_horarios_espacio($inmueble);

		if($horarios_query != FALSE)
		{
			for($i=0; $i<count($horarios_query); $i++)
			{
				/*Aqui inicia el for de todos los valores obtenidos de la bd*/
					$defaultEvent = new stdClass();
					/* Obtenemos los valores de la bd y se crea el elemento */
					$hora_inicial = $horarios_query[$i]->hora_inicial;
					$hora_fin = $horarios_query[$i]->hora_fin;
					$fecha = $horarios_query[$i]->fecha;

					$fecha_inicio = date_create($fecha.' '.$hora_inicial);
					$fecha_fin = date_create($fecha.' '.$hora_fin);
					
					/* Le damos el formato aceptado por el plugin */
					$inicio = date_format($fecha_inicio, 'D M d o G:i:00');
					$fin = date_format($fecha_fin, 'D M d o G:i:00');

					$defaultEvent->title = $hora_inicial."-".$hora_fin;
					$defaultEvent->start = $inicio;
					$defaultEvent->end = $fin;
					$defaultEvent->className = 'bg-info';

					array_push($defaultEvents, $defaultEvent);

				/*Aqui finaliza el for */
			}
		}
		
		echo json_encode($defaultEvents);

	}
}
