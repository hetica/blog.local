<?php
	
	$bd_host = "192.168.11.198";
	$bd_name = "blog";
	$bd_user = "root";
	$bd_pwd = "secret";
	$dsn = "mysql:host=".$bd_host.";dbname=".$bd_name;

	$pdo = new PDO($dsn, $bd_user, $bd_pwd) ;
