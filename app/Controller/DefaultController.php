<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$data["weather"] = DefaultController::forecast();
		$data["imghaut"] = [
		"https://gloimg.rosewholesale.com/ROSE/pdm-product-pic/Clothing/2016/07/27/goods-img/1473012160372349548.jpg",
		"https://images-eu.ssl-images-amazon.com/images/I/61hnenbaFDL._UL1500_.jpg",
		"https://cdn.laredoute.com/products/310by310/6/a/1/6a10499b7eebbcd27ca96f9370b2c5f3.jpg"
		];
		$data["imgbas"] = [
		"http://www.forcesenior.fr/images/ekjnoad/Nouveau%20Raffinement%20Homme%20V%C3%AAtements%20Jean%20Skinny%20Sid%20Bleu%20Vif%20Stretch%20Paris%20604.jpg"];
		$this->show('default/home', $data);
	}

	public function contact()
	{
		$this->show('default/contact');
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
		return $response->query->results->channel;
	}

	private static function forecast($city = "Paris", $country = "fr", $day = 0, $celsius = true)
	{
		$data = DefaultController::getForecast($city, $country)->item; 

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