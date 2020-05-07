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
		if (isset($_SESSION['status']))
		{
			$data['solicitudes'] = $this->bases->obtener_solicitudes();
			$data['status'] =$_SESSION['status'];

			$this->load->view('administrador/header');
			$this->load->view('administrador/nav-lateral');
			$this->load->view('administrador/inicio',$data);
			$this->load->view('administrador/footer');
		}else{
			redirect('Welcome/', 'location');
		}
	}

	public function verificar_solicitud()
	{
		$this->bases->verificar_solicitud($_GET['id']);
	}

	public function aprobar_solicitud()
	{
		$id = $_GET['id'];
		$this->bases->aprobar_solicitud($id);
		//Aqui enviamos un correo
		$this->email($id);
	}

	public function email($id)
	{
		$datos = $this->bases->obtener_solicitud_id_correo($id);
		if(count($datos) != 0){
			
			$datos = $datos[0];

			$espacio = $this->bases->obtener_espacio($datos->solicitud_id);
			
			if(count($espacio) != 0)
			{
				$espacio = $espacio[0]->espacio;
				/* Campos para poder enviar un correo */
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => $this->config->item('smtp_host'),
					'smtp_port' => $this->config->item('smtp_port'),
					'smtp_user' => $this->config->item('smtp_user'),
					'smtp_pass' => $this->config->item('smtp_pass'),
					'mailtype' => 'html',
					'charset' => 'utf-8',
					'newline' => "\r\n"
				);
				
				$CI = & get_instance();
				$CI->load->helper('url');
				$CI->load->library('session');
				$CI->config->item('base_url');
			
				$CI->load->library('email');
			
				$CI->email->initialize($config);
			
				$subject = 'Facultad de Ciencias de la Computación: Solicitud para el apartado de '.$espacio.'.';
				$msg = 'Su solicitud ha sido aceptada.';
			
				/* Envia el código al correo electronico */
				$CI->email->from($this->config->item('smtp_user'));
				$CI->email->to($datos->correo);
				$CI->email->subject($subject);

				if($espacio == 'Auditorio Albert Einstein')
				{
					$msg = 'Su solicitud ha sido aceptada, a continuación se adjunta un archivo pdf para el uso del sistema de audio.';
					$CI->email->attach( base_url().'pdfs'.'/'.$this->config->item('manual_pdf'));
				}

				$CI->email->message($msg);
				$CI->email->send();
			}
		}
		
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
