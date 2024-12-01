<?php
    class villa extends immobilier {
        private $nbEtages;

        public function __construct($ref, $prop, $loc, $surf, $nbp, $dom, $nbEtages) {
            parent::__construct($ref, $prop, $loc, $surf, $nbp, $dom);
            $this->nbEtages=$nbEtages;
        }

        /**
         * Get the value of nbEtages
         */
        public function getNbEtages()
        {
                return $this->nbEtages;
        }
    }

?>

