<main>
    <h2 class="mt-3">Excluir projeto</h2>

    <form method="POST">
        <div class="form-group">
            <p>Deseja excluir o projeto <strong><?=$objProjeto->titulo?></strong>?</p>
        </div>
        <div class="form-group">
            <a href="index.php" class="btn btn-success">Cancelar</a>
            <button type="submit" name="excluir" class="btn btn-danger">Excluir</button>
        </div>
    </form>
</main>