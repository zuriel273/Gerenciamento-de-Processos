<?php 

require_once '../model/processo.php'; 

$teste = new Processo(); 
$codigo = $teste->getCodigo();
$situacao = $teste->getsituacao();
$descricao = $teste->getDescricao();

echo $codigo; 
echo "<br>"; 
echo $situacao; 
echo "<br>"; 
echo $descricao; 

?>

