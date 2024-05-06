<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// require 'caminho_para_sua_biblioteca/Exception.php';
// require 'caminho_para_sua_biblioteca/PHPMailer.php';
// require 'caminho_para_sua_biblioteca/SMTP.php';
require 'bibliotecaphp/src/Exception.php';
require 'bibliotecaphp/src/PHPMailer.php';
require 'bibliotecaphp/src/SMTP.php';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos foram preenchidos
    if (isset($_POST['nome']) && isset($_POST['whatsapp']) && isset($_POST['email'])) {
        $nome = $_POST['nome'];
        $whatsapp = $_POST['whatsapp'];
        $email = $_POST['email'];
        
        // Verifica se o tipo de ingresso foi enviado através de um campo oculto
        if(isset($_POST['tipo_ingresso'])) {
            $tipo_ingresso = $_POST['tipo_ingresso'];
        } else {
            $tipo_ingresso = "Tipo de ingresso não especificado.";
        }

        // Configurações de envio de e-mail
        $mail = new PHPMailer(true);

        try {
            //Configuração do servidor SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Insira o host do seu servidor SMTP
            $mail->SMTPAuth = true;
            $mail->Username = 'marcosvinicius.sep98@gmail.com'; // Insira seu e-mail SMTP
            $mail->Password = 'ozfmhxelmzfgvnxr'; // Insira a senha do seu e-mail SMTP  ptpf swco hsca lqlm
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Destinatários
            $mail->setFrom('marcosvinicius.sep98@gmail.com', 'Vinicius');
            $mail->addAddress('e.germiniani@gmail.com'); // Insira o primeiro e-mail de destino
            $mail->addAddress('mnbarros41@gmail.com'); // Insira o segundo e-mail de destino

            // Conteúdo do e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Novo pedido de ingresso';
            $mail->Body    = "Novo pedido de ingresso recebido:<br><br>
                            Nome: $nome <br>
                            WhatsApp: $whatsapp <br>
                            Email: $email <br>
                            Tipo de ingresso: $tipo_ingresso";

            $mail->send();
            
            // Redirecionamento após o envio do formulário
           // Adicione essas linhas após a definição da variável $tipo_ingresso
        
        echo "Tipo de ingresso: " . $tipo_ingresso; // Isso irá imprimir o tipo de ingresso para depuração
        
        // Redirecionamento após o envio do formulário
        if ($tipo_ingresso == 'start') {
            header('Location: https://payfast.greenn.com.br/58777');
            exit;
        } elseif ($tipo_ingresso == 'premium') {
            header('Location: https://payfast.greenn.com.br/58778');
            exit;
        } else {
            // Se o tipo de ingresso não for especificado, redireciona para uma página de erro
            header('Location: https://google.com');
            exit;
        }

            
            
            
        } catch (Exception $e) {
            echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Por favor, preencha todos os campos do formulário.';
    }
} else {
    echo 'O formulário não foi enviado.';
}
?>
