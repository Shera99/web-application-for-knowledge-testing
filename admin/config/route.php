<?php

/*
** Класс маршрутизатор
*/

class Routing{

	public static function buildRoute(){

		/*Контроллер и action по мудачанию*/
		$controllerName = "IndexController";
		$modelName = "IndexModel";
		$action = "index";

		$route = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

		// echo '<pre>';
		// 	print_r($route);
		// echo '</pre>';

		$i = count($route);

		while ($i>1) {
			if ($route[$i] != '') {
				if (is_file(CONTROLLER_PATH. ucfirst($route[$i]) . "Controller.php")) {
					$controllerName = ucfirst($route[$i]) . "Controller";
					$modelName = ucfirst($route[$i]) . "Model";
					break;
				} else {
					$action = $route[$i];
				}
			}
			$i--;
		}
		
		if (is_file(CONTROLLER_PATH . $controllerName . ".php")) {
			include CONTROLLER_PATH . $controllerName . ".php"; // Пример IndexController.php
			include MODEL_PATH . $modelName . ".php";	// Пример IndexModel.php
			$controller = new $controllerName();	// Пример $controller = new IndexController();
			if (method_exists($controller, $action)) {
				$controller->$action();				// Пример $controller->index();
			} else {
				self::errorPage();
			}
		} else {
			self::errorPage();
		}
		
		
	}

	public static function errorPage(){
		include VIEW_PATH . "error404.html";
	}

}


// class Route{

// 	private static $routes = Array();
// 	private static $pathNotFound = null;
// 	private static $methodNotAllowed = null;
  
// 	public static function add($expression, $function, $method = 'get'){
// 	  array_push(self::$routes,Array(
// 		'expression' => $expression,
// 		'function' => $function,
// 		'method' => $method
// 	  ));
// 	}
  
// 	public static function pathNotFound($function){
// 	  self::$pathNotFound = $function;
// 	}
  
// 	public static function methodNotAllowed($function){
// 	  self::$methodNotAllowed = $function;
// 	}
  
// 	public static function run($basepath = '/'){
  
// 	  // Parse current url
// 	  $parsed_url = parse_url($_SERVER['REQUEST_URI']);//Parse Uri
  
// 	  if(isset($parsed_url['path'])){
// 		$path = $parsed_url['path'];
// 	  }else{
// 		$path = '/';
// 	  }
  
// 	  // Get current request method
// 	  $method = $_SERVER['REQUEST_METHOD'];
  
// 	  $path_match_found = false;
  
// 	  $route_match_found = false;
  
// 	  foreach(self::$routes as $route){
  
// 		// If the method matches check the path
  
// 		// Add basepath to matching string
// 		if($basepath!=''&&$basepath!='/'){
// 		  $route['expression'] = '('.$basepath.')'.$route['expression'];
// 		}
  
// 		// Add 'find string start' automatically
// 		$route['expression'] = '^'.$route['expression'];
  
// 		// Add 'find string end' automatically
// 		$route['expression'] = $route['expression'].'$';
  
// 		// echo $route['expression'].'<br/>';
  
// 		// Check path match	
// 		if(preg_match('#'.$route['expression'].'#',$path,$matches)){
  
// 		  $path_match_found = true;
  
// 		  // Check method match
// 		  if(strtolower($method) == strtolower($route['method'])){
  
// 			array_shift($matches);// Always remove first element. This contains the whole string
  
// 			if($basepath!=''&&$basepath!='/'){
// 			  array_shift($matches);// Remove basepath
// 			}
  
// 			call_user_func_array($route['function'], $matches);
  
// 			$route_match_found = true;
  
// 			// Do not check other routes
// 			break;
// 		  }
// 		}
// 	  }
  
// 	  // No matching route was found
// 	  if(!$route_match_found){
  
// 		// But a matching path exists
// 		if($path_match_found){
// 		  header("HTTP/1.0 405 Method Not Allowed");
// 		  if(self::$methodNotAllowed){
// 			call_user_func_array(self::$methodNotAllowed, Array($path,$method));
// 		  }
// 		}else{
// 		  header("HTTP/1.0 404 Not Found");
// 		  if(self::$pathNotFound){
// 			call_user_func_array(self::$pathNotFound, Array($path));
// 		  }
// 		}
  
// 	  }
  
// 	}
  
//   }

// Include router class
// include('Route.php');

// // Add base route (startpage)
// Route::add('/',function(){
//     echo 'Welcome :-)';
// });

// // Simple test route that simulates static html file
// Route::add('/test.html',function(){
//     echo 'Hello from test.html';
// });

// // Post route example
// Route::add('/contact-form',function(){
//     echo '<form method="post"><input type="text" name="test" /><input type="submit" value="send" /></form>';
// },'get');

// // Post route example
// Route::add('/contact-form',function(){
//     echo 'Hey! The form has been sent:<br/>';
//     print_r($_POST);
// },'post');

// // Accept only numbers as parameter. Other characters will result in a 404 error
// Route::add('/foo/([0-9]*)/bar',function($var1){
//     echo $var1.' is a great number!';
// });

// Route::run('/');
?>