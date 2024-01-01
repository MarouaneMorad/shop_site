<?PHP
  // Include config file
  require_once "./db/connection.php";
  include("./categorie.php");
  $conn = new Connection();
  $conn->selectDatabase('shop_site');

    if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM categorie WHERE id_categorie = ?"; 
    $stmt = $conn->conn->prepare($query);

    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header("Location: categorie_index.php?delete=success");
        exit();
    } else {
        header("Location: categorie_index.php?delete=failed");
        exit();
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
                        <h2>Categorie</h2>
                        <a href="./create_categorie.php" class="btn btn-success float-right"><i class="fa fa-plus"></i> Add New categorie</a>
                    </div>
                    <?php
                  

                    ?>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID Categorie</th>
                                <th>Nom Categorie</th>
                                <th> ACTION </th>                            
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $categories = Categorie::selectAllCategories('categorie', $conn->conn);
                            foreach ($categories as $categorie) {
                                $id = $categorie['id_categorie'];
                                $name=$categorie['nom_categorie'];
                                echo "<tr>
                                <td>$id</td>
                                <td>$name</td>
                                <td>
                                <form method='post'>
                                <input type='hidden' name='id' value='$id'>
                                <button type='submit' class='btn btn-secondary' name='delete'>Supprimer</button>
                                </form>
                                 </td>
                                </tr>";
                                
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
