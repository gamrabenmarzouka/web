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

$categorie_id = intval($_POST['categorie_id']);
$btn_operation = $_POST['btn_operation'];

if ($btn_operation == "Mettre à jour") {
    $name = $_POST['nom'];

    // Rechercher si le nom de l'article est utilisé
    // pour un autre article possédant un id différent
    $categorie = CrudCatgeories::fetchByName($conn, $name);
    if (count($categorie) != 0 && $categorie['id'] != $categorie_id) {
        echo "<p class=\"text-danger\">Erreur le nom de la catégorie est déjà utilisé.</p>";
    } else {
        CrudCatgeories::update($conn, $categorie_id, $name);
        echo "<p>Les données ont été mises à jour avec succès.</p>";
    }
} else {
    echo "<p>Opération annulée. Retour à la liste des catégories.</p>";
    echo "<script>document.location = 'research.php';</script>";
}
?>
<a href="research.php">Retour à la liste des catégories</a>
<script>document.location = 'research.php';</script>