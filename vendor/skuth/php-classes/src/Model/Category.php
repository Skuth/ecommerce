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

}

?>
