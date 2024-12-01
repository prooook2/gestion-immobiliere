<?php
require_once 'CRUDAppartement.php';

$crud = new CRUDAppartement();
$app = null;
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ref = htmlspecialchars($_POST['ref']);
    $app = $crud->recupererApp($ref)->fetch(PDO::FETCH_ASSOC);

    if (!$app) {
        $message = "Aucune appartement trouvé";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rechercher Appartement</title>
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
    <form method="POST">
        <label for="ref">Reference</label>
        <input type="text" name="ref" id="ref" required>
        <input type="submit" value="Rechercher">
    </form>

    <?php
    if ($message) {
        echo "<p>$message</p>";
    }
    ?>

    <?php
    if ($app) {
    ?>
        <form method="POST" action="modif.php">
            <label for="ref">Reference</label>
            <input type="text" name="ref" id="ref" value="<?php echo $app['ref']; ?>" readonly><br><br>

            <label for="prop">Proprietaire</label>
            <input type="text" name="prop" id="prop" value="<?php echo $app['prop']; ?>"><br><br>

            <label for="loc">Localite</label>
            <input type="text" name="loc" id="loc" value="<?php echo $app['loc']; ?>"><br><br>

            <label for="surf">Surface</label>
            <input type="text" name="surf" id="surf" value="<?php echo $app['surf']; ?>"><br><br>

            <label for="nbp">Nombre de pieces</label>
            <input type="text" name="nbp" id="nbp" value="<?php echo $app['nbp']; ?>"><br><br>

            <label for="dom">Domaine d'usage</label>
            <select name="dom" required>
                <option value="Bureau" <?php if ($app['dom'] == 'Bureau') echo 'selected'; ?>>Bureau</option>
                <option value="Domicile" <?php if ($app['dom'] == 'Domicile') echo 'selected'; ?>>Domicile</option>
            </select><br><br>

            <label for="surfEC">Surface de l'espace Commun</label>
            <input type="text" name="surfEC" id="surfEC" value="<?php echo isset($app['surfEC']) ? $app['surfEC'] : ''; ?>"><br><br>

            <label for="nbEtages">Nombre d'etages</label>
            <input type="text" name="nbEtages" id="nbEtages" value="<?php echo isset($app['nbEtages']) ? $app['nbEtages'] : ''; ?>"><br><br>

            <input type="submit" name="ok" value="Modifier">
        </form>
    <?php
    }
    ?>
</body>
</html>