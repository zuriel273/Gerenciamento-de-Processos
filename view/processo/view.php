<?php 
	$processo = $vars["query"][0];
?>
<div class="col-lg-12">
	<ul class="list-group">
		<?php
		if(is_null($processo)){
		?>
		<li class="list-group-item">
			<div><strong>A pesquisa não obteve resultado.</strong></div>
		</li>
		<?php
		}else{
		?>
		<li class="list-group-item">
			<label>Código</label>
			<div><?=$processo->getCodigo(); ?></div>
		</li>
		<li class="list-group-item">
			<label>Situação</label>	
			<div><?=$processo->getSituacao(); ?></div>
		</li>
		<li class="list-group-item">
			<label>Descrição</label>	
			<div><?=$processo->getDescricao(); ?></div>
		</li>
		<li class="list-group-item">
			<label>Data de Criação</label>	
			<div><?=$processo->getDataCriacao(); ?></div>
		</li>
		<li class="list-group-item">
			<label>Requerimento</label>	
			<div><?=$processo->getRequerimento()->getCodigo(); ?></div>
		</li>
		<li class="list-group-item">
			<label>Nome do Autor</label>	
			<div><?=$processo->getPessoa()->getNome(); ?></div>
		</li>
		<li class="list-group-item">
			<label>Documentos</label>	
			<div><?=$processo->getDocumentos(); ?></div>
		</li>
		<li class="list-group-item">
			<button type="button" class="btn btn-default" onclick="window.history.back();">
				<span class="glyphicon glyphicon-chevron-left"> </span> Voltar
			</button>
		</li>
		<?php } ?>
	</ul>
</div>