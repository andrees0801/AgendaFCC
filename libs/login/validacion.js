const loginForm = document.querySelector('#loginform');

loginForm.addEventListener('submit', (e)=>{
	e.preventDefault();

	$("#cargando-validacion").css("display", "block");

	setTimeout(function(){ 

		var user_val = $('#user').val();
		var password_val = $('#password').val();
		
		$.ajax({

			method: 'POST',
			url: "verificar",
			data: { user: user_val, password: password_val }

		}).done(function(status) {
			if(status != 0){
				//redireccionamos
				location.href = "iniciar_sesion?status="+status;
			}else{
				$('#informacion-login').css("display", "block");
			}
			$("#cargando-validacion").css("display", "none");
		});

	}, 3000)
	
})
