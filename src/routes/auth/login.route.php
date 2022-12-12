<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = $_POST;

        $user = login($data, connection());

        sessionStart();

        $_SESSION['user'] = $user;

        header("Location: " . HOME . '/admin/dashboard');
    }

    sessionStart();

    if(isset($_SESSION['user'])) {
        header("Location: " . HOME . '/admin/dashboard');
    }
    
    require VIEWS . '/' . $page[0] . '/login.phtml';

?> 