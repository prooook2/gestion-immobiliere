<?php
include_once 'immobilier.php';
include_once 'villa.php';
include 'appartement.php';

require_once 'config.php';
class CRUDAppartement {
    private $Connexion;
    function __construct() {
        $connexion = new config();
        $this->Connexion = $connexion->getConnexion();
    }
    function ajouterAppartement(immobilier $app) {
        $ref = $app->getRef();
        $prop = $app->getProp();
        $loc = $app->getLoc();
        $surf = $app->getSurf();
        $nbp = $app->getNbp();
        $dom = $app->getDom();
        
        if ($app instanceof appartement) {
            $surfEC = $app->getSurfEC();
            $sql = "INSERT INTO immobilier (ref, prop, loc, surf, nbp, dom, surfEC) VALUES ($ref, '$prop', '$loc', $surf, $nbp, '$dom', $surfEC)";
        } elseif ($app instanceof villa) {
            $nbEtages = $app->getNbEtages();
            $sql = "INSERT INTO immobilier (ref, prop, loc, surf, nbp, dom, nbEtages) VALUES ($ref, '$prop', '$loc', $surf, $nbp, '$dom', $nbEtages)";
        } else {
            $sql = "INSERT INTO immobilier (ref, prop, loc, surf, nbp, dom) VALUES ($ref, '$prop', '$loc', $surf, $nbp, '$dom')";
        }
        
        $res = $this->Connexion->exec($sql);
        return $res;
    }
    function recupererApp($ref) {
        $sql = "SELECT * FROM immobilier WHERE ref=$ref";
        $res = $this->Connexion->query($sql);
        return $res;
    }
    function supprimerApp($ref) {
        $sql = "DELETE FROM immobilier WHERE ref=$ref";
        $res = $this->Connexion->exec($sql);
        return $res;
    }
    function modifierApp(immobilier $app) {
        $ref = $app->getRef();
        $prop = $app->getProp();
        $loc = $app->getLoc();
        $surf = $app->getSurf();
        $nbp = $app->getNbp();
        $dom = $app->getDom();
        
        if ($app instanceof appartement) {
            $surfEC = $app->getSurfEC();
            $sql = "UPDATE immobilier SET prop='$prop', loc='$loc', surf=$surf, nbp=$nbp, dom='$dom', surfEC=$surfEC WHERE ref=$ref";
        } elseif ($app instanceof villa) {
            $nbEtages = $app->getNbEtages();
            $sql = "UPDATE immobilier SET prop='$prop', loc='$loc', surf=$surf, nbp=$nbp, dom='$dom', nbEtages=$nbEtages WHERE ref=$ref";
        } else {
            $sql = "UPDATE immobilier SET prop='$prop', loc='$loc', surf=$surf, nbp=$nbp, dom='$dom' WHERE ref=$ref";
        }
        
        $res = $this->Connexion->exec($sql);
        return $res;
    }

    function listerApp() {
        $sql = "SELECT * FROM immobilier";
        $res = $this->Connexion->query($sql);
        return $res;
    }
}
?>