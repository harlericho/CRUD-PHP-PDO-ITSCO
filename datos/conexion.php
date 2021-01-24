<?php
try {
    $pdo = new PDO('mysql:dbname=db_sextonocturna;host=localhost', 'charlie', 'charlie');
    //echo "<script>alert('Conectado a la base');</script>";
} catch (Exception $exc) {
    die('Error: ' . $exc->getMessage());
}
