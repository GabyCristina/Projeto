<?php 

require_once "Resposta.php";
require_once "Conexao.php";


class crudRespostas
{

		public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getRespostas($id_pergunta)
    {
        $sql = "SELECT * from pergunta as p, resposta as r, usuario as u WHERE p.id_pergunta=r.id_pergunta and p.id_pergunta=$id_pergunta and u.id_user=r.id_user order by data_hora";
        $resultado = $this->conexao->query($sql);

        $respostas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $respostas;
    }



    public function insertResposta(resposta $resposta)
    {
        $data_hora = $resposta->getdata_hora();
        $texto_res = $resposta->gettexto_res();
        $id_user = $resposta->getid_user();
        $id_pergunta = $resposta->getId_Pergunta();


        $consulta = "INSERT INTO resposta (data_hora, texto_res, id_user, id_pergunta)  
                      VALUES ('{$data_hora}','{$texto_res}','{$id_user}','{$id_pergunta}' )";
        try {
            $res = $this->conexao->exec($consulta);
            
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }

    }

    public function getPerguntaRespondidasPorProf($id_user)
    {
        $sql = "SELECT DISTINCT(p.pergunta), p.id_pergunta, p.detalhamento_per, p.id_user, r.id_user from pergunta as p, resposta as r where p.id_pergunta=r.id_pergunta and r.id_user = $id_user";
        $resultado = $this->conexao->query($sql);

        $respostas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $respostas;
    }

    public function updateResposta(resposta $resposta)
    {

        $consulta = "UPDATE resposta SET data_hora = '{$resposta->getdata_hora()}', texto_res = '{$resposta->gettexto_res()}', id_resposta = '{$resposta->getId_resposta()}'
 					WHERE id_resposta={$resposta->getId_resposta()}";

        echo $consulta;
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

     public function deleteResposta($id_resposta)
    {

        $consulta = "DELETE FROM resposta WHERE id_resposta = {$id_resposta}";
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

     public function getNumPerguntaRespondidasPorProf($id_user)
    {
        $sql = "SELECT COUNT(p.id_pergunta) from pergunta as p, resposta as r where p.id_pergunta=r.id_pergunta and r.id_user = $id_user";
        $resultado = $this->conexao->query($sql);

        $respostas = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $respostas;
    }



	}

 ?>