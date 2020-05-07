
	<!-- Page wrapper  -->
	<!-- ============================================================== -->
	<div class="page-wrapper" style="background-color: white;">
            
		<!-- ============================================================== -->
		<!-- Container fluid  -->
		<!-- ============================================================== -->
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 scroll-add">
					<table class="table table-bordered ">
						<thead>
							<tr class="table-dark">
								<th class="text-center">Solicitante</th>
								<th class="text-center">Nombre del evento</th>
								<th class="text-center">Correo</th>
								<th class="text-center"></th>
								<th class="text-center"></th>
								<th class="text-center">Eliminar</th>
							</tr>
						</thead>
						<tbody>
						
							<?php for($i_solicitudes=0; $i_solicitudes < count($solicitudes); $i_solicitudes++){ 

								$class = "";

								if($solicitudes[$i_solicitudes]->aprobado == "TRUE" && $solicitudes[$i_solicitudes]->verificado == "TRUE")
								{
									$class = "table-success";
								}

							?>
								
								<tr id="tr-<?php echo $solicitudes[$i_solicitudes]->id_solicitud ?>" class="<?php echo $class; ?>">

									<td><?php

										if(strlen($solicitudes[$i_solicitudes]->nombre." ".$solicitudes[$i_solicitudes]->apellidos) > 30)
										{
											echo substr($solicitudes[$i_solicitudes]->nombre." ".$solicitudes[$i_solicitudes]->apellidos, 0, 27)."...";
										}else{
											echo $solicitudes[$i_solicitudes]->nombre." ".$solicitudes[$i_solicitudes]->apellidos;
										}

									?></td>

									<td>
										<i class="mdi mdi-calendar-question hand" onclick="obtener_fecha(<?php echo $solicitudes[$i_solicitudes]->id_solicitud ?>)"></i>
										<?php 
										
										if(strlen($solicitudes[$i_solicitudes]->nombre_evento) > 15)
										{
											echo substr($solicitudes[$i_solicitudes]->nombre_evento, 0, 15)."...";
										}else{
											echo $solicitudes[$i_solicitudes]->nombre_evento;
										}

										?>
									</td>

									<td><?php
									 	if(strlen($solicitudes[$i_solicitudes]->correo) > 30)
										{
											echo substr($solicitudes[$i_solicitudes]->correo, 0, 27)."...";
										}else{
											echo $solicitudes[$i_solicitudes]->correo;
										}
									?></td>

									<td>
										<input type="checkbox" class="check" id="v-<?php echo $solicitudes[$i_solicitudes]->id_solicitud ?>" onclick="verificar(<?php echo $solicitudes[$i_solicitudes]->id_solicitud ?>)"
											<?php
												
												if($solicitudes[$i_solicitudes]->verificado == "TRUE"){
														echo "disabled checked"; 
												}
											?>
										>
										<label for="v-<?php echo $solicitudes[$i_solicitudes]->id_solicitud ?>">Verificar</label>
									</td>

									<td>
										<input type="checkbox" class="check" id="a-<?php echo $solicitudes[$i_solicitudes]->id_solicitud ?>" onclick="aprobar(<?php echo $solicitudes[$i_solicitudes]->id_solicitud ?>)"
											<?php if($solicitudes[$i_solicitudes]->aprobado == "TRUE"){ echo "checked disabled"; } ?>

											<?php if($solicitudes[$i_solicitudes]->verificado == "FALSE"){ echo "disabled"; } ?>
										>
										<label for="a-<?php echo $solicitudes[$i_solicitudes]->id_solicitud ?>">Aprobar</label>
									</td>

									<td class="text-center">
										<div class="hand" onclick="eliminar(<?php echo $solicitudes[$i_solicitudes]->id_solicitud ?>)" >
											<i class="mdi mdi-delete-empty"></i>
										</div>
									</td>
								</tr>

							<?php } ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="horarios-show">
		<div class="modal-dialog">
		<div class="modal-content">
		
			<!-- Modal Header -->
			<div class="modal-header">
			<h4 class="modal-title">Horarios</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			
			<!-- Modal body -->
			<div class="modal-body">
			<table class="table table-hover">
				<thead>
				<tr>
					<th>Día</th>
					<th>Inicia</th>
					<th>Termina</th>
					<th>Lugar</th>
				</tr>
				</thead>
				<tbody id="horarios-tabla">
					
				</tbody>
			</table>
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			</div>
			
		</div>
		</div>
	</div>
