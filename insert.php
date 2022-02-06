<?php
	include("conexao.php");

	$nome = $_POST["nome"];
	$descricao = $_POST["descricao"];
	$nome_usuario = $_POST["nome_usuario"];
	$senha = $_POST["senha"];

	$sqlInsert = "insert into usuario (nome, descricao, nome_usuario, senha) values ('$nome', '$descricao', '$nome_usuario', AES_ENCRYPT('$senha','token'))";
	$resultado = mysqli_query($conexao, $sqlInsert);
	$linhasAfetadas = mysqli_affected_rows($conexao);

	if($linhasAfetadas == 1)
	{
		mkdir('img/'. $nome_usuario);
		echo "Cliente cadastrado com sucesso!";
		echo "<a href='login.php'>Voltar para lista</a>";
	}
	else
	{
		echo "Ocorreu um erro no cadastro.";
	}
?>