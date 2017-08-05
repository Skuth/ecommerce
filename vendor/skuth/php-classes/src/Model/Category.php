<?php

namespace Skuth\Model;

use \Skuth\DB\Sql;
use \Skuth\Model;

class Category extends Model
{

	public static function listAll()
	{

		$sql = new Sql();

		return $sql->select("SELECT * FROM tb_categories ORDER BY descategory");

	}

	public function save()
	{

		$sql = new Sql();

		$results = $sql->select("CALL sp_categories_save(:descategory)",
		array(
			":descategory"=>$this->getdescategory()
		));

		$this->setData($results[0]);

	}

	public function delete()
	{
		$sql = new Sql();

		$sql->query("CALL sp_categories_delete(:idcategory)",
		array(
			":idcategory"=>$this->getidcategory()
		));
	}

	public function get($idcategory)
	{

		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory",
		array(
			":idcategory"=>$idcategory
		));

		$this->setData($results[0]);

	}

}

?>
