<?php

require 'includes.php';


$DB = new DbWrapper();

if (!isset($_GET['id']) || ($id = (int)$_GET['id']) < 1)
	$article = $DB->GetRandomArticle();	
else
	$article = $DB->GetTheArticle($id);

require 'views/view.phtml';