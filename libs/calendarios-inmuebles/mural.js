	$( document ).ready(function() {
		
		$.ajax({
			method: 'GET',
			url: "obtener_fechas_solicitadas",
			data: { inmueble: 'Mural' }

		}).done(function(eventos) {
			eventos = JSON.parse(eventos);

			var calendarEl = document.getElementById('calendario-mural');
		
			var calendar = new FullCalendar.Calendar(calendarEl, {
				locale: 'es',
				timeZone: 'local',
				plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
				height: 'parent',
				header: {
					left: 'prev,next today',
					center: 'title',
					right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
				},
				defaultView: 'dayGridMonth',
				navLinks: true, // can click day/week names to navigate views
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				events: eventos
			});
			
			calendar.setOption('locale', 'es');
			calendar.render();
		});
	});
