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
		$data["weather"] = DefaultController::getForecast("Lille", "fr");
		$this->show('default/home', $data);
	}

	private static function getForecast($city, $country)
	{
		//$request = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="' . $city . ',' . $country . '")';
		//$url = "https://query.yahooapis.com/v1/public/yql?q=" . $request . "&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys";
		$response = file_get_contents('https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22Lille%2C%20fr%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys');
		return json_decode($response);

	}

}