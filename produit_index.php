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

        .table th, .table td {
            text-align: center;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-success:hover {
            background-color: #218838;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2>Produit</h2>
                        <a href="./create_produit.php" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add New Product</a>
                    </div>
                    <?php
                    // Include config file
                    include("./db/connection.php");
                    include("./produit.php");
                    include("./categorie.php");
                    $conn = new Connection();
                    $conn->selectDatabase('shop_site');
                    //suppression : 

                    if (isset($_POST['delete'])) {
                        $id = $_POST['id'];
                    
                        $query = "DELETE FROM produit WHERE id_produit = ?"; 
                        $stmt = $conn->conn->prepare($query);
                    
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                    
                        if ($stmt->affected_rows > 0) {
                            header("Location: ./produit_index.php?delete=success");
                            exit();
                        } else {
                            header("Location: ./produit_index.php?delete=failed");
                            exit();
                    }
                    }

                    ?>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Image </th>
                                <th>Name</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $query = "SELECT * FROM produit";
                            $result = $conn->conn->query($query);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $image = $row['img_produit'];
                                    $description = $row['description'];
                                    $nom = $row['nom_produit'];
                                    $prix = $row['prix'];
                                    $stock = $row['stock'];
                                    $id = $row['id_produit'];
                                    $cat = $row['id_categorie'];

                                    echo "<tr>
                                    <td><img src='$image' style='width: 100px; height: 100px;' alt='Image'></td>
                                    <td>$nom</td>
                                    <td>$prix</td>
                                    <td>$stock</td>

                                    <td>
                                        <div style='display: flex; gap: 10px;'>
                                            <a class='btn btn-success' href='./update_produit.php?id=$id'>MODIFIER</a>
                                            <form method='post'>
                                                <input type='hidden' name='id' value='$id'>
                                                <button type='submit' class='btn btn-secondary' name='delete'>Supprimer</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>";
                                
                                
                                }
                            } else {
                                echo "Aucun produit trouvé.";
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
