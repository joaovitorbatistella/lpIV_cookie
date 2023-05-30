<?php
    $alertaLogin = strlen($alertaLogin) ? 
                   '<div class="alert alert-danger">'.$alertaLogin.'</div>' :
                   '';
    $alertaCadastro = strlen($alertaCadastro) ? 
                   '<div class="alert alert-danger">'.$alertaCadastro.'</div>' :
                   '';

?>

<div class="p-3 bg-light text-dark rounded">
<div class="row">
    <div class="col-6">    
        <form method="post">
            <h2>Login</h2>
            <?=$alertaLogin?>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="acao" value="logar" class="btn btn-primary">Entrar</button>
            </div>
        </form>
    </div>
    <div class="col-6">
        <form method="POST">
            <h2>Cadastrar-se</h2>
            <?=$alertaCadastro?>
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" name="acao" value="cadastrar" class="btn btn-primary">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
</div>