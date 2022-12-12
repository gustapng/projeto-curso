<?php

    function login($data, $pdo) {
        $sql = "select email, password from users where email = :email and password = :password"; 

        $login = $pdo->prepare($sql);
        $login->bindValue(':email', $data['email'], PDO::PARAM_STR);
        $login->bindValue(':password', sha1($data['password'] . APP_KEY), PDO::PARAM_STR);
        $login->execute();

        return $login->fetch(PDO::FETCH_ASSOC);
    }

?>