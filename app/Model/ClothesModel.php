<?php

namespace Model;

use \W\Model\Model;

class ClothesModel extends Model
{

	public function get($type = "both", $id = null, $perpage = null, $page = null)
	{
		$pagination = "";
		if(!is_null($perpage))
		{
			$pagination = " LIMIT " . $perpage . " OFFSET " . ($page - 1) * $perpage;
		}
		
		$sql = "SELECT * FROM clothes";
		switch ($type) 
		{
			case 'both':
				$sth = $this->dbh->prepare($sql . $pagination);
				break;
			case 'personal':
				$sql = "SELECT * FROM clothes WHERE id in (SELECT idClothes FROM usersclothes WHERE idUsers = :id)" . $pagination;
				$sth = $this->dbh->prepare($sql);
				$sth->bindParam(":id", $id);
				break;
			case 'default':
				$sql .= " WHERE defaultClothes = true" . $pagination;
				$sth = $this->dbh->prepare($sql);
				break;
			default:
				return [];
				break;
		}
		$sth->execute();
		return $sth->fetchAll();
	}

	public function search($name, $options, $order = "DESC")
	{
		$sql = "SELECT * FROM " . $this->table . " WHERE defaultClothes = true AND name LIKE :search";

		$max = 0;
		foreach ($options as $key => $value) 
		{
			if($value)
			{
				$max++;
			}
		}

		if(!empty($options) && in_array(true, $options))
		{
			$sql .= " AND (";
			$i = 0;
			foreach ($options as $key => $option) 
			{
				if($option)
				{
					switch ($key) 
					{
						case 'tops':
							$sql .= "category = 'tops'";
							break;
						case 'chaussures':
							$sql .= "category = 'chaussures'";
							break;
						case 'vest':
							$sql .= "category = 'vestes'";
							break;
						case 'pants':
							$sql .= "category = 'pantalons'";
							break;
						case 'sweater':
							$sql .= "category = 'pulls'";
							break;
						case 'coat':
							$sql .= "category = 'manteaux'";
							break;
						case 'shorts':
							$sql .= "category = 'shorts'";
							break;
						default:
							break;
					}
					if($i != $max - 1)
					{
						$sql .= " OR ";
					}
					$i++;
				}
				
				
			}
			$sql .= ")";
		}
		$sql .= " ORDER BY name DESC";
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

	public function findClothesUser($idClothe)
	{
		$sql = "SELECT idUsers FROM usersclothes WHERE idClothes = :idclothe";
		$sth = $this->dbh->prepare($sql);
		$sth->bindParam(":idclothe", $idClothe);
		$sth->execute();
		return $sth->fetch();
	}

	public function deleteClothesUser($idClothe, $idUser)
	{
		$sql = "DELETE FROM usersclothes WHERE idUsers = :iduser AND idClothes = :idclothe";
		$sth = $this->dbh->prepare($sql);
		$sth->bindParam(":iduser", $idUser);
		$sth->bindParam(":idclothe", $idClothe);
		$sth->execute();
	}

	public function deleteAllClothesUser($idUser)
	{
		$sql = "DELETE FROM usersclothes WHERE idUsers = :iduser";
		$sth = $this->dbh->prepare($sql);
		$sth->bindParam(":iduser", $idUser);
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
		$result = $sth->fetchAll();
		$result = is_null($result)?[]:$result;
		return $result;
	}

	public function count($type = "both", $id = null)
	{
		$sql = "SELECT COUNT(*) FROM clothes";
		switch ($type) 
		{
			case 'both':
				$sth = $this->dbh->prepare($sql);
				break;
			case 'personal':
				$sql = "SELECT COUNT(*) FROM clothes WHERE id in (SELECT idClothes FROM usersclothes WHERE idUsers = :id)";
				$sth = $this->dbh->prepare($sql);
				$sth->bindParam(":id", $id);
				break;
			case 'default':
				$sql .= " WHERE defaultClothes = true";
				$sth = $this->dbh->prepare($sql);
				break;
			default:
				return 0;
				break;
		}
		$sth->execute();
		return $sth->fetch();

	}

	public function getTemp($category, $type = "both", $weather, $id = null)
	{
		
		$sql = "SELECT * FROM clothes WHERE category = :cat AND minTemperature <= :minTemp AND maxTemperature >= :maxTemp";

		if($weather["rain"])
		{
			$sql .= " AND rain = 10";
		}
		switch ($type) 
		{
			case 'both':
				$sth = $this->dbh->prepare($sql);
				break;
			case 'personal':
				$sql .= " AND id in (SELECT idClothes FROM usersclothes WHERE idUsers = :id)";
				$sth = $this->dbh->prepare($sql);
				$sth->bindParam(":id", $id);
				break;
			case 'default':
				$sql .= " AND defaultClothes = true";
				$sth = $this->dbh->prepare($sql);
				break;
			default:
				return [];
				break;
		}
		$sth->bindParam(":cat", $category);
		$sth->bindParam(":minTemp", $weather["minTemp"]);
		$sth->bindParam(":maxTemp", $weather["maxTemp"]);
		$sth->execute();
		return $sth->fetchAll();
	}

}