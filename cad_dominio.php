 <?php
include 'dom_db_actions.php';
include 'template/header.php';
?>

<form method="post">
    <div class="form-group col-md-4">
        <label for="dominio">Link do domínio</label>
        <input type="text" required="required" class="form-control" id="dominio" name="link" placeholder="Domínio" value="<?php if (isset($_GET['edit'])) echo $getROW['link']; ?>" >
   
        <label for="cliente">Cliente</label>
        <input type="text" required="required" class="form-control" id="cliente" name="cliente" placeholder="Cliente" value="<?php if (isset($_GET['edit'])) echo $getROW['cliente']; ?>">
    </div>
    <div class="form-group col-md-4">
    <label for="nivel">Situação:</label>
        <select name="situacao">
            <option value="1">Ativo</option>
            <option value="2">Inativo</option>
        </select>
     </div>
        <!-- <input type="text" class="form-control" id="status" name="status" placeholder="Situação" value="<?php if (isset($_GET['edit'])) echo $getROW['status']; ?>"> -->
   
    <div class="clearfix"></div>
    <div class="form-group col-md-4">
        <?php
        if (isset($_GET['edit'])) {
            ?>
            <button class="btn btn-primary" type="submit" name="update" onclick="return confirm('Deseja salvar as alterações no registro!');"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Atualizar</button>
            <a class="btn btn-default" href="dominio.php" ><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</a>
            <?php
        } else {
            ?>
            <button class="btn btn-primary" type="submit" name="save"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true" ></span> Salvar</button>
            <a class="btn btn-default" href="dominio.php" ><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</a>
            <?php
        }
        ?>
    </div>
</form>

<?php include 'template/footer.php'; ?>