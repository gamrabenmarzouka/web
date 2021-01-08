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

$categorie_id = intval($_POST['categorie_id']);
$btn_operation = $_POST['btn_operation'];

if ($btn_operation == "Supprimer") {
    $categories_articles = CrudArticleCategory::fetchByCategorieId($conn, $categorie_id);
    if (count($categories_articles) > 0) {
        echo "<p>Cette catégorie est utilisée pour des articles et ne peut pas être supprimée.</p>";
    } else {
        CrudCatgeories::delete($conn, $categorie_id);
        echo "<p>Les données ont été supprimés avec succès.</p>";
    }
} else {
    echo "<p>Opération annulée. Retour à la liste des catégories.</p>";
    echo "<script>document.location = 'research.php';</script>";
}
// header("Location: form_search_article.php");
?>
<a href="research.php">Retour à la liste des catégories</a>
<script>document.location = 'research.php';</script>