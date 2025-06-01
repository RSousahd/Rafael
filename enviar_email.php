<?php
// Configuração do destinatário
$destinatario = "sosresolverr@gmail.com";

// Verifica se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Protege e valida os dados
    $nome = htmlspecialchars(trim($_POST["nome"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars(trim($_POST["mensagem"]));

    // Valida os campos obrigatórios
    if (empty($nome) || empty($email) || empty($mensagem)) {
        die("Por favor, preencha todos os campos obrigatórios.");
    }

    // Monta o corpo do e-mail
    $assunto = "Nova mensagem de parceria do site";
    $corpo = "Nome: $nome\n";
    $corpo .= "Email: $email\n\n";
    $corpo .= "Mensagem:\n$mensagem";

    // Cabeçalhos para garantir envio correto
    $headers = "From: $nome <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Envia o e-mail
    if (mail($destinatario, $assunto, $corpo, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem. Tente novamente.";
    }
} else {
    echo "Acesso inválido.";
}
?>
