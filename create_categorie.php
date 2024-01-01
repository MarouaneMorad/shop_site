<?php
session_start();
include("./db/connection.php");
include('./categorie.php');
include("./produit.php");
// if (!isset($_SESSION["id_admin"])) {
//     header("Location: login.php?sessionVIDE");
//     exit();
// }

$conn = new Connection();
$conn->selectDatabase('shop_site');

if (isset($_POST["submit"])) { 

            $nom=$_POST['nom'] ;
            $stmt = $conn->conn->prepare("INSERT INTO categorie (nom_categorie) VALUES (?)");
            $stmt->bind_param("s", $nom);

            if ($stmt->execute()) {
                header('Location: ./categorie_index.php');

                // echo "New record created successfully";
            } else {
                echo "Error: Unable to execute the statement";
            }
 }
    
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/create_produit.css">
</head>
<body>
    <div class="wrapper">
        <h2>Add New Categorie</h2>
        <form  method="post" >
            <label for="name">Nom Categorie</label>
            <input type="text" name="nom" id="nom" required>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="./admin/dashboard.php" class="btn btn-secondary mt-2">Cancel</a>
        </form>
    </div>
</body>
</html>
