<?php

    if($page[2] == 'list') {
        $users = getAll(connection());

        require VIEWS . '/admin/users/index.phtml';
    }
        
    if($page[2] == 'edit') {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $data = $_POST; 

            if(!validateEmail($data['email'])) {
                $msg = 'Email inválido!';

                addFlash('error','$msg');
                
                return Header("Location: " . HOME . '/admin/users/edit/' . $data['id']);
            }

            if(!validateLengthPassword($data['password'])) {
                $msg = 'Senha deve ter pelo menos 6 caracteres!';

                addFlash('error', $msg);

                return Header("Location: " . HOME . '/admin/users/edit/' . $data['id']);
            }
            
            if(!update(connection(), $data)) {
                print_r($data);
                $msg = 'Erro ao atualizar usuário';

                addFlash('error', $msg);

                Header("Location: " . HOME . '/admin/users/list');
            }
            
            $msg = 'Usuário atualizado com sucesso!';

            addFlash('success', $msg);

            Header("Location: " . HOME . '/admin/users/list');
        }

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = (int) isset($page[3]) ? $page[3] : null;

            $user = get(connection(), $id);

            if(!$user) {
                $msg = 'Usuário não existe!';

                addFlash('error', $msg);

                Header("Location: " . HOME . '/admin/users/list');
            }

            require VIEWS . '/admin/users/edit.phtml';
        }

    }

    if($page[2] == 'save') {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = $_POST;
   
            $data = sanitizerString($data, returnRulesSanitize()); 

            if(!fieldsRequired($data)) {
                $msg = 'Preencha todos os campos!';

                addFlash('error',$msg);

                return Header("Location: " . HOME . '/admin/users/save');
            }

            if(!validateEmail($data['email'])) {
                $msg = 'Email inválido!';

                addFlash('error', $msg);

                return Header("Location: " . HOME . '/admin/users/save');
            }

            if(!validateLengthPassword($data['password'])) {
                $msg = 'Senha deve ter pelo menos 6 caracteres!';

                addFlash('error', $msg);

                return Header("Location: " . HOME . '/admin/users/save');
            }

            if(getUserByEmail(connection(), $data['email'])) {
                $msg = 'Usuário já cadastrado com esse email!';

                addFlash('error', $msg);

                return Header("Location: " . HOME . '/admin/users/save');
            }

            if(!create(connection(), $data)){
                $msg = 'Erro ao inserir usuário';

                addFlash('error', $msg);

                Header("Location: " . HOME . '/admin/users/list');
            }

            $msg = 'Usuário inserido com sucesso!';

            addFlash('error', $msg);

            Header("Location: " . HOME . '/admin/users/list');
        }

        require VIEWS . '/admin/users/save.phtml';
    }

    if($page[2] == 'remove') {

            $id = (int) isset($page[3]) ? $page[3] : null;

            if(!delete(connection(), $id)){
                $msg = 'Erro ao remover usuário';

                addFlash('error', $msg);

                Header("Location: " . HOME . '/admin/users/list');
            }

            $msg = 'Usuário removido com sucesso!';

            addFlash('success', $msg);

            Header("Location: " . HOME . '/admin/users/list');
    }

?>