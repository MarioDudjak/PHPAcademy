<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
   
</head>
<body>

<header>
    <ul>
        <li><a href="index.php">Naslovnica</a></li>
        <li><a href="form.php">Prijavi se</a></li>
        <li>Login (za admine)</li>
    </ul>
</header>

<main>

    <h1>Prijavnica za PHP akademiju</h1>

    <p>Prijavnica za prvo osječko izdanje PHP akademije koju Inchoo pokreće u suradnji s FERITom.</p>
    <p>Prijave traju do 10.10., pa požuri i svoje mjesto rezerviraj već sad.</p>
    <p>Više informacija na:
        <a href="http://inchoo.hr/php-akademija-2016/" target="_blank">http://inchoo.hr/php-akademija-2016/</a>
    </p>

    <!-- fix form -->
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <fieldset>
        <legend>Osobne informacije:</legend>
        <label>Ime i prezime</label>
    <input type="text" name="name" /></br>

    <label>Mail adresa</label>
    <input type="text" name="email" /></br>

    <label>Smjer</label>
    <input type="text" name="smjer" /></br>

    <label>Godina studija</label></br>
    <input type="radio" name="godina" value="1">1</br>
    <input type="radio" name="godina" value="2">2</br>
    <input type="radio" name="godina" value="3">3</br>
    <input type="radio" name="godina" value="4">4</br>
    
  
    <label>Što te motiviralo da se prijaviš?</label></br>
    <textarea name="motivacija" rows="5" cols="20">
    </textarea></br>

    <label>Imaš li predznanje vezano uz web development?</label></br>
    <textarea name="predznanje" rows="5" cols="20">
    </textarea></br>

    <label>U kojim jezicima si do sada programirao?</label></br>
    <select>
    <option value="C#">C#</option>
    <option value="JAVA">JAVA</option>
    <option value="C++">C++</option>
    <option value="Python">Python</option>
    </select></br></br></br>

    <label>Uploadaj primjer svoga koda:</label>
    <input type="file" name="fileToUpload" id="fileToUpload">
    
    </br><input type="submit" value="Submit" name="submit">
    </form>
</fieldset>
</main>
<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";
$nameErr = $emailErr = $genderErr = $websiteErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["smjer"])) {
    $smjerErr = "";
  } else {
    $smjer = test_input($_POST["smjer"]);
  }

  if (empty($_POST["motivacija"])) {
    $motivacijaErr = "";
  } else {
    $motivacija = test_input($_POST["motivacija"]);
  }
  if (empty($_POST["predznanje"])) {
    $predznanjeErr = "";
  } else {
    $predznanje= test_input($_POST["predznanje"]);
  }

  if (empty($_POST["godina"])) {
    $godinaErr = "Morate unijeti godinu.";
  } else {
    $godina = test_input($_POST["godina"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>
<footer>
    <p>&copy; PHP Akademija, 2016</p>
</footer>

</body>
</html>