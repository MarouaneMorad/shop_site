
<?php
session_start();
include("./db/connection.php");
include("./admin/admin.php");
$email = "";
$password = "";

if (isset($_POST['login'])) {
    // Récupérer les données du formulaire

    $email = $_POST['email'];
    $password = $_POST['pasword'];


    $pattern = '/@gmail\.com$/';
    $pattern2='/@viseo\.com$/';
    $pattern3='/@admin\.com$/';


    $connection = new Connection();
    $connection->selectDatabase('shop_site');

    if (preg_match($pattern, $email)) {

        // Exemple basique (ne l'utilisez pas en production)
        $query = "SELECT id_user, nom, mdp FROM utilisateur WHERE EMAIL = ?";
        $stmt = $connection->conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

         // Vérifier le mot de passe
        if (password_verify($password, $row['mdp'])) {
                // Authentification réussie

                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['nom'] = $row['nom'];
                header('Location: index.php');
                exit();
            } else {
                // Mot de passe incorrect
                echo 'Invalid password';
            }
        } else {
            // Email introuvable
            echo 'Invalid Email';
        }

        $stmt->close();
        $connection->conn->close();
    }else if((preg_match($pattern2, $email)))  {

         $query = "SELECT id_admin,nom, mdp FROM responsable WHERE Email = ?";
         $stmt = $connection->conn->prepare($query);
         $stmt->bind_param('s', $email);
         $stmt->execute();
         $result = $stmt->get_result();
 
         if ($result->num_rows > 0) {
             $row = $result->fetch_assoc();
 
             // Vérifier le mot de passe
             if (password_verify($password, $row['mdp'])) {
                // Authentification réussie
                $_SESSION['id_admin'] = $row['id_admin'];
                $_SESSION['nom'] = $row['nom'];
                header('Location: ./admin/dashboard.php');
                exit();
        
             } else {
                 echo 'Invalid password';
             }

         } else {
             // Email introuvable
             echo 'Invalid Email';
         }
 
         $stmt->close();
         $connection->conn->close();

    }else if((preg_match($pattern3, $email)))  {

        $query = "SELECT id_admin,nom, mdp FROM responsable WHERE Email = ?";
        $stmt = $connection->conn->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Vérifier le mot de passe
            if (password_verify($password, $row['mdp'])) {
               // Authentification réussie
               $_SESSION['id_admin'] = $row['id_admin'];
               $_SESSION['nom'] = $row['nom'];
               header('Location: ./admin/dashboard.php');
               exit();
       
            } else {
                echo 'Invalid password';
            }

        } else {
            // Email introuvable
            echo 'Invalid Email';
        }

        $stmt->close();
        $connection->conn->close();

   }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <title>MORAD SHOP</title>
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="./css/login_style.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="post">
        <h3>Login Here</h3>

        <label for="email">Email : </label>
        <input type="text" placeholder="Email" id="email" name="email">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="pasword">

        <button type="submit" name="login">Log In</button>
        <div class="social">
            <div style="margin: auto;"><a class="btn" href="./register.php">Register</a></div>
        </div>
    </form>
</body>
</html>
