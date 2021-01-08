<?php
class CrudArticleCategory
{
    public static function fetchAll($conn)
    {
        $query = "SELECT * FROM article_catgory ORDER BY `name`";
        $liste = $conn->query($query);
        return $liste->fetchAll();
    }

    public static function fetchByCategorieId($conn, $id)
	{
		$req = "SELECT * FROM article_category WHERE `category_id` = ?";
		$stm = $conn->prepare($req);
		$stm->execute([$id]);
		$res = $stm->fetchAll(PDO::FETCH_ASSOC);
		if (count($res) > 0) {
			return $res;
		}
		return [];
    }
    
    public static function fetchByIds($conn, $article_id, $category_id)
    {
        $req = "SELECT * FROM article_category WHERE article_id='{$article_id}' AND category_id='{$category_id}';";
        $document = $conn->query($req);
        //var_dump($liste);
        return $document->fetchAll();
    }

    public static function fetchByArticleId($conn, $article_id)
    {
        $req = "SELECT * FROM article_category WHERE article_id='{$article_id}';";
        $document = $conn->query($req);
        //var_dump($liste);
        return $document->fetchAll();
    }

    public static function insert($conn, $article_id, $category_id)
    {
        $req = "INSERT INTO article_category (article_id, category_id) VALUES ('{$article_id}', '{$category_id}')";
        $conn->query($req) or die("Erreur dans la requête");
        return [$article_id, $category_id];
    }

    /**
     * $categories_id contient uniquement les category_id
     */
    public static function insertForOneArticle($conn, $article_id, $categories_id) {
        $cpt = 0;
        foreach ($categories_id as $category_id) {
            CrudArticleCategory::insert($conn, $article_id, $category_id);
            $cpt += 1;
        }
        return $cpt == count($categories_id);
    }

    public static function delete($conn, $article_id, $category_id)
    {
        $req = "DELETE FROM article_category WHERE article_id='{$article_id}' AND category_id='{$category_id}'";
        $conn->query($req);
    }

    public static function deleteForOneArticle($conn, $article_id) 
    {
        $req = "DELETE FROM article_category WHERE article_id='{$article_id}'";
        $conn->query($req);
    }
}

