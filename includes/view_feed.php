<?php 
declare(strict_types=1);

function  check_errors()
{
    if(isset( $_SESSION["errors_feed"])){
$errors= $_SESSION["errors_feed"];

echo"<br>";

foreach ($errors as $error){
  echo"   " .$error ;
}
unset($_SESSION["errors_feed"]);

    }else if (isset($_GET["feedback=success"]) 
    && $_GET["feedback"]==="success")
    {
        echo"<br>";
        echo "<h2>thank you for your feedback</h2>";

    }
}
 
