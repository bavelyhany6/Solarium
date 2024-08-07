<?php 
declare(strict_types=1);
function is_input_empty(string $full_name,  string $msg,string $email){
    if(empty( $full_name)||
    empty($msg)||
    empty($email))
    {
        return true;
    }else {
        return false;
    }
}

function is_email_invalid(string $email){
    if(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else{
        return false;
    }
    }


    
function create_user(object $pdo,string  $full_name,string $msg, string $email)
{
set_user($pdo, $full_name,$msg,$email);
}