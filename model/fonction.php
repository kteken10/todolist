<?php
include 'connexion.php';

function getTodo($id=null)
{
    if(!empty($id)){
        $sql = "SELECT * FROM todolist where id=?";
    
        $req = $GLOBALS['connexion']->prepare($sql);
        $req->execute(array($id));
    
    
    
    return $req->fetch();
    }else{

    
    $sql = "SELECT * FROM todolist";
    
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();



return $req->fetchAll();}
 }
 function getStatus(){


    $sql = "SELECT * FROM Status";
   
    $req = $GLOBALS['connexion']->prepare($sql);
    $req->execute();



return $req->fetchAll();

    
    
}
