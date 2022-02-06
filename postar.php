<?php
	include("conexao.php");

	$id = $_GET["id"];
?>
<html>
<head></head>
<body>
	<form action="insert_file.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
		Descrição: <input type="text" name="descricao"> <br/>
		Fotos: <input type="file" name="arquivo"> <br/>
		<input type="submit" value="Postar">
	</form>
</body>
</html>