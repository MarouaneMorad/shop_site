<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">
  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link href="css/tiny-slider.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <title>MORAD SHOP   </title>
</head>

<body>

  <!-- Start Header/Navigation -->
  <?php include("./header.php") ;
 include('./produit.php');
include('./db/connection.php');
$conn=new Connection();
$conn->selectDatabase('shop_site');
$counter=0;
 
 
 ?>
  
  
  <!-- End Header/Navigation -->

  <!-- Start Hero Section -->
  <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 justify-content-center">
                <?php
                    $query = "SELECT * FROM produit";
                    $result = $conn->conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $image = $row['img_produit'];
                            $nom = $row['nom_produit'];
                            $description = $row['description'];
                            $prix = $row['prix'];
                            
                            ?>
                            <div class="col mb-4">
                                <div class="card h-100">
                                    <img class="card-img-top" style="height: 350px; weight: 200px;" src="<?php echo $image; ?>" alt="Product Image">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: black;">Name: <?php echo $nom; ?></h5>
                                        <p class="card-text" style="color: black;">Description: <?php echo $description; ?></p>
                                        <h6 class="card-subtitle mb-2 text-muted">PRIX EN DH: <?php echo $prix ?></h6>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-center">
                                            <a class="btn btn-outline-dark" href="#">Ajouter au panier</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $counter++;
                            if ($counter % 2 == 0) {
                                echo '</div><div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 justify-content-center">';
                            }
                        }
                    } else {
                        echo "No data found.";
                    }
                ?>
            </div>
        </div>
    </section>

  <!-- End Product Section -->

 <!-- Start Why Choose Us Section -->
 <div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Why Choose Us</h2>
						<p>Elevate your shopping experience with MORAD SHOP, where exceptional quality meets unbeatable service. We pride ourselves on curating high-quality products, ensuring fast and free shipping, and providing round-the-clock customer support. </p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Fast &amp; Free Shipping</h3>
									<p>Enjoy our fast and efficient delivery service. We understand the anticipation of receiving your purchases, which is why we strive to get them to you quickly, no matter where you are. Plus, shipping is free for all orders because we believe convenience should never compromise your budget.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Easy to Shop</h3>
									<p>We understand that sometimes things may not meet your expectations. That's why we offer a simple and hassle-free return process. If you're not completely satisfied with your purchase, contact us, and we'll work with you to find the best solution.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p>Your satisfaction is our absolute priority. Our dedicated customer service team is available 24/7 to address any questions, concerns, or assistance you may need. We are here for you at every step of your shopping experience.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Hassle Free Returns</h3>
									<p>We understand that sometimes things may not meet your expectations. That's why we offer a simple and hassle-free return process. If you're not completely satisfied with your purchase, contact us, and we'll work with you to find the best solution.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
                            <!-- image a changer  -->
							<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

		<!-- Start We Help Section -->
		<div class="we-help-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-7 mb-5 mb-lg-0">
						<div class="imgs-grid">
							<div class="grid grid-1"><img src="images/img-grid-1.jpg" alt="Untree.co"></div>
							<div class="grid grid-2"><img src="images/img-grid-2.jpg" alt="Untree.co"></div>
							<div class="grid grid-3"><img src="images/img-grid-3.jpg" alt="Untree.co"></div>
						</div>
					</div>
					<div class="col-lg-5 ps-lg-5">
						<h2 class="section-title mb-4">We Make Shopping a Delightful Experience</h2>
						<p>At MORAD SHOP , we believe that shopping goes beyond transactions; it's an experience tailored just for you. When you choose us, you're not just making purchases.  you're unlocking a world of advantages:</p>

						<ul class="list-unstyled custom-list my-4">
							<li>Discover Modern Interior Design</li>
							<li>Expertly Crafted Products</li>
							<li>Convenient and Secure Transactions</li>
							<li>A Commitment to Excellence</li>
						</ul>
                        <!-- //erreur de navigation : -->
                        <p><a href="./shop.php" class="btn">SHOP</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- End We Help Section -->

		<!-- Start Popular Product -->
	<?php   include("./founder.php") ?>
        <!-- FOOTER  -->
        <?php include("./footer.php")?>
</body>
			

		

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/tiny-slider.js"></script>
  <script src="js/custom.js"></script>
</body>
</html>
