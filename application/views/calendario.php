		<!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

				<div class="container mb-3 p-4" style="background-color: white;">
					<div class="row mb-2">
						<div class="col-lg-5">
							<button  onclick="mostrar_aviso()" class="btn btn-info btn-block" data-toggle="collapse" href="#reservasion-div">Reservar espacio</button>
						</div>
					</div>
					<form id="reservasion-div" action="<?php echo base_url(); ?>Welcome/realizar_apartado" method="GET" class="collapse">
						
						<div class="row mb-2 pt-4">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="nombre" class="mr-sm-2">Nombre(s):</label>
									<input type="text" class="form-control mb-2 mr-sm-2" placeholder="Nombre(s)" name="nombre" required>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="apellido" class="mr-sm-2">Apellidos:</label>
									<input type="text" class="form-control mb-2 mr-sm-2" placeholder="Apellidos" name="apellido" required>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<label for="email">Correo:</label>
									<input type="email" class="form-control" placeholder="Correo" name="correo" required>
								</div>
							</div>
							<div class="col-12 col-lg-6">
								<div class="form-group">
									<label for="sel1">Seleccione el espacio:</label>
									<select class="form-control" name="espacio" required>
										<option selected disabled></option>
										<option value="Auditorio Albert Einstein">Auditorio Albert Einstein</option>
										<option value="Mural">Mural</option>
									</select>
								</div> 
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="evento" class="mr-sm-2">Nombre del evento:</label>
									<input type="text" class="form-control mb-2 mr-sm-2" placeholder="Nombre del evento" name="evento" required>
								</div>
							</div>
						</div>

						<div class="row mb-4">
							<div class="col-12 text-center">
								<h4>Horario</h4>
							</div>
						</div>
						
						<div class="container-fluid p-0" id="horarios">
							<div class="row">
								<div class="col-6 col-lg-3">
									<div class="form-group">
										<label for="dia_1" class="mr-sm-2">Dia</label>
										<input type="date" class="form-control mb-2 mr-sm-2" id="dia_1" name="dia_1" required>
									</div>
								</div>
								<div class="col-6 col-lg-3">
									<div class="form-group">
										<label for="dia_1" class="mr-sm-2">Hora de inicio</label>
										<input type="time" class="form-control mb-2 mr-sm-2" name="hora-i-1" required>
									</div>
								</div>
								<div class="col-6 col-lg-3">
									<div class="form-group">
										<label for="dia_1" class="mr-sm-2">Hora de finalización</label>
										<input type="time" class="form-control mb-2 mr-sm-2" name="hora-f-1" required>
									</div>
								</div>
							</div>
						</div>

						<div class="row mb-4">
							<div class="col-6 col-lg-2">
								<button type="button" class="btn btn-outline-success btn-block" onclick="agregar_horario()">
									<i class="mdi mdi-calendar-multiple"></i>
									<span>Agregar</span>
								</button>
							</div>
							<div class="col-6 col-lg-2">
								<button type="button" class="btn btn-outline-danger btn-block" onclick="eliminar_horario()">
									<i class="mdi mdi-calendar-remove"></i>
									<span>Eliminar</span>
								</button>
							</div>
						</div>



						<div class="row">
							<div class="col-12 col-lg-5 ml-auto">
								<button type="submit" class="btn btn-success btn-block">
									<i class="mdi mdi-calendar-check"></i>
									<span>Reservar</span>
								</button>
							</div>
						</div>

					</form> 
				</div>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

				<div id="accordion" class="accordion-wrapper">
					<div class="container-fluid" style="background-color: white;">
						<div class="row">	
							<div class="col-12 col-lg-6 mb-1">
								<button type="button" class="btn btn-outline-info btn-block" data-toggle="collapse" href="#mural">Calendario Mural</button>
							</div>
							<div class="col-12 col-lg-6">
								<button id="btn-albert" type="button" class="btn btn-outline-dark btn-block" data-toggle="collapse" href="#auditorio">Calendario Auditorio Albert Einstein</button>
							</div>
						</div>
						<div class="row collapse show mt-2" id="mural" data-parent="#accordion">
							<div class="col-12 text-center mt-4">
								<p>Horarios Mural</p>
							</div>
							<div class="col-md-12">
								<div class="card">
										<div class="row">
											<div class="col-lg-12">
												<div class="card-body b-l calender-sidebar">
													<div id="calendar-mural"></div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
						<div class="row collapse mt-2" id="auditorio" data-parent="#accordion">
							<div class="col-12 text-center mt-4">
								<p>Horarios Auditorio Albert Einstein</p>
							</div>
							<div class="col-md-12">
								<div class="card">
										<div class="row">
											<div class="col-lg-12">
												<div class="card-body b-l calender-sidebar">
													<div id="calendario-albert"></div>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>

                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
        </div>


		<div class="modal fade" id="aviso-modal">
			<div class="modal-dialog modal-md">
			<div class="modal-content">
			
				<!-- Modal Header -->
				<div class="modal-header" style="background-color:yellow;">
					<h4 class="modal-title">¡Importante!</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body" style="background-color: white;">
					<p>Verifica que fecha y horario esten disponibles antes de realizar el apartado.<p>
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer" style="background-color: white;">
				<button type="button" class="btn btn-outline-warning" data-dismiss="modal">Aceptar</button>
				</div>
				
			</div>
			</div>
		</div>


