<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // 管理者権限設定
        Gate::define('isAdmin',function($user){
            return $user->role === 0;
        });

        // エンジニア権限設定
        Gate::define('isEngineer',function($user){
            return $user->role === 1;
        });

        // カリキュラム生権限設定
        Gate::define('isStudent',function($user){
            return $user->role === 5;
        });

        // 内定者権限設定
        Gate::define('isUnofficialCandidate',function($user){
            return $user->role === 10;
        });
    }
}
