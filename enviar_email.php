<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $servico = htmlspecialchars($_POST["servico"]);
    $detalhes = htmlspecialchars($_POST["detalhes"]);

    $destinatario = "sosresolverr@gmail.com"; // 🔹 Seu e-mail
    $assunto = "Novo Pedido de Orçamento";
    
    $mensagem = "
        <html>
        <head>
            <title>Solicitação de Orçamento</title>
        </head>
        <body>
            <h2>Detalhes do Pedido de Orçamento</h2>
            <p><strong>Nome:</strong> $nome</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Telefone:</strong> $telefone</p>
            <p><strong>Tipo de Serviço:</strong> $servico</p>
            <p><strong>Detalhes do Serviço:</strong> $detalhes</p>
        </body>
        </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n"; // Remetente do formulário

    if (mail($destinatario, $assunto, $mensagem, $headers)) {
        echo "Orçamento enviado com sucesso!";
    } else {
        echo "Erro ao enviar o orçamento. Tente novamente.";
    }
} else {
    echo "Método inválido.";
}
?>
