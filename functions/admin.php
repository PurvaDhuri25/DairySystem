<?php
	if(!isset($_SESSION['aname']) && $_SESSION['aname'] != true){
		header("Location: homepage.html");
	}
?>