<?php 
require ('connect.php');

$nome_prof=$_POST['nome_prof'];
$id_turma1=$_POST['id_turma1'];

$consultar=mysqli_query($conn,"SELECT*from professor where nome like '%$nome_prof%'");
$result=mysqli_num_rows($consultar);
$consultar2=mysqli_query($conn,"SELECT*from turmas where id_turma like '%$id_turma1%'");
$result2=mysqli_num_rows($consultar2);

$linha=mysqli_fetch_array($consultar);
 $nome = $linha['nome'];
 echo $area = $linha['area'];

$linha2=mysqli_fetch_array($consultar2);
 $id_turma = $linha2['id_turma'];
 echo $nome_turma = $linha2['nome_turma'];


if ($_FILES['pdf']['name'] != "") {

	$pasta = './ementas/'.$area.'/'.$nome_turma.'/';
	if(!file_exists($pasta)){
	mkdir($pasta, 0777);}
	move_uploaded_file($_FILES['pdf']['tmp_name'], $pasta . $_FILES['pdf']['name']);
	header('location:principal_professor.php');
} else {
// Caso seja falso, retornará o erro
 echo "Não foi possível enviar o arquivo";
}

?>