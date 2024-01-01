<?php

class produit{
   
public $id_produit;
public $nom_produit;
public $prix;
public $stock;
public $image_produit;
public $id_categorie;



public function __construct($id_produit,$nom_produit,$prix,$stock,$image_produit,$id_categorie){
    $this->id_produit=$id_produit;
    $this->nom_produit=$nom_produit;
    $this->prix=$prix;
    $this->stock=$stock;
    $this->image_produit=$image_produit;
    $this->id_categorie=$id_categorie;



}
//register : 
public function insertProduit($tableName,$conn){
$sql="insert into $tableName (id_produit,nom_produit,prix,stock,image_produit,id_categorie,id_admin)
     values('$this->id_produit','$this->nom_produit','$this->prix','$this->stock','$this->image_produit','$this->id_categorie') ";
    //  ,'$this->id_admin'
    //  on va le recuperer en session 
     if(mysqli_query($conn,$sql)){
        echo"produit ajouté ";
     }else{
        echo"erreur  d'ajout ";

     }

}

public static function  selectAllProducts($tableName,$conn){
        $sql="select * from $tableName";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $data=[];
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
            return $data;
        }

}
// function afficher(){
//     if(require("./db/connection.php")){
//         $req-$access->prepare ("SELECT * FROM utilisateur ORDER BY id_user DESC");
//         $req->execute ();
//         $data = $req->fetchAll(PDO::FETCH_OBJ) ;
//         return $data;
//         $req->closeCursor();
//     }
// }

static function selectProduitById($tableName,$conn,$id){
    $sql="select * from $tableName where id_user=$id ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){

        $row= mysqli_fetch_row($result);
    }
    return $row;
}

static function updateProduit($produit,$tableName,$conn,$id){

// $sql="insert into $tableName (id_produit,nom_produit,prix,stock,image_produit,id_categorie,id_admin)

    $sql="update $tableName set nom_produit ='$produit->nom_produit', prix='$produit->prix',stock='$produit->stock',id_categorie='$produit->id_categorie'";
    if(mysqli_query($conn,$sql)){
    echo "Produit est Modifié ";
        
    }else{
        echo "Erreur de modif de Produit  ";
    }

}

static function deleteProduit($tableName,$conn,$id){
   $sql="delete  from $tableName where id_produit=$id";
  
   if(mysqli_query($conn,$sql)){
    echo"Produit a ete supprimer";
    }else{
        echo"erreur de suppression ";
    }

}
}
?>
