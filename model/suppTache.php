<?php
//connexion à la base de donnée pour executer les requettes
include 'connexion.php';
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    
    // supprimer la tâche avec l'ID donné
    // remplacer la ligne suivante par le code nécessaire pour supprimer la tâche dans la base de données
    // par exemple : 
    $sql="DELETE FROM todolist WHERE id = ?";
    $req = $connexion->prepare($sql);
    $req->execute([$id]);
   
    
    // renvoyer une réponse HTTP 200 OK si la suppression a réussi
    http_response_code(200);
    } 

else {
    // renvoyer une réponse HTTP 400 Bad Request si l'ID de la tâche n'est pas spécifié
    http_response_code(400);
}

?>
