<?php
    class appartement extends immobilier {
        private $surfEC;

        public function __construct($ref, $prop, $loc, $surf, $dom, $nbp, $surfEC) {
            parent::__construct($ref, $prop, $loc, $surf,$dom, $nbp );
            $this->surfEC=$surfEC;
        }
        

        /**
         * Get the value of surfEC
         */
        public function getSurfEC()
        {
                return $this->surfEC;
        }
    }

?>