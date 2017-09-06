<?php

namespace Model;

use \W\Model\Model;

class ClothesModel extends Model
{
	public function search($name, $order = "DESC")
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE defaultClothes = true AND name LIKE :search ORDER BY name DESC";
		$sth = $this->dbh->prepare($sql);
		$tmp = '%' . $name . '%';
		$sth->bindParam(":search", $tmp);
		$sth->execute();
		return $sth->fetchAll();
	}

	public function getUserClothes($id)
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
}