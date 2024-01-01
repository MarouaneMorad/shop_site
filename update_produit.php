<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["id_admin"])) {
    header("Location: login.php?sessionVIDE");
    exit();
}

include("./db/connection.php");
include('./categorie.php');
include("./produit.php");

$conn = new Connection();
$conn->selectDatabase('shop_site');

// Check if the product ID is provided in the URL
if (isset($_GET['id'])) {
    $id_produit = $_GET['id'];

    // Fetch product details from the database
    $query = "SELECT * FROM produit WHERE id_produit = $id_produit";
    $result = $conn->conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nom_produit = $row['nom_produit'];
        $prix = $row['prix'];
        $stock = $row['stock'];
        $id_categorie = $row['id_categorie'];
        $image = $row['img_produit'];

        // Fetch category details for the dropdown
        $categories = Categorie::selectAllCategories('categorie', $conn->conn);
    } else {
        echo "Product not found.";
        exit();
    }
} else {
    echo "Product ID not provided.";
    exit();
}

// Check if the form is submitted
if (isset($_POST["submit"])) {
    // Retrieve form data
    $new_nom = $_POST["new_nom"];
    $new_prix = $_POST["new_prix"];
    $new_stock = $_POST["new_stock"];
    $new_id_categorie = $_POST["new_category"];

    // Check if a new image is provided
    if ($_FILES["new_image"]["name"] !== "") {
        $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . uniqid() . '_' . basename($_FILES["new_image"]["name"]);
        $uploadOk = true;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["new_image"]["tmp_name"]);
        if ($check === false) {
            $uploadOk = false;
        }

        if (file_exists($targetFile)) {
            $uploadOk = false;
        }

        if ($_FILES["new_image"]["size"] > 500000) {
            $uploadOk = false;
        }

        $allowedFormats = array("jpg", "jpeg", "png", "gif");
        if (!in_array($imageFileType, $allowedFormats)) {
            $uploadOk = false;
        }

        if ($uploadOk) {
            if (move_uploaded_file($_FILES["new_image"]["tmp_name"], $targetFile)) {
                // Update the product with the new image path
                $update_query = "UPDATE produit SET nom_produit=?, prix=?, stock=?, id_categorie=?, img_produit=? WHERE id_produit=?";
                $stmt = $conn->conn->prepare($update_query);
                $stmt->bind_param("sddisi", $new_nom, $new_prix, $new_stock, $new_id_categorie, $targetFile, $id_produit);

                if ($stmt->execute()) {
                    header("Location: produit_index.php"); // Redirect to the product listing page after successful update
                    exit();
                } else {
                    echo "Error updating product: " . $conn->conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // Update the product without changing the image
        $update_query = "UPDATE produit SET nom_produit=?, prix=?, stock=?, id_categorie=? WHERE id_produit=?";
        $stmt = $conn->conn->prepare($update_query);
        $stmt->bind_param("sddii", $new_nom, $new_prix, $new_stock, $new_id_categorie, $id_produit);

        if ($stmt->execute()) {
            header("Location: produit_index.php"); // Redirect to the product listing page after successful update
            exit();
        } else {
            echo "Error updating product: " . $conn->conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add any additional CSS styles if needed -->
    <style>
         body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            text-align: center;
        }

        label {
            color: #555;
            margin-bottom: 0.5rem;
            display: block;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 1rem;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            font-weight: bold;
        }

        .btn-secondary {
            background-color: #6c757d;
            border: none;
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            font-weight: bold;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .custum-file-upload {
            height: 200px;
            width: 300px;
            display: flex;
            flex-direction: column;
            align-items: space-between;
            gap: 20px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
            border: 2px dashed #cacaca;
            background-color: rgba(255, 255, 255, 1);
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0px 48px 35px -48px rgba(0,0,0,0.1);
        }

        .custum-file-upload .icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custum-file-upload .icon svg {
            height: 80px;
            fill: rgba(75, 85, 99, 1);
        }

        .custum-file-upload .text {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .custum-file-upload .text span {
            font-weight: 400;
            color: rgba(75, 85, 99, 1);
        }

        .custum-file-upload input {
            display: none;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Update Product</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="new_nom">New Name</label>
            <input type="text" name="new_nom" id="new_nom" value="<?php echo $nom_produit; ?>" required>
            <br>
            <br>

            <label for="new_prix">New Price</label>
            <input name="new_prix" id="new_prix" type="number" value="<?php echo $prix; ?>" required>
            <br>
            <br>
            <label for="new_stock">New Quantity</label>
            <input name="new_stock" id="new_stock" type="number" value="<?php echo $stock; ?>" required>
            <br>
            <br>
           
            <label for="new_category">New Category</label>
            <select name="new_category" id="new_category" class="form-group" required>
                <?php
                    foreach ($categories as $categorie) {
                        $selected = ($categorie['id_categorie'] == $id_categorie) ? "selected" : "";
                        echo '<option value='.$categorie['id_categorie'].' '.$selected.'>'.$categorie['nom_categorie'].'</option>';
                    }
                ?>
            </select>
            <br>
            <br>
            <label for="new_image">New Image</label>
            <input type="file" id="new_image" name="new_image">
            <br>
            <br>
            <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
            <a href="./produit_index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
