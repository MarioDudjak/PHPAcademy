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
 
$target_dir = "C:/xampp/htdocs/Lekcije/Lesson4/mvc-app/app/controller/uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      //  echo "Datoteka ". basename( $_FILES["fileToUpload"]["name"]). " je prenesena.\n";
    } else {
        echo "Upload nije uspio.\n";
    }
      
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $smjer = test_input($_POST["smjer"]);
    $motivacija = test_input($_POST["motivacija"]);
    $predznanje= test_input($_POST["predznanje"]);
  //  $godina = test_input($_POST["godina"]);
        # Title of the CSV
        $Content = "";
        
        //set the data of the CSV
        $Content .= "$name, $email, $smjer, $godina, $motivacija, $predznanje, $program\n";

        # set the file name and create CSV file
        $FileName = "C:/xampp/htdocs/Lekcije/Lesson4/mvc-app/app/controller/Prijave.csv";
    
        $fd= fopen($FileName,"a");
        fwrite($fd, $Content);
        fclose($fd);
 
         $view = new View();
        //$view->layout('layout');
        $view->render('success', [
            'title' => 'Uspješna prijava!'
        ]);
       

    }

 

}