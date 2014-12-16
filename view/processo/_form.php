<?php 
function disabled(){
	echo (is_null($model_processo) || empty($model_processo)) ? "" : 'disabled="disabled"';
}
$dao = new RequerimentoDAO();
$requerimentos = $dao->getAll();
?>
<form class="form-horizontal" method="POST" action="<?=Base::baseUrl()?>processo/create">
	<div class="form-group">
		<label class="col-md-4 control-label" for="textinput">Tipo Requerimento</label>  
		<div class="col-md-4">
			<select  class="form-control input-md" <?php disabled(); ?> name="Processo[requerimento]">
				<?php foreach ($requerimentos as $requerimento){?>
					<option value="<?php echo $requerimento->getCodigo() ?>"><?php echo $requerimento->getDescricao() ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label" for="motivo">Motivo</label>  
		<div class="col-md-4">
		<textarea <?php disabled(); ?> name="Processo[descricao]" placeholder="descreva o motivo da solicitação" rows="5" cols="50"></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-4 control-label" for="singlebutton"></label>
		<div class="col-md-4">
			<button id="singlebutton" name="singlebutton" class="btn btn-primary">Salvar</button>
		</div>
	</div>
</form>
