
<div class="container">
<br>
<div class="row">
	<h4>Retención profesionales Policlínico de Especialidades</h4>
</div>
<br>
<form id="form1" method="post">
	<div class="row">
		<div class="col-xs-3">
			<input type="text" id="buscaMed" name="buscaMed" placeholder="Nombre Médico" class="form-control"></input>
		</div>
		<br>
		<input type="text" id="jqxInput" name="jqxInput"></input>
	</div>
	<br>
	<div class="row">
		<div class="col-xs-2">
			Porcentaje % :
			<input type="text" class="form-control" id="txtporcen" name="txtporcen" onkeypress="return isNumber(event)"></input>
		</div>
	</div>
	<br>
	<div class="row">
	<div class="form-group">

			<button type="button" class="btn btn-primary" id="btnOk">Modificar</button>
			&ensp;
			<button type="button" class="btn btn-primary" id="btnNuevo">Nuevo</button>
			&ensp;
			<button type="button" class="btn btn-danger" id="btnElimina">Eliminar</button>
		
	</div>	
	</div>
</form>
</div>
</body>
</html>