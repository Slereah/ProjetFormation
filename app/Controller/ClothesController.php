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
		$data = [];

		$search = "";

		if ($_SERVER['REQUEST_METHOD'] === 'POST') 
		{
			$search = (isset($_POST["search"]))?$_POST["search"]:"";
		}
		var_dump($search);
		$this->show('clothes/search', $data);
	}

	public function add()
	{
		$data = [];
		$this->show('clothes/add', $data);
	}

	public function read($id)
	{
		$data = [];
		$this->show('clothes/add', $data);
	}

	public function update($id)
	{
		$data = [];
		$this->show('clothes/edit', $data);
	}

	public function delete($id)
	{

	}
}

?>