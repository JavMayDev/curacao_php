
    <form action="" method="POST"
	<div class="row">
	    <div class="col-md-4">
		<label for="">Filtrar por</label>
		<select onchange="setInput()" name="filter_field" class="form-control" id="" name="">
		    <option selected="selected" value="ver_todo">Ver todo</option>
		    <option value="order_num">Codigo de servicio</option>
		    <option value="active">Activo</option>
		</select>
		
	    </div>
	    <div class="col-md-4">
		<div class="form-group">
		    <label for="">Valor</label>
		    <input onchange="setCheck()" name="filter_value" placeholder="Introduzca un filtro" class="form-control" type="">
		</div>
	    </div>
	    <div class="col-md-4">
		<div class="form-group">
		    <label for="">Aplicar filro</label>
		    <input name="filter_submit" type="submit" class="form-control btn btn-primary" value="Buscar servicios">
		</div>
	    </div>
	</div>
    </form>

<script>
var filterFieldInput = document.getElementsByName('filter_field')[0];
var filterValueInput = document.getElementsByName('filter_value')[0];

function setInput(){
    if(filterFieldInput.value === 'active')
	filterValueInput.type = 'checkbox';
    else filterValueInput.type = 'text'; 
}
function setCheck(){
    if(filterValueInput.type === 'checkbox') {

	filterValueInput.value = filterValueInput.checked ? 1 : 0;
	console.log( 'filterValueInput: ', filterValueInput.value )
    }
}
</script>

