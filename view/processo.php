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
						<td><a href="atualizar.php?ID='.$reg->getCodigo().'">'.$reg->getCodigo().'</a></td>
						<td>'.$reg->getDescricao().'</td>
						<td>'.$reg->getDataCriacao().'</td>
					</tr>';
			}
		?>
	</table>
</div>