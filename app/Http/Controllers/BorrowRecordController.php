<?php

namespace App\Http\Controllers;

use App\Models\BorrowRecord;
use Illuminate\Http\Request;
use App\Services\BorrowRecordService;
use App\Http\Resources\BorrowRecordResource;
use App\Http\Requests\StoreBorrowRecordRequest;
use App\Http\Requests\UpdateBorrowRecordRequest;
use Illuminate\Support\Facades\Gate;

class BorrowRecordController extends Controller
{

    public function __construct(BorrowRecordService $borrowRecordService)
    {
        $this->borrowRecordService = $borrowRecordService;
    }
    /**
     * Display a listing of the resource.
     */
      /*
      @param BorrowRecord
      @return BorrowRecordResource
  */
    public function index()
    {
        Gate::authorize('view', BorrowRecord::class);
        return BorrowRecordResource::collection(BorrowRecord::all());


    }
    
    /**
     * Store a newly created resource in storage.
     */
      /*
      @param StoreBorrowRecordRequest $request
      @return BorrowRecordResource
  */
      public function store(StoreBorrowRecordRequest $request)
      {
        Gate::authorize('create', BorrowRecord::class);

          $borrowRecord = $this->borrowRecordService->createBorrowRecord($request->book_id);
          return new BorrowRecordResource($borrowRecord);
      }

    /**
     * Display the specified resource.
     */
       /*
      @param BorrowRecord $BorrowRecord
      @return BorrowRecordResource
  */
    public function show(BorrowRecord $BorrowRecord)
    {
        return new BorrowRecordResource($BorrowRecord);
    }

    /**
     * Update the specified resource in storage.
     */
      /*
      @param BorrowRecord $BorrowRecord
      @param $borrowId
      @return BorrowRecordResource
  */

    public function update($borrowId,BorrowRecord $borrowRecord, BorrowRecordService $borrowRecordService)
    {
        
                Gate::authorize('update', $borrowRecord);
        $borrowRecord = $borrowRecordService->returnBorrowedBook($borrowId);
        return response()->json(['message' => 'Book returned successfully', 'record' => $borrowRecord]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
       /*
      @param BorrowRecord $BorrowRecord
      @return BorrowRecordResource
  */
    public function destroy(BorrowRecord $BorrowRecord)
    {
        Gate::authorize('delete', $BorrowRecord);

        $this->borrowRecordService->delete($BorrowRecord);
        return response()->json(null, 204);
        }
}

