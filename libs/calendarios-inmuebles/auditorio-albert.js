$( document ).ready(function() {
	$.ajax({
		method: 'GET',
		url: "obtener_fechas_solicitadas",
		data: { inmueble: 'Auditorio Albert Einstein' }
	
	}).done(function(eventos) {
		eventos = JSON.parse(eventos);
	
		var calendarE2 = document.getElementById('calendario-albert');
	
		var calendar2 = new FullCalendar.Calendar(calendarE2, {
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
		
		calendar2.setOption('locale', 'es');
		calendar2.render();
		
	});
});
