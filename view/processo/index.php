<?php 
	$query = $vars["query"];
?>
<div class="row">
	<h1>LISTA DE PROCESSOS</h1>
	<table class="table">
		<tr>
			<th>Código</th>
			<th>Descrição</th>
			<th>Data de Criação</th>
			<th>Requerimento</th>
			<th>Autor</th>
		</tr>
		<?php
			if(empty($query))
				echo "<tr><td colspan='5'>A pesquisa não houve retorno.</td></tr>";
			else
				// Faço um loop, utilizando o método fetch_array() que estará exibindo os registros.
				foreach ($query as $reg) {
					echo '<tr>
							<td><a href="'.Base::baseUrl().'processo/atualizar/'.$reg->getCodigo().'">'.$reg->getCodigo().'</a></td>
							<td>'.$reg->getDescricao().'</td>
							<td>'.$reg->getDataCriacao().'</td>
							<td><a href="'.Base::baseUrl().'requerimento/view/'.$reg->getRequerimento()->getCodigo().'">'.$reg->getRequerimento()->getCodigo().'</td>
							<td><a href="'.Base::baseUrl().'usuario/view/'.$reg->getPessoa()->getCpf().'">'.$reg->getPessoa()->getCpf().'</td>
						</tr>';
				}
		?>
	</table>
</div>