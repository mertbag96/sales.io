<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\Customer;

use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\CompanyPolicy;
use App\Policies\CustomerPolicy;

use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
        Company::class => CompanyPolicy::class,
        Customer::class => CustomerPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('see-monitoring', function (User $user): bool {
            return $user->canSeeMonitoring();
        });

        Gate::define('manage-administration', function (User $user): bool {
            return $user->canManageAdministration();
        });
    }
}
