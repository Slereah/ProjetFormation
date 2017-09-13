<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ClothesModel;
use \W\Model\UsersModel;


class ClothesController extends Controller
{
	private $clothesModel;
	private $userModel;

	public function __construct ()
	{
		$this->clothesModel = new ClothesModel;
		$this->usersModel = new UsersModel;
		$this->usersModel->setTable('users');	
	}

	/*CRUD clothes*/
	
	public function create($id = null)
	{
		if(!isset($_SESSION["user"]) || (is_null($id) || ($id != $_SESSION["user"]["id"])) && $_SESSION["user"]["role"] != "admin")
		{
			$this->showForbidden();
		}


		if($id != null && empty($this->usersModel->find($id)))
		{
			$this->showNotFound();
		}

		$name = null;
		$categories = $this->clothesModel->getCategories();
		$categories = (is_null($categories))?["Failed to load categories"]:$categories;
		$picture = null;
		$minTemp = null;
		$maxTemp = null;

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$save = true;
			// Récupération du $_POST
			$name 		= trim(strip_tags( $_POST['name']));
			$category 	= trim(strip_tags( $_POST['category']));
			$picture 	= trim(strip_tags( $_POST['picture']));
			$minTemp 	= trim(strip_tags( $_POST['minTemp']));
			$maxTemp 	= trim(strip_tags( $_POST['maxTemp']));
			if(isset($_POST['rain']))
			{
				$rain = trim(strip_tags( $_POST['rain']));
			}
			else
			{
				$rain = false;
			}
			// Vérification des données
			// ...
			if (empty($name)) {
					$save = false;
					array_push($errors, "Le nom du vêtement doit être rempli.");
			}
			if (empty($category)) {
					$save = false;
					array_push($errors, "La catégorie doit être sélectionnée.");
			}
			if (empty($picture)) {
					$save = false;
					array_push($errors, "Veuillez indiquez une image pour votre vêtement.");
			}
			if (empty($minTemp)) {
					$save = false;
					array_push($errors, "Veuillez indiquez une température minimale.");
				}
			if (empty($maxTemp)) {
					$save = false;
					array_push($errors, "Veuillez indiquez une température maximale.");
				}


			if ($save) 
			{
				// Enregistre en BDD
				if(is_null($id))
				{
					$clothes = $this->clothesModel->insert([
					'name' => $name,
					'category' => $category,
					'picture' => $picture,
					'minTemperature' => $minTemp,
					'maxTemperature' => $maxTemp,
					'rain' => $rain,
					'defaultClothes' => true
					]);
				}
				else
				{
					$clothes = $this->clothesModel->insert([
					'name' => $name,
					'category' => $category,
					'picture' => $picture,
					'minTemperature' => $minTemp,
					'maxTemperature' => $maxTemp,
					'rain' => $rain,
					'defaultClothes' => false
					]);

					$this->clothesModel->addClothesUser($clothes["id"], $id);
				}
				
				$this->redirectToRoute('clothes_read', [id => $clothes['id']]);
			}
		}
	
		$this->show('clothes/create', [
			"title" => " Ajouter un vêtement",
			"name" => $name,
			"categories" => $categories,
			"picture" => $picture,
			"selected_category" => null,
			
		]);
	}
	public function read($id)
	{
		$clothes = $this->clothesModel->find($id);		
		if(!$clothes["defaultClothes"])
		{
			$idUser = $this->clothesModel->findClothesUser($id)["idUsers"];
			if(!isset($_SESSION["user"]) || ((is_null($id) || ($idUser != $_SESSION["user"]["id"])) && $_SESSION["user"]["role"] != "admin"))
			{
				$this->showForbidden();
			}
		}
		
		$this->show('clothes/read', [
			"title" => $clothes['name'],
			"clothes" => $clothes
		]);
	}
	public function update($id, $idUser = null)
	{
		$idClotheUser = $this->clothesModel->findClothesUser($id)["idUsers"];
		if(!isset($_SESSION["user"]) || ((is_null($id) || ($idClotheUser != $_SESSION["user"]["id"])) && $_SESSION["user"]["role"] != "admin"))
		{
			$this->showForbidden();
		}
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
			$minTemp = $_POST['minTemp'];
			$maxTemp = $_POST['maxTemp'];
			if(isset($_POST['rain']))
			{
				$rain = $_POST['rain'];
			}
			else
			{
				$rain = false;
			}

			// Vérification des données
			// ...

			if ($save) {
				// Enregistre en BDD
				$clothes = $this->clothesModel->update([
					'name' => $name,
					'category' => $category,
					'picture' => $picture,
					'minTemperature' => $minTemp,
					'maxTemperature' => $maxTemp,
					'rain' => $rain
				], $clothes['id']);

				$_SESSION["ValidForm"] = true;

				$this->redirectToRoute('clothes_read', [id => $clothes['id']]);


			}

		}

		//
		$this->show('clothes/update', [
			"title" => " Modifier : ".$clothes['name'],
			"name" => $clothes['name'],
			"categories" => $categories,
			"picture" => $clothes['picture'],
			"minTemp" => $clothes["minTemperature"],
			"maxTemp" => $clothes["maxTemperature"],
			"rain"	=> ($clothes["rain"] == "10"),
			"selected_category" => $clothes['category'],
		]);
	}
	public function delete($id, $idUser = null)
	{
		$idClotheUser = $this->clothesModel->findClothesUser($id)["idUsers"];
		if(!isset($_SESSION["user"]) || ((is_null($id) || ($idClotheUser != $_SESSION["user"]["id"])) && $_SESSION["user"]["role"] != "admin"))
		{
			$this->showForbidden();
		}
		$clothes = $this->clothesModel->find($id);
		if ($_SERVER['REQUEST_METHOD'] === "POST") 
		{
			if(!is_null($idUser))
			{
				$this->clothesModel->deleteClothesUser($id, $idUser);
			}
			$this->clothesModel->delete($id);
			$this->redirectToRoute('profile');
		}
		$this->show('clothes/delete',[
			"title" => " Voulez-vous supprimer le vêtement : ".$clothes['name'] ." ?",
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
				if($_SESSION["user"]["role"] != "admin")
				{
					$this->showForbidden();
				}
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
		$data["title"] = "Recherche";
		$data["userClothes"] = [];
		if(isset($_SESSION["user"]) && !empty($_SESSION["user"]))
		{
			$data["userClothes"] = $this->clothesModel->get("personal", $_SESSION["user"]["id"]);
		}

		$options = [];
		$data["tops"] = false;
		$data["sweater"] = false;
		$data["vest"] = false;
		$data["coat"] = false;
		$data["pants"] = false;
		$data["shorts"] = false;
		$data["shoes"] = false;
		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$search = (isset($_POST["search"]))?$_POST["search"]:"";
			$data["search"] = $search;
			$data["tops"] = $options["tops"] = isset($_POST["tops"]) && $_POST["tops"] == "true";
			$data["sweater"] = $options["sweater"] = isset($_POST["sweater"]) && $_POST["sweater"] == "true";
			$data["vest"] = $options["vest"] = isset($_POST["vest"]) && $_POST["vest"] == "true";
			$data["coat"] = $options["coat"] = isset($_POST["coat"]) && $_POST["coat"] == "true";
			$data["pants"] = $options["pants"] = isset($_POST["pants"]) && $_POST["pants"] == "true";
			$data["shorts"] = $options["shorts"] = isset($_POST["shorts"]) && $_POST["shorts"] == "true";
			$data["shoes"] = $options["shoes"] = isset($_POST["shoes"]) && $_POST["shoes"] == "true";
		}
		$data["results"] = $this->clothesModel->search($search, $options);

		foreach ($data["results"] as $key => $result) 
		{
			
			$data["results"][$key]["inWardrobe"] = ClothesController::clothesInWardrobe($result["id"], $data["userClothes"]);
		}

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
