<?php
include 'entete.php';
if(!empty($_GET['id'])){
    $todos=getTodo($_GET['id']);
}
?>
   <div class="home-content">
<div class="overview-boxes">
    <div class="box">
        <table class="mtable">
            <tr>
                <th>Titre</th>
                <th>Description</th>
                <th>Date de creation</th>
                <th>Date d'echeance</th>
                <th>Statut</th>
                
</tr>
<?php
$taches= getTodo();
if (!empty($taches) && is_array($taches)) {
    foreach ($taches as $key=> $value){
        ?>
        <tr >
            <td><?=$value['title'] ?></td>
            <td><?=$value['description'] ?></td>
            <td><?=$value['creationDate'] ?></td>
            <td><?=$value['dueDate'] ?></td>
            <td><?=$value['statusPk'] ?></td>

            
            
    </tr>
   

   
            <?php
    }

}

?>
</div>


</div>
</div>


</div>
    </section>


<script>
    function suppTache(title,description,cretaionDate,dueDate,statusPk){
        if(confirm("Voulez-vous vraiment supprimer cette tache?")){
            windows.location.href = "../model/suppTache.php?tiltle="+title+"&description="+description+"&creationDate="+creationDate+"&dueDate="+dueDate+"&statusPk="+statusPk
        }

    }
    </script>
<?php
include 'pied.php';
?>