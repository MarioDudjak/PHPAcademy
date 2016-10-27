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
        
        $name = $email = $smjer = $motivacija = $predznanje =$godina =$program= "";
        $nameErr = $emailErr = $smjerErr =$godinaErr = "";

if (isset($_POST['submit'])){
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if file already exists

/* Ovo također doraditi
    if (file_exists($target_file)) {
    echo "Već postoji datoteka pod ovim imenom.\n";
    $uploadOk = 0;
}
*/

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Upload nije uspio.\n";
// if everything is ok, try to upload file
} else {
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      //  echo "Datoteka ". basename( $_FILES["fileToUpload"]["name"]). " je prenesena.\n";
    } else {
        echo "Upload nije uspio.\n";
    }
    }
   

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])) {
    $nameErr = "Niste unijeli ime.";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Dozvoljena su samo slova i praznine"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Niste unijeli e-mail.";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "E-mail nije u dobrom formatu"; 
    }
  }
  
  if (empty($_POST["smjer"])) {
    $smjerErr = "Morate unijeti smjer.";
  } else {
    $smjer = test_input($_POST["smjer"]);
  }
  
    $motivacija = test_input($_POST["motivacija"]);
    $predznanje= test_input($_POST["predznanje"]);
   //Ovo još treba doraditi $program =test_input($_POST["program"]);

  if (empty($_POST["godina"])) {
    $godinaErr = "Morate unijeti godinu.";
  } else {
    $godina = test_input($_POST["godina"]);
  }
  
  
if (($nameErr=="")&&($emailErr=="")&&($godinaErr=="")&&($smjerErr=="")){
     
        # Title of the CSV
        $Content = "";
        
        //set the data of the CSV
        $Content .= "$name, $email, $smjer, $godina, $motivacija, $predznanje, $program\n";

        # set the file name and create CSV file
        $FileName = "Prijave.csv";
    
        $fd= fopen($FileName,"a");
        fwrite($fd, $Content);
        fclose($fd);
        header("Location: success.php");
        exit();
   }

/*
//if their are errors display them
 if((isset($nameErr))||(isset($emailErr))||(isset($smjerErr))||(isset($godinaErr))){
     $error=array($nameErr,$emailErr,$smjerErr,$godinaErr);
    foreach($error as $error){
        echo "<p style='color:#ff0000'>$error</p>";
    }
}
 */
}

  function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
    }

    /**
     * Thank you page
     */
    public function thankyou()
    {
        //@todo
    }

}