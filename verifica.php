<?php

//Verifica se foi enviado dados via POST

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id = (isset($_POST['id']) && $_POST['id'] != null) ? $_POST['id'] : "";
	$nome = (isset($_POST['nome']) && $_POST['nome'] != null) ? $_POST['nome'] : "";
	$email = (isset($_POST['email']) && $_POST['email'] != null) ? $_POST['email'] : "";
	$telefone = (isset($_POST['telefone']) && $_POST['telefone'] != null) ? $_POST['telefone'] : "";
} elseif (!isset($id)) {
	//Se não foi setado nenhum valor para a variável $id
	$id = (isset($_GET['id']) && $_GET['id'] != null) ? $_GET['id'] : "";
	$nome = NULL;
	$email = NULL;
	$telefone = NULL;
}

?>