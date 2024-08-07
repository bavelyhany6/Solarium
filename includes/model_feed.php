<?php 
declare(strict_types=1);

function get_name(object $pdo , string $full_name)
{

    $query="SELECT full_name FROM feedback WHERE full_name=:full_name;";
    $stmt= $pdo-> prepare($query);
    $stmt->bindParam(":full_name",$full_name);
    $stmt-> execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function get_email( object $pdo, string $email)
{
    $query="SELECT email FROM feedback WHERE email=:email;";
    $stmt= $pdo ->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_message(object $pdo , string $msg)
{

    $query="SELECT msg FROM feedback WHERE msg=:msg;";
    $stmt= $pdo-> prepare($query);
    $stmt->bindParam(":msg",$msg);
    $stmt-> execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function set_user(object $pdo, string $full_name,string $msg,  string $email){
    $query="INSERT INTO feedback(full_name, msg , email) VALUES
    (:full_name,:msg, :email );";
    $stmt= $pdo ->prepare($query);
$options=[
    "cost"=>12 ];


    $stmt->bindParam(":full_name",$full_name);
    $stmt->bindParam(":msg",$msg);
    $stmt->bindParam(":email",$email);
    $stmt->execute();   
}