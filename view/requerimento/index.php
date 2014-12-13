<?php 
	$query = $vars["query"];
	//Base::dd($query);
?>
<div class="row">
	<h1>Requerimento</h1>
	<table class="table">
		<tr>
			<th>Código</th>
			<th>Descrição</th>
			<th>Data de Criação</th>
			<th>Tipo</th>			
		</tr>
		<?php
			if(empty($query))
				echo "<tr><td colspan='5'>A pesquisa não houve retorno.</td></tr>";
			else
				// Faço um loop, utilizando o método fetch_array() que estará exibindo os registros.
				foreach ($query as $reg) {
					echo '<tr>
							<td><a href="'.Base::baseUrl().'requerimento/atualizar/'.$reg->getCodigo().'">'.$reg->getCodigo().'</a></td>
							<td>'.$reg->getDescricao().'</td>							
							<td>'.$reg->getTipo().'</td>
							<td><a href="'.Base::baseUrl().'requerimento/view/'.$reg->getRequerimento()->getCodigo().'">'.$reg->getRequerimento()->getCodigo().'</td>
						</tr>';
				}
		?>
	</table>
</div>