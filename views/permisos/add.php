        <div class="col-sm-9 col-sm-offset-2 col-md-10 col-md-offset-1 main">
          <h1 class="page-header">Agregar Permiso</h1>

          
			
			
			
	<form name="savePermiso" class="css-form" novalidate>
	
	<div class="form-group">
		<label for="observaciones">Key</label>
		  <input type="text" ng-model="formData.permiso_key" name="permiso_key" class="form-control" placeholder="permiso_key"  required=""/>	
		<div ng-show="savePermiso.$submitted || savePermiso.permiso_key.$touched">
		  <div ng-show="savePermiso.permiso_key.$error.required">Este es un campo requerido.</div>
		</div>
	</div>
	
	<div class="form-group">
	  <label for="id_grupo">Grupo:</label>
	  <select class="form-control" id="id_grupo" name="id_grupo" ng-model="formData.id_grupo" ng-options="p.id_grupo as p.grupo for p in catGrupos track by p.id_grupo" required="" >
		  <option value="" >Selecciona una opci&oacute;n</option>
	  </select>	  
	  	<div ng-show="savePermiso.$submitted || savePermiso.id_grupo.$touched">
		  <div ng-show="savePermiso.id_grupo.$error.required">Este es un campo requerido.</div>
		</div>	  
	</div>
	
	<div class="form-group">
	  <label for="id_pagina">Pagina:</label>
	  <select class="form-control" id="id_pagina" name="id_pagina" 
	  ng-model="formData.id_pagina" 
	  ng-options="p.id_pagina as p.pagina for p in catPags | filter:{ id_grupo: formData.id_grupo }: true track by p.id_pagina" 
	  ng-disabled="!formData.id_grupo" 
	  required="" >
		  <option value="" >Selecciona una opci&oacute;n</option>
	  </select>	  
	  	<div ng-show="savePermiso.$submitted || savePermiso.id_pagina.$touched">
		  <div ng-show="savePermiso.id_pagina.$error.required">Este es un campo requerido.</div>
		</div>	  
	</div>
	
	<div class="form-group">
		<label for="item">Item</label>
		  <input type="text" ng-model="formData.item" name="item" class="form-control" placeholder="Item" required="" />
		<div ng-show="savePermiso.$submitted || savePermiso.item.$touched">
		  <div ng-show="savePermiso.item.$error.required">Este es un campo requerido.</div>
		</div>
	</div>
		
	
	<button type="button" class="btn btn-default" onclick="location.href='permisos.php'"  >Regresar</button>
	<button type="submit" class="btn btn-default" ng-click='submitForm(savePermiso.$valid); ' id='btnSubmit' >Guardar</button>
	
  </form>
