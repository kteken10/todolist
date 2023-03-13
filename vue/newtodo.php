<?php
include 'entete.php';

if(!empty($_GET['id'])){
    $todos=getTodo($_GET['id']);
}

?>

<div class="home-content">
<div class="overview-boxes">
    <div class="box">
        <form action="../model/modifTache.php" method="post">
        <label for="title">Titre</label>
        <input value="<?= !empty($_GET['id'])? $todos['title']:""?>"type="text" name="title" id="title" placeholder="Veuillez saisir le titre">
        <input value="<?= !empty($_GET['id'])? $todos['id']:""?>"type="hidden" name="id" id="id" >
        <label for="description">Description</label>
        <input value="<?= !empty($_GET['id'])? $todos['description']:""?>"type="text" name="description" id="description" placeholder="Veuillez saisir la description">
        <label for="creationDate">Date Creation</label>
        <input value="<?= date('Y-m-d\TH:i:s') ?>" type="datetime-local" name="creationDate" id="creationDate" <?php if (!empty($_GET['id'])) { echo 'disabled'; } ?>>

        <label for="date_echeance">Date d'echeance</label>
        <input value="<?= !empty($_GET['id'])? $todos['dueDate']:""?>"type="datetime-local" name="dueDate" id="dueDate" >
        <label for="statusPk">Statut</label>
<select name="statusPk" id="statusPk">
    <option <?= !empty($_GET['id']) && $todos['statusPk']=="En attente" ? "selected" :""?> value ="En attente">En attente</option>
    <option <?= !empty($_GET['id']) && $todos['statusPk']=="En cours" ? "selected" :""?>value ="En cours">En cours</option>
    <option <?= !empty($_GET['id']) && $todos['statusPk']=="Termine" ? "selected":""?>value ="Termine">Terminé</option>
  
     </select>
<button type="submit">Valider </button>
<div class="alert 
<?=$_SESSION['message']['type'] ?>">
<?= $_SESSION['message']['text'] ?>
<script>
    setTimeout(function() {
        document.querySelector(".alert").style.display = "none";
    }, 500);
</script>

</div>
<?php
if (!empty($_SESSION['message']['text'])) {
?>
    

<?php
}
?>
        </form>
   
    </div>
    <div class="box">
        <table class="mtable">
            <tr>
                <th>Titre</th>
             
                <th>Action</th>
                
</tr>
<?php
$taches= getTodo();
if (!empty($taches) && is_array($taches)) {
    foreach ($taches as $key=> $value){
        ?>
        <tr >
            <td><?=$value['title'] ?></td>
      
            <td><a href="liste.php"><i class='bx bx-glasses'></i> </a><a href="?id=<?= $value['id'] ?>"><i class='bx bx-edit-alt'></i> </a> <a onclick="suppTache(<?= $value['id'] ?>)" style="color:red;">
    <i class='bx bx-trash'></i>
</a>
 </td>
            
    </tr>
   

   
            <?php
    }

}

?>
</div>


</div>
    </section>

<?php

include 'pied.php';
?>
<script>
  function suppTache(id) {
    if (confirm("Voulez-vous vraiment supprimer cette tâche ?")) {
        // créer un objet XMLHttpRequest
        var xhr = new XMLHttpRequest();
        
        // définir la fonction de rappel à exécuter lorsque la réponse est reçue
        // xhr.onreadystatechange = function() {
        //     if (xhr.readyState === XMLHttpRequest.DONE) {
        //         if (xhr.status === 200) {
        //             // la suppression a réussi
        //             alert("La tâche a été supprimée avec succès !");
        //             // recharger la page pour afficher les changements
        //             window.location.reload();
        //         } else {
        //             // la suppression a échoué
        //             alert("La suppression de la tâche a échoué. Veuillez réessayer plus tard."+id);
        //         }
        //     }
        // };
        
        // préparer la requête HTTP DELETE pour supprimer la tâche avec l'ID donné
        xhr.open("DELETE", "../model/suppTache.php?id=" + encodeURIComponent(id), true);
        
        // envoyer la requête HTTP DELETE
        xhr.send();
    }
}


    </script>