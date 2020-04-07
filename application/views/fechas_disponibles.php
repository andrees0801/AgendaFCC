<div class="page-wrapper">
	<div class="container-fluid p-4">

		<div class="row mb-4 p-3" style="background-color: white;">
			
			
			<div class="col-lg-6">
				<div class="form-group">
					<label>Seleccione el espacio:</label>
					<select class="form-control" id="espacio">
						<option value="" selected disabled>---</option>
						<option value="Auditorio Albert Einstein">Auditorio Albert Einstein</option>
						<option value="Mural">Mural</option>
					</select>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label for="dia" class="mr-sm-2">Ingrese el día:</label>
					<input type="date" class="form-control mb-2 mr-sm-2" name="dia" id="dia">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label for="dia" class="mr-sm-2">Ingrese la hora inicial:</label>
					<input type="time" class="form-control mb-2 mr-sm-2" name="hi" id="hi">
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label for="dia" class="mr-sm-2">Ingrese la hora final:</label>
					<input type="time" class="form-control mb-2 mr-sm-2" name="hf" id="hf">
				</div>
			</div>
			<div class="col-12 col-lg-4">
				<div class="form-group">
					<button type="button" class="btn btn-outline-info btn-block" onclick="obtener_disponibilidad()">
						<i class="mdi mdi-calendar-question"></i>
						<span>Verificar disponibilidad</span>
					</button>
				</div>
			</div>
		</div>

		<div class="row p-3" style="background-color: white;" id="resultados-busqueda">
			
			<div class="col-12 text-center" id="disponible-text">
				<p class="bg-success text-white">Horario disponible</p>
			</div>
			
			<div class="col-12 text-center" id="no-disponible-txt">
				<p class="bg-danger text-white">Horario no disponible</p>
			</div>

			<div class="col-12 text-center" id="tabla-horarios">
				<p>Horarios ya reservados</p>
				<div class="container-fluid scroll-add p-0">
					<table class="table">
						<thead >
							<tr>
								<th>Fecha</th>
								<th>Inicia</th>
								<th>Termina</th>
								<th>Lugar</th>
							</tr>
						</thead>
						<tbody id="tbody-table" style="text-align: left;">
							
						</tbody>
					</table>
				</div>
			</div>

		</div>

	</div>
</div>
