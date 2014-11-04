<?php 
	$query = $vars["query"];
?>
<div class="row">
	<h1>PARECERES</h1>
	<table class="table">
		<tr>
			<th>Id</th>
			<th>Descrição</th>
			<th>Data de Criação</th>
			<th>Parecer</th>
			<th>Autor</th>
		</tr>
		<?php
			if(empty($query))
				echo "<tr><td colspan='5'>A pesquisa não houve retorno.</td></tr>";
			else
				// Faço um loop, utilizando o método fetch_array() que estará exibindo os registros.
				foreach ($query as $reg){
					$parecer = "Sem parecer";
					if($reg->getParecer() == "F")
						$parecer = "Favorável";
					else if($reg->getParecer() == "NF")
						$parecer = "Não Favorável";

					echo '<tr>
							<td>'.$reg->getId().'</a></td>
							<td>'.$reg->getDescricao().'</td>
							<td>'.$reg->getData().'</td>
							<td>'.$parecer.'</td>
							<td>'.$reg->getProfessor()->getNome().'</td>
						</tr>';
				}
		?>
	</table>
</div>