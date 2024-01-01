<?php session_start();  ?>
<style>
/* Style for the logout link */


.custom-navbar li a {
    display: inline-block; /* Display list items horizontally */
    margin: auto;
}

#logout {
    text-decoration: none; /* Remove underline from links */
    color: #ffffff; /* Set text color */
    border-radius: 5px; /* Add rounded corners */
    transition: background-color 0.3s ease; /* Add smooth transition */
}



</style>
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

<div class="container">
    <a class="navbar-brand" href="index.php"><?php 
    if (empty($_SESSION['nom'])){
        echo "MORAD SHOP";
    }else{
        echo "Bienvenue ";
    }
     ?><span></span></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsFurni">
        <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item active">
                <a class="nav-link" href="./index.php">Home</a>
            </li>
            <li><a class="nav-link" href="shop.php">Shop</a></li>
            <li><a class="nav-link" href="about.php">About us</a></li>
            <li><a class="nav-link" href="contact.php">Contact us</a></li>
        </ul>
        
        <?php

            if (!isset($_SESSION['nom'])) {
                $bar = '
                    <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
                        <li><a class="nav-link" href="./login.php"><img src="images/user.svg"></a></li>
                    </ul>
                ';
                echo $bar;
            } else {
                echo '
                    <ul >
                        <li><a id="logout"  href="./logout.php"> LOG OUT </a></li>
                    </ul>
                ';
            }
            ?>

    </div>
</div>
    
</nav>