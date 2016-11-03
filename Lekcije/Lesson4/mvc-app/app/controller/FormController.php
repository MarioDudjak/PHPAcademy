<?php

class FormController
{
    /**
     * Registration page with form
     */
    public function index()
    {
       $view = new View();
        //$view->layout('layout');
        $view->render('form', [
            'title' => 'Prijava na Akademiju'
        ]);
    }

    /**
     * Form submit
     */
    public function submit()
    {
        
        function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
       }
       
    $name = $email = $smjer = $motivacija = $predznanje =$godina =$program= "";
    
 /* Upload datoteke
  
  
$target_dir = "C:/xampp/htdocs/Lekcije/Lesson4/mvc-app/app/controller/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      //  echo "Datoteka ". basename( $_FILES["fileToUpload"]["name"]). " je prenesena.\n";
    } else {
        echo "Upload nije uspio.\n";
    }
  
   */  
    
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $smjer = test_input($_POST["smjer"]);
    $motivacija = test_input($_POST["motivacija"]);
    $predznanje= test_input($_POST["predznanje"]);
  //  $godina = test_input($_POST["godina"]);
  
    /* Spremanje u CSV 
        # Title of the CSV
        $Content = "";
        
        //set the data of the CSV
        $Content .= "$name, $email, $smjer, $godina, $motivacija, $predznanje, $program\n";

        # set the file name and create CSV file
        $FileName = "C:/xampp/htdocs/Lekcije/Lesson4/mvc-app/app/controller/Prijave.csv";
    
        $fd= fopen($FileName,"a");
        fwrite($fd, $Content);
        fclose($fd);
 */
        
    
    
   
     $dsn= 'mysql:host=localhost;dbname=BazaLesson5;charset=utf8';
     $username='root';
     $password='';

try {
$dbh = new PDO($dsn,$username,$password);

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "INSERT INTO Tablica1 (name,email,academy_major,motivation,prior_knowledge) VALUES ('".$_POST["name"]."','".$_POST["email"]."','".$_POST["smjer"]."','".$_POST["motivacija"]."','".$_POST["predznanje"]."')";
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


       $view = new View();
        //$view->layout('layout');
        $view->render('success', [
            'title' => 'Uspješna prijava!'
        ]);
     

    }

 

}