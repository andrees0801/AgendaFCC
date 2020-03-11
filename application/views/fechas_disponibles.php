<div class="page-wrapper">
	<div class="container-fluid p-4">

		<div class="row mb-4 p-3" style="background-color: white;">
			
			
			<div class="col-lg-6">
				<div class="form-group">
					<label>Seleccione el espacio:</label>
					<select class="form-control" id="espacio">
						<option value="">Auditorio Albert Einstein</option>
						<option value="">Mural</option>
					</select>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="form-group">
					<label for="dia" class="mr-sm-2">Ingrese el dia:</label>
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
			<div class="col-lg-4">
				<div class="form-group">
					<button type="button" class="btn btn-outline-info">
						<i class="mdi mdi-calendar-question"></i>
						<span>Verificar disponibilidad</span>
					</button>
				</div>
			</div>
		</div>

		<div class="row p-3" style="background-color: white;" id="resultados-busqueda">
			
			<div class="col-12 text-center">
				<p class="bg-success text-white">Horarios disponibles</p>
			</div>
			
			<div class="col-12 text-center">
				<p class="bg-danger text-white">No hay horarios disponibles</p>
			</div>

		</div>

	</div>
</div>
