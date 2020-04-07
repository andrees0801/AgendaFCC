<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agenda FCC</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="<?php echo base_url(); ?>libs/calendar/dist/fullcalendar.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>libs/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url(); ?>libs/colors/default-dark.css" id="theme" rel="stylesheet">
	<!-- Nuestros estilos -->

	<link href="<?php echo base_url(); ?>libs/estilos-fcc.css" rel="stylesheet">
    <!-- page css -->
    <link href="<?php echo base_url(); ?>libs/login-register-lock.css" rel="stylesheet">
    
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Agenda FCC</p>
        </div>
	</div>
	
	<div class="cargando-validacion" id="cargando-validacion">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Verificando...</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(<?php echo base_url() ?>images/fuente-fcc.jpg);">
        <div class="login-box card">
            <div class="card-body">
                <form class="form-horizontal form-material pl-3 pr-3 pt-5" id="loginform" action="#">
                    <a class="text-center db"><img src="<?php echo base_url();?>images/logo_FCC.png" style="width: 250px;" /></a>
                    <div class="form-group m-t-40">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" id="user" name="user" required="" placeholder="Usuario">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" id="password" name="password" required="" placeholder="Contraseña">
                        </div>
					</div>
					<a class="text-center" id="informacion-login">
						<p class="bg-danger text-white pl-5">Usuario o contraseña incorrecta</p>
					</a>
                    <!-- <div class="form-group row">
                        <div class="col-md-12">    
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i>¿Olvidate la contraseña?</a>
						</div>
                    </div> -->
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Iniciar sesión</button>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="recoverform" >
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <h3>Recover Password</h3>
                            <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="text" required="" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
                            <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
	<script src="<?php echo base_url(); ?>libs/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>libs/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>libs/bootstrap/js/bootstrap.min.js"></script>
	<!--Custom JavaScript -->
	<script src="<?php echo base_url(); ?>libs/login/validacion.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
</body>

</html>
