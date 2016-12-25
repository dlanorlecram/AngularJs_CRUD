<?php include 'config.php'; ?>
<?php

    switch ($_GET['action']) {
        case 'read':
            read();
            break;
    }

    function create(){

    }
    function read(){
        $db = connexion();
        $request = $db ->query('SELECT * FROM users');
        $rows = $request -> fetchAll();
        $reading = json_encode($rows);
        return print_r($reading);
    }
    function update(){

    }
    function delete(){

    }
?>
