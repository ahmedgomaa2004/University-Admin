<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Student;
use App\Models\Doctor;
use App\Models\Employee;
use App\Models\Course;
use App\Observers\ActivityLogObserver;

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
        // Register observers for activity logging
        Student::observe(ActivityLogObserver::class);
        Doctor::observe(ActivityLogObserver::class);
        Employee::observe(ActivityLogObserver::class);
        Course::observe(ActivityLogObserver::class);
    }
}
