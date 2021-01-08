<?PHP
session_start();
$user = $_SESSION['user'];

if ($user == null || ($user['type'] != 'psy' && $user['type'] != 'admin')) {
    die("<p>You are not authorized to view this page!</p>");
}

include_once "../../config.php";
include_once "../../model/article.php";
include_once "../../model/categories.php";
include_once "../../model/article_category.php";
// include_once "article.php";

$conn = new Config();
$conn = $conn->getConnexion();

$article_id = intval($_POST['article_id']);
$btn_operation = $_POST['btn_operation'];

if ($btn_operation == "Supprimer") {
    CrudArticleCategory::deleteForOneArticle($conn, $article_id);
    CrudArticle::delete($conn, $article_id);
    echo "<p>Les données ont été supprimés avec succès.</p>";
} else {
    echo "<p>Opération annulée. Retour à la liste des articles.</p>";
    echo "<script>document.location = 'research.php';</script>";
}
// header("Location: form_search_article.php");
?>
<a href="research.php">Retour à la liste des articles</a>
<script>
    document.location = "research.php";
</script>