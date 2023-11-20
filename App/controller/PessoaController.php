<?php

class PessoaController
{


    public static function cadastrar()
    {
        include 'model/PessoaModel.php';
        $model = new PessoaModel();
        $model->nome = $_POST["nomeUser"];
        $model->email = $_POST["emailUser"];
        $model->senha = md5($_POST["senhaUser"]);
        $model->dataNas = $_POST["dataNasUser"];
        $model->cadastrar();
    }

    public static function editar()
    {
        include 'model/PessoaModel.php';
        $model = new PessoaModel();
        $model->id = $_POST["idUser"];
        $model->nome = $_POST["nomeUser"];
        $model->email = $_POST["emailUser"];
        $model->senha = md5($_POST["senhaUser"]);
        $model->dataNas = $_POST["dataNasUser"];
        $model->editar();
    }

    public static function pegaPessoaPeloId(int $Id)
    {
        include 'model/PessoaModel.php';
        $model = new PessoaModel();
        $model->id = $Id;
        return $model->pegaPessoaPeloId($Id);
    }

    public static function excluir()
    {
        $meuId = $_REQUEST["id"];
        include 'model/PessoaModel.php';
        $model = new PessoaModel();
        $model->excluir($meuId);
    }

    public static function listarUsuarios()
    {
        include 'model/PessoaModel.php';
        $model = new PessoaModel();
        return $model->listarUsuarios();
    }



}



