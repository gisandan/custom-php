<?php

use App\Core\CoreController;
use App\Core\Request;

class TestController extends CoreController{
    
    public function __construct() {
        parent:: __construct();
    }
    
    public function Test(Request $request) {

    	$this->success($request->id);

    	$data = $request->validate([
    		'id'	=>	'numeric|required'
    	]);
    }
}