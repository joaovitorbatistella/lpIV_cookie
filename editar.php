<?php
    require_once 'app/Entity/Projeto.php';
    require_once 'app/Session/Login.php';
    
    use \App\Entity\Projeto;
    use \App\Session\Login;

    Login::requiredLogin();
    
    define('TITLE', 'Editar projeto');

    //validação da requisição
    if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
        header('location: index.php?status=error');
        exit;
    }

    //consulta o projeto
    $objProjeto = Projeto::getProjeto($_GET['id']);

    //validação do objeto Projeto
    if(!$objProjeto instanceof Projeto){
        header('location: index.php?status=error');
        exit;
    }

    //validação do post
    if( isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo']) ){
        $objProjeto->titulo = $_POST['titulo'];
        $objProjeto->descricao = $_POST['descricao'];
        $objProjeto->ativo =  $_POST['ativo'];

        $objProjeto->atualizar();
        
        header('location: index.php?status=success');
    }


    include 'includes/header.php';
    include 'includes/formulario.php';
    include 'includes/footer.php';   
    ob_end_flush(); 
?>
    