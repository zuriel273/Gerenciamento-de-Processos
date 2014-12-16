<?php 
	$query = $vars["query"];
?>
<div class="row">
	<h1>LISTA DE PROCESSOS</h1>
	<table class="table">
		<tr>
			<th>Código</th>
			<th>Descrição</th>
			<th>Parecer</th>
			<th>Data de Criação</th>
			<th>Requerimento</th>
			<?php if($_SESSION["logado"]->getRole() != "docente"){ ?>
				<th>Autor</th>
			<?php }else{ ?>
				<th>Ação</th>
			<?php } ?>
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
							<td><a href="'.Base::baseUrl().'parecerProf/index/'.$reg->getCodigo().'">'."PARECER".'</td>
							<td>'.$reg->getDataCriacao().'</td>
							<td><a href="'.Base::baseUrl().'requerimento/view/'.$reg->getRequerimento()->getCodigo().'">'.$reg->getRequerimento()->getCodigo().'</td>';
					if($_SESSION["logado"]->getRole() != "docente"){
						echo '<td><a href="'.Base::baseUrl().'pessoa/view/'.preg_replace("/[^0-9]/","",$reg->getPessoa()->getCpf()).'">'.$reg->getPessoa()->getCpf().'</td>';
					}else{
						echo '<td><a href="'.Base::baseUrl().'parecerDocente/add">Dar Parecer</td>';
					}
					echo '</tr>';
				}
		?>
	</table>
</div>