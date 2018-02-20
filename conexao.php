<?php

include("config.php");

try {

	//Conecta com MySQL usando PDO
	$conexao = new PDO("mysql:dbname=" . BD_BANCO . ";host=" . BD_SERVIDOR, BD_USUARIO, BD_SENHA);

	//O método setAttribute() permite adicionar atributos no objeto de conexão
	$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Informa ao servidor de banco de dados, que será utilizada palavras com acento
	$conexao->exec("SET NAMES 'utf8'");
	
}catch(PDOException $erro) {
	echo "Erro na conexão: " . $erro->getMessage();
}