<?php 
include 'template/header.php'; 
include 'user_db_actions.php'
?>

<form method="post">
    <div class="form-group col-md-4">
        <label for="nomeUsuario">Nome do Usuário</label>
        <input type="text" required="required" class="form-control" id="nomeUsuario" name="nomeUsuario" placeholder="Nome do Usuario" value="<?php if (isset($_GET['edit'])) echo $getROW['nome_usuario']; ?>" >
   
        <label for="login">Login</label>
        <input type="text" required="required" class="form-control" id="login" name="login" placeholder="Login" value="<?php if (isset($_GET['edit'])) echo $getROW['login']; ?>">
   
        <label for="senha">Senha</label>
        <input type="password" required="required" class="form-control" id="senha" name="senha" placeholder="Senha" value="<?php if (isset($_GET['edit'])) echo $getROW['senha']; ?>" >
    </div>
     <div class="form-group col-md-4">
        <label for="nivel">Nível:</label>
        <select name="nivel">
            <option value="1">Administrador</option>
            <option value="2">Operador</option>
        </select>
    <!--    <input type="number" class="form-control" id="nivel" name="nivel" placeholder="Nível do Usuário" value="<?php if (isset($_GET['edit'])) echo $getROW['nivel']; ?>" -->
   
        <label for="status">Status:</label>
        <select name="status">
            <option value="1">Ativo</option>
            <option value="2">Inativo</option>
        </select>
    <!--    <input type="number" class="form-control" id="status" name="status" placeholder="Status do Usuário" value="<?php if (isset($_GET['edit'])) echo $getROW['status']; ?>" -->
    </div>
    <div class="clearfix"></div>
    <div class="form-group col-md-4">
        <?php
        if (isset($_GET['edit'])) {
            ?>
            <button class="btn btn-primary" type="submit" name="update" onclick="return confirm('Deseja salvar as alterações no registro!');"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Atualizar</button>
            <a class="btn btn-default" href="usuario.php" ><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</a>
            <?php
        } else {
            ?>
            <button class="btn btn-primary" type="submit" name="save"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar</button>
            <a class="btn btn-default" href="usuario.php" ><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Voltar</a>
            <?php
        }
        ?>
    </div>
</form>

<?php include 'template/footer.php'; ?>