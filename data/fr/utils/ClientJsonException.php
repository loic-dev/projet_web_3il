<?php
    require_once '../utils/functions.php'; 

    class ClientJsonException extends Exception
    {
        public function __construct($message, $code = 0, Throwable $previous = null) {
            parent::__construct($message, $code, $previous);
            //log
        }

        public function __toString() {
            return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
        }

        public function log() {
            //TODO
        }

        public function sendJsonError($die = true) {
            echo json_response(500, $this->getMessage());
            if($die) {
                die();
            }
        }

        public function sendJsonValid($die = true) {
            echo json_response(200, $this->getMessage());
            if($die) {
                die();
            }
        }
    }
?>