<h1>Editar Usuário</h1>
<?php
    // $sql= "SELECT * FROM usuario WHERE idUser=".$_REQUEST["id"];
    // $res = $conn->query($sql);
    // $row = $res->fetch_object();
    include("controller/PessoaController.php"); 
    $pegouId = $_REQUEST["id"];
    $row = PessoaController::pegaPessoaPeloId($pegouId);
    //echo "o id é: ".$row->idUser;

?>
<form action="?page=editar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="idUser" value="<?php print $row['idUser']; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nomeUser" value="<?php print $row['nomeUser']; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="email" name="emailUser" value="<?php print $row['emailUser']; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senhaUser" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Data de Nascimento</label>
        <input type="date" name="dataNasUser" value="<?php print $row['dataNasUser']; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>