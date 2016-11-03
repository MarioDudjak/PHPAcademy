<?php
header('Content-Type: text/plain');

if(!isset($_GET['id'])) {}

$dsn= 'mysql:host=localhost;dbname=BazaLesson5;charset=utf8';
$username='root';
$password='';

try{
    $conn =new PDO($dsn,$username,$password);
    // $con=null - oslobađa memoriju u kojoj je bila konekcija za bazu podataka
} catch (PDOException $e) {
    echo 'Connection failed: '.$e->getMessage();
    exit;
}

$sql ='SELECT * FROM `tablica1` WHERE id=' . $_GET['id'];
echo 'SQL: ' . $sql . PHP_EOL . PHP_EOL;
$stmt=$conn->query($sql);

echo 'Result: ';
print_r($stmt->fetchAll());