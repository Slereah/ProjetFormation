<?php 

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;
use \Model\ClothesModel;


class UsersController extends Controller
{
	private $userManager;
	private $clothesModel;

	public function __construct()
	{
		$this->usersModel = new UsersModel;
		$this->usersModel->setTable('users');
		$this->clothesModel = new ClothesModel;
	}
	
	public function index()
	{
		// Controlle de l'accès
		$user = $this->getUser();

		if (!$user) 
		{
			$this->redirectToRoute('security_signin');
		}

		// Récupération des données de l'utilisateur dans la BDD
		$user = $this->usersModel->find($user['id']);

		$data["title"] = "Bonjour ".$user['username'];
		$data["user"] = $this->usersModel->find($user['id']);

		$maxpage = $this->clothesModel->count("personal", $user["id"])["COUNT(*)"];

		$data["maxpage"] = ceil($maxpage / 4) ;

		$page = 1;

		if(isset($_GET["page"]))
		{
			$page = $_GET["page"];
		}

		$data["page"] = $page;

		$data["clothes"] = $this->clothesModel->get("personal", $user["id"], 4, $page);
		// Affichage de la vue du profil
		$this->show('users/index',$data);
	}
}