<?php 
declare(strict_types=1);
function is_input_empty(string $name, string $phone, string $address,string $email, string $ownershp){
    if(empty($name)||
    empty($phone)  ||
    empty($address)||
    empty($email)  ||
    empty($ownershp))
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

function does_phone_exist(object $pdo, string $phone)
{
if( get_phone ($pdo,$phone)){
    return true;
} else{
    return false;
} 

}



function is_email_registered(object $pdo, string $email)
{
if(get_email($pdo,$email)){
    return true;
}else{
    return false;
}
}

 
 

function create_user(object $pdo,string  $name,string $phone ,string $address, string $email , string $ownershp)
{
set_user($pdo, $name,$phone,$address,$email,$ownershp);
}
?>