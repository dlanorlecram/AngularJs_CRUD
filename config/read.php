<?php include 'mysql.php'; ?>

<?php
        $conn = connect::getInstance();
        $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = 'SELECT * FROM users';
        $pdostatement = $conn-> prepare($sql);
        $pdostatement -> execute();
        $rows = $pdostatement -> fetchAll();
        print_r(json_encode($rows));
?>
