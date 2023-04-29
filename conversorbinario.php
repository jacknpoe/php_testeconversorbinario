<?php
	//***********************************************************************************************
	// AUTOR: Ricardo Erick Reb�lo
	// Objetivo: conversor de ASCII para bin�rio e de bin�rio para ASCII
	// Altera��es:
	// 0.1   28/04/2023 - Come�o da primeira implementa��o
	// 1.0   28/04/2023 - Primeira vers�o publicada

	namespace jacknpoe;

	//***********************************************************************************************
	// Classe IMC

	class conversorBinario
	{
		function binarioParaASCII( $binario = "")
		{
			$binarios = explode( " ", $binario);
			$temporario = '';

			foreach( $binarios as $binario)
			{
				if( $binario != "")
				{
					$temporario = $temporario . chr(intval( $binario, 2));
				}
			}

			return $temporario;
		}

		function DecimalPraBinario( $decimal )
		{

			if ( $decimal < 1) return "0";

			$binario = "";

			while ( $decimal > 0)
			{
				$binario = substr_replace( $binario, strval( $decimal % 2), 0, 0);

				$decimal = floor( $decimal / 2);
			}

			return $binario;
		}

		function ASCIIParaBinario( $ASCII = "")
		{
			$binario = "";
			$tamanho = strlen( $ASCII);

			for ( $contador = 0; $contador < $tamanho; $contador++ )
			{
				$caracter = $this->DecimalPraBinario( ord( $ASCII[ $contador]));

				if( strlen( $caracter) < 8)
					$caracter = str_pad( $caracter, 8, "0", STR_PAD_LEFT);

				if( $contador > 0 )	$binario = $binario . " ";

				$binario = $binario . $caracter;
			}

			return $binario;
		}
	}
?>