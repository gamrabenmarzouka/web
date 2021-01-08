<?PHP
session_start();
$user = $_SESSION['user'];


if ($user == null || ($user['type'] != 'psy' && $user['type'] != 'admin')) {
    die("<p>You are not authorized to view this page!</p>");
}

include_once "../../config.php";
include_once "../../model/entities/article.php";
include_once "../../model/categories.php";
include_once "../../model/article_category.php";
include_once "../../model/article.php";
include_once "../../utils/image_upload.php";

if (isset($_POST['operation']) && $_POST['operation'] == 'Ajouter') {
    $conn = new Config();
    $conn = $conn->getConnexion();

    $filename = $_FILES['image_file']['name'];
    $tmp_name = $_FILES["image_file"]["tmp_name"];
    $file_size = $_FILES["image_file"]["size"];
    $pospt = strrpos($filename, '.');
    $filename = generate_filename(20) . substr($filename, $pospt, strlen($filename) - $pospt);

    $name = $_POST['nom'];
    $categories_id = $_POST['categorie'];

    if (count(CrudArticle::fetchByName($conn, $name)) != 0) {
        echo "<p class=\"text-danger\">Erreur le nom de l'article est déjà utilisé.</p>";
        die();
    }

    // $all = $conn->afficheArticles($conn->cnx);
    // Récupérer les catégories correspondants aux categorie_id qui est trouvée dans $_POST['categorie']
    $categories = CrudCatgeories::fetchByManyIds($conn, $categories_id);

    $doc = new Article(null, $_POST['nom'], $_POST['slug'], $_POST['content'], $_POST['date_creation'], $categories, $filename);
    $article_id = CrudArticle::insert($conn, $doc);
    CrudArticleCategory::insertForOneArticle($conn, $article_id, $categories_id);
    upload_file('../../uploads/', $filename, $tmp_name, $file_size);
}
?>
<script>
    document.location = "research.php";
</script>