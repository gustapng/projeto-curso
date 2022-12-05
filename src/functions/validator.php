<?php

//Make a validation of email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

//Checks if fields are null
function fieldsRequired($data) {
    foreach($data as $key => $d) {
        if(!$data[$key]) {
            return false;
        }
    }

    return true;
}

//Checks if password is greater of 6
function validateLengthPassword($password) {
    return strlen($password) >= 6;
}

?>