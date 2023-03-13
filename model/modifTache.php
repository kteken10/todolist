<?php
include 'connexion.php';

if(!empty($_POST['id'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $dueDate = $_POST['dueDate'];
    $statusPk = $_POST['statusPk'];
    $sql="UPDATE todolist SET title=:title, description=:description, dueDate=:dueDate, statusPk=:statusPk WHERE id=:id";
    $req = $connexion->prepare($sql);
    $req->bindParam(':title', $title);
    $req->bindParam(':description', $description);
    $req->bindParam(':dueDate', $dueDate);
    $req->bindParam(':statusPk', $statusPk);
    $req->bindParam(':id', $id);
    $req->execute();
    $_SESSION['message'] = array(
        'text' => 'Tâche mise à jour avec succès !',
        'type' => 'success'
    );
} else {
    // $title = $_POST['title'];
    // $description = $_POST['description'];
    // $dueDate = $_POST['dueDate'];
    // $statusPk = $_POST['statusPk'];

    // $stmt = $pdo->prepare("INSERT INTO todos (title, description, dueDate, statusPk) VALUES (:title, :description, :dueDate, :statusPk)");
    // $stmt->bindParam(':title', $title);
    // $stmt->bindParam(':description', $description);
    // $stmt->bindParam(':dueDate', $dueDate);
    // $stmt->bindParam(':statusPk', $statusPk);
    // $stmt->execute();

    // $_SESSION['message'] = array(
    //     'text' => 'Tâche ajoutée avec succès !',
    //     'type' => 'success'
    // );

    
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
}
else {
    $_SESSION['message']['text']="Une erreur s'est produite lors de l'ajout de la todo";
 $_SESSION['message']['type']="danger";
 
}

}else { 
    $_SESSION['message']['text']="Une information obligatoire non renseignée";
    $_SESSION['message']['type']="danger";
    
}


}

// header('Location: ../vue/liste.php');
header('location: ../vue/newtodo.php');
exit();
?>
