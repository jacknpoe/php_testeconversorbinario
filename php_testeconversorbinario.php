<!DOCTYPE html>
<html lang="pt-BR">
	<head>
		<title>Conversor de ASCII para binário e de binário para ASCII</title>
 		<link rel="stylesheet" href="php_testeconversorbinario.css"/>
		<link rel="icon" type="image/png" href="php_testeconversorbinario.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<?php
			header( "Content-Type: text/html; charset=ISO-8859-1", true);

			$resultado = '';
			$origem = '';
			$tipo = "ASCIIParaBinario";

			if( isset( $_POST[ 'converter']))
			{
				$origem = $_POST['origem'];
				$tipo =  $_POST['tipo'];

				require_once( 'conversorbinario.php');
				$converteBinario = new \jacknpoe\conversorBinario();

				if( $tipo === "ASCIIParaBinario")
				{
					$resultado = $converteBinario->ASCIIParaBinario( $origem);
				}
				else
				{
					$resultado = $converteBinario->binarioParaASCII( $origem);
				}

			}
		?>
		<h1>Conversor de ASCII para binário e de binário para ASCII<br></h1>

		<form action="php_testeconversorbinario.php" method="POST" style="border: 0px">
			<p>Tipo: <input type="radio" name="tipo" value="ASCIIParaBinario" <?php if( $tipo === "ASCIIParaBinario") echo "checked"; ?> autofocus>ASCII para Binário
				     <input type="radio" name="tipo" value="BinarioParaASCII" <?php if( $tipo === "BinarioParaASCII") echo "checked"; ?>>Binário para ASCII</p>
			<p><label for="origem">Origem</label><br>
			<textarea name="origem" rows="4" cols="50"><?php echo $origem; ?></textarea></p>
			<p><input type="submit" name="converter" value="Converter"></p>
			<p><label for="resultado">Resultado</label><br>
			<textarea disabled name="resultado" rows="4" cols="50"><?php echo $resultado; ?></textarea></p>
		</form>

		<br><br>
		<p><a href="https://github.com/jacknpoe/php_testeconversorbinario">Repositório no GitHub</a></p><br><br>
		<form action="index.html" method="POST" style="border: 0px">
			<p><input type="submit" name="voltar" value="Voltar"></p>
		</form>
	</body>
</html>