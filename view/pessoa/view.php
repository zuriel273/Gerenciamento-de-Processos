<?php 
	$pessoa = $vars["query"];
	//Base::dd($pessoa);
?>


<div class="col-lg-12">
	<ul class="list-group">
		<?php
		if(is_null($pessoa)){
		?>
		<li class="list-group-item">
			<div><strong>A pesquisa não obteve resultado.</strong></div>
		</li>
		<?php
		}else{
		?>
		<li class="list-group-item">
			<label>CPF</label>
			<div><?=$pessoa->getCpf(); ?></div>
		</li>
		<li class="list-group-item">
			<label>Nome</label>	
			<div><?=$pessoa->getNome(); ?></div>
		</li>
		
		<li class="list-group-item">
			<label>Orgao</label>	
			<div><?=$pessoa->getOrgao()[0]->getNome(); ?></div>
		</li>

		<li class="list-group-item">
			<button type="button" class="btn btn-default" onclick="window.history.back();">
				<span class="glyphicon glyphicon-chevron-left"> </span> Voltar
			</button>
		</li>
		<?php } ?>
	</ul>
</div>