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


	</script>
</body>

</html>
