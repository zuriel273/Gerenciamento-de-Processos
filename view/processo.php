<?php 
	Base::import(array('dao/ProcessoDAO.php'));
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
			// Instâncio a classe Processo
			$Pr = new Processo();
			
			// Instâncio a classe ProcessoDAO
			$PrDAO = new ProcessoDAO();

			$query = $PrDAO->getAll();
			
			// Faço um loop, utilizando o método fetch_array() que estará exibindo os registros.
			foreach ($query as $reg) {
				echo '<tr>
						<td><a href="'.Base::baseUrl().'processo/atualizar/'.$reg->getCodigo().'">'.$reg->getCodigo().'</a></td>
						<td>'.$reg->getDescricao().'</td>
						<td>'.$reg->getDataCriacao().'</td>
						<td><a href="'.Base::baseUrl().'requerimento/'.$reg->getRequerimento()->getCodigo().'">'.$reg->getRequerimento()->getCodigo().'</td>
						<td><a href="'.Base::baseUrl().'usuario/'.$reg->getPessoa()[0]->getCpf().'">'.$reg->getPessoa()[0]->getCpf().'</td>
					</tr>';
			}
		?>
	</table>
</div>