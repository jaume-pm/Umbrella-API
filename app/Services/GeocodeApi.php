<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeocodeApi
{
    private static $apiKey = "659068bacd2fd525673211xkf7b376f";

    public static function getCoordinates($fullAddress)
    {
        $address = str_replace(' ', '+', $fullAddress);
        $call = "https://geocode.maps.co/search?q={$address}&api_key=" . self::$apiKey;
        $response = Http::get("". $call);

        if ($response->successful()) {
            $data = $response->json();
            $latitude = $data[0]['lat'];
            $longitude = $data[0]['lon'];

            return [
                'latitude' => $latitude,
                'longitude' => $longitude,
                'call' => $call

            ];
        } else {
            return [
                'error' => 'Unable to geocode address',
                'address' => $address
            ];
        }
    }
}
