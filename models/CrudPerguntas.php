<?php 

require_once "Pergunta.php";
require_once "Conexao.php";

/**
* 
*/
class Crudpergunta
{
	
 		public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

        public function getpergunta()
    {

        $sql = "select * from pergunta order by pergunta";
        $resultado = $this->conexao->query($sql);
        $listapergunta = [];

        $pergunta = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $pergunta;
    }

    public function insertPergunta($pergunta,$id_user)
    {
        $data_hora = $pergunta->getDataHora();
        $detalhamento_per = $pergunta->getDescricaoPergunta();
        $pergunta = $pergunta->getperg();
        $id_pergunta_= $pergunta->getIdPerg();

        $consulta = "INSERT INTO pergunta (data_hora, detalhamento_per, pergunta, id_pergunta, id_user)  
                      VALUES ('($data_hora)', '{$detalhamento_per}', '{$pergunta}', '{$id_pergunta}',  '{$id_user}')";
        //echo $consulta;
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }

    }

    public function getPergunta($id_pergunta)
    {

        $sql = "SELECT * FROM pergunta as p, usuario as u WHERE p.id_user=u.id_user and p.id_pergunta = $id_pergunta";
        $resultado = $this->conexao->query($sql);
        $pergunta = $resultado->fetch(PDO::FETCH_ASSOC);

        return $pergunta;
    }

    public function updatePergunta(pergunta $pergunta)
    {

        $consulta = "UPDATE pergunta SET hora = '{$pergunta->getHora()}', data = '{$pergunta->getData()}', detalhamento_per = '{$pergunta->getDescricaoPergunta()}', pergunta = '{$pergunta->getpergunta()}' , id_pergunta = '{$pergunta->getIdpergunta()}', id_pergunta = '{$pergunta->getIdPerg()}'
 					WHERE id_pergunta={$pergunta->getIdPergunta()}";

        
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

    public function deletePergunta($id_pergunta)
    {

        $consulta = "DELETE FROM pergunta WHERE id_pergunta = $id_pergunta";
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

        public function busca($busca)

{


$sql = "SELECT id_pergunta, pergunta, detalhamento_per, status FROM pergunta
        WHERE MATCH (pergunta, detalhamento_per) AGAINST ('{$busca}');";
$resultado = $this->conexao->query($sql);
$pergunta = $resultado->fetchAll(PDO::FETCH_ASSOC);

return $pergunta;
}
    public function perguntaRespondidas()
    {
        $sql = "SELECT * FROM pergunta where status = 1";
            $resultado = $this->conexao->query($sql);
            $listapergunta = [];

            $listapergunta = $resultado->fetchAll(PDO::FETCH_ASSOC);
            return $listapergunta;
    }



        public function getperguntaPorUsuario($id_user)
    {

        $sql = "SELECT * from pergunta as p, usuario as u where p.id_user = u.id_user and u.id_user = $id_user";
        $resultado = $this->conexao->query($sql);
        

        $pergunta = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $pergunta;
    }

    public function updatePerguntaRespondida($id_pergunta)
    {

        $consulta = "update pergunta as p, resposta as r set p.status = 1 where p.id_pergunta = r.id_pergunta and p.id_pergunta = $id_pergunta";

        
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }



?>