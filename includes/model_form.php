<?php 
declare(strict_types=1);

function get_name(object $pdo , string $name)
{

    $query="SELECT full_name FROM clients WHERE full_name=:full_name;";
    $stmt= $pdo-> prepare($query);
    $stmt->bindParam(":full_name",$name);
    $stmt-> execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function get_phone(object $pdo , string $phone)
{

    $query="SELECT phone FROM clients WHERE phone=:phone;";
    $stmt= $pdo-> prepare($query);
    $stmt->bindParam(":phone",$phone);
    $stmt-> execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function get_address(object $pdo , string $address)
{

    $query="SELECT c_address FROM clients WHERE c_address=:c_address;";
    $stmt= $pdo-> prepare($query);
    $stmt->bindParam(":c_address",$address);
    $stmt-> execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}


function get_email( object $pdo, string $email)
{
    $query="SELECT email FROM clients WHERE email=:email;";
    $stmt= $pdo ->prepare($query);
    $stmt->bindParam(":email",$email);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_ownershp( object $pdo, string $ownershp)
{
    $query="SELECT ownershp FROM clients WHERE ownershp=:ownershp;";
    $stmt= $pdo ->prepare($query);
    $stmt->bindParam(":ownershp",$ownershp);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $name, string $phone ,string $address,  string $email, string $ownershp){
    $query="INSERT INTO clients(full_name, phone, c_address , email,ownershp) VALUES
    (:full_name,:phone,:c_address, :email , :ownershp );";
    $stmt= $pdo ->prepare($query);
$options=[
    "cost"=>12 ];


    $stmt->bindParam(":full_name",$name);
    $stmt->bindParam(":phone",$phone);
    $stmt->bindParam(":c_address",$address);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":ownershp",$ownershp);
    $stmt->execute();   
}
?>