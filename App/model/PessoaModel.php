<?php

class PessoaModel
{
    public $id,$nome,$email,$senha,$dataNas;

    public function cadastrar()
    {
        include 'DAO/PessoaDAO.php';
        $dao = new PessoaDAO();
        $dao->cadastrar($this);

    }

    public function editar()
    {
        include 'DAO/PessoaDAO.php';
        $dao = new PessoaDAO();
        $dao->editar($this);

    }

    public function pegaPessoaPeloId(int $Id)
    {
        include 'DAO/PessoaDAO.php';
        $dao = new PessoaDAO();
        return $dao->pegaPessoaPeloId($Id);

    }

    public function excluir(int $Id)
    {
        include 'DAO/PessoaDAO.php';
        $dao = new PessoaDAO();
        $dao->excluir($Id);

    }

    public function listarUsuarios()
    {
        include 'DAO/PessoaDAO.php';
        $dao = new PessoaDAO();
        return $dao->listarUsuarios();

    }



}