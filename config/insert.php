<?php include 'mysql.php'; ?>

<?php
    $id = null;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sentence = $_POST['sentence'];

    $conn = connect::getInstance();
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users (id, username, password, sentence) VALUES (:id, :username, :password, :sentence)";
    $pdostatement = $conn-> prepare($sql);
    $pdostatement -> bindValue(':id', $id);
    $pdostatement -> bindValue(':username', $username );
    $pdostatement -> bindValue(':password', $password);
    $pdostatement -> bindValue(':sentence', $sentence);
    $pdostatement -> execute();

?>
