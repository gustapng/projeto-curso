<?php

function getAllHelp($pdo, $slug) {
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
        where
            c.slug = :slug
        ORDER BY id DESC";

    $get = $pdo->prepare($sql);
    $get->bindValue(':slug', $slug);

    $get->execute();

    return $get->fetchAll(PDO::FETCH_ASSOC);
}

?>