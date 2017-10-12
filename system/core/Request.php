<?php

namespace App\Core;

use App\Core\Validator;

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

        $values = [];
        $errors = [];

        foreach ($keys as $key => $value) {
            $rules = explode('|', $value);

            for ($i = 0; $i < count($rules); $i++) {
                $ruleData = explode(':', $rules[$i]);

                $method = $ruleData[0];
                $condtion = "";

                if (count($ruleData) == 2) {
                    $condtion = $ruleData[1];
                }

                $isValidated = Validator::$method($this->$key, $condtion);

                if (!$isValidated) {
                    $errors[$key][$i] = $key . Validator::$errorMessage[$method];
                    $errors[$key][$i] .= (count($ruleData) == 2) ? $ruleData[1]:'';
                    continue;
                }

                $values[$key] = $this->$key;
            }
        }

        if (!empty($errors)) {
            foreach ($errors as $key => $value) {
                for ($i = 0; $i < count($value); $i++) {
                    echo $value[$i] . '<br>';
                }
            }
        }

        return $values;
    }
}
