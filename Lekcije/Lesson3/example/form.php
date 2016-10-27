<?php
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

?>


<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Prijavnica za PHP Akademiju</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

 <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
             
              <nav>
                <ul class="nav masthead-nav">
                  <li class="active"><a href="index.php">Naslovnica</a></li>
                  <li><a href="form.php">Prijavi se</a></li>
                <li><a href="admin.php">Admin</a></li> 
                </ul>
              </nav>
            </div>
          </div>

<div class="inner cover">
            <h1 class="cover-heading">Prijavnica za PHP akademiju</h1>
            <p class="lead">Prijavnica za prvo osječko izdanje PHP akademije koju Inchoo pokreće u suradnji s FERITom.</p>
             <p class="lead">Prijave traju do 10.10., pa požuri i svoje mjesto rezerviraj već sad.</p>
             <p class="lead">Više informacija na:
        <a href="http://inchoo.hr/php-akademija-2016/" target="_blank">http://inchoo.hr/php-akademija-2016/</a></p>
         
             <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <fieldset>
        <legend>Osobne informacije:</legend>
        
        <label>Ime i prezime</label></br>
        <input type="text" name="name"/>
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        
        <label>Mail adresa</label></br>
        <input type="text" name="email"/>
        <span class="error">* <?php echo $emailErr;?></span><br><br>
       
        <label>Smjer</label></br>
        <input type="text" name="smjer"/>
        <span class="error">* <?php echo $smjerErr;?></span><br><br>
        

        <label>Godina studija</label></br>
        <input type="radio" name="godina" value="1">1</br>
        <input type="radio" name="godina" value="2">2</br>
        <input type="radio" name="godina" value="3">3</br>
        <input type="radio" name="godina" value="4">4</br>
        <input type="radio" name="godina" value="5">5</br>
        <span class="error">* <?php echo $godinaErr;?></span><br><br>
  
        <label>Što te motiviralo da se prijaviš?</label></br>
        <textarea name="motivacija" rows="5" cols="20">
        </textarea></br>
        
        <label>Imaš li predznanje vezano uz web development?</label></br>
        <textarea name="predznanje" rows="5" cols="20">
        </textarea></br>
        
        

        <label>U kojim jezicima si do sada programirao?</label></br>
        <input type="checkbox" name="program" value="C#">C#<br>
        <input type="checkbox" name="program" value="JAVA">JAVA<br>
        <input type="checkbox" name="program" value="C++">C++<br>
        <input type="checkbox" name="program" value="C">C<br>
        <input type="checkbox" name="program" value="Python">Python<br>
        </br>

        <label>Uploadaj primjer svoga koda:</label></br>
        <input type="file" name="fileToUpload" id="fileToUpload"></br></br>
        <input type="submit" value="Submit" name="submit">
     
        </fieldset>
    </form>

</div>

          <div class="mastfoot">
            <div class="inner">
              <p>&copy; PHP Akademija, 2016</p>
            </div>
          </div>

        </div>

      </div>

    </div>
</body>
</html>

