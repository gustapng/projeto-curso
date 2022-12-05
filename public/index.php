<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

chdir(dirname(__DIR__));

require 'src/config.php';
require 'src/functions/connection.php';
require 'src/functions/validator.php';
require 'src/functions/sanitizer.php';

$page = isset($_GET['url']) ? $_GET['url'] : 'home';

// if(!file_exists($page = VIEWS . '/' . $page . '.phtml')) {
//     require VIEWS . '/404.phtml';
//     die;
// }

$page = explode('/', $page);

if($page[0] == 'users') {
    require 'src/functions/users.php';

    if($page[1] == 'list') {
        $users = getAll(connection());

        require VIEWS . '/users/index.phtml';
    }

    if($page[1] == 'edit') {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $data = $_POST;

            $data = sanitizerString($data, returnRulesSanitize()); 

            if(!validateEmail($data['email'])) {
                $msg = 'Email inválido!';
                return Header("Location: " . HOME . '/?url=users/edit&id=' . $data['id'] . '&msg=' . $msg);
            }

            if(!validateLengthPassword($data['password'])) {
                $msg = 'Senha deve ter pelo menos 6 caracteres!';
                return Header("Location: " . HOME . '/?url=users/edit&id=' . $data['id'] . '&msg=' . $msg);
            }
            
            if(!update(connection(), $data)) {  
                $msg = 'Erro ao atualizar usuário';
                Header("Location: " . HOME . '/?url=users/list&msg=' . $msg);
            }
            
            $msg = 'Usuário atualizado com sucesso!';
            Header("Location: " . HOME . '/?url=users/list&msg=' . $msg);

        }

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $user = get(connection(), $_GET['id']);

            if(!$user) {
                $msg = 'Usuário não existe!';
                Header("Location: " . HOME . '/?url=users/list&msg=' . $msg);
            }

            require VIEWS . '/users/edit.phtml';
        }
        
    }   

    if($page[1] == 'save') {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
   
            $data = sanitizerString($data, returnRulesSanitize()); 

            if(!fieldsRequired($data)) {
                $msg = 'Preencha todos os campos!';
                return Header("Location: " . HOME . '/?url=users/save&msg=' . $msg);
            }

            if(!validateEmail($data['email'])) {
                $msg = 'Email inválido!';
                return Header("Location: " . HOME . '/?url=users/save&msg=' . $msg);
            }

            if(!validateLengthPassword($data['password'])) {
                $msg = 'Senha deve ter pelo menos 6 caracteres!';
                return Header("Location: " . HOME . '/?url=users/save&msg=' . $msg);
            }

            if(getUserByEmail(connection(), $data['email'])) {
                $msg = 'Usuário já cadastrado com esse email!';
                return Header("Location: " . HOME . '/?url=users/save&msg=' . $msg);
            }

            if(!create(connection(), $data)){
                $msg = 'Erro ao inserir usuário';
                Header("Location: " . HOME . '/?url=users/list&msg=' . $msg);
            }

            $msg = 'Usuário inserido com sucesso!';
            Header("Location: " . HOME . '/?url=users/list&msg=' . $msg);
        }

        require VIEWS . '/users/save.phtml';
    }

    if($page[1] == 'remove') {
            if(!delete(connection(), $_GET['id'])){
                $msg = 'Erro ao remover usuário';
                Header("Location: " . HOME . '/?url=users/list&msg=' . $msg);
            }

            $msg = 'Usuário removido com sucesso!';
            Header("Location: " . HOME . '/?url=users/list&msg=' . $msg);
        }
}

if($page[0] == 'products') {
    require 'src/functions/products.php';
    require 'src/functions/products_images.php';
    require 'src/functions/upload.php'; 

    if($page[1] == 'list') {
        $products = getAll(connection());

        require VIEWS . '/products/index.phtml';
    }

    if($page[1] == 'delete-image') {
        $data['product_id'] = (int)  $_GET['product_id'];
        $data['image_id'] = (int)  $_GET['image_id'];

        removeImage($data, connection());

        $msg = 'Imagem removida com sucesso!';
        return Header("Location: " . HOME . '/?url=products/edit&id' . $data['product_id'] . 'msg=' . $msg);
    }

    if($page[1] == 'edit') {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $data = $_POST;

            $images = $_FILES['images'];

            if(!fieldsRequired($data)) {
                $msg = 'Preencha todos os campos!';
                return Header("Location: " . HOME . '/?url=products/save&msg=' . $msg);
            }

            if(!update(connection(), $data)) {  
                $msg = 'Erro ao atualizar produto';
                Header("Location: " . HOME . '/?url=products/list&msg=' . $msg);
            }

            if(isset($images['name'][0]) && $images['name'][0] != '') {
                upload($images, $productId, connection());  
            }
            
            $msg = 'Produto atualizado com sucesso!';
            Header("Location: " . HOME . '/?url=products/list&msg=' . $msg);

        }

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $product = get(connection(), $_GET['id']);

            if(!$product) {
                $msg = 'Produto não existe!';
                Header("Location: " . HOME . '/?url=products/edit&msg=' . $msg);
            }

            require VIEWS . '/products/edit.phtml';
        }        

    }   

    if($page[1] == 'save') {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            require 'src/functions/products_images.php';
            require 'src/functions/upload.php';
            $data = $_POST;

            $images = $_FILES['images'];
            

            if(!fieldsRequired($data)) {
                $msg = 'Preencha todos os campos!';
                return Header("Location: " . HOME . '/?url=products/save&msg=' . $msg);
            }

            if(getProductBySlug(connection(), $data['slug'])) {
                $msg = 'Produto já cadastrado!';
                return Header("Location: " . HOME . '/?url=products/save&msg=' . $msg);
            }

            if(!$productId = create(connection(), $data)){
                $msg = 'Erro ao inserir produto';
                Header("Location: " . HOME . '/?url=products/list&msg=' . $msg);
            }
            
            if(isset($images['name'][0]) && $images['name'][0] != '') {
                upload($images, $productId, connection());  
            }
            
            $msg = 'Produto inserido com sucesso!';
            Header("Location: " . HOME . '/?url=products/list&msg=' . $msg);
        }

        require VIEWS . '/products/save.phtml';
    }

    if($page[1] == 'remove') {
        if(!delete(connection(), $_GET['id'])){
            $msg = 'Erro ao remover produto';
            Header("Location: " . HOME . '/?url=products/list&msg=' . $msg);
        }

        $msg = 'Produto removido com sucesso!';
        Header("Location: " . HOME . '/?url=products/list&msg=' . $msg);
    }
}

require $page;

?>