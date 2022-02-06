<?php
	session_start();

	if(isset($_SESSION['codigo']))
	{
		include("conexao.php");

		$id = $_SESSION['codigo'];
		$consulta2 = "select * from usuario where ID=$id";
		$resultado2 = mysqli_query($conexao,$consulta2);
		$registro2 = mysqli_fetch_row($resultado2);
		$nomeUsuario = $registro2[3];
		$descricao = $registro2[4];

		echo "<h3>Seja bem vindo(a), " . $nomeUsuario . "! </h3>";
		echo "<p>".$descricao."</p>";
		echo "<h5><a href='logoff.php'>Clique aqui para sair.</a></h5>";

		$consulta = "select * from foto where usuario_id=$id";
		$resultado = mysqli_query($conexao,$consulta);
		$linhas = mysqli_num_rows($resultado);

		echo "<table>";
		echo "<tr>";
		echo "<th>Descricao</th>";
		echo "<th>Foto</th>";
		echo "<th>Data da postagem</th>";

		for($i=0; $i < $linhas; $i++)
		{
			$registro = mysqli_fetch_row($resultado);
			$descricao = $registro[2];
			$foto = $registro[3];
			$data_postagem = $registro[4];

			echo "<tr>";
			echo "<td>$descricao</a></td>";
			echo "<td><img src=$foto width=50px height=50px></td>";
			echo "<td>$data_postagem</td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<h5><a href='postar.php?id=$id'>Clique aqui para postar.</a></h5>";
	}
	else
	{
		header("Location: login.php");
	}
?>
