<?php

class ReceiptDetailTO {

    public $RCP_ID;
    public $RCP_DATE;
    public $RCP_TOTAL;

    public function get_RCP_ID() {
        return $this->RCP_ID;
    }

    public function get_RCP_DATE() {
        return $this->RCP_DATE;
    }

    public function get_RCP_TOTAL() {
        return $this->RCP_TOTAL;
    }

    public function set_RCP_ID($RCP_ID) {
        $this->RCP_ID = $RCP_ID;
    }

    public function set_RCP_DATE($RCP_DATE) {
        $this->RCP_DATE = $RCP_DATE;
    }

    public function set_RCP_TOTAL($RCP_TOTAL) {
        $this->RCP_TOTAL = $RCP_TOTAL;
    }

}
