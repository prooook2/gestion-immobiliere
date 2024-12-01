<?php
    class immobilier {
        protected $ref;
        protected $prop;
        protected $loc;
        protected $surf;
        protected $nbp;
        protected $dom;

        public function __construct($ref, $prop, $loc, $surf, $nbp, $dom) {
            $this->ref=$ref;
            $this->prop=$prop;
            $this->loc=$loc;
            $this->surf=$surf;
            $this->nbp=$nbp;
            $this->dom=$dom;
        }

        /**
         * Get the value of ref
         */
        public function getRef()
        {
                return $this->ref;
        }

        /**
         * Get the value of prop
         */
        public function getProp()
        {
                return $this->prop;
        }

        /**
         * Get the value of loc
         */
        public function getLoc()
        {
                return $this->loc;
        }

        /**
         * Get the value of surf
         */
        public function getSurf()
        {
                return $this->surf;
        }

        /**
         * Get the value of nbp
         */
        public function getNbp()
        {
                return $this->nbp;
        }

        /**
         * Get the value of dom
         */
        public function getDom()
        {
                return $this->dom;
        }
        
    }

   

?>