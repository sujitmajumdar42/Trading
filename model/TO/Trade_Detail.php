<?php

class TradeDetailTO {

    public $TRD_ID;
    public $PROD_ID;

    public function get_TRD_ID() {
        return $this->TRD_ID;
    }

    public function get_PROD_ID() {
        return $this->PROD_ID;
    }

    public function set_TRD_ID($TRD_ID) {
        $this->TRD_ID = $TRD_ID;
    }

    public function set_PROD_ID($PROD_ID) {
        $this->PROD_ID = $PROD_ID;
    }

}
