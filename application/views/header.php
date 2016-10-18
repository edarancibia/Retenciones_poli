<!DOCTYPE html>
<html>
<head>
	<title>Retenciones de Profesionales Poli</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/toastr.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jqconfirm.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery-ui.css"); ?>">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
			
	<script type="text/javascript" src="<?php echo base_url("assets/js/principal.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/toastr.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-confirm/jquery.confirm.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/login.js"); ?>"></script>
	<script type="text/javascript">

		function isNumber(evt){
			var charCode = (evt.wich) ? evt.wich : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57)) 
				return false;
			else
				return true;
		}

		$(document).ready(function(){
			
			//  - -  autocompletar - - - 
			$('#buscaMed').autocomplete({
				source: "<?php echo base_url('index.php/Welcome/getMedicos'); ?>",
				minLength: 2
			});

			// - - nUEVO REGISTRO
			$('#btnNuevo').on("click",function(){
			
				var rut = $('#buscaMed').val();
				var porcentaje = $('#txtporcen').val();

				if (confirm("¿Está seguro de agregrar el nuevo médico?")) {

				    if (rut > 1) {
				    	$.ajax({
							type: 'POST',
							url: "<?php echo base_url('index.php/Welcome/validaMedico'); ?>",
							data: {rut: rut},
							success:function(data){
								if(data > 0){
									toastr.warning('No puede crear un nuevo registro para este médico');
								}else{
									nuevaRetencion();
									limpiar();
								}
									},
							error:function(){
								toastr.error('error');
							}
						});
				    	limpiar();
				    }else{
				    	toastr.warning('Ingrese médico');
				    }
				}

				

				function nuevaRetencion(){

					$.ajax({
						type: 'POST',
						url:  "<?php echo base_url('index.php/Welcome/insert'); ?>",
						data: {rut: rut, porcentaje: porcentaje},
						success:function(){
							toastr.success('Datos guardados exitosamente');
							$('#buscaMed').focus();
						},
						error:function(){
							console.log('error insert ajax');
						}
					});
				}

			});

			// - - -BOTON MODIFICAR - - - -
			$('#btnOk').on("click",function(){

				var rut = $('#buscaMed').val();
				var porcentaje = $('#txtporcen').val();

				if (confirm("¿Está seguro de modificar el registro?")) {
					if (rut > 1) {
							$.ajax({
							type: 'POST',
							url:  "<?php echo base_url('index.php/Welcome/update'); ?>",
							data: {rut: rut, porcentaje: porcentaje},
							success:function(){
								toastr.info('Modificado exitosamente');
								limpiar();
								$('#buscaMed').focus();
							},
							error:function(){
								toastr.error('Error al intentar modificar datos');
							}
						});	
					}else{
						toastr.warning('Ingrese médico');
					}
				}
			});

			 //- - -   BOTON ELIMINAR - - - 
			$('#btnElimina').on('click',function(){
				var rut = $('#buscaMed').val();

				if (confirm("¿Está seguro de eliminar el registro?")) {

				    if (rut > 1) {
				    	elimina();
				    	limpiar();
				    }else{
				    	toastr.warning('Ingrese médico');
				    }
				}

				function elimina(){

					$.ajax({
						type: 'POST',
						url: "<?php echo base_url('index.php/Welcome/elimina'); ?>",
						data: {rut: rut},
						success:function(){
							toastr.info('Datos eliminados exitosamente');
							$('#buscaMed').focus();
						}
					});
				}
			});

			function limpiar(){
				$('#buscaMed').val('');
				$('#txtporcen').val('');
			}

			//- - - - LOGIN - - - - 

			$('#btnLogin').on('click',function(){
				var rut = $('#txtRut').val();
				var clave = $('#txtClave').val();
				//var url = '/index.php/Login_controller/login';
				console.log(rut + clave);
				$.ajax({
					type: 'POST',
					url: "<?php echo base_url('index.php/Login_controller/login'); ?>",
					data: {rut: rut, clave: clave},
					//dataType: 'json',
					success:function(data1){
						if (data1 > 0) {
							console.log('pasa');
							redireccionar();

						}else{
							console.log('no pasa');
							toastr.error('Rut o contraseña incorrectos');
						}
						
					},
					error:function(){
						console.log('error login ajax');
					}
				});
			});

			var pagina="<?php echo base_url('index.php/Login_controller/logeado'); ?>";
			function redireccionar() 
			{
			location.href=pagina
			} 
			setTimeout ("redireccionar()", 20000);
		});
	</script>
</head>
<body>