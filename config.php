<?php
include 'config_db_actions.php';
include 'template/header.php';
?>

<form method="post">
    <input type="hidden" value="view">
    <div class="form-group col-md-4">
        <label for="nome_empresa">Empresa Administradora</label>
        <input type="text" class="form-control" id="nome_empresa" name="nome_empresa" placeholder="Empresa Administradora" value="<?php if (isset($_GET['view'])) echo $getROW['nome_empresa']; ?>" disabled>
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-md-4">
        <label for="tempo_refresh">Tempo de Atualização</label>
        <input type="text" class="form-control" id="tempo_refresh" name="tempo_refresh" placeholder="Tempo de Atualização" value="<?php if (isset($_GET['view'])) echo $getROW['tempo_refresh']; ?>" disabled>
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-md-4">
        <label for="email_admin">E-mail do Administrador</label>
        <input type="text" class="form-control" id="email_admin" name="email_admin" placeholder="E-mail do Administrador" value="<?php if (isset($_GET['view'])) echo $getROW['email_admin']; ?>" disabled>
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-md-4"> 
        <a class="btn btn-primary" href="cad_config.php?edit=<?php echo $getROW['id_config']; ?>" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
    </div>
</form>

<?php include 'template/footer.php'; ?>