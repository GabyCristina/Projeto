<?php 

	class Resposta
	{		
		private $data_hora;
		private $texto_res;
		private $id_resposta;
		private $id_pergunta;
		private $id_user;

		
		public function __construct($data_hora, $texto_res, $id_user, $id_pergunta)
		{
			$this->data_hora = $data_hora;
			$this->texto_res = $texto_res;
			$this->id_user = $id_user;
			$this->id_pergunta = $id_pergunta;
		}

		        public function getdata_hora()
		{return $this->data_hora;
		}
		
		        public function setdata_hora($data_hora)
		{return $this->data_hora = $data_hora;
		}

		        public function gettexto_res()
		{return $this->texto_res;
		}
		
		        public function settexto_res($texto_res)
		{return $this->texto_res = $texto_res;
		}

		        public function getId_resposta()
		{return $this->id_resposta;
		}
		        public function setId_resposta($id_resposta)
		{return $this->id_resposta = $id_resposta;
		}

		        public function getId_pergunta()
        {return $this->id_pergunta;
		}
		        public function setId_pergunta($id_pergunta)
		{return $this->id_pergunta = $id_pergunta;
		}
		        public function getid_user()
		{return $this->id_user;
		}
		        public function setid_user($id_user)
		{return $this->id_user = $id_user;
		}

	}
 ?>