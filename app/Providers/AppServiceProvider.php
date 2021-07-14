<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Repository\Course\CourseRepositoryInterface::class,
            \App\Repository\Course\CourseRepository::class,
        );

        $this->app->singleton(
            \App\Repository\Subject\SubjectRepositoryInterface::class,
            \App\Repository\Subject\SubjectRepository::class,
        );
        $this->app->singleton(
            \App\Repository\Topic\TopicRepositoryInterface::class,
            \App\Repository\Topic\TopicRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
    }
}
