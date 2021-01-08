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
include_once "../../model/entities/article.php";
include_once "../../utils/image_upload.php";

$conn = new Config();
$conn = $conn->getConnexion();

$article_id = intval($_POST['article_id']);
$btn_operation = $_POST['btn_operation'];

if ($btn_operation == "Mettre à jour") {
    $article_id = intval($_POST['article_id']);
    $name = $_POST['nom'];
    $categories_id = $_POST['categorie'];

    $old_article = CrudArticle::fetchById($conn, $article_id);

    if ($_FILES['image_file']['name'] != '') {
        $filename = $_FILES['image_file']['name'];
        $tmp_name = $_FILES["image_file"]["tmp_name"];
        $file_size = $_FILES["image_file"]["size"];
        $pospt = strrpos($filename, '.');
        $filename = generate_filename(20) . substr($filename, $pospt, strlen($filename) - $pospt);
    } else {
        $filename = $old_article['image_file'];
    }

   

    // Rechercher si le nom de l'article est utilisé
    // pour un autre article possédant un id différent
    $article = CrudArticle::fetchByName($conn, $name);
    if (count($article) != 0 && $article['id'] != $article_id) {
        echo "<p class=\"text-danger\">Erreur le nom de l'article est déjà utilisé.</p>";
        die();
    }

    // Récupérer les catégories correspondants aux categorie_id qui est trouvée dans $_POST['categorie']
    $categories = CrudCatgeories::fetchByManyIds($conn, $categories_id);

    $doc = new Article($article_id, $name, $_POST['slug'], $_POST['content'], $_POST['date_creation'], $categories, $filename);
    CrudArticle::update($conn, $doc);
    CrudArticleCategory::deleteForOneArticle($conn, $article_id);
    CrudArticleCategory::insertForOneArticle($conn, $article_id, $categories_id);
    if ($_FILES['image_file']['name'] != '') {
        upload_file('../../uploads/', $filename, $tmp_name, $file_size);
    }

    echo "<p>Les données ont été mises à jour avec succès.</p>";
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