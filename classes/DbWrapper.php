<?php

class DbWrapper
{

private $PDO;

	function __construct()
	{
		$this->PDO = new PDO(DSN, DB_USER, DB_PASSWORD);
	}

	public function GetTheArticle($id = 1)
	{

		$q = $this->PDO->prepare('SELECT * FROM ' . DB_TABLE . ' WHERE `id`= :id'); //TODO: Fix unsafe concat
		$q->bindValue(':id', $id, PDO::PARAM_INT);
		$q->execute();
		return $q->fetch();
	}

	public function GetArticleQuantity()
	{
		$q = $this->PDO->prepare('SELECT COUNT(*) AS COUNT FROM ' . DB_TABLE); //TODO: Fix unsafe concat
		$q->execute();

		$rslt = (int)$q->fetch()['COUNT'];
		return $rslt;
	}

	public function GetArticleRange($limit = 100, $offset = 0)
	{
		$q = $this->PDO->prepare('SELECT `id`, `idate`, `title`, `announce` FROM ' . DB_TABLE . ' ORDER BY `idate` DESC LIMIT :limit OFFSET :offset'); //TODO: Fix unsafe concat
		$q->bindValue(':limit', $limit, PDO::PARAM_INT);
		$q->bindValue(':offset', $offset, PDO::PARAM_INT);
		$q->execute();
		return $q->fetchAll();
	}

	public function GetRandomArticle()
	{
		$q = $this->PDO->prepare('SELECT * FROM ' . DB_TABLE . ' ORDER BY RAND() LIMIT 1'); //TODO: Fix unsafe concat
		$q->bindValue(':id', $id, PDO::PARAM_INT);
		$q->execute();
		return $q->fetch();
	}
}