<?php 
include 'template/header.php'; 
include 'user_db_actions.php'
?>
<div class="container">
    <div id="printable">
        <h3>Cadastro de Usuário</h3>
        <table class="table col-md-6">
            <tr>
                <td>Código</td>
                <td> - </td>
                <td><strong><?php if (isset($_GET['view'])) echo $getROW['id_usuario']; ?></strong></td>
            <tr>
            <tr>
                <td>Nome do Usuário</td>
                <td> - </td>
                <td><strong><?php if (isset($_GET['view'])) echo $getROW['nome_usuario']; ?></strong></td>
            </tr>
            <tr>
                <td>Login</td>
                <td> - </td>
                <td><strong><?php if (isset($_GET['view'])) echo $getROW['login']; ?></strong></td>
            </tr>
            <tr>
                <td>Nível</td>
                <td> - </td>
                <td><strong><?php if (isset($_GET['view'])) if ($getROW['nivel']==1) echo "Administrador"; else echo "Operador" ?></strong></td>
            </tr>
            <tr>
                <td>Status</td>
                <td> - </td>
                <td><strong><?php if (isset($_GET['view'])) if ($getROW['status']==1) echo "Ativo"; else echo "Inativo" ?></strong></td>
            </tr>
        </table>
        <hr style="width: 100%; color: black; height: 1px; background-color:black;" />
        <p align="right">Gerado pelo Sistema Domínio Check em <?php echo date('d/m/Y') . " às " . date('H:i:s') ?></p>
    </div>
    <button class="btn btn-primary" type="submit" name="imprimir" onclick="print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Imprimir</button>
    <a class="btn btn-default" href="usuario.php" ><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</a>
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