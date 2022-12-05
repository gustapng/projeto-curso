<?php

    function returnRulesSanitize() {
        return ['name' => FILTER_UNSAFE_RAW
        , 'email' => FILTER_UNSAFE_RAW
        , 'password' => FILTER_UNSAFE_RAW
        ];
    }

    //Create a new user in data base
    function create($pdo, $data) {
        $sql = "insert into users(
            name,
            email,
            password,
            created_at,
            updated_at)
        values (
            :name,
            :email,
            :password,
            now(),
            now())";

        $create = $pdo->prepare($sql);
        $create->bindValue(":name", $data['name'], PDO::PARAM_STR);
        $create->bindValue("email", $data['email'], PDO::PARAM_STR);
        $create->bindValue("password", sha1($data['password'] . APP_KEY));

        return $create->execute();
    };

    //Get all users from data base
    function getAll($pdo) {
        $sql = "select * from users ORDER BY id DESC";
        
        // 

        $get = $pdo->prepare($sql);
        $get->execute();

        return $get->fetchAll(PDO::FETCH_ASSOC);
    }

    //Get user from id
    function get($pdo, $id) {
        $sql = "select id, name, email from users where id = :id";
        $get = $pdo->prepare($sql);
        $get->bindValue("id", $id, PDO::PARAM_INT);
        $get->execute();

        if(!$users = $get->fetch(PDO::FETCH_ASSOC)) {
            return false;
        }

        return $users;
    }

    function getUserByEmail($pdo, $email) {
        $sql = "select id, name, email from users where email = :email";
        $get = $pdo->prepare($sql);
        $get->bindValue("email", $email, PDO::PARAM_STR);
        $get->execute();

        return $get->rowCount();
    }

    //Update name and email with the id
    function update($pdo, $data) {
        $sql = "update users set";

        $sqlSet = '';

        if(isset($data['name']) && $data['name']) {
            $sqlSet .= " name = :name";
        }

        if(isset($data['email']) && $data['email']) {
            $sqlSet .= $sqlSet ? ", email = :email" : " email = :email";
        }

        if(isset($data['password']) && $data['password']) {
            $sqlSet .= $sqlSet ? ", password = :password" : " password = :password";
        }

        $sql = $sqlSet ? $sql . $sqlSet .= ' where id = :id' : $sql;

        $update = $pdo->prepare($sql);

        if(isset($data['name']) && $data['name']) {
            $update->bindValue(":name", $data['name'], PDO::PARAM_STR);
        }

        if(isset($data['email']) && $data['email']) {
            $update->bindValue(":email", $data['email'], PDO::PARAM_STR);
        }

        if(isset($data['password']) && $data['password']) {
            $update->bindValue(":password", sha1($data['password'] . APP_KEY), PDO::PARAM_STR);
        }

        $update->bindValue("id", $data['id'], PDO::PARAM_INT);

        return $update->execute();
    }

    //Delete the user from db
    function delete($pdo, $id) {
        $sql = "delete from users where id = :id";
        $delete = $pdo->prepare($sql);
        $delete->bindValue(":id", $id, PDO::PARAM_INT);

        return $delete->execute();
    }
    

?>