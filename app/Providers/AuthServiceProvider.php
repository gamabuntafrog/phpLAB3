<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('news-basic', function ($user) {
            return $user !== null; // Check if the user is authenticated
        });

        Gate::define('update-news', function ($user, $news) {
            if($user->role === "super_admin") return true;

            return $user->role === "editor" && $news->creator_user_id === $user->id;
        });

        Gate::define('delete-news', function ($user) {
            return $user->role === "super_admin";
        });
    }
}
