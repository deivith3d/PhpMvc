<?php

class PessoaDAO
{
    private $conn;

    public function fazConexao()
    {
       try {
            $dsn = "mysql:host=localhost:3306;dbname=cadastro";
            $this->conn = new PDO($dsn, 'root', 'root');
        } 
        catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }
    } 

    public function cadastrar(PessoaModel $model)
    {
        $this->fazConexao();
        $sql = "INSERT INTO usuario (nomeUser,emailUser,senhaUser,dataNasUser) VALUES (?,?,?,?) ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(1,$model->nome);
        $stmt->bindValue(2,$model->email);
        $stmt->bindValue(3,$model->senha);
        $stmt->bindValue(4,$model->dataNas);
        $res= $stmt->execute();
        if($res)
        {
            echo "<script>alert('cadastro realizado com sucesso!');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível realizar o cadastro!');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }
        
    }

    public function editar(PessoaModel $model)
    {
        $this->fazConexao();
         $sql = "UPDATE usuario SET nomeUser=?,emailUser=?,senhaUser=?,dataNasUser=? WHERE idUser=?";
         $stmt = $this->conn->prepare($sql);
         $stmt->bindValue(1,$model->nome);
         $stmt->bindValue(2,$model->email);
         $stmt->bindValue(3,$model->senha);
         $stmt->bindValue(4,$model->dataNas);
         $stmt->bindValue(5,$model->id);
         $res= $stmt->execute();
         if($res)
         {
             echo "<script>alert('Registro alterado com sucesso!');</script>";
             echo "<script>location.href='?page=listar';</script>";
         }
         else
         {
             echo "<script>alert('Não foi possível realizar a alteração');</script>";
             echo "<script>location.href='?page=listar';</script>";
         }

    }

    public function pegaPessoaPeloId(int $Id)
    {
        $this->fazConexao();
        $sql= "SELECT * FROM usuario WHERE idUser=".$Id;
        $res = $this->conn->query($sql);
        $row = $res->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
    
    
    public function excluir(int $Id)
    {
        $this->fazConexao();
        $sql = "DELETE FROM usuario WHERE idUser=".$Id;
        $res = $this->conn->query($sql);
        if($res)
        {
            echo "<script>alert('Exclusão realizada com sucesso!');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível excluir o usuário!');</script>";
            echo "<script>location.href='?page=listar';</script>";
        }

    }

    public function listarUsuarios()
    {
        $this->fazConexao();
        $sql= "SELECT * FROM usuario ORDER BY nomeUser";
        return $this->conn->query($sql);
    }
}