<?php
require_once 'CRUDAppartement.php';

$crud = new CRUDAppartement();
$ref = isset($_GET['ref']) ? $_GET['ref'] : null;

if ($ref === null) {
    echo "Reference not provided.";
    exit;
}


$app = $crud->recupererApp($ref)->fetch(PDO::FETCH_ASSOC);

if (!$app) {
    echo "No data found for the given reference.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ref = htmlspecialchars($_POST['ref']);
    $prop = htmlspecialchars($_POST['prop']);
    $loc = htmlspecialchars($_POST['loc']);
    $surf = htmlspecialchars($_POST['surf']);
    $dom = htmlspecialchars($_POST['dom']);
    $nbp = htmlspecialchars($_POST['nbp']);
    $surfEC = htmlspecialchars($_POST['surfEC']);
    $nbEtages = htmlspecialchars($_POST['nbEtages']);

    if (!empty($surfEC)) {
        $app = new appartement($ref, $prop, $loc, $surf, $nbp, $dom, $surfEC);
    } else {
        $app = new villa($ref, $prop, $loc, $surf, $nbp, $dom, $nbEtages);
    }

    $res = $crud->modifierApp($app);
    if ($res) {
        header('location:insEff.php?status=modified');
    } else {
        echo "erreur";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Appartement/Villa</title>
</head>
<body>
    <form method="POST">
        <label for="ref">Reference</label>
        <input type="text" name="ref" id="ref" value="<?= $app['ref'] ?>" readonly><br><br>

        <label for="prop">Proprietaire</label>
        <input type="text" name="prop" id="prop" value="<?= $app['prop'] ?>"><br><br>

        <label for="loc">Localite</label>
        <input type="text" name="loc" id="loc" value="<?= $app['loc'] ?>"><br><br>

        <label for="surf">Surface</label>
        <input type="text" name="surf" id="surf" value="<?= $app['surf'] ?>"><br><br>

        <label for="nbp">Nombre de pieces</label>
        <input type="text" name="nbp" id="nbp" value="<?= $app['nbp'] ?>"><br><br>

        <label for="dom">Domaine d'usage</label>
        <select name="dom" required>
            <option value="Bureau" <?= $app['dom'] == 'Bureau' ? 'selected' : '' ?>>Bureau</option>
            <option value="Domicile" <?= $app['dom'] == 'Domicile' ? 'selected' : '' ?>>Domicile</option>
        </select><br><br>

        <label for="surfEC">Surface de l'espace Commun</label>
        <input type="text" name="surfEC" id="surfEC" value="<?= isset($app['surfEC']) ? $app['surfEC'] : '' ?>"><br><br>

        <label for="nbEtages">Nombre d'etages</label>
        <input type="text" name="nbEtages" id="nbEtages" value="<?= isset($app['nbEtages']) ? $app['nbEtages'] : '' ?>"><br><br>

        <input type="submit" name="ok" value="Modifier">
    </form>
</body>
</html>