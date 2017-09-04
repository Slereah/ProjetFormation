<?php

namespace Model;

use \W\Model\Model;

class TokensModel extends Model
{
	public function findByToken($token) {

		$sql = " SELECT * FROM " . $this->table . " WHERE token = :token LIMIT 1 ";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":token", $token);
		$sth->execute();

		return $sth->fetch();
	}
}

?>