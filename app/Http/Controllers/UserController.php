<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    /*
      @param User
      @return UserResource
  */
    public function index()
    {
        Gate::authorize('view-any', User::class);

        return UserResource::collection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     */
      /*
      @param StoreUserRequest $request
      @return UserResource
  */
    public function store(StoreUserRequest $request)
    {
        Gate::authorize('create', User::class);
        $user = $this->userService->createUser($request->validated());
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
      /*
      @param User $user
      @return UserResource
  */
    public function show(User $user)
    {
        Gate::authorize('view', $user);

        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
     /*
      @param User $user
      @param UpdateUserRequest  $request,
      @return UserResource
  */
    public function update(UpdateUserRequest  $request, User $user)
    {
        Gate::authorize('update', $user);
        $user = $this->userService->updateUser($user, $request->validated());
        return new UserResource($user);

    }

    /**
     * Remove the specified resource from storage.
     */
     /*
      @param User $user
      @return response
  */
    public function destroy(User $user)
    {
        Gate::authorize('delete', $user);

        $user->delete();
        return response()->json(null, 204);
    }
}
