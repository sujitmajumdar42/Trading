<?php

class TradeDetailTO {

    public $TRD_ID;
    public $PROD_ID;
    public $PROD_UNIT;
    public $PROD_QTY;

    public function get_TRD_ID() {
        return $this->TRD_ID;
    }

    public function get_PROD_ID() {
        return $this->PROD_ID;
    }

    public function get_PROD_UNIT() {
        return $this->PROD_UNIT;
    }

    public function get_PROD_QTY() {
        return $this->PROD_QTY;
    }

    public function set_TRD_ID($TRD_ID) {
        $this->TRD_ID = $TRD_ID;
    }

    public function set_PROD_ID($PROD_ID) {
        $this->PROD_ID = $PROD_ID;
    }

    public function set_PROD_UNIT($PROD_UNIT) {
        $this->PROD_UNIT = $PROD_UNIT;
    }

    public function set_PROD_QTY($PROD_QTY) {
        $this->PROD_QTY = $PROD_QTY;
    }

}
