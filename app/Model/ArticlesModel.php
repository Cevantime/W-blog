<?php

namespace Model;

/**
 * Classe requise par l'AuthentificationModel, éventuellement à étendre par le UsersModel de l'appli
 */
class ArticlesModel extends \W\Model\Model 
{
	public function countAll() {
		$sql = 'SELECT COUNT(*) as count FROM ' . $this->table;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		$f = $sth->fetch();
		
		return $f['count'];
	}
	
}