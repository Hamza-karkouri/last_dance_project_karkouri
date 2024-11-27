<?php

namespace App\Providers;

use App\Models\Classes;
use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            // Pass all classes to the view
            $classes = Classes::with('courses.lessons')->get();

            // Pass the classes variable to all views
            $view->with('classes', $classes);
        });
        $requestUsers = User::where('approved', false)->get();
        view()->share('requestUsers', $requestUsers);
        $requestCoach = User::where('apply', 'under_review')->get();
        view()->share('requestCoach', $requestCoach);
    }
}
