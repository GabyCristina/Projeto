<?php 

require_once "Comentario.php";
require_once "Conexao.php";


class crudComentarios
{

		public function __construct()
    {
        $this->conexao = Conexao::getConexao();
    }

    public function getComentarios($id)
    {                                                //as para renomear e ajudar para reduzir o tamanho do códico
    	$sql = "SELECT * from pergunta as p  , comentario as c, usuario as u WHERE p.id_pergunta=c.id_pergunta and p.id_pergunta=$id and u.id_user=c.id_user order by data_hora";
        $resultado = $this->conexao->query($sql);
        $listaComentarios = [];

        $comentarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        return $comentarios;
    }
    


    public function insertComentario(comentario $comentario)
    {
        $data_hora = $comentario->getdata_hora();
        $texto_comen = $comentario->gettexto_comen();
        $id_user = $comentario->getid_user();
        $id_pergunta = $comentario->getId_Pergunta();



        $consulta = "INSERT INTO comentario (data_hora, texto_comen, id_user, id_pergunta)  
                      VALUES ('{$data_hora}', '{$texto_comen}', '{$id_user}', '{$id_pergunta}')";
        
        try {
            $res = $this->conexao->exec($consulta);

        } catch (PDOException $erro) {
            return $erro->getMessage();
        }

    }



    public function updateComentario(comentario $comentario)
    {

        $consulta = "UPDATE comentario SET data_hora = '{$comentario->getdata_hora()}', texto_comen = '{$comentario->gettexto_comen()}', id_comentario = '{$comentario->getId_comentario()}'
 					WHERE id_comentario={$comentario->getId_comentario()}";

        echo $consulta;
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }

     public function deleteComentario($id_comentario)
    {

        $consulta = "DELETE FROM comentario WHERE id_comentario = {$id_comentario}";
        try {
            $res = $this->conexao->exec($consulta);
            //return $res;
        } catch (PDOException $erro) {
            return $erro->getMessage();
        }
    }



	}

    // SELECT * from pergunta as p, comentario as c where c.id_pergunta = p.id_pergunta ORDER by c.data_hora

 ?>