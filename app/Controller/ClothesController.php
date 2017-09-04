<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ClothesModel;

class ClothesController extends Controller
{
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
		$data = [];

		$search = "";

		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$search = (isset($_POST["search"]))?$_POST["search"]:"";
		}
		$this->show('clothes/search', $data);
	}

	public function add()
	{

	private $clothesModel;

	public function __construct ()
	{
		$this->clothesModel = new ClothesModel;
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
}
