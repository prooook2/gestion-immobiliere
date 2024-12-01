<?php
    require_once 'CRUDAppartement.php';
    $crud=new CRUDAppartement();
    $app=$crud->listerApp();
    ?>
    <head><link rel="stylesheet" href="bootstrap.css"></head>
    <body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Bienvenue à la Gestion Immobilière</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Rechercher un Appartement
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="rechVilla.php">Rechercher une Villa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="listeApp.php">Lister les Appartements</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ajoutApp.php">Ajouter un Appartement</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
    <table border="1">
        <tr>
            <th>Reference</th>
            <th>Proprietaire</th>
            <th>Localite</th>
            <th>Surface</th>
            <th>usage</th>
            <th>Nombre de pieces</th>
            <th>espace commun</th>
            <th colspan="2">action</th>
        </tr>
        <?php
            foreach ($app as $ap) {
        ?>      <tr>
                    <td><?=$ap[0]?></td>
                    <td><?=$ap[1]?></td>
                    <td><?=$ap[2]?></td>
                    <td><?=$ap[3]?></td>
                    <td><?=$ap[4]?></td>
                    <td><?=$ap[5]?></td>
                    <td><?=$ap[6]?></td>
                    <td><a href="modif.php?ref=<?= $ap[0] ?>"> modifier </a></td>
                    <td><a href="supp.php?ref=<?=$ap[0]?>">supprimer</a></td>
                </tr>
             <?php   
            } ?>
        
    
    </table>
    </body>