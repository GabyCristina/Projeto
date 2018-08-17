<?php
/**
* Created by PhpStorm.
* User: aluno
* Date: 27/04/18
* Time: 13:23
*/

require_once "Usuario.php";
require_once "Conexao.php";

class CrudUsuarios
{
    private $conexao;

    public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }
//PEGA USUARIO
    public function getUsuarios(){

        $sql = "select * from usuario order by nome ";
        $resultado = $this->conexao->query($sql);
        $listaUsuarios = [];

        $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        foreach ($usuarios as $usuario){
            $objeto = new Usuario($usuario['nome'], $usuario['email'], $usuario['login'],$usuario['senha']);
            $listaUsuarios[] = $objeto;
        }
        return $listaUsuarios;
        }
//USUARIIO
    public function insertUsuario(Usuario $usuario){

    $consulta = "INSERT INTO usuario (nome,email, login, senha) VALUES ( '{$usuario->getNome()}', '{$usuario->getEmail()}',  '{$usuario->getLoginUso()}', '{$usuario->getSenhaUso()}');";

    $this->conexao->exec($consulta);
    try{
   // $this->conexao->exec($consulta);
    //return $res;
    }catch (PDOException $erro){
    return $erro->getMessage();
    //
    }

    }
// PEGA O ID USER
    public function getUsuario($id_user){

    $sql      = "SELECT * FROM usuario WHERE id_user = $id_user";
    $resultado = $this->conexao->query($sql);
    $usuario  = $resultado->fetch(PDO::FETCH_ASSOC);
    $objeto = new Usuario($usuario['nome'], $usuario['email'], $usuario['login'],$usuario['senha'], $usuario['id_user']);
    return $objeto;
    }
//PEGA O EMAIL
    public function getUsuario_byEmail($email){

        $sql      = "SELECT * FROM usuario WHERE email = '$email'";
        $resultado = $this->conexao->query($sql);
        $usuario  = $resultado->fetch(PDO::FETCH_ASSOC);
        $objeto = new Usuario($usuario['nome'], $usuario['email'], $usuario['login'],$usuario['senha']);
        return $objeto;
    }
//ATUALIZA O USUARIO
    public function updateUsuario(Usuario $usuario){

    $consulta = "UPDATE usuario SET nome = '{$usuario->getNome()}', email = '{$usuario->getEmail()}', login = '{$usuario->getLoginUso()}', senha = '{$usuario->getSenhaUso()}' WHERE id_user={$usuario->getid_user()}";
    try{
    $res = $this->conexao->exec($consulta);
    //return $res;
    }catch (PDOException $erro){
    return $erro->getMessage();
    }
    }
//DELETA USUARIO
    public function deleteUsuario($id_user){

    $consulta = "DELETE FROM usuario WHERE id_user = {$id_user}";
    echo $consulta;
    try{
    $res = $this->conexao->exec($consulta);
    //return $res;
    }catch (PDOException $erro){
    return $erro->getMessage();
    }
    }
//FAZ O LOGIN
    public function login($login, $senha)
    {
        $sql = 'SELECT * FROM usuario WHERE login =\''.$login .'\' and senha=\'' . $senha . '\';';
        $resultado = $this->conexao->query($sql);

        echo '<pre>';
        var_dump($resultado);
        echo '</pre>';

        if ($resultado->rowCount() > 0) {
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } else {
            return false;
        }

        }
};