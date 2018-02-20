<?php

require_once("conexao.php");

//CREATE - Salvando novo registro no banco de dados

if (isset($_REQUEST['act']) && $_REQUEST['act'] == "save" && $nome != "") {
	try {
		$stmt = $conexao->prepare("INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)");
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $email);
		$stmt->bindParam(3, $telefone);

		if ($stmt->execute()) {
			if ($stmt->rowCount() > 0) {
				$mensagem_success = "Dados cadastrados com sucesso!";
				$id = NULL;
				$nome = NULL;
				$email = NULL;
				$telefone = NULL;
			} else {
				$mensagem_erro = "Erro ao tentar efetuar o cadastro";
			}
		} else {
			throw new PDOException("Erro: Não foi possível executar a declaração sql");
		}

	}catch(PDOException $erro) {
		$mensagem_erro = "Erro: " . $erro->getMensage();
	}
}


?>