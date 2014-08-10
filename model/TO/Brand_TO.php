<?php

class BrandTO {

    public $BRAND_ID;
    public $BRAND_NAME;

    public function get_BRAND_ID() {
        return $this->BRAND_ID;
    }

    public function get_BRAND_NAME() {
        return $this->BRAND_NAME;
    }

    public function set_BRAND_ID($BRAND_ID) {
        $this->BRAND_ID = $BRAND_ID;
    }

    public function set_BRAND_NAME($BRAND_NAME) {
        $this->BRAND_NAME = $BRAND_NAME;
    }

}
