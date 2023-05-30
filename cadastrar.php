<?php
    require_once 'app/Entity/Projeto.php';
    use \App\Entity\Projeto;

    define('TITLE', 'Cadastrar projeto');

    $objProjeto = new Projeto();

    //validação do post
    if( isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo']) ){
        $objProjeto->titulo = $_POST['titulo'];
        $objProjeto->descricao = $_POST['descricao'];
        $objProjeto->ativo =  $_POST['ativo'];

        $objProjeto->cadastrar();
        
        header('location: index.php?status=success');
    }


    include 'includes/header.php';
    include 'includes/formulario.php';
    include 'includes/footer.php';    
?>
    