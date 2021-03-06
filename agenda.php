<?php

require_once("verifica.php");

require_once("banco.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Agenda de contatos</title>
	<link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<body>
	<div class="container">
	<form action="?act=save" method="POST" name="form1">
		<h1>Agenda de contatos</h1>
		<hr/>
		
		<?php
			echo (isset($mensagem_success) ? "<div class='alert alert-success'>" . $mensagem_success . "</div>" : "");
			echo (isset($mensagem_erro) ? "<div class='alert alert-danger'>" . $mensagem_erro . "</div>" : "");
		?>

		<input type="hidden" name="id"
		<?php
			//Preenche o id no campo id com o valor
			if (isset($id) && $id != null || $id != "") :
				echo "value=\"{$id}\"";
			endif;
		?>
		/>

		<label for="nome">Nome:</label>
		<input type="text" name="nome" id="nome" class="form-control"
		<?php
			if (isset($nome) && $nome != null || $nome != "") :
				echo "value=\" {$nome}\"";
			endif;
		?>
		/>

		<label for="email">E-mail:</label>
		<input type="email" name="email" id="email" class="form-control"
		<?php
			if (isset($email) && $email != null || $email != "") :
				echo "value=\"{$email}\"";
			endif;
		?>
		/>

		<label for="telefone">Telefone:</label>
		<input type="text" name="telefone" id="telefone" class="form-control"
		<?php
			if (isset($telefone) && $telefone != null || $telefone != "") :
				echo "value=\" {$telefone}\"";
			endif;
		?>
		/>

		<input type="reset" value="Novo" class="btn btn-secondary float-right mt-3 m-2"/>
		<input type="submit" value="Salvar" class="btn btn-primary float-right mt-3"/>

	</form>

	<?php
		include("tabela.php");
	?>

	</div>
</body>
</html>