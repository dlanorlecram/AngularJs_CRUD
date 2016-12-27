<?php include 'mysql.php'; ?>

<?php
    var_dump($_POST);
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sentence = $_POST['sentence'];
    $conn = connect::getInstance();
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE users SET
                            username = :username,
                            password = :password,
                            sentence = :sentence
                            WHERE id = :id";
    $pdostatement = $conn-> prepare($sql);
    $pdostatement -> bindValue(':id', $id);
    $pdostatement -> bindValue(':username', $username );
    $pdostatement -> bindValue(':password', $password);
    $pdostatement -> bindValue(':sentence', $sentence);
    $pdostatement -> execute();
?>
