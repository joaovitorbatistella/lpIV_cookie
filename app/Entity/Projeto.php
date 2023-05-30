<?php

namespace App\Entity;
require_once 'app/Db/Database.php';
use \App\Db\Database;
use PDO;

	class Projeto 
	{
		public $id;
		public $titulo;
		public $descricao;
		public $ativo;
		public $data;
	
		public function cadastrar(){
			//definir a data
			$this->data = date('Y-m-d H:i:s');

			//inserir o projeto no banco de dados
			$objDatabase = new Database('projetos');			

			$this->id = $objDatabase->insert([
					'titulo' => $this->titulo,
					'descricao' => $this->descricao,
					'ativo' => $this->ativo,
					'data' => $this->data					
				]);
			
		}

		public function atualizar(){
			return (new Database('projetos'))->update('id = '.$this->id,[
					'titulo' => $this->titulo,
					'descricao' => $this->descricao,
					'ativo' => $this->ativo,
					'data' => $this->data
			]);
		}

		public function excluir(){
			return (new Database('projetos'))->delete('id = '.$this->id);
		}

		public static function getProjetos($where = null, $order = null, $limit = null){
			return (new Database('projetos'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS);
		}

		public static function getProjeto($id){
			return (new Database('projetos'))->select("id = ".$id)->fetchObject(self::class);
		}
		
	}
?>
