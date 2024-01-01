<?php
include("./db/connection.php");
include('./user.php');
include("./admin.php");
$connection = new Connection();

$connection->selectDatabase('shop_site');
$emailValue = "";
$nom = "";
$passwordValue1 = "";

// $errorMesage = "";
// $successMesage = "";

if(isset($_POST["register"])){

    $emailValue = $_POST["email"];
    $nom = $_POST["nom"];
    $passwordValue1 = $_POST["password1"];


    if(empty($emailValue) || empty($nom) || empty($passwordValue1) ){

            echo "all fileds must be filed out!";

    }
    else if(strlen($passwordValue1) < 8 ){
        $errorMesage = "password must contains at least 8 char";
    }else if(preg_match("/[A-Z]+/", $passwordValue1)==0){
        $errorMesage = "password must contains  at least one capital letter!";
    }else{
      $pattern = '/@gmail\.com$/';
      $pattern2='/@viseo\.com$/';

      


    if (preg_match($pattern, $emailValue)) {
      //create new instance of client class with the values of the inputs
     $client = new User($nom,$emailValue,$passwordValue1);

    //call the insertClient method
     $client->insertUser('utilisateur',$connection->conn);
    //give the $successMesage the value of the static $successMsg of the class

    //give the $errorMesage the value of the static $errorMsg of the class
        
    $emailValue = "";
    $nom = "";
    header('Location: ./login.php');
      

    }else if(preg_match($pattern2, $emailValue)){
    
      $admin = new Admin($nom,$emailValue,$passwordValue1);
    //   //call the insertClient method
      $admin->insertAdmin('responsable',$connection->conn);

      header('Location: ./login.php');
  }
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MORAD SHOP </title>
    <link rel="stylesheet" type="text/css" href="./css/registre_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form method="post" >

                <div class="form-outline mb-4">
                  <input type="text" id="nom" name="nom" class="form-control form-control-lg" />
                  <label class="form-label" for="nom">Your Name</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" id="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="email">Your Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password1" id="password1" class="form-control form-control-lg" />
                  <label class="form-label" for="password1">Password</label>
                </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" name="register"
                    class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>
                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="./login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</section>

</body>

</html>