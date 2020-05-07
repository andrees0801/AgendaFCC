<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class bases extends CI_Model {
		
		function __construct(){
			parent::__construct();
		}


		public function agregar_solicitud($solicitud_id, $nombre, $apellido, $correo, $evento)
		{
			$sql = "INSERT INTO `solicitudes`(`solicitud_id`, `nombre`, `apellidos`, `correo`, `nombre_evento`) VALUES ('$solicitud_id', '$nombre', '$apellido', '$correo', '$evento')";
			$query = $this->db->query($sql);
		}
		
		public function agregar_horario($solicitud_id, $dia, $inicio, $fin, $espacio)
		{
			$sql = "INSERT INTO `horarios`(`solicitud_id`, `fecha`, `hora_inicial`, `hora_fin`, `espacio`) VALUES ('$solicitud_id', '$dia', '$inicio', '$fin', '$espacio')";
			$query = $this->db->query($sql);
		}

		public function verificar_horario($dia, $inicio, $fin, $espacio)
		{
			$sql = "SELECT h.id_horario FROM horarios as h inner join solicitudes as s on h.solicitud_id = s.solicitud_id WHERE h.fecha LIKE '$dia' AND s.aprobado LIKE 'TRUE' AND s.verificado LIKE 'TRUE' AND h.espacio LIKE '$espacio'  AND ( ('$inicio' BETWEEN  h.hora_inicial AND h.hora_fin ) OR ( '$fin' BETWEEN  h.hora_inicial AND h.hora_fin ) OR ( TIMEDIFF(h.hora_fin, h.hora_inicial) < TIMEDIFF('$fin', '$inicio') )  )";
			$query = $this->db->query($sql);
			if($query->num_rows() > 0)
			{
				return TRUE; //No esta disponible el inmueble en ese horario y fecha
			}else{
				return FALSE; //Esta disponible el inmueble en ese horario y fecha
			}
		}

		public function obtener_horarios_no_disponibles($dia, $inicio, $fin, $espacio){
			$sql = "SELECT h.fecha, h.hora_inicial, h.hora_fin, h.espacio FROM horarios as h inner join solicitudes as s on h.solicitud_id = s.solicitud_id WHERE h.fecha LIKE '$dia' AND s.aprobado LIKE 'TRUE' AND s.verificado LIKE 'TRUE' AND h.espacio LIKE '$espacio'  AND ( ('$inicio' BETWEEN  h.hora_inicial AND h.hora_fin ) OR ( '$fin' BETWEEN  h.hora_inicial AND h.hora_fin ) OR ( TIMEDIFF(h.hora_fin, h.hora_inicial) < TIMEDIFF('$fin', '$inicio') )  )";
			$query = $this->db->query($sql);
			if($query->num_rows() > 0)
			{
				return $query->result(); //No esta disponible el inmueble en ese horario y fecha
			}else{
				return FALSE; //Esta disponible el inmueble en ese horario y fecha
			}
		}

		public function obtener_horarios_espacio($espacio)
		{
			$sql = "SELECT h.fecha, h.hora_inicial, h.hora_fin FROM horarios as h inner join solicitudes as s on h.solicitud_id = s.solicitud_id WHERE s.aprobado LIKE 'TRUE' AND s.verificado LIKE 'TRUE' AND h.espacio LIKE '$espacio' ";
			$query = $this->db->query($sql);
			if($query->num_rows() > 0)
			{
				return $query->result();
			}else{
				return FALSE;
			}
		}

		public function obtener_solicitudes()
		{
			$sql = "SELECT `id_solicitud`, `nombre`, `apellidos`, `correo`, `nombre_evento`, `verificado`, `aprobado` FROM `solicitudes` WHERE 1";
			$query = $this->db->query($sql);
			return $query->result();
		}

		public function verificar_solicitud($id)
		{
			$sql = "UPDATE solicitudes SET verificado = 'TRUE' WHERE id_solicitud LIKE '$id'";
			$query = $this->db->query($sql);
		}

		public function aprobar_solicitud($id)
		{
			$sql = "UPDATE solicitudes SET aprobado = 'TRUE' WHERE id_solicitud LIKE '$id'";
			$query = $this->db->query($sql);
		}

		public function obtener_solicitud_id_correo($id)
		{
			$sql = "SELECT solicitud_id, correo FROM solicitudes WHERE id_solicitud LIKE '$id'";
			$query = $this->db->query($sql);
			return $query->result();
		}

		public function eliminar_solicitud($solicitud_id)
		{
			$sql = "DELETE FROM solicitudes WHERE solicitud_id LIKE '$solicitud_id'";
			$query = $this->db->query($sql);
		}

		public function eliminar_horarios($solicitud_id)
		{
			$sql = "DELETE FROM horarios WHERE solicitud_id LIKE '$solicitud_id'";
			$query = $this->db->query($sql);
		}

		public function obtener_horarios_solicitud($id)
		{
			$sql = "SELECT h.fecha, h.hora_inicial, h.hora_fin, h.espacio FROM horarios as h inner join solicitudes as s on s.solicitud_id = h.solicitud_id WHERE s.id_solicitud LIKE '$id'";
			$query = $this->db->query($sql);
			return $query->result();
		}

		public function validar_usuario($usuario, $password)
		{
			$sql = "SELECT `status` FROM `admins` WHERE `usuario` LIKE '$usuario' AND `password` LIKE '$password'";
			$query = $this->db->query($sql);
			
			return $query->result();
		}

		public function obtener_espacio($solicitud_id)
		{
			$sql = "SELECT `espacio` FROM `horarios` WHERE `solicitud_id` LIKE '$solicitud_id' LIMIT 1";
			$query = $this->db->query($sql);
			return $query->result();
		}

	}
?>
