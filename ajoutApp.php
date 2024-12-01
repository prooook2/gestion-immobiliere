<?php
    ob_start();
    require_once 'CRUDAppartement.php';
    require_once 'appartement.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Appartement</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Bienvenue à la Gestion Immobilière</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="rech.php">Rechercher un Appartement
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
    <fieldset> 
        <legend>Ajout d'un Appartement</legend>
        <form action="ajoutApp.php" method="post">
            <label for="ref">Reference</label>
            <input type="text" name="ref" id="ref" required><br><br>
            <label for="prop">Proprietaire</label>
            <input type="text" name="prop" id="prop" required><br><br>
            <label for="loc">Localite</label>
            <input type="text" name="loc" id="loc" required><br><br>
            <label for="surf">Surface</label>
            <input type="text" name="surf" id="surf" required><br><br>
            <label for="nbp">Nombre de pieces</label>
            <input type="text" name="nbp" id="nbp" required><br><br>
            <label for="dom">Domaine d'usage</label>
            <select name="dom" required>
                <option value="Bureau">Bureau</option>
                <option value="Domicile">Domicile</option>
            </select><br><br>   
            <label for="surfEC">Surface de l'espace Commun</label>
            <input type="text" name="surfEC" id="surfEC" required><br><br>
            <input type="submit" name="ok" value="Ajouter">
        </form>
    </fieldset>
</body>
</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ok'])) {
    $ref = htmlspecialchars($_POST['ref']);
    $prop = htmlspecialchars($_POST['prop']);
    $loc = htmlspecialchars($_POST['loc']);
    $surf = htmlspecialchars($_POST['surf']);
    $nbp = htmlspecialchars($_POST['nbp']);
    $dom = htmlspecialchars($_POST['dom']);
    $surfEC = htmlspecialchars($_POST['surfEC']);

    // Create an instance of CRUDAppartement
    $crud = new CRUDAppartement();

    // Create an instance of the appartement class
    $appartement = new appartement($ref, $prop, $loc, $surf, $nbp, $dom, $surfEC);

    // Call the ajouterAppartement method
    $result = $crud->ajouterAppartement($appartement);

    if ($result) {
        header('Location: insEff.php?status=success');
        exit;
    } else {
        echo "Erreur lors de l'ajout de l'appartement";
    }
}
?>