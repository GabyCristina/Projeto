<?php 

	class Comentario{
		private $data_hora;

		private $id_comentario;
		private $id_pergunta;
		private $id_user;

		public function __construct($data_hora, $texto_comen, $id_user, $id_pergunta)
		{
			$this->data_hora = $data_hora;
			$this->texto_comen = $texto_comen;
			$this->id_user = $id_user;
			$this->id_pergunta = $id_pergunta;
		}

		public function getdata_hora()
		{
		    return $this->data_hora;
		}
		
		public function setdata_hora($data_hora)
		{
		    return $this->data_hora = $data_hora;
		}

		public function gettexto_comen()
		{
		    return $this->texto_comen;
		}
		
		public function settexto_comen($texto_comen)
		{
		    return $this->texto_comen = $texto_comen;
		}

		public function getId_comentario()
		{
		    return $this->id_comentario;
		}
		
		public function setId_comentario($id_comentario)
		{
		    return $this->id_comentario = $id_comentario;
		}

		public function getId_pergunta()
		{
		    return $this->id_pergunta;
		}
		
		public function setId_pergunta($id_pergunta)
		{
		    return $this->id_pergunta = $id_pergunta;
		}

		public function getid_user()
		{
		    return $this->id_user;
		}
		
		public function setid_user($id_user)
		{
		    return $this->id_user = $id_user;
		}
	}

 ?>