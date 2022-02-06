<?php
	include("conexao.php");

	$id = $_GET["id"];
	$sqlSelect = "select * from usuario where id=$id";
	$resultado = mysqli_query($conexao,$sqlSelect);
	$registro = mysqli_fetch_row($resultado);
	$nome_usuario = $registro[1];

	$descricao = $_POST["descricao"];
	$arquivo = $_FILES["arquivo"];
	$nomeArquivo = "img/" . $nome_usuario . "/" . $arquivo["name"];

	if(move_uploaded_file($arquivo["tmp_name"], $nomeArquivo))
	{
		$comando = "insert into foto (usuario_id, descricao, file_name, data_postagem) values ('$id', '$descricao', '$nomeArquivo', now() )";
		$resultado = mysqli_query($conexao, $comando);
		header("Location: lista.php");
	}

	else
	{
		echo "Ocorreu um erro. Tente novamente.";
	}
?>