<?php
include 'cli_db_actions.php';
include 'template/header.php';
?>

<div class="">
    <!-- Cadastrar novo usuário -->
    <a class="btn btn-primary" href="cad_usuario.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Cadastrar usuário</a>
    <br /><br />
    <div class="jumbotron">
        <form class="form-inline" method="post">
            <div class="form-group col-md-4">
                <label for="parametro">Pesquisar:</label>
                <input type="text" class="form-control" id="parametro" name="parametro" >
            </div>
            <button class="btn btn-primary" type="submit" name="pesquisar"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar</button>
        </form>
    </div>
    <div class="clearfix"></div>
    <table class="table table-hover table-striped" id="my_table">
        <thead>
            <tr>
                <td>Código</td>
                <td>Nome</td>
                <td>Login</td>
                <td>Nível</td>
                <td>Status</td>
                <td>Ações</td>
            </tr>
        </thead>
        <?php
        while ($row = $res->fetch_array()) {
            ?>
            <tbody>
                <tr>
                    <td><?php echo $row['id_usuario']; ?></td>
                    <td><?php echo $row['nome_usuario']; ?></td>
                    <td><?php echo $row['login']; ?></td>
                    <td><?php echo $row['nivel']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <a class="btn btn-default" href="view_usuario.php?view=<?php echo $row['id_usuario']; ?>" ><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Visualizar</a>
                        <a class="btn btn-primary" href="cad_usuario.php?edit=<?php echo $row['id_usuario']; ?>" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                        <a class="btn btn-danger" href="?del=<?php echo $row['id_usuario']; ?>" onclick="return confirm('Tem certeza que deseja excluir esse registro?');" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</a>
                    </td>
                </tr>
            </tbody>
<?php } ?>
    </table>

</div>
<?php include 'template/footer.php'; ?>