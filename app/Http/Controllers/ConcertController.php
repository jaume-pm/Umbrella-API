<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConcertRequest;
use App\Http\Requests\UpdateConcertRequest;
use App\Models\Concert;
use App\Services\GeocodeApi;
use App\Services\OpenMeteoApi;
use Carbon\Carbon;

class ConcertController extends Controller
{

    public function pre(){
        $concerts = Concert::all();
        foreach ($concerts as $concert){
        // Call the getPrecipitation method from OpenMeteoApi
        $precipitation = OpenMeteoApi::getPrecipitation($concert);
        }

    // Return the result from getPrecipitation
    return response()->json($precipitation);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        self::updateConcertDiscounts();
        $concerts = Concert::all();
        return response()->json($concerts);
    }

    public function indexUserConcerts()
    {
        $user = auth()->user();
        $concerts = $user->concerts;
        return response()->json($concerts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function coordinates(StoreConcertRequest $request){
        $address = $request->address;
        $country = $request->country;
        $city = $request->city;

        $fullAddress = "$address, $city, $country";

        $coordinates = GeocodeApi::getCoordinates($fullAddress);
        return response()->json($coordinates);
    }

    public function indexDiscountedConcerts()
    {
        $updatedConcerts = Concert::all();
        return response()->json($updatedConcerts);
    }

    private function updateConcertDiscounts(){
        $daysForDiscounts = env('DAYS_FOR_DISCOUNTS');

        // Get the current date and time
        $now = Carbon::now();
        $threeDaysFromNow = $now->copy()->addDays($daysForDiscounts);
        $concerts = Concert::whereBetween('datetime', [$now, $threeDaysFromNow])
        ->where('is_outdoors', true)
        ->get();

        foreach ($concerts as $concert) {
            
            $discount = OpenMeteoApi::getDiscount($concert);

            $updateData = [
                'discount' => $discount,
            ];

            $this->update(new UpdateConcertRequest($updateData), $concert);
        }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConcertRequest $request)
    {
        $address = $request->address;
        $country = $request->country;
        $city = $request->city;


        $fullAddress = "$address, $city, $country";

        $coordinates = GeocodeApi::getCoordinates($fullAddress);

        // Check if coordinates are returned successfully
        if (isset($coordinates['latitude']) && isset($coordinates['longitude'])) {
            $latitude = $coordinates['latitude'];
            $longitude = $coordinates['longitude'];

            // Store the latitude and longitude in the Concert model
            $concert = new Concert();
            $concert->latitude = $latitude;
            $concert->longitude = $longitude;
            $concert->address = $address;
            $concert->country = $country;
            $concert->city = $city;

            $concert->max_capacity = $request->max_capacity;
            $concert->is_outdoors = $request->is_outdoors;
            $concert->datetime = $request->datetime;
            $concert->original_price = $request->original_price;

            $concert->save();

            return response()->json([
                'message' => 'Concert stored successfully',
            ]);
        } else {
            return response()->json([
                'error' => $coordinates['error'] ?? 'Unknown error',
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Concert $concert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concert $concert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConcertRequest $request, Concert $concert)
    {
        $concert->discount = $request->input('discount');
        $concert->save();

        return response()->json([
            'message' => 'Discount updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concert $concert)
    {
        //
    }
}
