<?PHP
class CrudArticle
{
	

	public static function fetchAll($conn)
	{
		$req = "SELECT * FROM article";
		$liste = $conn->query($req);
		//var_dump($liste);
		return $liste->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function fetchById($conn, $id)
	{
		$req = "SELECT * FROM article WHERE id = ?";
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
		$req = "SELECT * FROM article WHERE `name` = ?";
		$stm = $conn->prepare($req);
		$stm->execute([$name]);
		$res = $stm->fetchAll(PDO::FETCH_ASSOC);
		if (count($res) > 0) {
			return $res[0];
		}
		return [];
	}

	public static function fetchByImageFile($conn, $name)
	{
		$req = "SELECT * FROM article WHERE `image_file` = ?";
		$stm = $conn->prepare($req);
		$stm->execute([$name]);
		$res = $stm->fetchAll(PDO::FETCH_ASSOC);
		if (count($res) > 0) {
			return $res[0];
		}
		return [];
	}

	public static function existsImageFile($conn, $name) {
		return count(CrudArticle::fetchByImageFile($conn, $name)) > 0;
	}

	public static function searchByName($conn, $name)
	{
		$req = "SELECT * FROM article WHERE `name` LIKE ? OR content LIKE ?";
		$stm = $conn->prepare($req);
		$stm->execute(['%'.$name.'%', '%'.$name.'%']);
		return $stm->fetchAll(PDO::FETCH_ASSOC);
	}

	public static function insert($conn, $doc)
	{
		$req = "INSERT INTO article (`name`, created_at, slug, content, image_file) VALUES (?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($req);
		$stmt->execute([$doc->getNom(), $doc->getDateCreation(), $doc->getslug(), $doc->getcontent(), $doc->getImageFile()]);
		return $conn->lastInsertId();
	}

	public static function update($conn, $doc)
	{
		$req = "UPDATE article 
		SET 
			`name`=?,
			created_at=?,
			slug=?,
			content=?,
			image_file=?
		where id=?";
		$stmt = $conn->prepare($req);
		$stmt->execute([$doc->getNom(), $doc->getDateCreation(), $doc->getslug(), $doc->getcontent(), $doc->getImageFile(), $doc->getId()]);
	}

	public static function delete($conn, $id)
	{
		$req = "DELETE FROM article WHERE id='{$id}'";
		$conn->query($req);
	}
}
