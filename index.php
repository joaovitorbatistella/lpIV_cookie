<?php
    require_once 'app/Entity/Projeto.php';
    require_once 'app/Session/Login.php';
    
    use \App\Entity\Projeto;
    use \App\Session\Login;

    Login::requiredLogin();

    $projetos = Projeto::getProjetos();
    //print_r($projetos); exit;

    include 'includes/header.php';
    include 'includes/listagem.php';   
    include 'includes/footer.php';    
?>
    