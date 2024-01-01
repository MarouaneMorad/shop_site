<?php

class Admin{
   
public $id_user;
public $nom;
public $Email;
public $mdp;

public static $errorMsg = "";

public static $successMsg="";


public function __construct($nom,$Email,$mdp){
    $this->nom=$nom;
    $this->Email=$Email;
    $this->mdp=password_hash($mdp,PASSWORD_DEFAULT);

}
//register : 
public function insertAdmin($tableName,$conn){
$sql="insert into $tableName (nom,Email,mdp)
     values('$this->nom','$this->Email','$this->mdp') ";
     if(mysqli_query($conn,$sql)){
        self::$successMsg="Nouveau User Ajouté ";
     }else{
        self::$errorMsg="Error ";

     }

}

public static function  selectAllUsers($tableName,$conn){
        $sql="select nom ,Email from $tableName";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $data=[];
            while($row=mysqli_fetch_assoc($result)){
                $data[]=$row;
            }
            return $data;
        }

}

static function selectUserById($tableName,$conn,$id){
    $sql="select nom ,Email from $tableName where id_user=$id ";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){

        $row= mysqli_fetch_row($result);
    }
    return $row;
}

static function updateUser($client,$tableName,$conn,$id){
    $sql="update $tableName set nom ='$client->nom', Email='$client->Email'";
    if(mysqli_query($conn,$sql)){
        self::$successMsg="User a ete modifier";

        
    }else{
        self::$errorMsg="erreur d'update ";
    }

}

static function deleteUser($tableName,$conn,$id){
   $sql="delete  from $tableName where id_user=$id";
  
   if(mysqli_query($conn,$sql)){
    self::$successMsg="User a ete supprimer";

        
    }else{
        self::$errorMsg="erreur de suppression ";
    }

}
}
?>
