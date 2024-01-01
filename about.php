
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="css/tiny-slider.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<title>MORAD SHOP  </title>
	</head>

	<body>
    <?php include("./header.php") ?>

	
		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>About Us</h1>
								<p class="mb-4">MORAD SHOP , we believe that shopping goes beyond transactions; it's an experience tailored just for you. When you choose us, you're not just making purchases.</p>
								<p><a href="./shop.php" class="btn btn-out-line-secondary me-2">Shop Now</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="images/couch.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<!-- Start Why Choose Us Section -->
		<div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-lg-6">
						<h2 class="section-title">Why Choose Us</h2>
						<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>

						<div class="row my-5">
							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/truck.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Fast &amp; Free Shipping</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/bag.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Easy to Shop</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/support.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>24/7 Support</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

							<div class="col-6 col-md-6">
								<div class="feature">
									<div class="icon">
										<img src="images/return.svg" alt="Image" class="imf-fluid">
									</div>
									<h3>Hassle Free Returns</h3>
									<p>Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate.</p>
								</div>
							</div>

						</div>
					</div>

					<div class="col-lg-5">
						<div class="img-wrap">
							<img src="images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- End Why Choose Us Section -->

<?php
    //RECUPERER DE DB   : 
    $teamMembers = [
        [
            'image' => 'images/person_1.jpg',
            'name' => 'Lawson Arnold',
            'position' => 'CEO, Founder, Atty.',
            'description' => 'Separated they live in. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.'
        ],
        [
            'image' => 'images/person_2.jpg',
            'name' => 'Jeremy Walker',
            'position' => 'CEO, Founder, Atty.',
            'description' => 'Separated they live in. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.'
        ],
        [
            'image' => 'images/person_3.jpg',
            'name' => 'Patrik White',
            'position' => 'CEO, Founder, Atty.',
            'description' => 'Separated they live in. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.'
        ],
        [
            'image' => 'images/person_4.jpg',
            'name' => 'Kathryn Ryan',
            'position' => 'CEO, Founder, Atty.',
            'description' => 'Separated they live in. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.'
        ]
    ];
    

    echo '<div class="container">';

    echo '<div class="row">';

    foreach ($teamMembers as $member) {
        echo '<div class="col-md-3 mb-5">';
        echo '<div class="card">';
        echo '<img src="' . $member['image'] . '" class="card-img-top mb-3" alt="' . $member['name'] . '">';
        echo '<div class="card-body">';
        echo '<h3 class="card-title"><a href="#">' . $member['name'] . '</a></h3>';
        echo '<p class="card-text">' . $member['position'] . '</p>';
        echo '<p class="card-text">' . $member['description'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    echo '</div>';
    ?>

            

		<!-- Start Testimonial Slider -->
		<?php include("./founder.php") ?>
		<!-- End Testimonial Slider -->

		

		<!-- Start Footer Section -->
		<?php include("./footer.php") ?>
		<!-- End Footer Section -->	


		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
