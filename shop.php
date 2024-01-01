
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
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title> MORAD SHOP </title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<?php  include("./header.php")   ?>
		<!-- End Header/Navigation -->

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Shop</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section product-section before-footer-section">
		    <div class="container">
		      	<div class="row">

                  <?php

    // on va les recuperer de base de donnée 
    $products = [
        [
            'image' => 'images/product-3.png',
            'title' => 'Nordic Chair',
            'price' => '$50.00',
        ],
        [
            'image' => 'images/product-1.png',
            'title' => 'Nordic Chair',
            'price' => '$50.00',
        ],
        [
            'image' => 'images/product-2.png',
            'title' => 'Kruzo Aero Chair',
            'price' => '$78.00',
        ],
        [
            'image' => 'images/product-3.png',
            'title' => 'Ergonomic Chair',
            'price' => '$43.00',
        ],
    ];

    // Loop through the products and generate HTML
    foreach ($products as $product) {
        echo '<div class="col-12 col-md-4 col-lg-3 mb-5">';
        echo '<a class="product-item" href="#">';
        echo '<img src="' . $product['image'] . '" class="img-fluid product-thumbnail">';
        echo '<h3 class="product-title">' . $product['title'] . '</h3>';
        echo '<strong class="product-price">' . $product['price'] . '</strong>';
        echo '<span class="icon-cross">';
        echo '<img src="images/cross.svg" class="img-fluid">';
        echo '</span>';
        echo '</a>';
        echo '</div>';
    }

    ?>


                    </div>
                </div>
            </div>

    <?php include("./footer.php") ?>


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
