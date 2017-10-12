<?php

namespace App\Core; 

use App\Core\Request;

class Route {

	public static $routes = [];
	protected $uri;

	/*
	 * Route Constructor
	 */
	public function __construct() {
		$this->setUri();
	}

	/*
	 * Get Current URI
	 *
	 */
	public function setUri() {
		$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) {
        	$uri = substr($uri, 0, strpos($uri, '?'));
        }
        $this->uri = trim($uri, '/');
	}

	/*
	 * Get Request Method Type
	 *
	 * @return string
	 */
	public function getMethod() {
		return strtolower($_SERVER['REQUEST_METHOD']);
	}

	/*
	 * Return Saved Currrent URI
	 *
	 * @return string
	 */
	public function getUri() {
		return $this->uri;
	}

	/*
	 * Store Get Routes 
	 */
 	public static function get($route = '', $controller = '') {
 		Static::$routes['get'][$route] = $controller;
 	}  

 	/*
	 * Store Post Routes 
	 */
 	public static function post($route = '', $controller = '') {
 		Static::$routes['post'][$route] = $controller;
 	}

 	/*
	 * Store Put Routes 
	 */
 	public static function put($route = '', $controller = '') {
 		Static::$routes['put'][$route] = $controller;
 	}

 	/*
	 * Store Delete Routes 
	 */
 	public static function delete($route = '', $controller = '') {
 		Static::$routes['delete'][$route] = $controller;
 	}

 	/*
 	 * Store Patch Routes
 	 */
 	public static function patch($route = '', $controller = '') {
 		Static::$routes['patch'][$route] = $controller;
 	}

 	/*
 	 * Redirect Current Route
 	 */
 	public function direct() {
 		// Check if no URI
 		if (empty($this->getUri()) || $this->getUri() == '/') {
 			echo 'Default Route.';
 			return;
 		}

 		// Check if route exist
 		if (array_key_exists($this->getUri(), Static::$routes[$this->getMethod()])) {
 			$controllerPath = explode('@', Static::$routes[$this->getMethod()][$this->getUri()]);

 			require APPLICATION . '/controllers/' . $controllerPath[0] . PHP_EXT; // It should have a controller loader

 			$controllerUri = explode('/',$controllerPath[0]);
 			$controller = $controllerUri[count($controllerUri) - 1];

 			$controllerInstance = new $controller();

 			$method = 'index';

 			if (count($controllerPath) > 1) {
 				$method = $controllerPath[count($controllerPath) - 1];
 			}

 			return $controllerInstance->$method(new Request());
 		} else {
 			// It Should have a view renderer
 			http_response_code(404);
 			require PUBLIC_HTML . '/error/404.php';
 		}
 	}
}

require APPLICATION . '/routes/api.php';

$route = new Route();
$route->direct();
