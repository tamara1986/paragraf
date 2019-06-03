<?php 
session_start();
error_reporting(E_ALL & ~E_NOTICE);
require ('config.php');

function my_autoloader($classname){
	include 'model/'.$classname.'.php';
}
spl_autoload_register('my_autoloader');

class Controller{
	public $data = array();
	public function show_view($view) {
		
		require 'view/header.php';
		require 'view/navbar.php';
		require 'view/'.$view.'.php';
		require 'view/footer.php';
	}
}		

		if (isset($_GET['c']) && isset($_GET['m']) && isset($_GET['v']) ) {
			$controller = $_GET['c'];
			$method = $_GET['m'];
			$id=$_GET['v'];
			include 'controller/'.$controller.'.php';
			$c = new $controller;
			$c->$method($id);
		}elseif(isset($_GET['m']) && isset($_GET['c']) && !isset($_GET['v'])){
			$controller = $_GET['c'];
			$method = $_GET['m'];
			include 'controller/'.$controller.'.php';
			$c = new $controller;
			$c->$method();
			
		}else{
			$controller = 'Home';
			$method='index';
			include 'controller/'.$controller.'.php';
			$c = new $controller;
			$c->index();
		}
// 	}
// }else{
// 	if (isset($_GET['m']) && isset($_GET['c']) && isset($_GET['v'])) {
// 		if (condition) {
// 			# code...
// 		}
// 	}
// 	$controller='Login';
// 	include 'controller/Login.php';
// 	$c=new $controller;
// 	if ( isset($_POST['login'])) {
// 		// $method = $_GET['m'];
// 		$method='loginUser';
// 		$username = $_POST['username'];
// 		$password = $_POST['password'];
		
// 		$c->$method($username, $password);
// 	} else {
// 		$c->index();
// 	}




?>