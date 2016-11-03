<?php
header('Content-Type: text/plain');

/* 
 * -mysql is deprecated, use PDO, mysqli
 */

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

$sql ='SELECT * FROM `tablica1`';
$stmt=$conn->query($sql);

/* 1.Nacin
  while($row=$stmt->fetch()){
 
    print $row['id']. "\t";
    print $row['name']. "\t";
    print $row['email']. "\n";
}
 */
/* 2.Nacin - OVO JE LOŠE AKO JE PUNO ZBOG MEMORIJE
foreach($stmt->fetchAll() as $row){
     print $row['id']. "\t";
    print $row['name']. "\t";
    print $row['email']. "\n";
}
 
 */

/* 3.Nacin
 
    foreach($stmt as $row){
        print $row['id']. "\t";
        print $row['name']. "\t";
        print $row['email']. "\n";
    }
 
 */

