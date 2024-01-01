<?php

class Categorie{
   
public $id_categorie;
public $nom_categorie;




public function __construct($id_categorie,$nom_categorie){
    $this->id_categorie=$id_categorie;

    $this->nom_categorie=$nom_categorie;
  



}
//register : 
public function insertCategorie($tableName,$conn){
$sql="insert into $tableName (id_categorie,nom_categorie)
     values('$this->id_categorie','$this->nom_categorie') ";
    //  ,'$this->id_admin'
    //  on va le recuperer en session 
     if(mysqli_query($conn,$sql)){
        echo"categorie ajouté ";
     }else{
        echo"erreur  d'ajout ";

     }

}

public static function  selectAllCategories($tableName,$conn){
        $sql="select id_categorie, nom_categorie from $tableName";
        $result=mysqli_query($conn,$sql);
        if($result && mysqli_num_rows($result)>0){
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

static function selectCategorieById($tableName,$conn,$id){
    $sql="select nom_categorie from $tableName where id_categorie=$id ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){

        $row= mysqli_fetch_row($result);
    }
    return $row;
}

static function updateCategorie($produit,$tableName,$conn,$id){

// $sql="insert into $tableName (id_produit,nom_produit,prix,stock,image_produit,id_categorie,id_admin)

    $sql="update $tableName set nom_categorie ='$produit->nom_categorie'";
    if(mysqli_query($conn,$sql)){
    echo "categorie est Modifié ";
        
    }else{
        echo "Erreur de modif de categorie  ";
    }

}

static function deletecategorie($tableName,$conn,$id){
   $sql="delete  from $tableName where id_categorie=$id";
  
   if(mysqli_query($conn,$sql)){
    echo"categorie a ete supprimer";
    }else{
        echo"erreur de suppression ";
    }

}
}
?>
