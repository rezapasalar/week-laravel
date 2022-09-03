<?php

namespace App\Providers;

use App\Models\Permission;
use App\Models\Team;
use App\Policies\TeamPolicy;
use Exception;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

		try {
            $permissions = Permission::all();

            foreach ($permissions as $permission) {
                Gate::define($permission->name, function ($user) use ($permission) {
                    if ($user->isSuperAdmin()) {
                        return true;
                    }

                    return $user->hasPermission($permission);
                });
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
