<?php

namespace App\Http\Controllers;

use App\Models\Book;
// use App\Service\BookService;
use App\Services\BookService;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{

    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of the resource.
     */
    /*
      @param  Request $request
      @return BookResource
  */
      public function index(Request $request)
    {
        // $books = Book::all();

        $books= $this->bookService->getBook($request->all());
        return BookResource::collection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
     /*
      @param  StoreBookRequest $request
      @return BookResource
  */
    public function store(StoreBookRequest $request)
    {
        Gate::authorize('create', Book::class);
        $book = $this->bookService->createBook($request->validated());
        return new BookResource($book);

    }

    /**
     * Display the specified resource.
     */
     /*
      @param  Book $book
      @return BookResource
  */
    
    public function show(Book $book)
    {
        return new BookResource($book);

    }

    /**
     * Update the specified resource in storage.
     */
    /*
      @param UpdateBookRequest  $request
      @param Book $book
      @return BookResource
  */
    public function update(UpdateBookRequest  $request,  Book $book)
    {
            Gate::authorize('update', $book);

            $updatedBook = $this->bookService->updateBook($book, $request->validated());
            return new BookResource($updatedBook);
    }

    /**
     * Remove the specified resource from storage.
     */
     /*
      @param Book $book
      @return response
  */
    public function destroy(Book $book)
    {
            Gate::authorize('delete', $book);

            $this->bookService->deleteBook($book);
            return response()->json(null, 204);

    }
}
