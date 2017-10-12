<?php

use App\Core\CoreController;

class TaskController extends CoreController {
    
    public function __construct() {
        parent:: __construct();
    }
    
    public function home() {
    	echo "Home Controller";
    }
}