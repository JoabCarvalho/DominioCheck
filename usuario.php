<?php
include 'user_db_actions.php';
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
    <div id="printable">
    <div class="clearfix"></div>
    <table class="table table-hover table-striped" id="my_table">
        <thead>
            <tr>
                <td><strong>Código</strong></td>
                <td><strong>Nome</strong></td>
                <td><strong>Login</strong></td>
                <td><strong>Nível</strong></td>
                <td><strong>Status</strong></td>
                <td><strong>Ações</strong></td>
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
                    <td><?php if($row['nivel'] == 1) {echo "Administrador";} else echo "Operador" ?></td>
                    <td><?php if($row['status'] == 1) {echo "Ativo";} else echo "Inativo" ?></td>
    </div>          <td>
    
                        <a class="btn btn-default" href="view_usuario.php?view=<?php echo $row['id_usuario']; ?>" ><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Visualizar</a>
                        <a class="btn btn-primary" href="cad_usuario.php?edit=<?php echo $row['id_usuario']; ?>" ><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                        <a class="btn btn-danger" href="?del=<?php echo $row['id_usuario']; ?>" onclick="return confirm('Tem certeza que deseja excluir esse registro?');" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir</a>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>
 <button class="btn btn-primary" type="submit" name="imprimir" onclick="print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir</button>
<script>
        function print() {
            var conteudo = document.getElementById('printable').innerHTML;
            tela_impressao = window.open('about:blank');
            tela_impressao.document.write(conteudo);
            tela_impressao.window.print();
            tela_impressao.window.close();
        }
</script>
<?php include 'template/footer.php'; ?>