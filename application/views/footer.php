	</div>
	<!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>libs/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>libs/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>libs/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>libs/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url(); ?>libs/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url(); ?>libs/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>libs/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url(); ?>libs/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>libs/custom.min.js"></script>
    <!-- Calendar JavaScript -->
    <script src="<?php echo base_url(); ?>libs/calendar/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>libs/moment/moment.js"></script>
    <script src='<?php echo base_url(); ?>libs/calendar/dist/fullcalendar.min.js'></script>
    <script src="<?php echo base_url(); ?>libs/calendarios-inmuebles/mural.js"></script>
	<script src="<?php echo base_url(); ?>libs/calendarios-inmuebles/auditorio-albert.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url(); ?>libs/styleswitcher/jQuery.style.switcher.js"></script>

	<script>
	
		var mostrar_aviso_ = true;
		var horario = 1;
		
		function mostrar_aviso()
		{
			if(mostrar_aviso_)
			{
				mostrar_aviso_ = !mostrar_aviso_;
				$('#aviso-modal').modal();
			}
		}

		function agregar_horario()
		{
			horario++;

			var date = '<div class="row" id="h_'+horario+'"><div class="col-6 col-lg-3"><div class="form-group"><label class="mr-sm-2">Dia</label><input type="date" class="form-control mb-2 mr-sm-2" name="dia_'+horario+'" required></div></div>';
			var hi = '<div class="col-6 col-lg-3"><div class="form-group"><label class="mr-sm-2">Hora de inicio</label><input type="time" class="form-control mb-2 mr-sm-2" name="hora-i-'+horario+'" required></div></div>';
			var hf = '<div class="col-6 col-lg-3"><div class="form-group"><label class="mr-sm-2">Hora de inicio</label><input type="time" class="form-control mb-2 mr-sm-2" name="hora-f-'+horario+'" required></div></div></div>';

			$('#horarios').append(date+hi+hf);
		}

		function eliminar_horario()
		{
			if(horario != 1)
			{
				$('#h_'+horario).remove();
				horario--;
			}
		}

		$('#no-disponible-txt').hide();
		$('#disponible-text').hide();
		$('#tabla-horarios').hide();

		function obtener_disponibilidad()
		{
			var espacio = $('#espacio').val()
			var dia = $('#dia').val();
			var inicio = $('#hi').val();
			var fin = $('#hf').val();

			if(espacio == null || dia == "" || inicio == "" || fin == "" )
			{
				alert('Llena todos los campos');
			}else{
				$.ajax({
					method: 'GET',
					url: "obtener_disponibilidad",
					data: { espacio: espacio, dia: dia, inicio : inicio, fin: fin }

				}).done(function(disponible) {
					if(disponible != "false")
					{
						$('#no-disponible-txt').show();
						$('#tabla-horarios').show();
						$('#disponible-text').hide();

						$('#tbody-table').empty();
						var elementos_table = JSON.parse(disponible);

						for(i=0; i < elementos_table.length; i++){
							var tr = '<tr class="table-danger">'
							
							tr += '<td>'+elementos_table[i].fecha+'</td>'
							tr += '<td>'+elementos_table[i].hora_inicial+'</td>'
							tr += '<td>'+elementos_table[i].hora_fin+'</td>'
							tr += '<td>'+elementos_table[i].espacio+'</td>'
							tr += '</tr>';

							$('#tbody-table').append(tr);	
						}

					}else{
						$('#no-disponible-txt').hide();
						$('#tabla-horarios').hide();
						$('#disponible-text').show();
					}
				});
			}
		}

	</script>
</body>

</html>
