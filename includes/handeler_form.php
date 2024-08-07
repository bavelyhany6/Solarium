<?php 
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name=$_POST["name"];
    $phone=$_POST["phone"];
    $address=$_POST["address"];
     $email=$_POST["email"];
     $ownershp=$_POST["ownershp"];
   
try{
    require_once "db_handeler.php";
    require_once "model_form.php";
    require_once "view_form.php" ;
    require_once "control_form.php";
//ERROR HANDELERS  STYLE HERE!
$errors=[];

 if(is_input_empty($name,$phone,$address,$email,$ownershp)){
    echo  $errors["empty_input"]= "<h2> Please fill in all fields </h2><br>";
 }

if( is_email_invalid($email) && !empty($email)){
    $errors["invalid_email"]=" invalid email used <br>";
}

 
if(does_phone_exist( $pdo,  $phone)){
    $url = "https://www.facebook.com/people/Solariumeg/61559700548518/?mibextid=ZbWKwL";
    $link_text = "facebook";
    $errors["phone_registered"]=" this phone  number already exists <br> 
    if you would like another call please reach out on our social media platforms<br> 
    <a href='$url' target='_blank'>$link_text</a>";
    
}




if(is_email_registered($pdo,$email))
{
    $errors["email_used"]=" this email is already registered <br>";
}

require_once "session.php";
if($errors){
    $_SESSION["errors_reg"]=$errors;
    header("location: ../form.php"); 
    die();
}

create_user($pdo,$name,$phone,$address,$email,$ownershp);

header("location: ../form.php?registeration=success");
$pdo=null;
$stmt=null;
die();

}catch(PDOException $e){
    die("request failed: ".$e-> getMessage());
}
}else{
    header("location: ../form.php");
    die();
}



/**switch (true) {
    case is_input_empty($username, $pwd, $email):
        $errors["empty_input"] = "Please fill in all fields ";
        break;
    case is_email_invalid($email):
        $errors["invalid_email"] = "invalid email used ";
        break;
    case is_username_taken($pdo, $username):
        $errors["username_taken"] = "user name already taken";
        break;
    case is_email_registered($pdo, $email):
        $errors["email_used"] = "this email is already registered ";
        break;
} */
?>
