<?php

class TradeTO {

    public $TRD_ID;
    public $TRD_DATE;
    public $TRD_TYPE;
    public $USR_USERNAME;

    public function get_TRD_ID() {
        return $this->TRD_ID;
    }

    public function get_TRD_DATE() {
        return $this->TRD_DATE;
    }

    public function get_TRD_TYPE() {
        return $this->TRD_TYPE;
    }

    public function get_USR_USERNAME() {
        return $this->USR_USERNAME;
    }

    public function set_TRD_ID($TRD_ID) {
        $this->TRD_ID = $TRD_ID;
    }

    public function set_TRD_DATE($TRD_DATE) {
        $this->TRD_DATE = $TRD_DATE;
    }

    public function set_TRD_TYPE($TRD_TYPE) {
        $this->TRD_TYPE = $TRD_TYPE;
    }

    public function set_USR_USERNAME($USR_USERNAME) {
        $this->USR_USERNAME = $USR_USERNAME;
    }

}
