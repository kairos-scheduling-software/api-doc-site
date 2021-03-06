<?php

class Communication 
{
  public static function requestKey($email)
  {
    $builder['key'] = "e5506213-3196-4e6a-9613-237fd987446d";
    $builder['email'] = $email;

    $json = json_encode($builder);
    return Communication::sendJsonToCoreService('requestkey', $json);
  }

  public static function runExample($mode, $jsonPreKey)
  {
      $json = json_decode($jsonPreKey);
      $json->APIKey = "e5506213-3196-4e6a-9613-237fd987446d";
      $json = json_encode($json);

      return Communication::sendJsonToCoreService($mode, $json);
  }

	private static function sendJsonToCoreService($mode, $json)
    {
        $host = 'http://scheduling-core-service.herokuapp.com/api/' . $mode;
        //$host = 'localhost:8080/api/' . $mode;

		    //will need to set up
		    $curl = curl_init($host);
  		  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  		  curl_setopt($curl, CURLOPT_HEADER, false);
  		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  		  curl_setopt($curl, CURLOPT_HTTPHEADER,
    	  array("Content-type: application/json"));
  		  curl_setopt($curl, CURLOPT_POST, true);
  		  curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
		

		    $result     = curl_exec($curl);
		    curl_close($curl);

		    return $result;
    }
}