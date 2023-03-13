<?php
include 'connexion.php';

if (
    !empty($_POST['title']) 
&& !empty($_POST['description'])
&& !empty($_POST['creationDate'])
&& !empty($_POST['dueDate'])
&& !empty($_POST['statusPk'])
)
{
  
    $sql="INSERT INTO $nom_base_de_donnee.todolist(title,description,creationDate,dueDate,statusPk)
    VALUES (?,?,?,?,?) ";
    $req = $connexion->prepare($sql);

    $req->execute(array(
        $_POST['title'],
        $_POST['description'],
        $_POST['creationDate'],
        $_POST['dueDate'],
        $_POST['statusPk']
    ));


if($req->rowCount()!=0){
 $_SESSION['message']['text']="Todo ajoutée avec succès";
 $_SESSION['message']['type']="success";
}else {
    $_SESSION['message']['text']="Une erreur s'est produite lors de l'ajout de la todo";
 $_SESSION['message']['type']="danger";
 
}

}else { 
    $_SESSION['message']['text']="Une information obligatoire non renseignée";
    $_SESSION['message']['type']="danger";
    
}


header('location: ../vue/newtodo.php');
