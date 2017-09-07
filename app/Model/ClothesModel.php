<?php

namespace Model;

use \W\Model\Model;

class ClothesModel extends Model
{

	public function get($type = "both", $id = null)
	{
		$sql = "SELECT * FROM clothes";
		switch ($type) 
		{
			case 'both':
				$sth = $this->dbh->prepare($sql);
				break;
			case 'personal':
				$sql = "SELECT * FROM clothes WHERE id in (SELECT idClothes FROM usersclothes WHERE idUsers = :id)";
				$sth = $this->dbh->prepare($sql);
				$sth->bindParam(":id", $id);
				break;
			case 'default':
				$sql .= " WHERE defaultClothes = true";
				$sth = $this->dbh->prepare($sql);
				break;
			default:
				return [];
				break;
		}
		$sth->execute();
		return $sth->fetchAll();
	}

	public function search($name, $order = "DESC")
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE defaultClothes = true AND name LIKE :search ORDER BY name DESC";
		$sth = $this->dbh->prepare($sql);
		$tmp = '%' . $name . '%';
		$sth->bindParam(":search", $tmp);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function getClothes($id)
	{
		$sql = "SELECT idClothes FROM usersclothes WHERE idUsers = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindParam(":id", $id);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function addClothesUser($idClothe, $idUser)
	{
		$sql = "INSERT INTO usersclothes (idUsers, idClothes) VALUES  (:iduser, :idclothe)";
		$sth = $this->dbh->prepare($sql);
		$sth->bindParam(":iduser", $idUser);
		$sth->bindParam(":idclothe", $idClothe);
		$sth->execute();
	}

	public function deleteClothesUser($idClothe, $idUser)
	{
		$sql = "DELETE FROM usersclothes WHERE idUsers = :iduser AND idClothes = :idclothe";
		$sth = $this->dbh->prepare($sql);
		$sth->bindParam(":iduser", $idUser);
		$sth->bindParam(":idclothe", $idClothe);
		$sth->execute();
	}

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

	public function getFromCategory($category, $type = "default", $id = null)
	{
		switch ($type) 
		{
			case 'both':
				$sql = 'SELECT * FROM '.$this->getTable().' WHERE category=:cat';
				$sth = $this->dbh->prepare($sql);
				$sth->bindParam(":cat", $category);
				break;
			case 'default':
				$sql = 'SELECT * FROM '.$this->getTable().' WHERE category=:cat AND defaultClothes = true';
				$sth = $this->dbh->prepare($sql);
				$sth->bindParam(":cat", $category);
				break;
			case 'personal':
				$sql = 'SELECT * FROM '.$this->getTable().' WHERE category=:cat AND id IN (SELECT idClothes FROM usersclothes WHERE idUsers = :id)';
				$sth = $this->dbh->prepare($sql);
				$sth->bindParam(":cat", $category);
				$sth->bindParam(":id", $id);
				break;

			default:
				return [];
		}
		$sth->execute();
		return $sth->fetchAll();
	}
}