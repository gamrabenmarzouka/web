<?php
class CrudCatgeories
{
	public static function fetchAll($conn)
	{
		$query = "SELECT * FROM category ORDER BY `name`";
		$liste = $conn->query($query);
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function fetchById($conn, $id)
	{
		$req = "SELECT * FROM category WHERE `id` = ?";
		$stm = $conn->prepare($req);
		$stm->execute([$id]);
		$res = $stm->fetchAll(PDO::FETCH_ASSOC);
		if (count($res) > 0) {
			return $res[0];
		}
		return [];
	}

	public static function fetchByName($conn, $name)
	{
		$req = "SELECT * FROM category WHERE `name` = ?";
		$stm = $conn->prepare($req);
		$stm->execute([$name]);
		$res = $stm->fetchAll(PDO::FETCH_ASSOC);
		if (count($res) > 0) {
			return $res[0];
		}
		return [];
	}

	public static function fetchByManyIds($conn, $ids)
	{
		$res = [];
		foreach ($ids as $category_id) {
			$res[] = CrudCatgeories::fetchById($conn, $category_id);
		}
		return $res;
	}

	public static function fetchByArticleId($conn, $article_id)
	{
		$req = "SELECT * 
		FROM category AS c 
		  INNER JOIN article_category AS ac ON c.id = ac.category_id
		WHERE ac.article_id = ?";
		$stm = $conn->prepare($req);
		$stm->execute([$article_id]);
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}
	public static function searchByName($conn, $name)
	{
		$req = "SELECT * FROM category WHERE `name` LIKE ? OR content LIKE ?";
		$stm = $conn->prepare($req);
		$stm->execute(['%'.$name.'%', '%'.$name.'%']);
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function insert($conn, $name)
	{
		$req = "INSERT INTO category (`name`) VALUES (?)";
		$stmt = $conn->prepare($req);
		$stmt->execute([$name]);
		return $conn->lastInsertId();
	}

	public static function update($conn, $id, $name)
	{
		$req = "UPDATE category SET `name` = ? where id = ?";
		$stmt = $conn->prepare($req);
		$stmt->execute([$name, $id]);
	}

	public static function delete($conn, $id)
	{
		$req = "DELETE FROM category WHERE id=?";
		$stmt = $conn->prepare($req);
		$stmt->execute([$id]);
	}
}
function afficchcategory($conn)
{
	$req = "SELECT * FROM category";
	$liste = $conn->query($req);
	//var_dump($liste);
	return $liste->fetchAll();
}
