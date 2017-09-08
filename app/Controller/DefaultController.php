<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ClothesModel;


class DefaultController extends Controller
{
	private $clothesModel;

	public function __construct ()
	{
		$this->clothesModel = new ClothesModel;
	}
	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$data["time"] = time();
		$data["day"] = 0;
		$data["date"] = date("Y-m-d", time());
		$data["city"] = "Paris";
		$data["country"] = "fr";
		$data["unit"] = "°C";

		
		
		$data["upperClothes"] = [];
		$data["lowerClothes"] = [];
		$data["shoes"] = [];
		if(isset($_SESSION["user"]))
		{
			$user = $_SESSION["user"];
			$data["city"] = $user["city"];
			$data["country"] = $user["country"];
			$data["unit"] = $user["unit"];
			$data["weather"] = DefaultController::forecast($data["city"], $data["country"], $data["day"], $data["unit"] == "°C");
			$id = $user["id"];
			$data["upperClothes"] = array_merge($data["upperClothes"], 
				$this->clothesModel->getTemp(
					"shirts", "personal", 
					$data["weather"]["minTemp"], 
					$data["weather"]["maxTemp"], 
					$data["weather"]["rain"], $id));
			$data["upperClothes"] = array_merge($data["upperClothes"], 
				$this->clothesModel->getTemp(
					"coats", "personal", 
					$data["weather"]["minTemp"], 
					$data["weather"]["maxTemp"], 
					$data["weather"]["rain"], $id));

			$data["lowerClothes"] = $this->clothesModel->getFromCategory("pants", "personal", $id);
			$data["shoes"] = $this->clothesModel->getFromCategory("shoes", "personal", $id);
			
		}
		else
		{
			$data["weather"] = DefaultController::forecast($data["city"], $data["country"], $data["day"], $data["unit"] == "°C");
			$data["upperClothes"] = $this->clothesModel->getFromCategory("shirts");
			$data["lowerClothes"] = $this->clothesModel->getFromCategory("pants");
			$data["shoes"] = $this->clothesModel->getFromCategory("shoes");
		}

		$data["cityInput"] = $data["city"];
		$data["countryInput"] = $data["country"];
		if(isset($_GET))
		{
			$city = "";
			$country = "";
			$day = "";

			$data["cityInput"] = $city;
			$data["countryInput"] = $country;


			if(isset($_GET["city"]) && isset($_GET["country"]))
			{
				$city = $_GET["city"];
				$country = $_GET["country"];
			}
			if(isset($_GET["day"]))
			{
				$day = $_GET["day"];
			}
			$weather = DefaultController::forecast($city, $country, $day, $data["unit"] == "°C");

			if(!is_null($weather))
			{
				$data["weather"] = $weather;
				$data["city"] = $city;
				$data["country"] = $country;
				$data["day"] = $day;
			}
		}
		$this->show('default/home', $data);
	}

	public function contact()
	{
		$errors = [];
		$lastname = null;
		$firstname = null;
    	$email = null;
    	$message = null;

    	$save =true;


		if ($_SERVER['REQUEST_METHOD'] === "POST") {
        // Récupération des données du formulaire
			$lastname = trim(strip_tags( $_POST['lastname']));
			$firstname = trim(strip_tags( $_POST['firstname']));
			$email = trim(strip_tags( $_POST['email']));
	    	$message = trim(strip_tags( $_POST['message']));


        // Vérification des données



    		if ($save) {

    			
        		// Enregistrer les données dans la BDD 

    			$contact_manager = new ContactModel();
    			$contact_manager->insert([

    				"lastname" => $lastname,
    				"firstname" => $firstname,
        			"email" => $email,
        			"message" => $message,
				]);

				$_SESSION['contactSubmit'] = true;

			}
        }
        // Afficher la vue

        $this->show('default/contact', [

        	"lastname" => $lastname,
        	"firstname" => $firstname,
        	"email" => $email,
        	"message" => $message,
        ]);
	}

	public function uploadImage()
	{
		if(isset($_FILES["croppedImage"]))
		{
			$blob = $_FILES["croppedImage"];
			$extension = explode('/', $blob['type'] )[1];
			$filename = md5(time()) . '.' . $extension;
			move_uploaded_file("../../public/assets/img" . $blob["tmp_name"], $filename);
		}
	}

	private static function getForecast($city = "Paris", $country = "fr")
	{
		$request = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="' . $city . ',' . $country . '")';
		$url = "https://query.yahooapis.com/v1/public/yql?q=" . urlencode($request) . "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		$response = json_decode(file_get_contents($url));
		if(is_null($response->query->results))
		{
			return null;
		}
		return $response->query->results->channel;
	}

	private static function forecast($city = "Paris", $country = "fr", $day = 0, $celsius = true)
	{
		$data = DefaultController::getForecast($city, $country);
		if(is_null($data))
		{
			return null;
		}
		$data = $data->item; 

		$weather = ["minTemp" => null, "maxTemp" => null, "weather" => null];
		$weather["minTemp"] = $data->forecast[$day]->low;
		$weather["maxTemp"] = $data->forecast[$day]->high;
		$weather["weather"] = $data->forecast[$day]->text;
		$weather["code"] = $data->forecast[$day]->code;
		$weather["rain"] = DefaultController::rain($data->forecast[$day]->code);
		if($celsius)
		{
			$weather["minTemp"] = round(DefaultController::fahrenheit_to_celsius($weather["minTemp"]));
			$weather["maxTemp"] = round(DefaultController::fahrenheit_to_celsius($weather["maxTemp"]));
		}
		$weather["icon"] = DefaultController::setWeatherIcon($data->forecast[$day]->code);
		return $weather;
	}

	private static function fahrenheit_to_celsius($temp)
	{
	    $celsius=5/9*($temp-32);
	    return $celsius ;
	}

	private static function celsius_to_fahrenheit($temp)
	{
	    $fahrenheit=$temp*9/5+32;
	    return $fahrenheit ;
	}

	private static function rain($code)
	{
		if(in_array($code, [1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 17, 18, 37, 38, 39, 40, 47]))
		{
			return true;
		}
		return false;
	}

	public static function setWeatherIcon($code) 
	{

 		switch($code) 
 		{
		    case '0': $icon  = '<i class="wi wi-tornado"></i>';
		    break;
		    case '1': $icon  = '<i class="wi wi-storm-showers"></i>';
		    break;
		    case '2': $icon  = '<i class="wi wi-tornado"></i>';
		    break;
		    case '3': $icon  = '<i class="wi wi-thunderstorm"></i>';
		    break;
		    case '4': $icon  = '<i class="wi wi-thunderstorm"></i>';
		    break;
		    case '5': $icon  = '<i class="wi wi-snow"></i>';
		    break;
		    case '6': $icon  = '<i class="wi wi-rain-mix"></i>';
		    break;
		    case '7': $icon  = '<i class="wi wi-rain-mix"></i>';
		    break;
		    case '8': $icon  = '<i class="wi wi-sprinkle"></i>';
		    break;
		    case '9': $icon  = '<i class="wi wi-sprinkle"></i>';
		    break;
		    case '10': $icon  = '<i class="wi wi-hail"></i>';
		    break;
		    case '11': $icon  = '<i class="wi wi-showers"></i>';
		    break;
		    case '12': $icon  = '<i class="wi wi-showers"></i>';
		    break;
		    case '13': $icon  = '<i class="wi wi-snow"></i>';
		    break;
		    case '14': $icon  = '<i class="wi wi-storm-showers"></i>';
		    break;
		    case '15': $icon  = '<i class="wi wi-snow"></i>';
		    break;
		    case '16': $icon  = '<i class="wi wi-snow"></i>';
		    break;
		    case '17': $icon  = '<i class="wi wi-hail"></i>';
		    break;
		    case '18': $icon  = '<i class="wi wi-hail"></i>';
		    break;
		    case '19': $icon  = '<i class="wi wi-cloudy-gusts"></i>';
		    break;
		    case '20': $icon  = '<i class="wi wi-fog"></i>';
		    break;
		    case '21': $icon  = '<i class="wi wi-fog"></i>';
		    break;
		    case '22': $icon  = '<i class="wi wi-fog"></i>';
		    break;
		    case '23': $icon  = '<i class="wi wi-cloudy-gusts"></i>';
		    break;
		    case '24': $icon  = '<i class="wi wi-cloudy-windy"></i>';
		    break;
		    case '25': $icon  = '<i class="wi wi-thermometer"></i>';
		    break;
		    case '26': $icon  = '<i class="wi wi-cloudy"></i>';
		    break;
		    case '27': $icon  = '<i class="wi wi-night-cloudy"></i>';
		    break;
		    case '28': $icon  = '<i class="wi wi-day-cloudy"></i>';
		    break;
		    case '29': $icon  = '<i class="wi wi-night-cloudy"></i>';
		    break;
		    case '30': $icon  = '<i class="wi wi-day-cloudy"></i>';
		    break;
		    case '31': $icon  = '<i class="wi wi-night-clear"></i>';
		    break;
		    case '32': $icon  = '<i class="wi wi-day-sunny"></i>';
		    break;
		    case '33': $icon  = '<i class="wi wi-night-clear"></i>';
		    break;
		    case '34': $icon  = '<i class="wi wi-day-sunny-overcast"></i>';
		    break;
		    case '35': $icon  = '<i class="wi wi-hail"></i>';
		    break;
		    case '36': $icon  = '<i class="wi wi-day-sunny"></i>';
		    break;
		    case '37': $icon  = '<i class="wi wi-thunderstorm"></i>';
		    break;
		    case '38': $icon  = '<i class="wi wi-thunderstorm"></i>';
		    break;
		    case '39': $icon  = '<i class="wi wi-thunderstorm"></i>';
		    break;
		    case '40': $icon  = '<i class="wi wi-storm-showers"></i>';
		    break;
		    case '41': $icon  = '<i class="wi wi-snow"></i>';
		    break;
		    case '42': $icon  = '<i class="wi wi-snow"></i>';
		    break;
		    case '43': $icon  = '<i class="wi wi-snow"></i>';
		    break;
		    case '44': $icon  = '<i class="wi wi-cloudy"></i>';
		    break;
		    case '45': $icon  = '<i class="wi wi-lightning"></i>';
		    break;
		    case '46': $icon  = '<i class="wi wi-snow"></i>';
		    break;
		    case '47': $icon  = '<i class="wi wi-thunderstorm"></i>';
		    break;
		    case '3200': $icon  =  '<i class="wi wi-cloud"></i>';
		    break;
		    default: $icon  =  '<i class="wi wi-cloud"></i>';
		    break;
 		}

  		return $icon;

	}

}