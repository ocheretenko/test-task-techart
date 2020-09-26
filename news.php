<?php 

require 'includes.php';

$DB = new DbWrapper();

$articlesQuantity = (int)$DB->GetArticleQuantity();
$pagesQuantity = ceil($articlesQuantity / PAGE_ARTICLE_LIMIT);


if (!isset($_GET['page']) || ($page = (int)$_GET['page']) < 1)
	$page = 1;

if ($page > $pagesQuantity) $page = $pagesQuantity;

$offset = ($page -1) * PAGE_ARTICLE_LIMIT;
$articles = $DB->GetArticleRange(PAGE_ARTICLE_LIMIT, $offset);


require 'views/news.phtml';
