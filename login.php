<?php
    require_once 'app/Entity/Usuario.php';
    require_once 'app/Session/Login.php';

    use \App\Entity\Usuario;
    use \App\Session\Login;

    Login::requiredLogout();

    $alertaLogin = '';
    $alertaCadastro = '';

    //validar o post
    if(isset($_POST['acao'])){
        switch($_POST['acao']){
            case 'logar':
                //busca o usuário por email
                $objUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

                //valida a instância e senha
                if(!$objUsuario instanceof Usuario || !password_verify($_POST['senha'], $objUsuario->senha)){
                    $alertaLogin = 'Email ou senha incorretos.';
                    break;
                }
                //realizar o login
                Login::login($objUsuario);
                break;

            case 'cadastrar':
                //validar os campos
                if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])){
                    //busca o usuário por email
                    $objUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

                    //valida a instância
                    if($objUsuario instanceof Usuario){
                        //temporário
                        $alertaCadastro =  'Email informado já em uso'; 
                        break;
                    }
                    $objUsuario = new Usuario;
                    $objUsuario->nome = $_POST['nome'];
                    $objUsuario->email = $_POST['email'];
                    $objUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                    
                    $objUsuario->cadastrar();

                    //realizar o login
                    Login::login($objUsuario);

                    //print_r($objUsuario); exit;
                }
                
        }
    }

    include 'includes/header.php';
    include 'includes/formulario-login.php';
    include 'includes/footer.php';  
?>