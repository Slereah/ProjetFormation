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

		$data["maxpage"] = ceil($maxpage / 3) ;

		$page = 1;

		if(isset($_GET["page"]))
		{
			$page = $_GET["page"];
		}

		$data["page"] = $page;

		$data["clothes"] = $this->clothesModel->get("personal", $user["id"], 3, $page);
		// Affichage de la vue du profil
		$this->show('users/index',$data);
	}

	public function update()
	{

		$errors = [];
		$username = null;
		$email = null;
		$password = null;
		$repeat_password = null;
		$firstname = null;
		$lastname = null;
		$country = null;
		$city = null;
		$zipcode = null;
		$unit = null;

		// If method POST

		if ($_SERVER['REQUEST_METHOD'] === "POST") 
		{	

			$save = true;

			// Récupérer les données du formulaire
				$username 			= trim(strip_tags( $_POST['username']));
				$email 				= trim(strip_tags( $_POST['email']));
				$password 			= trim(strip_tags( $_POST['password']));
				$repeat_password 	= trim(strip_tags( $_POST['repeat_password']));
				$firstname 			= trim(strip_tags( $_POST['firstname']));
				$lastname 			= trim(strip_tags( $_POST['lastname']));
				$country 			= trim(strip_tags( $_POST['country']));
				$city 				= trim(strip_tags( $_POST['city']));
				$zipcode 			= trim(strip_tags( $_POST['zipcode']));
				$unit 				= trim(strip_tags( $_POST['unit']));

			//	Contrôle des données du POST
				// Vérifie le nom d'utilisateur
				if (empty($username)) {
					$save = false;
					array_push($errors, "Le nom d'utilisateur doit être rempli.");
				} else if (strlen($username) < 3) {
					$save = false;
					array_push($errors, "Le nom d'utilisateur doit faire au moins 3 caractères.");
				}

				//	Contrôle l'adresse email
				if (empty($email)) {
					$save = false;
				}

				// Vérification du mot de passe
				if (empty($password)) {
					$save = false;
					array_push($errors, "Veuillez saisir un mot de passe.");

				}else if (strlen($password) < 8 || strlen($password) > 16) {
			        $save = false;
			        array_push($errors, "Le mot de passe doit avoir 8 caractères minimum et 16 caractères maximum.");
		        }
			    // -> doit avoir au moins un caractère de type numérique
			     else if (!preg_match("/[0-9]/", $password)) {
			        $save = false;
			        array_push($errors, "Le mot de passe doit contenir au moins un caractère numérique.");
			    }

			    // Controle des 2 MDP saisis dans le formulaire
			    if ($password !== $repeat_password) {
			    	$save = false;
			    	array_push($errors, "Les mots de passe doivent être identiques.");
			   		

			    } else {
			    	// Cryptage du MDP
        			$password = password_hash($password, PASSWORD_DEFAULT);
    			}


    			// Vérifie le prénom
				if (empty($firstname)) {
					$save = false;
					array_push($errors, "Veuillez entrer votre prénom.");
				} else if (strlen($firstname) < 3) {
					$save = false;
					array_push($errors, "Le prénom doit faire au moins 3 caractères.");
				}


				// Vérifie le nom
				if (empty($lastname)) {
					$save = false;
					array_push($errors, "Veuillez entrer votre nom.");
				} else if (strlen($lastname) < 3) {
					$save = false;
					array_push($errors, "Le nom doit faire au moins 3 caractères.");
				}


				// Vérifie le pays
    			if (empty($country)) {
    				$save = false;
    				array_push($errors, "Veuillez sélectionner un pays.");
    			}

    			// Vérifie la ville
    			if (empty($city)) {
    				$save = false;
    				array_push($errors, "Veuillez entrer une ville.");
    			} else if (strlen($city) < 2) {
					$save = false;
					array_push($errors, "La ville doit faire au moins 3 caractères.");
				}
			
				// Vérifie le code postal
				if (empty($zipcode)) {
    				$save = false;
    				array_push($errors, "Veuillez entrer un code postal.");
    			} else if (strlen($zipcode) > 11) {
					$save = false;
					array_push($errors, "Le code postal doit faire moins de 10 caractères.");
				}


				if (empty($unit) || ($unit != "°C" && $unit != "°F")) 
				{
    				$save = false;
    				array_push($errors, "Unit invalid.");
    			}


			if ($save) {
			
			//	Teste de l'existance de l'utilisateur ( dans la BDD)
			//	SI l'utilisateur n'existe pas
			    if (!$this->usersModel->emailExists($email)) {

				// On enregistre  les données dans la BDD
			    $user = $this->usersModel->insert([
		          "username" 	=> $username,
		          "email" 		=> $email,
		          "password" 	=> $password,
		          "firstname" 	=> $firstname,
				  "lastname" 	=> $lastname,
				  "country" 	=> $country,
				  "city"	 	=> $city,
				  "zipcode" 	=> $zipcode,
		        ]);
			    
				// Ajouter l'utilisateur a la SESSION
				$_SESSION['user'] = array(
			        "id" 		=> $user['id'],
			        "email" 	=> $user['email'],
			        "username" 	=> $user['username'],
			        "firstname" => $user['firstname'],
				 	"lastname" 	=> $user['lastname'],
					"country" 	=> $user['country'],
					"city" 		=> $user['city'],
					"zipcode" 	=> $user['zipcode'], 
					"unit"		=> $user['unit']
			    );

				// On redirige l'utilisateur vers sa page profil
				 $this->redirectToRoute('profile');

			//	SI l'utilisateur existe
				}
        	// On affiche un message d'erreur
        	// message dans un flashbag
      			
    		}
		}

		// Affiche le formulaire de modification du profile
		$this->show('users/update', [	
			"title" 	=> " Modifier mon profile",
			"username" 	=> $username,
      		"email" 	=> $email,
      		"password" 	=> $password,
      		"firstname" => $firstname,
			"lastname" 	=> $lastname,
			"country" 	=> $country,
			"city" 		=> $city,
			"zipcode" 	=> $zipcode,
      		"errors" 	=> $errors,

      	]);
		
	}
}