<?php

use App\Core\CoreController;
use App\Core\Request;

class TaskController extends CoreController {
    
    public function __construct() {
        parent:: __construct();
    }
    
    public function index(Request $request) {
    	echo '<pre>';
    	$this->success($request->params());
    	// echo "Home Controller";
    }
}
