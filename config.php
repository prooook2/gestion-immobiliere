<?php
    class config {
        private $pdo;
        function __construct() {
            try{
            $dsn="mysql:host=localhost;dbname=gestionimmobiliere";
            $user="root";
            $pw="";
            $this->pdo = new PDO($dsn, $user, $pw);}
            catch (PDOException $e) {
                echo "erreur".$e->getMessage();}
            }

        function getConnexion() {
            return $this->pdo;
        }}

?>