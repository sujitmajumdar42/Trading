<?php

class ProdAccountTO {

    public $PROD_ID;
    public $BASIC_COST;
    public $VAT;
    public $DISCOUNT;

    public function get_PROD_ID() {
        return $this->PROD_ID;
    }

    public function get_BASIC_COST() {
        return $this->BASIC_COST;
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

    public function set_BASIC_COST($BASIC_COST) {
        $this->BASIC_COST = $BASIC_COST;
    }

    public function set_VAT($VAT) {
        $this->VAT = $VAT;
    }

    public function set_DISCOUNT($DISCOUNT) {
        $this->DISCOUNT = $DISCOUNT;
    }

}
