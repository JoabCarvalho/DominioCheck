<?php
include 'log_db_actions.php';
include 'template/header.php';
?>

<div class="">
    <div class="jumbotron">
        <form class="form-inline" method="post">
            <div class="form-group col-md-3">
                <label for="dt_inicial">Data inicial:</label>
                <input type="text" class="form-control" id="dt_inicial" name="dt_inicial" >
            </div>
            <div class="form-group col-md-3">
                <label for="dt_final">Data final:</label>
                <input type="text" class="form-control" id="dt_final" name="dt_final" >
            </div>
            <div class="form-group col-md-4">
                <label for="parametro">Pesquisar:</label>
                <input type="text" class="form-control" id="parametro" name="parametro" >
            </div>
            <button class="btn btn-primary" type="submit" name="pesquisar"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Pesquisar</button>
        </form>
    </div>
    <div class="clearfix"></div>
    <div>
        <table class="table table-hover table-striped" id="my_table">
            <thead>
                <tr>
                    <td>Domínio</td>
                    <td>Cliente</td>
                    <td>Código - Erro</td>
                    <td>Data/Hora</td>                   
                </tr>
            </thead>
            <?php
            while ($row = $res->fetch_array()) {
                ?>
                <tbody>
                    <tr>
                        <td><?php echo $row['nome_dominio']; ?></td>
                        <td><?php echo $row['cliente']; ?></td>
                        <td><?php echo $row['erro']; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($row['data_hora'])) . " às " . date('H:i:s', strtotime($row['data_hora'])); ?></td>
                    </tr>
                </tbody>
    <?php
}
?>
        </table>
    </div>
</div>
<?php include 'template/footer.php'; ?>