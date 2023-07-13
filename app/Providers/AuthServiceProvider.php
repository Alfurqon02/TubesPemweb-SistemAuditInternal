<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('access-dashboard', function ($user) {
            return $user->hasRole('GUESTS');
        });

        Gate::define('access-setup-auditor', function ($user) {
            return $user->hasRole('administrator') || $user->hasRole('auditor');
        });

        Gate::define('access-setup-auditee', function ($user) {
            return $user->hasRole('administrator') || $user->hasRole('auditee');
        });

        Gate::define('access-input-auditor', function ($user) {
            return $user->hasRole('administrator') || $user->hasRole('ketua_auditor');
        });
    }
}