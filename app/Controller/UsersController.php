<?php 

namespace Controller;

use \W\Controller\Controller;
use \W\Model\UsersModel;

class UsersController extends Controller
{
	private $userManager;

	public function __construct()
	{
		$this->usersModel = new UsersModel;
		$this->usersModel->setTable('users');
	}
	
	public function index()
	{
		// Controlle de l'accès
		$user = $this->getUser();

		if (!$user) {
			$this->redirectToRoute('security_signin');
		}

		// Récupération des données de l'utilisateur dans la BDD
		$user = $this->usersModel->find($user['id']);

		// Affichage de la vue du profil
		$this->show('users/index',[
			"title" => "Bonjour ".$user['username'],
			"user" => $this->usersModel->find($user['id'])
		]);
	}
}