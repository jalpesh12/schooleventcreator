<?php
namespace App\Helpers;

class Helper
{
    public static function buildMapURL($source, $destination)
    {
        return env('APP_MAP_URL').'?origins='. $source .'&destinations='. $destination .'&key='.env('APP_MAP_KEY').'';
    }

    public static function curlRequest($url)
    {
        $curl = curl_init();
        curl_setopt_array ($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            )
        ));
        $response = curl_exec ($curl);
        $err = curl_error ($curl);
        curl_close ($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            return (json_decode($response, true));
        }
    }

    public static function getDistance($curlResponse)
    {
        if (isset($curlResponse['rows'][0]['elements'][0]['distance']['text'])){
            return $curlResponse['rows'][0]['elements'][0]['distance']['text'];
        }

        return 'Not Found';
    }

    public static function getDuration($curlResponse)
    {
        if (isset($curlResponse['rows'][0]['elements'][0]['duration']['text'])){
            return $curlResponse['rows'][0]['elements'][0]['duration']['text'];
        }

        return 'Not Found';
    }

    public static function getDistanceTime($sourceAddress, $destinationAddress)
    {
        //Build URL for 3rd party map service api to calcualte distance and time
        $url = Helper::buildMapURL($sourceAddress, $destinationAddress);

        //call Google MAP API to get the distance
        $curlResponse = Helper::curlRequest($url);
        
        //get distance
        $distance = Helper::getDistance($curlResponse);

        //get duration for travel
        $duration = Helper::getDuration($curlResponse);

        return array(
            'distance' => $distance,
            'duration' => $duration
        );

    }


}