<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ClothesModel;

class ClothesController extends Controller
{
	private $clothesModel;

	public function __construct ()
	{
		$this->clothesModel = new ClothesModel;
	}

	/*CRUD clothes*/
	
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
			if ($save) 
			{
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
	public function update($id, $idUser = null)
	{
		// Get product from BDD
		$clothes = $this->clothesModel->find($id);
		$categories = $this->clothesModel->getCategories();

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
	public function delete($id, $idUser = null)
	{
		$clothes = $this->clothesModel->find($id);
		if ($_SERVER['REQUEST_METHOD'] === "POST") 
		{
			if(!is_null($idUser))
			{
				$this->clothesModel->deleteClothesUser($id, $idUser);
			}
			$this->clothesModel->delete($id);
			$this->redirectToRoute('default_clothes_index');
		}
		$this->show('clothes/delete',[
			"title" => " Suppression d'un vêtements :".$clothes['name'],
			"clothes" => $clothes
		]);
	}

	public function index($type = "default")
	{
		// retrieve all clothes
		$clothes = [];

		switch ($type) 
		{
			case 'both':
				$clothes = $this->clothesModel->get("both");
				break;
			case 'personal':
				{
					if(isset($_SESSION))
					{
						$clothes = $this->clothesModel->get("personal", $_SESSION["user"]["id"]);
					}
					
					break;
				}
			case 'default':
				$clothes = $this->clothesModel->get("default");
				break;
			default:
				break;
		}

		// Show view
		$this->show('clothes/index', [

			"title" => " Liste des vêtements", 
			"clothes" => $clothes

		]);
	}

	public function search()
	{
		$search = "";
		$data["title"] = "Search";
		$data["userClothes"] = [];
		if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
		{
			$data["userClothes"] = $this->clothesModel->get("personal", $_SESSION["user"]["id"]);
		}

		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$search = (isset($_POST["search"]))?$_POST["search"]:"";
		}
		$data["results"] = $this->clothesModel->search($search);

		$this->show('clothes/search', $data);
	}

	/*CRUD userclothes*/

	public function addToWardrobe($id, $idUser)
	{
		if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
		{
			if($idUser == $_SESSION["user"]["id"])
			{
				$this->clothesModel->addClothesUser($id, $idUser);
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

		$clothes = $this->clothesModel->find($id);

		$this->show('clothes/read', [

			"title" => $clothes['name'],
			"clothes" => $clothes
		]);
	}

	public static function clothesInWardrobe($id, $wardrobe)
	{
		foreach ($wardrobe as $value) 
		{
			if($value["id"] == $id)
			{
				return true;
			}
		}
		return false;
	}
}
