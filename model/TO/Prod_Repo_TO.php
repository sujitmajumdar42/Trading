<?php

class ProdRepoTO{
    private $PROD_ID;
    private $PROD_UNIT;
    private $PROD_AVAIL;
    public function get_PROD_ID() {
        return $this->PROD_ID;
    }

    public function get_PROD_UNIT() {
        return $this->PROD_UNIT;
    }

    public function get_PROD_AVAIL() {
        return $this->PROD_AVAIL;
    }

    public function set_PROD_ID($PROD_ID) {
        $this->PROD_ID = $PROD_ID;
    }

    public function set_PROD_UNIT($PROD_UNIT) {
        $this->PROD_UNIT = $PROD_UNIT;
    }

    public function set_PROD_AVAIL($PROD_AVAIL) {
        $this->PROD_AVAIL = $PROD_AVAIL;
    }


}