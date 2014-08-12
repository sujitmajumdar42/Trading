<?php

class ProductTO {

    public $PROD_ID;
    public $BRAND_ID;
    public $PROD_NAME;
    public $PROD_AVAIL;
    public $PROD_UNIT;
    public $PRODS_PER_BOX;        
    
    public function get_PROD_ID() {
        return $this->PROD_ID;
    }

    public function get_BRAND_ID() {
        return $this->BRAND_ID;
    }

    public function get_PROD_NAME() {
        return $this->PROD_NAME;
    }

    public function get_PROD_AVAIL() {
        return $this->PROD_AVAIL;
    }

    public function get_PROD_UNIT() {
        return $this->PROD_UNIT;
    }

    public function get_PRODS_PER_BOX() {
        return $this->PRODS_PER_BOX;
    }

    public function set_PROD_ID($PROD_ID) {
        $this->PROD_ID = $PROD_ID;
    }

    public function set_BRAND_ID($BRAND_ID) {
        $this->BRAND_ID = $BRAND_ID;
    }

    public function set_PROD_NAME($PROD_NAME) {
        $this->PROD_NAME = $PROD_NAME;
    }

    public function set_PROD_AVAIL($PROD_AVAIL) {
        $this->PROD_AVAIL = $PROD_AVAIL;
    }

    public function set_PROD_UNIT($PROD_UNIT) {
        $this->PROD_UNIT = $PROD_UNIT;
    }

    public function set_PRODS_PER_BOX($PRODS_PER_BOX) {
        $this->PRODS_PER_BOX = $PRODS_PER_BOX;
    }
}
