<?php

    //Create a new user in data base
    function createCategory($pdo, $data) {
        $sql = "insert into categories(
            name,
            description,        
            created_at,
            updated_at)
        values (
            :name,
            :description,
            now(),
            now())";

        $create = $pdo->prepare($sql);
        $create->bindValue(":name", $data['name'], PDO::PARAM_STR);
        $create->bindValue(":description", $data['description'], PDO::PARAM_STR);

        return $create->execute();
    };

    //Get all users from data base
    function getAllCategories($pdo) {
        $sql = "select * from categories";

        $get = $pdo->prepare($sql);
        $get->execute();

        return $get->fetchAll(PDO::FETCH_ASSOC);
    }

    //Get category from id
    function getCategory($pdo, $id) {
        $sql = "select id, name, description from categories where id = :id";
        $get = $pdo->prepare($sql);
        $get->bindValue("id", $id, PDO::PARAM_INT);
        $get->execute();

        if(!$users = $get->fetch(PDO::FETCH_ASSOC)) {
            return false;
        }

        return $users;
    }

    //Update name and email with the id
    function updateCategory($pdo, $data) {
        $sql = "update categories set";

        $sqlSet = '';

        if(isset($data['name']) && $data['name']) {
            $sqlSet .= " name = :name";
        }

        if(isset($data['description']) && $data['description']) {
            $sqlSet .= $sqlSet ? ", description = :description" : " description = :description";
        }

        $sql = $sqlSet ? $sql . $sqlSet .= ' where id = :id' : $sql;

        $update = $pdo->prepare($sql);

        if(isset($data['name']) && $data['name']) {
            $update->bindValue(":name", $data['name'], PDO::PARAM_STR);
        }

        if(isset($data['description']) && $data['description']) {
            $update->bindValue(":description", $data['description'], PDO::PARAM_STR);
        }

        $update->bindValue("id", $data['id'], PDO::PARAM_INT);

        return $update->execute();
    }

    //Delete the user from db
    function deleteCategory($pdo, $id) {
        $sql = "delete from categories where id = :id";
        $delete = $pdo->prepare($sql);
        $delete->bindValue(":id", $id, PDO::PARAM_INT);

        return $delete->execute();
    }

?>