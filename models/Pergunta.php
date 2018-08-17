<?php
class Pergunta
{
    private $data_hora;
    private $detalhamento_per;
    private $pergunta;
    private $id_pergunta;

    private $id_user;
    public function __construct($data_hora, $detalhamento_per, $pergunta, $id_pergunta)
    {
        $this->data_hora = $data_hora;
        $this->detalhamento_per = $detalhamento_per;
        $this->pergunta = $pergunta;
        $this->id_pergunta = $id_pergunta;


    }
    /**
     * @return mixed
     */
    public function getDataHora()
    {
        return $this->data_hora;
    }

    /**
     * @param mixed $data_hora
     */
    public function setDataHora($data_hora)
    {
        $this->data_hora = $data_hora;
    }

    /**
     * @return mixed
     */
    public function getDescricaoPergunta()
    {
        return $this->detalhamento_per;
    }
    /**
     * @param mixed $email
     */
    public function setDescricaoPergunta($detalhamento_per)
    {
        $this->detalhamento_per = $detalhamento_per;
    }
    /**
     * @return mixed
     */
    public function getperg()
    {
        return $this->pergunta;
    }
    /**
     * @param mixed $num_matricula
     */
    public function setpergunta($pergunta)
    {
        $this->pergunta = $pergunta;
    }
    /**
     * @return mixed
     */
    public function getIdPerg()
    {
        return $this->id_pergunta;
    }
    /**
     * @param mixed $data_nasc
     */
    public function setIdPerg($id_pergunta)
    {
        $this->id_pergunta = $id_pergunta;
    }

    public function getIdUsuario()
    {
        return $this->id_user;
    }
    /**
     * @param mixed $id_user
     */
    public function setIdUsuario($id_user)
    {
        $this->id_user = $id_user;
    }
    /**
     * @return mixed
     */
    public function getIdPergunta()
    {
        return $this->id_pergunta;
    }
    /**
     * @param mixed $cod_tip
     */
    public function setIdPergunta($id_pergunta)
    {
        $this->id_pergunta = $id_pergunta;
    }
}
?>