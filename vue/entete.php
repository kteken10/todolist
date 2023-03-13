<?php


include_once '../model/fonction.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title><?php
    echo ucfirst(str_replace(".php","",basename($_SERVER['PHP_SELF'])));
    ?>
    </title>
    <link rel="stylesheet" href="../public/css/style.css" />
    <!-- Boxicons CDN Link -->
    <link
      href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
      rel="stylesheet"
     />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    
    <div class="sidebar">
      <div class="logo-details">
      <i class='bx bx-list-plus'></i>
        <span class="logo_name">Todolist</span>
      </div>
      <ul class="nav-links">
        <li>
          <a href="newtodo.php" class="<?php
    echo basename($_SERVER['PHP_SELF'])=="newtodo.php" ? "active" : ""
    
    ?> ">
    
          <i class='bx bx-plus-circle'></i>
            <span class="links_name" >Créer une todo</span>
          </a>
        </li>
        <li>
          <a href="liste.php" class="<?php
    echo basename($_SERVER['PHP_SELF'])=="liste.php" ? "active" : ""
    
    ?> ">>
          <i class='bx bx-glasses'></i>
            <span class="links_name">liste des todos</span>
          </a>
        </li>
     
        <!-- <li>
          <a href="#">
            <i class="bx bx-message" ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="#">
            <i class="bx bx-heart" ></i>
            <span class="links_name">Favrorites</span>
          </a>
        </li> -->
      
      </ul>
    </div>
    <section class="home-section">
      <nav>
        <div class="sidebar-button">
          <i class="bx bx-menu sidebarBtn"></i>
          <span class="dashboard"><?php
    echo ucfirst(str_replace(".php","",basename($_SERVER['PHP_SELF'])));
    
    ?></span>
        </div>
     
      </nav>