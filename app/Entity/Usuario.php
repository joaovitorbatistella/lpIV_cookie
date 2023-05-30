<?php
    namespace App\Entity;

    require_once 'app/Db/Database.php';

    use \App\Db\Database;
    use PDO;

    class Usuario{
        public $id;
        public $nome;
        public $email;
        public $senha;

        public function cadastrar(){
            $objDatabase = new Database('usuarios');

            $this->id = $objDatabase->insert([
                'nome' => $this->nome,
                'email' => $this->email,
                'senha' => $this->senha,
            ]);
            return true;        
        }

        public static function getUsuarioPorEmail($email){
            return (new Database('usuarios'))->select('email = "'.$email.'"')->fetchObject(self::class);
        }
        
    }
?>