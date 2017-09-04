<?php

namespace Model;

use \W\Model\Model;

class ClothesModel extends Model
{

	public function getCategories()
	{
		$sql = 'SHOW COLUMNS FROM '.$this->getTable().' WHERE field="category"';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		$columns = $sth->fetch();

		preg_match("/^enum\(\'(.*)\'\)$/", $columns['Type'], $matches);
		$categories = explode("','",$matches[1]);

		return $categories;
	}	
}