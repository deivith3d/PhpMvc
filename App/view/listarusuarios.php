<h1>Listar Usuários</h1>
<?php
    // $sql = "SELECT * FROM usuario ORDER BY nomeUser";
    // $res = $conn->query($sql);
    // $qtd = $res->num_rows;
    include("controller/PessoaController.php"); 
    $res = PessoaController::listarUsuarios();
    $qtd = $res->rowCount();
    if($qtd>0){
        print"<table class='table table-hover table-striped table-bordered'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome</th>"; 
        print "<th>E-mail</th>";
        print "<th>Data de Nascimento</th>";
        print "<th>Ações</th>";
        print"</tr>";
        while ($row = $res->fetch(PDO::FETCH_OBJ)) {
            print "<tr>";
            print "<td>".$row->idUser."</td>";
            print "<td>".$row->nomeUser."</td>"; 
            print "<td>".$row->emailUser."</td>";
            print "<td>".$row->dataNasUser."</td>";
            print "<td>
                        <button onclick=\"location.href='?page=alterar&id=".$row->idUser."';\" class='btn btn-success'>Editar</button>
                        <button onclick=\"if(confirm('Tem certeza que deseeja excluir?')){location.href='?page=excluir&id=".$row->idUser."';}else{false;}\"class='btn btn-danger'>Excluir</button>
                    </td>";
            print"</tr>";
        }
        print"</table>";
    }
    else{
        echo "<p class='alert alert-danger'>Nenhum registro encontrado!</p>";
    }

?>