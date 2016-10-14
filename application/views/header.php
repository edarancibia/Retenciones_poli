<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/toastr.css"); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jqconfirm.css"); ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
			
	<script type="text/javascript" src="<?php echo base_url("assets/js/principal.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/toastr.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jqwidgets/jqw/jqxcore.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jqwidgets/jqw/jqxdata.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jqwidgets/jqw/jqxinput.js"); ?>"></script>
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

				
				//nuevaRetencion();

				function nuevaRetencion(){

					$.ajax({
						type: 'POST',
						url:  "<?php echo base_url('index.php/Welcome/insert'); ?>",
						data: {rut: rut, porcentaje: porcentaje},
						success:function(){
							toastr.success('Datos guardados exitosamente');
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
					$.ajax({
						type: 'POST',
						url:  "<?php echo base_url('index.php/Welcome/update'); ?>",
						data: {rut: rut, porcentaje: porcentaje},
						success:function(){
							toastr.info('Modificado exitosamente');
							limpiar();
						},
						error:function(){
							toastr.error('Error al intentar modificar datos');
						}
					});
				    
				}
			});

			//JQW
			var url = "<?php echo base_url('index.php/Welcome/getMedicos'); ?>";
			var source = {
				datatype: 'json',
				datafields: [
				 {name: 'RUT_NUM'},
				 {name: 'NOMBRE'}
				],
				url: url
			};

			 var dataAdapter = new $.jqx.dataAdapter(source);

			$("#jqxInput").jqxInput({ source: dataAdapter, placeHolder: "Busqueda de Médicos:", displayMember: "NOMBRE", valueMember: "RUT_NUM", width: 400, height: 25});

			 $("#jqxInput").on('select', function (event) {
                    if (event.args) {
                        var item = event.args.item;
                        if (item) {
                            var valueelement = $("<div></div>");
                            valueelement.text("Value: " + item.value);
                            var labelelement = $("<div></div>");
                            labelelement.text("Label: " + item.label);
                            $("#selectionlog").children().remove();
                            $("#selectionlog").append(labelelement);
                            $("#selectionlog").append(valueelement);
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
						}
					});
				}
			});

			function limpiar(){
				$('#buscaMed').val('');
				$('#txtporcen').val('');
			}
		});
	</script>
</head>
<body>