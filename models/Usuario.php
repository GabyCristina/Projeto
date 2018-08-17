<?php
/**
 * Created by PhpStorm.
 * User: aluno
 * Date: 27/04/18
 * Time: 13:16
 */

class Usuario
{
    private $id_user;
    private $nome;
    private $email;
    private $login;
    private $senha;


    public function __construct($nome, $email, $login, $senha, $id_user=null)
    {
        $this->id_user = $id_user;
        $this->nome = $nome;
        $this->email = $email;
        $this->login = $login;
        $this->senha = $senha;

    }

    /**
     * @return null
     */
    public function getid_user()
    {
        return $this->id_user;
    }

    /**
     * @param null $id_user
     */
    public function setid_user($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getLoginUso()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLoginUso($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getSenhaUso()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenhaUso($senha)
    {
        $this->senha = $senha;
    }

}