<?php

class ProdAccountTO {

    public $PROD_ID;
    public $PROD_UNIT;
    public $PROD_BOX_COST;
    public $PROD_PAC_COST;
    public $VAT;
    public $DISCOUNT;
    
    public function get_PROD_ID() {
        return $this->PROD_ID;
    }

    public function get_PROD_UNIT() {
        return $this->PROD_UNIT;
    }

    public function get_PROD_BOX_COST() {
        return $this->PROD_BOX_COST;
    }

    public function get_PROD_PAC_COST() {
        return $this->PROD_PAC_COST;
    }

    public function get_VAT() {
        return $this->VAT;
    }

    public function get_DISCOUNT() {
        return $this->DISCOUNT;
    }

    public function set_PROD_ID($PROD_ID) {
        $this->PROD_ID = $PROD_ID;
    }

    public function set_PROD_UNIT($PROD_UNIT) {
        $this->PROD_UNIT = $PROD_UNIT;
    }

    public function set_PROD_BOX_COST($PROD_BOX_COST) {
        $this->PROD_BOX_COST = $PROD_BOX_COST;
    }

    public function set_PROD_PAC_COST($PROD_PAC_COST) {
        $this->PROD_PAC_COST = $PROD_PAC_COST;
    }

    public function set_VAT($VAT) {
        $this->VAT = $VAT;
    }

    public function set_DISCOUNT($DISCOUNT) {
        $this->DISCOUNT = $DISCOUNT;
    }


}
