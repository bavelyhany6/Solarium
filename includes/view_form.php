<?php 
declare(strict_types=1);

function  check_errors()
{
    if(isset( $_SESSION["errors_reg"])){
$errors= $_SESSION["errors_reg"];

echo"<br>";

foreach ($errors as $error){
  echo"" .$error ;
}
unset($_SESSION["errors_reg"]);

    }else if (isset($_GET["registeration=success"]) 
    && $_GET["registeration"]==="success")
    {
        echo"<br>";
        echo "<h2> registeration success we will call you ASAP</h2>";

    }
}

