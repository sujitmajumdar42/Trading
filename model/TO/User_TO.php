<?php

class UserTO {

    public $USR_USERNAME;
    public $USR_PASS;
    public $USR_NAME;
    public $USR_ROLE;
    public $USR_LASTLOGIN;

    public function get_USR_USERNAME() {
        return $this->USR_USERNAME;
    }

    public function get_USR_PASS() {
        return $this->USR_PASS;
    }

    public function get_USR_NAME() {
        return $this->USR_NAME;
    }

    public function get_USR_ROLE() {
        return $this->USR_ROLE;
    }

    public function get_USR_LASTLOGIN() {
        return $this->USR_LASTLOGIN;
    }

    public function set_USR_USERNAME($USR_USERNAME) {
        $this->USR_USERNAME = $USR_USERNAME;
    }

    public function set_USR_PASS($USR_PASS) {
        $this->USR_PASS = $USR_PASS;
    }

    public function set_USR_NAME($USR_NAME) {
        $this->USR_NAME = $USR_NAME;
    }

    public function set_USR_ROLE($USR_ROLE) {
        $this->USR_ROLE = $USR_ROLE;
    }

    public function set_USR_LASTLOGIN($USR_LASTLOGIN) {
        $this->USR_LASTLOGIN = $USR_LASTLOGIN;
    }

}
