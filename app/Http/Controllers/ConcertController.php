<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreConcertRequest;
use App\Http\Requests\UpdateConcertRequest;
use App\Models\Concert;
use App\Services\GeocodeApi;
use App\Services\OpenMeteoApi;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
    public function index(Request $request)
{
    self::updateConcertDiscounts(); // Update concert discounts first

    $query = Concert::query();

    // Capacity filters
    if ($request->has('min_max_capacity')) {
        $query->where('max_capacity', '>=', $request->min_max_capacity);
    }
    if ($request->has('max_max_capacity')) {
        $query->where('max_capacity', '<=', $request->max_max_capacity);
    }

    // Outdoors filter
    if ($request->has('is_outdoors')) {
        $query->where('is_outdoors', $request->is_outdoors);
    }

    // Datetime filters
    if ($request->has('min_datetime')) {
        $query->where('datetime', '>=', $request->min_datetime);
    }
    if ($request->has('max_datetime')) {
        $query->where('datetime', '<=', $request->max_datetime);
    }

    // Location filters
    if ($request->has('country')) {
        $query->where('country', $request->country);
    }
    if ($request->has('city')) {
        $query->where('city', $request->city);
    }

    // Price filters
    if ($request->has('min_original_price')) {
        $query->where('original_price', '>=', $request->min_original_price);
    }
    if ($request->has('max_original_price')) {
        $query->where('original_price', '<=', $request->max_original_price);
    }

    // Discount filters
    if ($request->has('min_discount')) {
        $query->where('discount', '>=', $request->min_discount);
    }
    if ($request->has('max_discount')) {
        $query->where('discount', '<=', $request->max_discount);
    }

    $concerts = $query->get();

    // Calculated price filters
    if ($request->has('min_price') || $request->has('max_price')) {
        $concerts = $concerts->filter(function ($concert) use ($request) {
            $calculatedPrice = $concert->original_price * (1 - $concert->discount / 100);
            $minPrice = $request->min_price ?? 0;
            $maxPrice = $request->max_price ?? PHP_INT_MAX;
            return $calculatedPrice >= $minPrice && $calculatedPrice <= $maxPrice;
        });
    }

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
