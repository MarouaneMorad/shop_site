<!-- Navbar End -->
<div class="container">
        <div class="row">
           
            <?php
                $query = "SELECT * FROM produit";
                $result = $conn->conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    
                    $image = $row['img_produit'];
                    $nom=$row['nom_produit'];
                    $description = $row['description'];
                    $prix = $row['prix'];
                 
                   
                    $produit = produit::selectClientByID('client', $conn->conn, $idClient);
                   
                    ?>
                    <div class="col-sm-3">
                        <div class="card">
                            
                           
                            <img class="property-image" src="<?php echo $image; ?>" alt="Property Image">
                            <div class="card-body">
                            <h5 class="card-title"  style="color: black;">Name: <?php echo $nom; ?></h5>
                                <h5 class="card-title"  style="color: black;">Description: <?php echo $description; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">PRIX  EN DH : <?php echo $prix ?></h6>
                                <h6 class="card-subtitle mb-2 text-muted">Prix en MAD: <?php echo $prix; ?></h6>
                                <form method="post">
                                    <input type="hidden" name="id" value="<?php echo $row['id_location']; ?>">
                                    <button type="submit" class="btn btn-primary py-2 px-4 d-none d-lg-block" name="delete">Supprimer</button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                    $counter++;
                    if ($counter % 4 == 0) {
                        echo '</div><div class="row">';
                    }
                }
            } else {
                echo "No data found.";
            }
            ?>
        </div>