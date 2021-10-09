<?php

if(!$_SESSION['email']) {
	header('Location: painel.php');
	exit();
}