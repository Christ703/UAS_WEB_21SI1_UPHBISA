<?php
$host="localhost";
$user="root";
$pass="";
$db="uphbisa";

try {
    $conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
} catch (PDOException $e) {
    die("Connection error: " . $e->getMessage());
};

?>