<?php
require "datab.php";

try {
    $connection = new PDO($dsn, $username, $password, $options);

} catch(PDOException $e){
    echo $e->getMessage();
    exit;
}
?>