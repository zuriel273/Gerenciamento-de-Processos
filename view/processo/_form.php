<form class="form-horizontal">
	<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">Código</label>  
		<div class="col-md-4">
			<input id="textinput" disabled="disabled" name="textinput" type="text" placeholder="placeholder" class="form-control input-md" value="<?=$model_processo->getCodigo()?>">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label" for="singlebutton"></label>
		<div class="col-md-4">
			<button id="singlebutton" name="singlebutton" class="btn btn-primary">Salvar</button>
		</div>
	</div>
</form>
