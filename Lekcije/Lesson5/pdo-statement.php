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

/* 1. Nacin rukovanja s INJECTION
$id =1; // user input - ne vjerujemo mu 

$sql ='SELECT * FROM `tablica1` WHERE id= ?';  //Gdje god je user input, ide ?
$stmt=$conn->prepare($sql); //s preparom se kaže da taj sql upit pripremi na provjeru
$stmt->execute([$id]);  // s execute se uspoređuje ? s $id-om 

 foreach($stmt as $row){
        print $row['id']. "\t";
        print $row['name']. "\t";
        print $row['email']. "\n";
    }
    
 
 */
    
 /* 2. Nacin - ako ima puno ? u prošlom, ovo je efikasnije 
 $id =1; // user input - ne vjerujemo mu 
$sql ='SELECT * FROM `tablica1` WHERE id= :id';  
$stmt=$conn->prepare($sql);         
$stmt->execute([                
       'id' => $id,
        'ime' => 'nesto'            //$_GET['id']
        ]);
 foreach($stmt as $row){
        print $row['id']. "\t";
        print $row['name']. "\t";
        print $row['email']. "\n";
    }
 
  */