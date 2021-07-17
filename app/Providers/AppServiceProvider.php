<?php

namespace App\Providers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        $this->app->singleton(
            \App\Repository\User\UserRepositoryInterface::class,
            \App\Repository\User\UserRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'course' => Course::class,
            'users' => User::class,
        ]);
        Paginator::useBootstrap();
    }
}
