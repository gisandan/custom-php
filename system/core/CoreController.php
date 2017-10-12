<?php

namespace App\Core;

use App\Core\Request;

class CoreController {
   
    public $request;

    public function __construct() {
        $this->request = new Request();
    }

    /*
     * Success - return success
     *
     * @param array $data
     */
    public function success($data = []) {
        $return = [
            'data' => $data
        ];
        $this->response($data, 200);
    }
    
    /*
     * Response
     *
     * @param array $data
     * @param int $errorCode
     */
    public function response($data = [], $errorCode = null) {
        http_response_code($errorCode);
        echo json_encode($data);
    }
}
