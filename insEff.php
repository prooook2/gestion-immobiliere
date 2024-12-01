<h1>Insertion effectuée avec succès</h1>
<form method="POST">
    <button type="submit" name="ok1">Lister</button>
</form>

<?php
if (isset($_POST['ok1'])) {
    header('location:listeApp.php');
    exit;
}
?>