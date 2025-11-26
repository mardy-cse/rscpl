<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        /**
         * Gate for admin access - can be used with @can, @cannot in views
         */
        Gate::define('admin', function (User $user) {
            return $user->isAdmin();
        });

        /**
         * Gate for view admin dashboard
         */
        Gate::define('view-dashboard', function (User $user) {
            return $user->isAdmin();
        });

        /**
         * Gate for manage content
         */
        Gate::define('manage-content', function (User $user) {
            return $user->isAdmin();
        });
    }
}
