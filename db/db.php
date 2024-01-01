<?php

// Include the connection file
include('./connection.php');

// Create an instance of the Connection class
$connection = new Connection();

// Call the createDatabase method to create the database "shop_site"
// $connection->createDatabase('shop_site');

$user = "
    CREATE TABLE Utilisateur (
        id_user INT  AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        Email VARCHAR(255) NOT NULL,
        mdp VARCHAR(255) NOT NULL
    )";

$responsable = "
    CREATE TABLE Responsable (
        id_admin INT PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        Email VARCHAR(255) NOT NULL,
        mdp VARCHAR(255) NOT NULL
    )";

$employee = "
    CREATE TABLE employe (
        id_employe INT PRIMARY KEY,
        nom VARCHAR(255) NOT NULL,
        profession VARCHAR(255),
        description VARCHAR(255),
        img_employee BLOB 
    )";

$commande = "
    CREATE TABLE Commande (
        id_cmd INT PRIMARY KEY,
        id_user INT,
        date_cmd DATE NOT NULL,
        FOREIGN KEY (id_user) REFERENCES Utilisateur(id_user)
    )";

$categories = "
    CREATE TABLE Categorie (
        id_categorie INT PRIMARY KEY,
        nom_categorie VARCHAR(255) NOT NULL
    )";

$produit = "
    CREATE TABLE Produit (
        id_produit INT PRIMARY KEY,
        nom_produit VARCHAR(255) NOT NULL,
        prix DECIMAL(10, 2) NOT NULL,
        stock INT NOT NULL,
        id_categorie INT,
        id_admin INT,
        img_produit BLOB ,
        FOREIGN KEY (id_categorie) REFERENCES Categorie(id_categorie),
        FOREIGN KEY (id_admin) REFERENCES Responsable(id_admin)
    )";

// Call the selectDatabase method to select the shop_site
$connection->selectDatabase('shop_site');

// Call the createTable method to create tables with the $query
// $connection->createTable($user);
// $connection->createTable($responsable);
// $connection->createTable($employee);
// $connection->createTable($commande);
// $connection->createTable($categories);
// $connection->createTable($produit);

?>
