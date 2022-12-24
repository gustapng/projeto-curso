<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = $_POST;
        sessionStart();

        $user = login($data, connection());

        if(!$user) {
            addFlash('error', 'Usuário ou senha incorretos!');

            header("Location: " . HOME . '/auth/login');
            return;
        } else {
            sessionStart();

            $_SESSION['user'] = $user;
    
            header("Location: " . HOME . '/admin/dashboard');
        }
    }

    sessionStart();

    if(isset($_SESSION['user'])) {
        header("Location: " . HOME . '/admin/dashboard');
    }

    require VIEWS . '/' . $page[0] . '/login.phtml';

?> 