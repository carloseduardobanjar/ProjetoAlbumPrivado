<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "medio_p3_bd";

	$conexao = mysqli_connect($servidor,$usuario,$senha);
	if(!$conexao)
		die("Não foi possível conectar" .mysqli_connect_erros());

	mysqli_select_db($conexao,$banco) or die("Erro ao selecionar banco ".mysqli_connect_error());

	if( !isset( $_POST['usuario'] ) || !isset( $_POST['senha'] ) || !isset( $_FILES['foto']["name"] ) )
		die('Você não passou os dados necessários!');
	if ( $_POST['usuario']=='' || $_POST['senha']=='' || $_FILES['foto']["name"]=='' )
		die('Os dados informados são inválidos!');


	$usuario = htmlspecialchars( $_POST["usuario"] );
	$usuario = mysqli_real_escape_string($conexao, $usuario);

	$senha = htmlspecialchars( $_POST["senha"] );
	$senha = mysqli_real_escape_string($conexao, $senha);
	$senha = password_hash( $senha, PASSWORD_BCRYPT );
	
	$foto = $_FILES['foto'];
	$nomeArquivo = $foto["name"];
	$nomeArquivo = htmlspecialchars( $nomeArquivo );
	$nomeArquivo = mysqli_real_escape_string($conexao, $nomeArquivo);

	move_uploaded_file($foto["tmp_name"], "img/fotos/" . $nomeArquivo);

	$sqlInsert = "insert into usuario (usuario, senha, nome_foto) values ('$usuario', '$senha', '$nomeArquivo')";
	$resultado = mysqli_query($conexao, $sqlInsert);
	$linhasAfetadas = mysqli_affected_rows($conexao);

	if($linhasAfetadas == 1)
	{
		$arquivo = fopen( 'log.txt', 'a' );
		fwrite( $arquivo, 'O '. $usuario . ' se cadastrou no sistema.'. PHP_EOL );
		fclose( $arquivo );
		$file = fopen( 'msg.txt', 'r' );
		$linhas = array();
		while( !feof ( $file ) ){ 
			$linha = fgets( $file );
			$linha = trim( $linha );
			array_push( $linhas, $linha );
		}
		fclose( $file );
		$tam = count($linhas);
		$num = random_int(0, $tam - 1);
		echo $linhas[$num] . ', ' . $usuario . '!';
	}
	else
	{
		echo "Ocorreu um erro no cadastro.";
	}
?>

