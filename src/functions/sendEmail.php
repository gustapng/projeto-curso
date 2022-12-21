<?php


//require HOME . "/vendor/autoload.php";

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    function sendEmail($data) {

        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                          //Send using SMTP
        $mail->Host       = SMTP_HOST;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                 //Enable SMTP authentication
        // O seu e-mail que enviará a mensagem
        $mail->Username   = SMTP_USER;      //SMTP username
        // A senha para aplicativos externos, para usar o SMTP
        $mail->Password   = SMTP_PASSWORD;                   //SMTP password
        $mail->SMTPSecure = SMTP_ENCRYPTION;            //Enable implicit TLS encryption
        $mail->Port       = 587;              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Email e nome do remetente
        $mail->setFrom(SMTP_FROM, SMTP_USER_FROM);
        // Email do destinatário
        $mail->addAddress($data['email'], $data['name']);     //Add a recipient
        $mail->CharSet = 'UTF-8';

        //Contéudo
        $mail->isHTML(true);                             //Set email format to HTML
        $mail->Subject = 'Recuperação de senha';

        $home = HOME;

        // $msg = 
        //     'Olá ' . $data['name'] . ', tudo bem? <br>
        //     Para alterar sua senha  <a href=' . HOME . '/atualizar-senha/' . $data['token'] . '> clique aqui </a>
        //     <hr>
        //     Email enviado na data ' . ('d/m/Y H:i:s')
        // ;

        $msg = 
            "Olá {$data['name']}, tudo bem? <br>
            Para alterar sua senha <a href=" . $home . '/auth/atualizar-senha/' . $data['token'] . "> clique aqui </a>
            <hr>
            Email enviado na data('d/m/Y H:i:s')"
        ;

        $mail->Body    = $msg;

        return $mail->send();
            
    }
    

?>