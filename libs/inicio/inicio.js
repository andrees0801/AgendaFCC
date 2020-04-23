
		function verificar(id)
		{
			/* Guardamos a bd */
			$.ajax({
				method: 'GET',
				url: "verificar_solicitud",
				data: { id: id }
			
			}).done(function(eventos) {
				document.getElementById("v-"+id).disabled = true;
				document.getElementById("a-"+id).disabled = false;
			})
		}

		function aprobar(id)
		{	
			/* Guardamos a bd */
			$.ajax({
				method: 'GET',
				url: "aprobar_solicitud",
				data: { id: id }
			
			}).done(function(eventos) {
				document.getElementById("a-"+id).disabled = true;
				document.getElementById("tr-"+id).classList.add("table-success");
			})
		}

		function eliminar(id)
		{
			if (confirm('¿Estas seguro de eliminar la solicitud?')){
				$.ajax({
					method: 'GET',
					url: "eliminar_solicitud",
					data: { id: id }
				
				}).done(function(eventos) {
					location.reload();
				})
			} 
		}

		function obtener_fecha(id)
		{		
			$.ajax({
				method: 'GET',
				url: "obtener_horarios",
				data: { id: id }
			}).done(function(horarios_tabla) {

				document.getElementById("horarios-tabla").innerHTML = horarios_tabla;
				$('#horarios-show').modal();

			})
		}
