<?php 
	$requerimento = $vars["query"][0];
	//Base::dd($requerimento);
?>


<div class="col-lg-12">
	<ul class="list-group">
		<?php
		if(is_null($requerimento)){
		?>
		<li class="list-group-item">
			<div><strong>A pesquisa não obteve resultado.</strong></div>
		</li>
		<?php
		}else{
		?>
		<li class="list-group-item">
			<label>Código</label>
			<div><?=$requerimento->getCodigo(); ?></div>
		</li>
		<li class="list-group-item">
			<label>Descrição</label>	
			<div><?=$requerimento->getDescricao(); ?></div>
		</li>
		
		<li class="list-group-item">
			<label>Tipo</label>	
			<div><?=$requerimento->getTipo()[0]->getDescricao(); ?></div>
		</li>

		<li class="list-group-item">
			<button type="button" class="btn btn-default" onclick="window.history.back();">
				<span class="glyphicon glyphicon-chevron-left"> </span> Voltar
			</button>
		</li>
		<?php } ?>
	</ul>
</div>