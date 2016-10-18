/*$(document).ready(function(){
	$('#btnLogin').on('click',function(){
		var rut = $('#txtRut').val();
		var clave = $('#txtClave').val();
		var url = '/index.php/Login_controller/login';
		console.log(rut + clave);
		$.ajax({
			type: 'POST',
			url: url,
			data: {rut: rut, clave: clave},
			success:function(data1){
				if (data1 > 0) {
					console.log('pasa');
				}else{
					console.log('no pasa');
					console.log(data1);
				}
						
			},
			error:function(){
				console.log('error login ajax');
			}
		});
	});
});*/