<?php
/* Inclure le fichier */
require_once "./db/connection.php";

$connection = new Connection();
$connection->selectDatabase("shop_site");
//inclure le fichier produit 
include("./categorie.php");
/* Definir les variables */
$id=$_GET['id'];

/* verifier la valeur id dans le post pour la mise à jour */
if(isset($_GET["id"]) && !empty($_GET["id"])){
//appele la methode static select by id
$cat=Categorie::selectCategorieById('categorie',$connection->conn,$_GET["id"]);
// recuperation des valeur 
    $nom_cat=$cat["nom_categorie"];


if(isset($_POST['submit'])){

    $nom= $_POST['cat'];

  if(!empty($nom)){
                     // id_categorie
    $categorie=new Categorie('',$nom);

    Categorie::updateCategorie($categorie,'categorie',$connection->conn,$id);


    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MORAD SHOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }

        .wrapper {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

      
        .btn-dark {
            background-color: black;
            border: none;
        }

        .btn-dark:hover {
            background-color: grey;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<?php session_start();?>
<nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="./admin/dashboard.php">
                 Dashboard Admin
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
                data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
     
    </nav>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2>Update Categorie </h2>
                    </div>
                   
                <form method="post">
                <label for="cat">Nom categorie </label>
                <input type="text" nom="cat" id="cat">

                 <br>

                <input  type="submit" name="submit" class="btn btn-dark">

                </form>
                     
                </div>
            </div>
        </div>
    </div>
</body>
</html>
