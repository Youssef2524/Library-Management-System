<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Services\RatingService;
// use Illuminate\Support\Facades\Auth;
use App\Http\Resources\RatingResource;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(RatingService $RatingService)
    {
        $this->RatingService = $RatingService;
    }

    public function index(Request $request)
    {
        $rating=Rating::all();
        return RatingResource::collection($rating);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRatingRequest $request)
    {
        $data = $request->validated();
        $Rating = $this->RatingService->createRating($data);
        return response()->json(['data'=>$Rating,'masage'=>'get movies seccess'],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        $updatedRating = $this->RatingService->updateRating($rating, $request->validated());
        return new RatingResource($updatedRating);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {

            $this->RatingService->deleteRating($rating);
            return response()->json(null, 204);

    }
}
