<?php

class Config {

    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "fb_chatbot";

    function connect() {
        return new mysqli($this->host, $this->user, $this->pass, $this->database);
    }
}
?>