<?php
session_start();

if (!isset($_SESSION["id_admin"])) {
    header("Location: login.php?sessionVIDE");
    exit();
}

include("./db/connection.php");
include('./categorie.php');
include("./produit.php");

$conn = new Connection();
$conn->selectDatabase('shop_site');

if ( isset($_POST["submit"])) {
    $targetDirectory = "uploads/";



    $targetFile = $targetDirectory . uniqid() . '_' . basename($_FILES["image"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        $uploadOk = false;
    }

  
    if (file_exists($targetFile)) {
        $uploadOk = false;
    }

 
    if ($_FILES["image"]["size"] > 500000) {
        $uploadOk = false;
    }

    $allowedFormats = array("jpg", "jpeg", "png", "gif");
    if (!in_array($imageFileType, $allowedFormats)) {
        $uploadOk = false;
    }

    if ($uploadOk == false) {
        echo "Sorry, there was an error .";
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $name=$_POST["name"];
            $description=$_POST['description'];

            $prix=$_POST["prix"];
            $qte=$_POST["stock"];
            $id_admin=$_SESSION['id_admin'];
            $id_categorie=$_POST["category"];
            

      
            $stmt = $conn->conn->prepare("INSERT INTO produit (nom_produit,description ,prix ,stock,id_categorie,id_admin,img_produit ) VALUES (?, ?, ?, ?,?,?,?)");
            $stmt->bind_param("ssdddds", $name,$description, $prix, $qte ,$id_categorie,$id_admin ,$targetFile );

            if ($stmt->execute()) {
                //echo "New record created successfully";
            } else {
                echo "Error: Unable to execute the statement";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
    }
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
        <h2>Add New Product</h2>
    <form action="" method="post" enctype="multipart/form-data">
    <label class="custum-file-upload" for="file" style="margin-left: 30px;">
        <div class="icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24"><g stroke-width="0" id="SVGRepo_bgCarrier"></g><g stroke-linejoin="round" stroke-linecap="round" id="SVGRepo_tracerCarrier"></g><g id="SVGRepo_iconCarrier"> <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path> </g></svg>
        </div>
        <div class="text">
            <span>Click to upload image</span>
        </div>
    <input type="file" id="file" name="image">
    </label>

        <!-- end section image  -->
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
            <label for="description">Description </label>
            <textarea name="description" rows="10" cols="40" > </textarea>

            <label for="prix">Prix</label>
            <input name="prix" id="prix" type="number" required>

            <label for="stock">Quantite</label>
            <input name="stock" id="stock" type="number" required>

            <div class="col-12">
                        <select name="category" id="categorie" class="form-select" required>
                             <option value="" selected style="width: 100%;">Sélectionnez la Categorie </option>
                                <?php
                                
                                    $categories = Categorie::selectAllCategories('categorie', $conn->conn);
                                     foreach ($categories as $categorie) {
                                            // $id = $categorie['id_categorie'];
                                            // $_SESSION['id_categorie']= $id;
                                            echo '<option value='.$categorie['id_categorie'].' >'.$categorie['nom_categorie'].'</option>';
                                        }
                                    ?>
                        </select>
            </div>


            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <a href="./admin/dashboard.php" class="btn btn-secondary mt-2">Cancel</a>
    </form>
    </div>
</body>
</html>
