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

$name = $_POST['nom'];

if (count(CrudCatgeories::fetchByName($conn, $name)) != 0) {
    echo "<p class=\"text-danger\">Erreur le nom de catégorie est déjà utilisé.</p>";
    die();
}

CrudCatgeories::insert($conn, $name);

?>
<script>
    document.location = "research.php";
</script>