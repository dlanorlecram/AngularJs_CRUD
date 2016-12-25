<?php
function connexion(){
    $servername = "localhost";
    $dbname = "AngularJsCRUD";
    $username = "root";
    $password = "password";

    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
        echo 'Connection impossible!';
        die();

    }
    return $db;
}
?>
