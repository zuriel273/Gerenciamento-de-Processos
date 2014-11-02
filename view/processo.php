<?php 

include "model/class.conexao.php";
include "model/class.processo.php";
include "dao/ProcessoDAO.php";
?>


<h1>LISTA DE PROCESSOS</h1>
<hr/>
<table class="ms-classic3-main" style="width: 77%">
	
	<tr>
		<td class="ms-classic3-tl" style="width: 209px">Codigo:</td>
		<td class="ms-classic3-top" style="width: 165px">Data de Criação:</td>
		<td class="ms-classic3-top" style="width: 160px">Descrição</td>
		<td class="ms-classic3-top" style="width: 66px">Editar</td>
	</tr>
	<?php
		// Instâncio a classe Processo
		$Pr = new Processo();
		
		// Instâncio a classe ProcessoDAO
		$PrDAO = new ProcessoDAO();
		
		
		$query = $PrDAO->getAll();
		
		// Faço um loop, utilizando o método fetch_array() que estará exibindo os registros.
		while($reg = $query->fetch_array())
		{
	?>
	<tr>
		<td class="ms-classic3-left" style="width: 209px"><?=$reg["codigo"];?></td>
		<td class="ms-classic3-even" style="width: 165px"><?=$reg["data_criacao"];?></td>
		<td class="ms-classic3-even" style="width: 160px"><?=$reg["descricao"];?></td>
		<td class="ms-classic3-even" style="width: 66px">
		<center><a href="atualizar.php?ID=<?=$reg["codigo"];?>">
		
	</tr>
	<?php 
		}
	?>
</table>