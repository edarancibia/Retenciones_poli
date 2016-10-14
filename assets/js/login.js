$(document).ready(function(){
	$('#btnLogin').on('click',function(){
		var rut = $('#txtRut').val();
		var clave = $('#txtClave').val();
		var url = '/index.php/Login_controller/login';

		$.ajax({
			type: 'POST',
			url: url,
			data: {rut: rut, clave: clave},
			success:function(d){
				console.log(d);
			},
			error:function(){
				console.log('error login ajax');
			}
		});
	});
});