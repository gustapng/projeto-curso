<?php

    function returnRulesSanitize() {
        return ['name' => FILTER_UNSAFE_RAW
        , 'email' => FILTER_UNSAFE_RAW
        , 'password' => FILTER_UNSAFE_RAW
        , 'id' => FILTER_UNSAFE_RAW
        ];
    }

    //Create a new user in data base
    function create($pdo, $data) {
        $sql = "insert into products(
            name,
            slug,
            price,
            amount,
            description,
            category_id,
            created_at,
            updated_at)
        values (
            :name,
            :slug,
            :price,
            :amount,
            :description,
            :category_id,
            now(),
            now())";

        $create = $pdo->prepare($sql);
        $create->bindValue(":name", $data['name'], PDO::PARAM_STR);
        $create->bindValue(":slug", $data['slug'], PDO::PARAM_STR);
        $create->bindValue(":price", $data['price'], PDO::PARAM_STR);
        $create->bindValue(":amount", $data['amount'], PDO::PARAM_INT);
        $create->bindValue(":description", $data['description'], PDO::PARAM_STR);
        $create->bindValue(":category_id", $data['category_id'], PDO::PARAM_INT);

        $create->execute();

        return $pdo->lastInsertId();
    };

    //Get all products   from data base
    function getAll($pdo) {
        $sql = "select p.*,
            c.name as category,
            (select pi.image from products_images pi where p.id = pi.product_id limit 1) as
                image
            from 
                products p 
            left join
                categories c
            on
                p.category_id = c.id
            ORDER BY id DESC";
        
        // 

        $get = $pdo->prepare($sql);
        $get->execute();

        return $get->fetchAll(PDO::FETCH_ASSOC);
    }

    //Get user from id
    function get($pdo, $id) {
        $sql = "select
                    p.id, p.name, p.category_id, p.price, p.amount, p.description, p.slug, pi.id as image_id, pi.image
                from products p
                left join
                    products_images pi
                on
                    pi.product_id = p.id
                where p.id = :id";

        $get = $pdo->prepare($sql);
        $get->bindValue("id", $id, PDO::PARAM_INT);
        $get->execute();

        if(!$products = $get->fetchAll(PDO::FETCH_ASSOC)) {
            return false;
        }

        $return = [];

        foreach($products as $p) {
            $return['id'] = $p['id'];
            $return['name'] = $p['name'];
            $return['category_id'] = $p['category_id'];
            $return['price'] = $p['price'];
            $return['amount'] = $p['amount'];
            $return['description'] = $p['description'];
            $return['slug'] = $p['slug'];

            if($p['image'] && $p['image_id']) {
                $return['images'][] = array('id' => $p['image_id'], 'image' => $p['image']); 
            }
        }       

        return $return;
    }

    function getProductBySlug($pdo, $slug) {
        $sql = "select id, name, price, description, slug, amount from products where slug = :slug";
        $get = $pdo->prepare($sql);
        $get->bindValue("slug", $slug, PDO::PARAM_STR);
        $get->execute();

        return $get->rowCount();
    }

    //Update name and email with the id
    function update($pdo, $data) {
        $sql = "update products set";

        $sqlSet = '';

        if(isset($data['category_id']) && $data['category_id']) {
            $sqlSet .= " category_id = :category_id";
        }

        if(isset($data['name']) && $data['name']) {
            $sqlSet .= $sqlSet ? ", name = :name" : " name = :name";
        }

        if(isset($data['slug']) && $data['slug']) {
            $sqlSet .= $sqlSet ? ", slug = :slug" : " slug = :slug";
        }

        if(isset($data['price']) && $data['price']) {
            $sqlSet .= $sqlSet ? ", price = :price" : " price = :price";
        }

        if(isset($data['amount']) && $data['amount']) {
            $sqlSet .= $sqlSet ? ", amount = :amount" : " amount = :amount";
        }

        if(isset($data['description']) && $data['description']) {
            $sqlSet .= $sqlSet ? ", description = :description" : " description = :description";
        }

        $sql = $sqlSet ? $sql . $sqlSet .= ' where id = :id' : $sql;

        $update = $pdo->prepare($sql);

        if(isset($data['category_id']) && $data['category_id']) {
            $update->bindValue(":category_id", $data['category_id'], PDO::PARAM_STR);
        }

        if(isset($data['name']) && $data['name']) {
            $update->bindValue(":name", $data['name'], PDO::PARAM_STR);
        }

        if(isset($data['slug']) && $data['slug']) {
            $update->bindValue(":slug", $data['slug'], PDO::PARAM_STR);
        }

        if(isset($data['price']) && $data['price']) {
            $update->bindValue(":price", $data['price'], PDO::PARAM_STR);
        }

        if(isset($data['amount']) && $data['amount']) {
            $update->bindValue(":amount", $data['amount'], PDO::PARAM_STR);
        }

        if(isset($data['description']) && $data['description']) {
            $update->bindValue(":description", $data['description'], PDO::PARAM_STR);
        }

        //echo $sql;exit;

        $update->bindValue("id", $data['id'], PDO::PARAM_INT);

        return $update->execute();
    }

    //Delete the user from db
    function delete($pdo, $id) {
        $sql = "delete from products where id = :id";
        $delete = $pdo->prepare($sql);
        $delete->bindValue(":id", $id, PDO::PARAM_INT);

        return $delete->execute();
    }
    

?>