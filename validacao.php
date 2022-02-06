<?php
	include("conexao.php");

	$nome_usuario = $_POST['nome_usuario'];
	$senha = $_POST['senha'];

	$consulta = "select * from usuario where nome_usuario='$nome_usuario' and senha=AES_ENCRYPT('$senha','token')";

	$resultado = mysqli_query($conexao, $consulta);

	$registro = mysqli_fetch_row($resultado);

	$id = $registro[0];
	$nome = $registro[1];

	$usuarioEncontrado = mysqli_affected_rows($conexao);

	if($usuarioEncontrado == 1)
	{
		session_start();
		$_SESSION['codigo'] = $id;
		header("Location: lista.php");
	}
	else
		echo "Usuário/Senha inválidos. Tente novamente. <a href='login.php'>Voltar</a>";
?>
