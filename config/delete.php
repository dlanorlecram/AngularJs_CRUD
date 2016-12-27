<?php include 'mysql.php'; ?>

<?php
    $id = $_POST['id'];

    $conn = connect::getInstance();
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM users WHERE id = :id";
    $pdostatement = $conn-> prepare($sql);
    $pdostatement -> bindValue(':id', $id);
    $pdostatement -> execute();
?>
