<?PHP
class Article
{
	protected $id;
	private $nom;
	private $slug;
	private $content;
	private $date_creation;
	private $categorie;
	private $image_file;
	/*******************************/
	public function __construct($idart, $nom, $slug, $content, $date, $categorie, $image_file)
	{
		$this->id = $idart;
		$this->nom = $nom;
		$this->date_creation = $date;
		$this->slug = $slug;
		$this->content = $content;
		$this->categorie = $categorie;
		$this->image_file = $image_file;
	}
	/**********************************/
	public function getId()
	{
		return $this->id;
	}
	public function getNom()
	{
		return $this->nom;
	}
	public function getDateCreation()
	{
		return $this->date_creation;
	}
	public function getslug()
	{
		return $this->slug;
	}
	public function getcontent()
	{
		return $this->content;
	}
	public function getcategorie()
	{
		return $this->categorie;
	}
	public function getImageFile()
	{
		return $this->image_file;
	}
	public function setId($id)
	{
		$this->id = $id;
	}
	public function setNom($nom)
	{
		$this->nom = $nom;
	}
	public function setDateCreation($date)
	{
		$this->date_creation = $date;
	}
	public function setslug($slug)
	{
		$this->$slug = $slug;
	}
	public function setcontent($content)
	{
		$this->content = $content;
	}
	public function setcategorie($categorie)
	{
		$this->categorie = $categorie;
	}
	public function setImagefile($image_file)
	{
		$this->image_file = $image_file;
	}
	public function afficheridentifient()
	{
		echo $this->identifient;
	}
	public function afficherNomEtDate()
	{
		echo $this->nom . " " . $this->date_creation;
	}
	public function afficherslug()
	{
		$this->afficheridentifient();
		echo "-" . $this->nom;
		echo ": " . $this->slug;
	}
	public function affichercontent()
	{
		$this->afficherNomEtDate();
		echo ":" . $this->content;
	}
}
