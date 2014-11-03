<?php 
	require_once('model/class.base.php');
	require_once('controller/urlController.php');
	Base::import();
	$urlManager = new UrlController();
	$urlManager->page->render();
?>