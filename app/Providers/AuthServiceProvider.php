<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\User;
use App\Models\Rating;
use App\Models\BorrowRecord;
use App\Policies\BookPolicy;
use App\Policies\UserPolicy;
use App\Policies\RatingPolicy;
use App\Policies\BorrowRecordPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Book::class => BookPolicy::class,
        BorrowRecord::class => BorrowRecordPolicy::class,
        Rating::class => RatingPolicy::class,


    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Additional gates or policies
    }
}
