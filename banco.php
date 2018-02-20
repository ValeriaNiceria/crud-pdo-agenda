<?php

require_once("conexao.php");

//CREATE - Salvando novo registro no banco de dados

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
    try {
        if ($id != "") {
            $stmt = $conexao->prepare("UPDATE contatos SET nome=?, email=?, telefone=? WHERE id = ?");
            $stmt->bindParam(4, $id);
        } else {
            $stmt = $conexao->prepare("INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)");
        }
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
    } catch (PDOException $erro) {
        $mensagem_erro = "Erro: ".$erro->getMessage();
    }
}

//UPDATE - Alterando registros salvos no banco

if (isset($_REQUEST['act']) && $_REQUEST['act'] == 'upd' && $id != "") {
	try {
		$stmt = $conexao->prepare("SELECT * FROM contatos WHERE id = ?");
		$stmt->bindParam(1, $id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			$rs = $stmt->fetch(PDO::FETCH_OBJ);
			$id = $rs->id;
			$nome = $rs->nome;
			$email = $rs->email;
			$telefone = $rs->telefone;
		} else {
			throw new PDOException("Erro: Não foi possível executar a declaração sql");
		}
	} catch (PDOException $erro) {
		$mensagem_erro = "Erro: " . $erro->getMessage();
	}
}


?>