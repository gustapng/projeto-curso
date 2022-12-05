<?php

    function saveImages($data, $pdo) {
        $sql = "insert into products_images(
            product_id, 
            image, 
            created_at,     
            updated_at)
        VALUES (
            :product_id, 
            :image,
            now(),
            now()
        )";

        $create = $pdo->prepare($sql);
        $create->bindValue(":image", $data['image'], PDO::PARAM_INT);   
        $create->bindValue(":product_id", $data['product_id'], PDO::PARAM_INT);

        return $create->execute();
    }

    function getImage($id, $pdo) {
        $sql = "select id, image from products_images where id = :id";

        $select = $pdo->prepare($sql);
        $select->bindValue(':id', $id, PDO::PARAM_INT);
        $select->execute();

        return $select->fetch(PDO::FETCH_ASSOC);
    }

    function deleteImage($data, $pdo) {
        $sql = "delete from products_images where id = :id and product_id = :product_id";

        $delete = $pdo->prepare($sql);
        $delete->bindValue(":id", $data['image_id'], PDO::PARAM_INT);   
        $delete->bindValue(":product_id", $data['product_id'], PDO::PARAM_INT);

       return $delete->execute(); 
    }

?>  