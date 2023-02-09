<?php include 'template/header.php'; ?>

<?php

// Arquivo de configuração do banco de dados
include_once 'db_config.php';

$sql = "SELECT * FROM dominio WHERE status=1";
$result = mysqli_query($MySQLiconn, $sql);

//echo "<div class='container'>";

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

    $id_dominio = $row["id_dominio"];
    $link = $row["link"];
    $cliente = $row["cliente"];

    //inicia a função curl
    $ch = curl_init();

    //passe como último argumento a url que será acessada no nosso caso como é um looping pegamos a url corrente passando a variável $dado

    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($ch);
    $resposta = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $erro = $resposta;
    
    if ($erro == "0") {
        $erro = "0 - Domínio inexistente";
    } elseif ($erro == "401") {
        $erro = "401 - Acesso não autorizado";
    } elseif ($erro == "402") {
        $erro = "402 - Pagamento necessário";
    } elseif ($erro == "403") {
        $erro = "403 - Acesso proibido";
    } elseif ($erro == "404") {
        $erro = "404 - Não encontrado";
    } elseif ($erro == "405") {
        $erro = "405 - Método não permitido";
    } elseif ($erro == "406") {
        $erro = "406 - Não Aceitável";
    } elseif ($erro == "407") {
        $erro = "407 - Autenticação de proxy necessária";
    } elseif ($erro == "408") {
        $erro = "408 - Tempo de requisição esgotou";
    } elseif ($erro == "409") {
        $erro = "409 - Conflito";
    } elseif ($erro == "410") {
        $erro = "410 - Finalizado";
    } elseif ($erro == "411") {
        $erro = "411 - Comprimento necessário";
    } elseif ($erro == "412") {
        $erro = "412 - Pré-condição falhou";
    } elseif ($erro == "413") {
        $erro = "413 - Entidade de solicitação muito grande";
    } elseif ($erro == "414") {
        $erro = "414 - Pedido-URI muito longo";
    } elseif ($erro == "415") {
        $erro = "415 - Tipo de mídia não suportado";
    } elseif ($erro == "500") {
        $erro = "500 - Erro interno do servidor";
    } elseif ($erro == "501") {
        $erro = "501 - Não implementado";
    } elseif ($erro == "502") {
        $erro = "502 - Bad Gateway";
    } elseif ($erro == "503") {
        $erro = "503 - Serviço indisponível";
    } elseif ($erro == "504") {
        $erro = "504 - Gateway Time-Out";
    } elseif ($erro == "505") {
        $erro = "505 - Versão do HTTP não suportada";
    }
    
    $erros = array("0","401","402","403","404","405","406","407","408","409","410","411","412","413","414","415","500","501","502","503","504","505");
    
    $codigo = array_search($resposta, $erros);

    if (in_array($resposta, $erros)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo '<p>O domínio <strong>' . $link . '</strong> pertencente a empresa <strong>' . $cliente . '</strong> está <strong>off-line!</strong></p>';
        echo '<p>O site retornou o código de Erro: <strong>' . $erro . '</strong></p>';
        $data = date("d/m/Y");
        $hora = date("H:i:s");
        // O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
        // O return-path deve ser o mesmo e-mail do remetente.
        $emailremetente = "carvalho.morais.sales@gmail.com";
        $assunto = "Falha no dominio: " . $link;
        $msn = '<p>O dominio ' . $link . ' pertencente a empresa ' . $cliente . ' apresentou o erro: ' . $erro . '</p>';
        $msn .= '<p>O evento ocorreu em: ' . $data . ' as ' . $hora . ' horas.' . '</p>';
        $headers = "MIME-Version: 1.1\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "From: carvalho.morais.sales@gmail.com\r\n"; // remetente
        $headers .= "Return-Path: carvalho.morais.sales@gmail.com\r\n"; // return-path
        $envio = mail($emailremetente, $assunto, $msn, $headers);

        if ($envio) {
            echo '<p>Uma mensagem com o código do erro foi enviada ao Administrador!</p>';
        } else {
            echo "A mensagem não pode ser enviada! Verifique o erro e tente novamente.";
        }

        $dominio = $link;
        $tipo_erro = $erro;
        $data_hora = date('Y-m-d H:i:s');

        $SQL = $MySQLiconn->query("INSERT INTO log (nome_dominio,cliente,erro,data_hora) VALUES ('" . $dominio . "', '" . $cliente . "', '" . $tipo_erro . "', '" . $data_hora . "')");

        if (!$SQL) {
            echo '<p><strong>Não foi possível inserir o registro no log, tente novamente.</strong></p>';
            // Exibe dados sobre o erro:
            echo 'Dados sobre o erro: ' . $MySQLiconn->error . '</p>';
        } else {
            echo '<p><strong>O erro foi registrado no log com sucesso!</strong></p>';
        }
        echo "</div>";
    } else {
        
    }

    curl_close($ch);
}

if ($codigo == false) {
    echo "<div class='alert alert-success' role='alert'>";
    echo 'Todos os domínios estão on-line!';
    echo "</div>";
}



//Efetua refresh da página no tempo determinado
echo "<meta http-equiv='refresh' content='300'>";

//echo "</div>";
// Free result set
mysqli_free_result($result);

mysqli_close($MySQLiconn);
?>

<?php include 'template/footer.php'; ?>