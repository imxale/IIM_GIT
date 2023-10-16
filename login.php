<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config-sample.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if(isset($_POST['email']) && isset($_POST['password'])){
	if(!empty($_POST['email']) && !empty($_POST['password'])){

		$email = $_POST['email'];
        $password = $_POST['password'];

		$userConnectionState = userConnection($db, $email, $password);

		if($userConnectionState){
			header('Location: dashboard.php');
		} else{
			$error = 'Mauvais identifiants';
		}

	}else{
		$error = 'Champs requis !';
	}
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';