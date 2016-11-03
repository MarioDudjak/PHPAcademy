<?php


     $dsn= 'mysql:host=localhost;dbname=BazaLesson5;charset=utf8';
     $username='root';
     $password='';

try {
$dbh = new PDO($dsn,$username,$password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql="INSERT INTO Tablica1 (name,email,academy_major) VALUES ('Pero Peric', 'pperic@gmail.com',4)";
if ($dbh->query($sql)) {
echo "<script type= 'text/javascript'>alert('New Record Inserted Successfully');</script>";
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}



