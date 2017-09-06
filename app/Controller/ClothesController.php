<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ClothesModel;

class ClothesController extends Controller
{
	private $clothesModel = null;

	public function __construct()
	{
		$this->clothesModel = new ClothesModel();
	}

	public function indexPersonal()
	{
		$data = [];
		$data["clothes"] = [["id" => 1, "name" => "clothe1"], ["id" => 2, "name" => "clothe2"]];
		$this->show('clothes/index', $data);
	}

	public function indexDefault()
	{
		$data = [];
		$this->show('clothes/index', $data);	
	}

	public function search()
	{
		$search = "";
		$data["userClothes"] = [];
		if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
		{
			$data["userClothes"] = $this->clothesModel->getUserClothes($_SESSION["user"]["id"]);
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$search = (isset($_POST["search"]))?$_POST["search"]:"";
		}
		$data["results"] = $this->clothesModel->search($search);

		$this->show('clothes/search', $data);
	}

	public function addToWardrobe($id, $idUser)
	{
		if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
		{
			if($idUser == $_SESSION["user"]["id"])
			{
				$this->clothesModel->addClothesUser($id, $userId);
				$this->redirectToRoute('clothes_read', ["id" => $id]);
			}
			
		}

	}

	public function deleteFromWardrobe($id, $idUser)
	{
		if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
		{
			if($idUser == $_SESSION["user"]["id"])
			{
				$this->clothesModel->deleteClothesUser($id, $idUser);
				$this->redirectToRoute('personal_clothes_index', ["id" => $id]);
			}
			
		}

	}


	public function index()
	{
		// retrieve all clothes
		$clothes = $this->clothesModel->findAll();
		// Show view
		$this->show('clothes/index', [
			"title" => " Liste des vêtements", 
			"clothes" => $clothes
		]);
	}
	public function create()
	{
		$name = null;
		$categories = $this->clothesModel->getCategories();
		$picture = null;
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$save = true;
			// Récupération du $_POST
			$name = $_POST['name'];
			$category = $_POST['category'];
			$picture = $_POST['picture'];
			// Vérification des données
			// ...
			if ($save) {
				// Enregistre en BDD
				$clothes = $this->clothesModel->insert([
					'name' => $name,
					'category' => $category,
					'picture' => $picture,
					
			]);
			$this->redirectToRoute('clothes_read', [id => $clothes['id']]);
		}
	}
	
		$this->show('clothes/create', [
			"title" => " Ajouter d'un vêtements",
			"name" => $name,
			"categories" => $categories,
			"picture" => $picture,
			"selected_category" => null,
			
		]);
	}
	public function read($id)
	{
		$clothes = $this->clothesModel->find($id);
		$this->show('clothes/read', [
			"title" => $clothes['name'],
			"clothes" => $clothes
		]);
	}
	public function update($id)
	{
		// Get product from BDD
		$clothes = $this->clothesModel->find($id);
		$categories = $this->clothesModel->getCategories();
		//
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$save = true;
			// Récupération du $_POST
			$name = $_POST['name'];
			$category = $_POST['category'];
			$picture = $_POST['picture'];
			// Vérification des données
			// ...
			if ($save) {
				// Enregistre en BDD
				$clothes = $this->clothesModel->update([
					'name' => $name,
					'category' => $category,
					'picture' => $picture,
					
				], $clothes['id']);
				$this->redirectToRoute('clothes_read', [id => $clothes['id']]);
			}
		}
		//
		$this->show('clothes/update', [
			"title" => " Modifier : ".$clothes['name'],
			"name" => $clothes['name'],
			"categories" => $categories,
			"picture" => $clothes['picture'],
			"selected_category" => $clothes['category'],
		]);
	}
	public function delete($id)
	{
		$clothes = $this->clothesModel->find($id);
		if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$this->clothesModel->delete($id);
			$this->redirectToRoute('default_clothes_index');
		}
		$this->show('clothes/delete',[
			"title" => " Suppression d'un vêtements :".$clothes['name'],
			"clothes" => $clothes
		]);
	}
	public static function clothesInWardrobe($id, $wardrobe)
	{
		foreach ($wardrobe as $value) 
		{
			if($value["idClothes"] == $id)
			{
				return true;
			}

		}
		return false;
	}
}

?>