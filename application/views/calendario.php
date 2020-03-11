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
							<button onclick="mostrar_aviso()" class="btn btn-info btn-block" data-toggle="collapse" href="#reservasion-div">Reservar espacio</button>
						</div>
					</div>
					<form id="reservasion-div" class="collapse">
						
						<div class="row mb-2">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="nombre" class="mr-sm-2">Nombre(s):</label>
									<input type="text" class="form-control mb-2 mr-sm-2" placeholder="Nombre(s)" name="nombre">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label for="apellido" class="mr-sm-2">Apellidos:</label>
									<input type="text" class="form-control mb-2 mr-sm-2" placeholder="Apellidos" name="apellido">
								</div>
							</div>
							<div class="col-6">
								<label for="email">Correo:</label>
    							<input type="email" class="form-control" placeholder="Correo" id="correo">
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for="sel1">Seleccione el espacio:</label>
									<select class="form-control" id="sel1">
										<option>Auditorio Albert Einstein</option>
										<option>Mural</option>
									</select>
								</div> 
							</div>
						</div>

						<div class="row mb-4">
							<div class="col-12 text-center">
								<h4>Horario</h4>
							</div>
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
						
						<div class="container-fluid" id="horarios">
							<div class="row">
								<div class="col-3">
									<div class="form-group">
										<label for="dia_1" class="mr-sm-2">Dia</label>
										<input type="date" class="form-control mb-2 mr-sm-2" name="dia_1">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="dia_1" class="mr-sm-2">Hora de inicio</label>
										<input type="time" class="form-control mb-2 mr-sm-2" name="hora-i-1">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="dia_1" class="mr-sm-2">Hora de finalización</label>
										<input type="time" class="form-control mb-2 mr-sm-2" name="hora-f-1">
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-5">
								<button type="submit" class="btn btn-success btn-block">Reservar</button>
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
								<button type="button" class="btn btn-outline-dark btn-block" data-toggle="collapse" href="#auditorio">Calendario Auditorio Albert Einstein</button>
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
													<div id="calendar"></div>
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
													<p>Otro calendario</p>
												</div>
											</div>
										</div>
								</div>
							</div>
						</div>
					</div>
				</div>

                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="card">
								<div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-body b-l calender-sidebar">
                                            <div id="calendar"></div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div> -->

                <!-- BEGIN MODAL -->
                <!-- <div class="modal none-border" id="my-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add Event</strong></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-new-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add</strong> a category</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Success</option>
                                                <option value="danger">Danger</option>
                                                <option value="info">Info</option>
                                                <option value="primary">Primary</option>
                                                <option value="warning">Warning</option>
                                                <option value="inverse">Inverse</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            
        </div>


		<div class="modal fade" id="aviso-modal">
			<div class="modal-dialog modal-md">
			<div class="modal-content">
			
				<!-- Modal Header -->
				<div class="modal-header">
				<h4 class="modal-title">¡Importante!</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body">
					<p>Verifica que fecha y horario esten disponibles antes de realizar el apartado.<p>
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
				<button type="button" class="btn btn-outline-primary" data-dismiss="modal">Aceptar</button>
				</div>
				
			</div>
			</div>
		</div>


