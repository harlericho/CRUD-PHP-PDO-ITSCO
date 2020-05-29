<?php
try {
    $pdo = new PDO('mysql:dbname=sextonocturna;host=localhost', 'root', '');
    //echo "<script>alert('Conectado a la base');</script>";
} catch (Exception $exc) {
    die('Error: '.$exc->getMessage());
}


