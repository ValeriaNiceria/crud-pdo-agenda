<table class="table">
	<?php
		echo (isset($msg) ? "<div class='alert alert-danger'>" .$msg. "</div>": "");
	?>
    <tr>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th><center>Opções</center></th>
    </tr>
    <?php
    // Bloco que realiza o papel do Read - recupera os dados e apresenta na tela
    try {
        $stmt = $conexao->prepare("SELECT * FROM contatos");
            if ($stmt->execute()) {
                while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>";
                    echo "<td>".$rs->nome."</td>
                    	<td>".$rs->email."</td>
                    	<td>".$rs->telefone."</td>
                    	<td><center>
                    	<a href=\"\">[Alterar]</a>
                    	<a href=\"\">[Excluir]</a>
                    	</center></td>";
                    echo "</tr>";
                }
            } else {
                $msg = "Erro: Não foi possível recuperar os dados do banco de dados";
            }
    } catch (PDOException $erro) {
        $msg = "Erro: ".$erro->getMessage();
    }
    ?>
</table>