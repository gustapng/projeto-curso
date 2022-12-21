<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $email = $_POST['email'];
    if(!setNewToken($email, connection())){
        addFlash('error', 'Erro ao processar lembrete de nova senha, por favor verifique o e-mail digitado!');
        return header('Location: ' . HOME . '/auth/relembrar-senha');
    }

    addFlash('success', 'Token enviado, confira seu e-mail');
    return header('Location: ' . HOME . '/auth/login');
}

require VIEWS . '/' . $page[0] . '/email.phtml';

?> 