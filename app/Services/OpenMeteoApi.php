<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Concert;
use Carbon\Carbon;

class OpenMeteoApi
{
    public static function getPrecipitation(Concert $concert)
{
    $daysForDiscounts = env('DAYS_FOR_DISCOUNTS');
    
    $latitude = $concert->latitude;
    $longitude = $concert->longitude;
    // Truncate the datetime to hours (00 minutes, 00 seconds)
    $datetime = Carbon::parse($concert->datetime)->format('Y-m-d\TH:00');
    $response = Http::get("https://api.open-meteo.com/v1/forecast?latitude={$latitude}&longitude={$longitude}&hourly=precipitation&forecast_days={$daysForDiscounts}");

    if ($response->successful()) {
        $data = $response->json();

        $precipitationData = $data['hourly']['precipitation'];
        $closestDatetimeIndex = array_search($datetime, $data['hourly']['time']);

        if ($closestDatetimeIndex !== false) {
            $precipitation = array_slice($precipitationData, $closestDatetimeIndex, 4, true);

            $maxPrecipitation = max($precipitation);
        }
        else {
            $maxPrecipitation = 0;
        }
        return  $maxPrecipitation;

    } else {
        return [
            'error' => 'Unable to retrieve weather data'
        ];
    }
}



    public static function getDiscount(Concert $concert)
{
    $maxDiscount = $concert->max_discount;
    $precipitation = OpenMeteoApi::getPrecipitation($concert);

    // Normalizing the precipitation value
    $normalizedPrecipitation = ($precipitation/5);

    $normalizedPrecipitation = max(0, min($normalizedPrecipitation, 1));

    $discount = $normalizedPrecipitation * $maxDiscount;

    // Formatting to two decimals
    return number_format($discount, 2, '.', '');
}

}
