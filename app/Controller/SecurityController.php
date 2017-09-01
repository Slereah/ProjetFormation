<?php

namespace Controller;

use\W\Controller\Controller; 
use\W\Security\AuthentificationManager;
use\W\Manager\UserManager;

class SecurityController extends Controller
{
	private $userManager;
	private $AuthManager;

	public function __construct()
	{
	  $this->userManager = new UserManager;
	  $this->userManager->setTable('users');

	  $this->AuthManager = new AuthentificationManager;
	}


	public function signin()
	{
		$error = null;

		//' If ' method POST
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

		// Récupérer les données du formulaire
		$email = $_POST['user']['email'];
		$password = $_POST['user']['password'];

		// Vérifier les données dans la BDD ( Est ce que l'utilisateur existe ? )
		// Controller les identification (login + pwd)
		if ($userId = $this->AuthManager->isValidLoginInfo($email, $password)) {

			// Recup des données de l'utilisateurs dans la BDD
			$user = $this->userManager->find($userId);

			// Ajouter l'utilisateur à la SESSION
			$this->AuthManager->logUserIn($user);

			// Redirige l'utiliateur vers sa page profile
			$this->redirectToRoute('profile');

		}
		//Echec de connexion
		else {
			// Message d'erreur
			$error = "Echec d'identification";
		}	
	}
		// Affiche le formulaire d'identification
		$this->show('security/signin', ["title" => " Identification", "error" => $error]);

	}

	public function signup()
	{

		$error = null;
		$username = null;
		$email = null;
		$password = null;
		$repeat_password = null;
		$firstname = null;
		$lastname = null;
		$country = null;
		$city = null;
		$zipcode = null;

		// If method POST

		if ($_SERVER['REQUEST_METHOD'] === "POST") 
		{	

			$save = true;

			// Récupérer les données du formulaire
				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$repeat_password = $_POST['repeat_password'];
				$firstname = $_POST['firstname'];
				$lastname = $_POST['lastname'];
				$country = $_POST['country'];
				$city = $_POST['city'];
				$zipcode = $_POST['zipcode'];

			//	Controlle des données du POST 
			//	Controlle l'adresse email
				if (empty($email)) {
					$save = false;

					
				}	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$save = false;
					//	message d'erreur
				}
			// Controle des 2 MDP saisis dans le formulaire
			    if ($password !== $repeat_password) {
			    	$save = false;
			     // message d'erreur
			    } else {
			    	// Cryptage du MDP
        			$password = password_hash($password, PASSWORD_DEFAULT);
    			}

    			if (empty($country)) {
    				$save = false;
    			}

			if ($save) {
				
			
			//	Teste de l'existance de l'utilisateur ( dans la BDD)
			//	SI l'utilisateur n'existe pas
			    if (!$this->userManager->emailExists($email)) {

				// On enregistre  les données dans la BDD
			    $user = $this->userManager->insert([
		          "username" => $username,
		          "email" => $email,
		          "password" => $password,
		          "firstname" => $firstname,
				  "lastname" => $lastname,
				  "country" => $country,
				  "city" => $city,
				  "zipcode" => $zipcode,
		        ]);

				// Ajouter l'utilisateur a la SESSION
				$_SESSION['user'] = array(
			        "id" => $user['id'],
			        "email" => $user['email'],
			        "username" => $user['username'],
			        "firstname" => $firstname['firstname'],
				 	"lastname" => $lastname['lastname'],
					"country" => $country['country'],
					"city" => $city['city'],
					"zipcode" => $zipcode['zipcode']
			    );

				// On redirige l'utilisateur vers sa page profil
				 $this->redirectToRoute('profile');

			//	SI l'utilisateur existe
				} else {
        	// On affiche un message d'erreur
        	// message dans un flashbag
      			$error = "Un utilisateur existe déjà avec l'adresse email : $email";

    			}
    		}
		}

		// Affiche le formulaire d'inscription
		$this->show('security/signup', [
			"title" => " Inscription ",
			"username" => $username,
      		"email" => $email,
      		"firstname" => $firstname,
			"lastname" => $lastname,
			"country" => $country,
			"city" => $city,
			"zipcode" => $zipcode,
      		"error" => $error,
      	]);
		
	}

	public function logout()
	{

		//	On detruit la SESSION
		$this->AuthManager->logUserOut();

		//	On redirige vers la page d'acceuil
		$this->redirectToRoute('home');
		
	}

	public function lostPwd()
  	{
  		$error = null;

  		$_THE_TOKEN = null;

    	// if method POST
    	if ($_SERVER['REQUEST_METHOD'] === "POST") {
    		
      		// Récupération des données du POST
      		$email = strip_tags(trim($_POST['email']));

      		// Récupération de l'utilisateur dans la BDD (est ce que l'utilisateur existe ?)
      		if ($user = $this->userManager->getUserByUsernameOrEmail($email)) {



          		// Generation du Token
          		$token = array(

          			"token"=> md5(\W\Security\StringUtils::randomString(10)), // Token
          			"timeout"=> time()+3600, // Timeout
          			"user_id"=> $user['id'], // ID user
          		);

          		$tokensManager = new \Manager\TokensManager;
          		$tokensManager->insert($token);

          		// Générer l'URL de la page qui va permettre de renouveller le MDP
          		$url = $this->generateUrl('security_reset_Pwd', 
          			["token" => $token['token']], true);
          		$_THE_TOKEN = $url;
          		
          		// Envois du mail avec le process de renouvellement du MDP
          		$to = $email;
          		$subject = " renouvellement de votre mot de passe ";
          		$message = "Copier/Coller l'adresse suivante dans votre navigateur pour modifier votre mot de passe.\n".$url;
          		


          		// Affiche le message de prise en compte de la demande
          		if(@mail($to,$subject,$message)) {
          			$error = "Un email avec la procédure de renouvellement du mot de passe à été envoyé à l'adresse $email.";
          		} else {
          			$error = "Une erreur est survenue lors de l'envois du mail";
          		}
			}

      		// Pas d'utilisateur en BDD - Affiche un message d'erreur
      		else {
      			$error = "Oops, aucun utilisateur n'a été trouvé.";

      		}

		}

    	// Affichage du formulaire (adresse email)
    	$this->show('security/pwd/lost', [
    		"title" => " Mot de passe oublié ? ",
    		"error" => $error,
    		"THE_TOKEN_URL" => $_THE_TOKEN

    	]);
  	}

  	public function resetPwd($token)
  	{

  		$error = null;

  	// Recuperation du Token ( pour le transmettre dans le formulaire en champ caché)


	    // If method POST
	  	if ($_SERVER['REQUEST_METHOD'] === "POST") {
	  
	        // Récupération des données du POST
	        $token = strip_tags(trim($_POST['token']));
	        $password = strip_tags(trim($_POST['password']));
	        $repeat_password = strip_tags(trim($_POST['repeat_password']));

	        // Controle du Token + recup des données associées au token
	        $tokensManager = new \Manager\TokensManager;
	        $token_data = $tokensManager->findByToken($token);

	        if ($token_data) {
	        	
	        // Controle de la validité du token (timeout)
	        	if ($token_data['timeout'] >= time()) {
	        	
		        // Controle des MDP
	        		if (empty($password)) {
	        			$error = "Le mot de passe ne doit pas être vide";
	        		}

	        		else if ($repeat_password !== $password) {
	        		 	
	        		 	$error = "Les mots de passe doivent être identique";

	        		} 

	        		else {
	        		// Cryptage du mot de passe
	        			$password = password_hash($password, PASSWORD_DEFAULT);

			        // M.A.J. du MDP dans la BDD
	        			$this->userManager->update([
	        				"password" => $password,
	        			], $token_data['user_id']);



			        // Redirige l'utilisateur vers la page signIN
	        		$this->redirectToRoute('security_signin');


					}
	        	}
	        	// Le délai de la validité du token est dépassé

	        	else {

	        		$error = 'Le délai de validité du token est expiré.';
	        		
	        	}

	        } 

	        else {
	        	// La requête  -> findByToken return FALSE
	        	$error = "Le token est invalide";

			}
		
		}
	    	// Affichage du formulaire
	    	$this->show('security/pwd/reset', [
	    		"title" => " Changer le mot de passe ",
	    		"token" => $token,
	    		"error" => $error
	    	]);
  	}
}


 ?>