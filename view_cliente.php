<?php include 'template/header.php'; ?>
<div class="container">
    <div id="printable">
        <h3>Cadastro de Domínio</h3>
        <table class="table col-md-6">
            <tr>
                <td>Código</td>
                <td> - </td>
                <td><strong><?php if (isset($_GET['view'])) echo $getROW['id_dominio']; ?></strong></td>
            <tr>
            <tr>
                <td>Link</td>
                <td> - </td>
                <td><strong><?php if (isset($_GET['view'])) echo $getROW['link']; ?></strong></td>
            </tr>
            <tr>
                <td>Cliente</td>
                <td> - </td>
                <td><strong><?php if (isset($_GET['view'])) echo $getROW['cliente']; ?></strong></td>
            </tr>
        </table>
        <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
        <p align="right">Gerado pelo Sistema Domínio Check em <?php echo date('d/m/Y') . " às " . date('H:i:s') ?></p>
    </div>
    <button class="btn btn-primary" type="submit" name="imprimir" onclick="print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir</button>
    <a class="btn btn-default" href="dominio.php" ><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</a>
</div>
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