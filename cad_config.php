<?php
include 'config_db_actions.php';
include 'template/header.php';
?>

<form method="post">
    <input type="hidden" value="view">
    <div class="form-group col-md-4">
        <label for="nome_empresa">Empresa Administradora</label>
        <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" placeholder="Empresa Administradora" value="<?php if (isset($_GET['edit'])) echo $getROW['nome_empresa']; ?>" >
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-md-4">
        <label for="tempo_refresh">Tempo de Atualização</label>
        <input type="text" class="form-control" id="tempo_refresh" name="tempo_refresh" placeholder="Tempo de Atualização" value="<?php if (isset($_GET['edit'])) echo $getROW['tempo_refresh']; ?>">
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-md-4">
        <label for="email_admin">E-mail do Administrador</label>
        <input type="text" class="form-control" id="email_admin" name="email_admin" placeholder="E-mail do Administrador" value="<?php if (isset($_GET['edit'])) echo $getROW['email_admin']; ?>">
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-md-4">
        <button class="btn btn-primary" type="submit" name="update" onclick="return confirm('Deseja salvar as alterações no registro!');"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Atualizar</button>
        <a class="btn btn-default" href="config.php?view=1" ><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</a>
    </div>
</form>

<?php include 'template/footer.php'; ?>