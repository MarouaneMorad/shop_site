<?php 
    session_start();
    include("../db/connection.php");
    include("../user.php");
    include("../produit.php");
    include('../categorie.php');
   $conn = new Connection();
   $conn->selectDatabase('shop_site');
  



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MORAD SHOP</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!-- Stylesheet -->
    <link rel="stylesheet" type="text/css" href="../../css/admin_dashboard.css">
</head>

<body>
    <nav class="navbar navbar-light bg-light p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">
                 Dashboard Admin
            </a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse"
                data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-4 col-lg-2">
            <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
       
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php 
                    $nom =$_SESSION['nom'];
                    if (isset($nom)){
                         echo " Bienvenue $nom ";
                    }else{
                        echo "Bievenue";
                    }
                    
                    ?>
                 
                </button>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                    <li><a class="dropdown-item active" href="../logoutadmin.php"> LOG OUT </a></li>
                </ul>
            </div>
         </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./dashboard.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-home"><path
                                        d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline
                                        points="9 22 9 12 15 12 15 22"></polyline></svg>
                                <span class="ml-2">Menu </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../categorie_index.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21"
                                        r="1"></circle><circle cx="20" cy="21" r="1"></circle><path
                                        d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                <span class="ml-2">Categorie</span>
                            </a>
                        </li>
                        <!-- //COMMANDE  -->
                        <li class="nav-item">
                            <a class="nav-link" href="../produit_index.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-file"><path
                                        d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline
                                        points="13 2 13 9 20 9"></polyline></svg>
                                <span class="ml-2">Produits</span>
                            </a>
                        </li>
                     
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox=""></svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                          <li class="breadcrumb-item active" aria-current="page">Home</li>
                          <li class="breadcrumb-item "><a href="">Over view</a></li>
                    </ol>
                </nav>
            
               
              

                <!-- Add other content using similar loops -->


                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Liste des Utilisateurs </h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                        <th scope="col">Nom complet  </th>
                                        <th scope="col">email </th>
                                        <th scope="col">Contact via email </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        

                                        $query = "SELECT * FROM utilisateur";
                                        
                                        $result = $conn->conn->query($query);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $nom = $row['nom'];
                                                $email = $row['Email'];
                                                echo '
                                                    <tr>
                                                        <td>'.$nom.'</td>
                                                        <td>'.$email.'</td>   
                                                        <td>
                                                            <button class="btn btn-primary contact-email" data-email="'.$email.'">Contacter par Email</button>
                                                        </td>   
                                                    </tr>';
                                            }
                                        }
                                        
                                        
                                        ?>
                                      </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<br><br>
                <!-- Example loop for transactions -->
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                        <div class="card">
                            <h5 class="card-header">Liste des produits </h5>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                        <!-- <th scope="col">Product image </th> -->
                                        <th scope="col">Product name </th>
                                        <th scope="col">Prix </th>
                                        <th scope="col">STOCK  </th>
                                        <th scope="col">categorie</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        
                                        $query = "SELECT * FROM produit";
                                        
                                        $result = $conn->conn->query($query);

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $id = $row['id_produit'];
                                                // $image = $row['img_produit'];
                                                $nom = $row['nom_produit'];
                                                $prix = $row['prix'];
                                                $stock = $row['stock'];
                                                $id_categorie = $row['id_categorie'];


                                                echo "
                                                <tr>
                                                <td>$nom</td>
                                                <td>$prix</td>
                                                <td>$stock</td>
                                                <td>$id_categorie</td>
                                              

                                                </tr>";
                                                
                                                
                                            }
                                        } 
                                        ?>
                                      </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </main>
        </div>
    </div>
                                    

                                    
    <script>
    var emailButtons = document.querySelectorAll('.contact-email');

// Attacher un gestionnaire d'événements pour chaque bouton email
emailButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Récupérer l'email depuis le bouton associé
        var email = this.getAttribute('data-email');

        // Ouvrir un lien mailto pour contacter par email
        window.location.href = 'mailto:' + email;
    });
});
</script>              
                        
</body>
</html>
