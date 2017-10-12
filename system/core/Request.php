<?php

namespace App\Core;

class Request {

    private $request = [];
    
    /**
     * Request Constructor
     */
    public function __construct(){
        $this->bind();
    }
    
    /**
     * Return all request parameters
     * 
     * @return array 
     */
    public function params() {
        return $this->request;
    }

    /**
     * Bind Request Parameters
     */
    public function bind() {
        $this->request = $_REQUEST;
        foreach ($this->params() as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Validate Parameters
     */
    public function validate($keys = []) {
        if (empty($keys)) {
            return false;
        }

        foreach ($variable as $key => $value) {

        }
    }
}
