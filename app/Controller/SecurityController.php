<?php

namespace Controller;

use \W\Controller\Controller; 
use \W\Security\AuthentificationModel;
use \W\Model\UsersModel;

class SecurityController extends Controller
{
	private $usersModel;
	private $AuthManager;

	public function __construct()
	{
	  $this->usersModel = new UsersModel;
	  $this->usersModel->setTable('users');

	  $this->AuthModel = new AuthentificationModel;
	}


	public function signin()
	{
		$errors = [];

		//' If ' method POST
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			// Récupérer les données du formulaire
			$email 		= trim(strip_tags( $_POST['user']['email']));
			$password 	= trim(strip_tags( $_POST['user']['password']));

			// Vérifier les données dans la BDD ( Est-ce que l'utilisateur existe ? )
			// Contrôler les identification (login + pwd)
			if ($userId = $this->AuthModel->isValidLoginInfo($email, $password)) {

				// Recup des données de l'utilisateurs dans la BDD
				$user = $this->usersModel->find($userId);

				// Ajouter l'utilisateur à la SESSION
				$this->AuthModel->logUserIn($user);

				// Redirige l'utilisateur vers sa page profile
				$this->redirectToRoute('profile');

			}
			//Echec de connexion
			else {
				// Message d'erreur
				array_push($errors, "Echec d'identification");

			}	
		}
		// Affiche le formulaire d'identification
		$this->show('security/signin', ["title" => " Identification", "errors" => $errors]);

	}

	public function signup()
	{
		include_once "../app/constants.php";
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
					array_push($errors, "Veuillez saisir une adresse mail valide.");
		
				}	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$save = false;
					array_push($errors, "Veuillez saisir une adresse mail valide.");

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
    				array_push($errors, "L'unité de degrés est incorrecte.");
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
				  "unit"		=> $unit,
				  "role"		=> "user"
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
					"unit"		=> $user['unit'],
					"role"		=> "user"
			    );

				// On redirige l'utilisateur vers sa page profil
				 $this->redirectToRoute('profile');

			//	SI l'utilisateur existe
				} else {
        	// On affiche un message d'erreur
        	// message dans un flashbag
      			$errors = "Un utilisateur existe déjà avec l'adresse email : $email";

    			}
    		}
		}

		// Affiche le formulaire d'inscription
		$this->show('security/signup', [
			"title" 	=> " Inscription ",
			"username" 	=> $username,
      		"email" 	=> $email,
      		"password" 	=> $password,
      		"firstname" => $firstname,
			"lastname" 	=> $lastname,
			"country" 	=> $country,
			"city" 		=> $city,
			"zipcode" 	=> $zipcode,
      		"errors" 	=> $errors,
      		"countryList" => $countryList
      	]);
		
	}

	public function logout()
	{

		//	On detruit la SESSION
		$this->AuthModel->logUserOut();

		//	On redirige vers la page d'acceuil
		$this->redirectToRoute('home');
		
	}

	public function lostPwd()
  	{
  		$errors = [];

  		$_THE_TOKEN = null;

    	// if method POST
    	if ($_SERVER['REQUEST_METHOD'] === "POST") {
    		
      		// Récupération des données du POST
      		$email = strip_tags(trim($_POST['user']['email']));

      		// Récupération de l'utilisateur dans la BDD (est ce que l'utilisateur existe ?)
      		if ($user = $this->usersModel->getUserByUsernameOrEmail($email)) {



          		// Generation du Token
          		$token = array(

          			"token"=> md5(\W\Security\StringUtils::randomString(10)), // Token
          			"timeout"=> time()+3600, // Timeout
          			"user_id"=> $user['id'], // ID user
          		);

          		$tokensModel = new \Model\TokensModel;
          		$tokensModel->insert($token);

          		// Générer l'URL de la page qui va permettre de renouveller le MDP
          		$url = $this->generateUrl('security_reset_pwd', 
          			["token" => $token['token']], true);
          		$_THE_TOKEN = $url;
          		
          		// Envois du mail avec le process de renouvellement du MDP
          		$to = $email;
          		$subject = " Renouvellement de votre mot de passe ";
          		$message = "Copier/Coller l'adresse suivante dans votre navigateur pour modifier votre mot de passe.\n".$url;
          		


          		// Affiche le message de prise en compte de la demande
          		if(@mail($to,$subject,$message)) {
          			array_push($errors, "Un email avec la procédure de renouvellement du mot de passe a été envoyé à l'adresse $email.");
          		} else {
          			array_push($errors, "Une erreur est survenue lors de l'envoi du mail");

          		}
			}

      		// Pas d'utilisateur en BDD - Affiche un message d'erreur
      		else {
      			array_push($errors, "Oops, aucun utilisateur n'a été trouvé.");

      		}

		}

    	// Affichage du formulaire (adresse email)
    	$this->show('security/pwd/lost', [
    		"title" => " Mot de passe oublié ? ",
    		"errors" => $errors,
    		"THE_TOKEN_URL" => $_THE_TOKEN

    	]);
  	}

  	public function resetPwd($token)
  	{

  		$errors = [];

	    	// Affichage du formulaire
	    	$this->show('security/pwd/reset', [
	    		"title" => " Changer le mot de passe ",
	    		"token" => $token,
	    		"errors" => $errors
	    	]);

	    $this->redirectToRoute('security_signin');
  	}
}


 ?>